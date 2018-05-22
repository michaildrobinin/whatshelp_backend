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
    public function index()
    {
        redirect('admin/auth/login');
//        echo ('index');
    }

    public function login()
    {

        if(isset($this->session->userdata['logged_in']) && $this->session->userdata('logged_in') === true   ){
            redirect('admin/dash');
        }
        else
        {
            $this->load->library('form_validation');
            $data = array();
            $this->form_validation->set_rules('username', 'Username' , 'required');
            $this->form_validation->set_rules('password', 'Password' , 'required');
            if($this->form_validation->run() == TRUE) {
                $user_auth = $this->input->post('username');
                $user_password = $this->input->post('password');
                $user_password = md5($user_password);
                $adminResult = $this->User_model->FindAdminInfo($user_auth, $user_password);
                if(count($adminResult) > 0){
                    $session_value = array(
                        'logged_in' => true,
                        'master' => $adminResult[0]
                    );
                    $this->session->set_userdata($session_value);
                    redirect('admin/dash');
                }
                else{
                    $data['error'] = true;
                }
            }
            else{
                $data['error'] = false;
            }
            $this->load->view('admin/auth/login', $data);
        }
//        echo ("hello");
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('admin/auth/login');
    }

    public function login1()
    {
        $str = "a";
        return $str;
    }

}