<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: rock
 * Date: 23/10/2017
 * Time: 7:01 PM
 */
class AuthController extends CI_Controller
{

    public function login()
    {
        $data = array();

        $user_auth = $this->input->post('email');
        $user_password = $this->input->post('password');
        $user_password = md5($user_password);

        $adminResult = $this->User_model->FindUserInfo($user_auth, $user_password);
        if(count($adminResult) > 0){
            $data['response_code'] = 200;
            $data['data'] = null;
            $data['msg'] = 'Login successful.';
        }
        else{
            $data['response_code'] = 0;
            $data['data'] = null;
            $data['msg'] = 'Username or password does not exist.';
        }

        echo (json_encode($data));
    }

    public function register()
    {
        $data = array();

        $user_auth = $this->input->post('email');
        $user_password = $this->input->post('password');
        $user_password = md5($user_password);
        $user_nickname = $this->input->post('nickname');
        $user_phone = $this->input->post('phone');

        $result = $this->User_model->InsertUser($user_auth, $user_password, $user_nickname, $user_phone);
        if($result['result'] == 1) {
            $data['response_code'] = 200;
            $data['data'] = null;
            $data['msg'] = 'Register successful.';
        }
        else {
            $data['response_code'] = 0;
            $data['data'] = null;
            $data['msg'] = 'Register error.';
        }

        echo (json_encode($data));
    }

}