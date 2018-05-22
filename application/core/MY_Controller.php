<?php
require(APPPATH . 'libraries/REST_Controller.php');

use Firebase\JWT\JWT;
use Restserver\Libraries\REST_Controller;


/**
 * Created by PhpStorm.
 * User: rock
 * Date: 23/7/2017
 * Time: 1:31 AM
 */
class MY_Controller extends REST_Controller
{
    const RESULT_FIELD_NAME = "result";
    const MESSAGE_FIELD_NAME = "msg";

    const REPLY_TOKEN_ERROR = "token";
    const REPLY_DB_ERROR = "db";
    const REPLY_NO_DATA = "nodata";
    const REPLY_UPLOAD_ERROR = "upload";
    const REPLY_DUPLICATED_ERROR = "duplicated";
    const REPLY_INACTIVE_ERROR = "inactive";
    public function __construct($config = 'rest')
    {
        parent::__construct($config);
    }

    protected function generateToken($user_id){
        $token['id'] = $user_id;
        $date = new DateTime();
        $token['iat'] = $date->getTimestamp();
        $token['exp'] = $date->getTimestamp() + 60*60*24*5;
        $token_code = JWT::encode($token,$this->config->item('encryption_key'),'HS256');
        return $token_code;
    }

    protected function verificationToken($token){
        $ret_val = array();
        try{
            $user_data = JWT::decode($token, $this->config->item('encryption_key'), array('HS256'));
            $user_model = $this->User_model->FindUserByArray(array('ID' => $user_data->id));

            if($user_model[0]['TOKEN'] == $token && $user_model[0]['ACTIVE'] == '1')
            {
                $ret_val[self::RESULT_FIELD_NAME] = true;
                $ret_val['id'] = $user_data->id;
            }
            else
            {
                $ret_val[self::RESULT_FIELD_NAME] = false;
                $ret_val['id'] = -1;
            }
        }catch (Exception $e){
            $ret_val[self::RESULT_FIELD_NAME] = false;
            $ret_val['id'] = -1;
        }
        return $ret_val;
    }

    protected function initEmailSender(){
        $config['protocol'] = "smtp";
        $config['smtp_host'] = "mail.bookmapp.com";
        $config['smtp_port'] = "26";
        $config['smtp_timeout'] = "30";
        $config['smtp_user'] = "admin@bookmapp.com";
        $config['smtp_pass'] = "zeus.pkk111!!!Mail";
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";
        $this->email->initialize($config);
    }

    protected function fileUpload($pathToUpload, $nameToUpload, $filePostField){
        $config['upload_path']   = './uploads/'.$pathToUpload."/";
        $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|PNG|JPG|GIF';
        $config['max_size']      = 1024*8;//6 MB Maximum
        $config['max_width']     = 5000;
        $config['max_height']    = 5000;
        $config['file_name'] = $nameToUpload;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!is_dir('./uploads/'.$pathToUpload.'/')) {
            mkdir('./uploads/'.$pathToUpload.'/', 0777, TRUE);
        }

        $upload_result = $this->upload->do_upload($filePostField);
        if($upload_result == true){
            $uploadFilePath = base_url()."uploads/".$pathToUpload."/".$this->upload->data('file_name');
        }
        else{
            $uploadFilePath = $this->upload->display_errors();
        }
        return $uploadFilePath;
    }

    protected function GetMd5($pass)
    {
        return md5($pass);
    }
}