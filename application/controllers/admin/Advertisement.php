<?php

/**
 * Created by PhpStorm.
 * User: rock
 * Date: 11/29/17
 * Time: 7:19 PM
 */
class Advertisement extends CI_Controller
{
    public function manage()
    {
        if(!isset($this->session->userdata['logged_in']) || $this->session->userdata('logged_in') === false){
            redirect('admin/auth/login');
        }
        else {
            $header_layout = $this->load->view('admin/template/header_layout', '', TRUE);
            $adminDataName = array('adminName' => $this->session->userdata['master']['USER_ID']);
            $topbar_layout = $this->load->view('admin/template/topbar_layout', $adminDataName, TRUE);
            $selectedMenu = array('selectedMenu' => 3);
            $sidebar_layout = $this->load->view('admin/template/sidebar_layout', $selectedMenu, TRUE);
            $footer_layout = $this->load->view('admin/template/footer_layout', '', TRUE);
            $dataToBeDisplayed['header'] = $header_layout;
            $dataToBeDisplayed['topbar'] = $topbar_layout;
            $dataToBeDisplayed['sidebar'] = $sidebar_layout;
            $dataToBeDisplayed['footer'] = $footer_layout;
            $dataToBeDisplayed['error'] = 0;//0: new screen, 1: error screen, 2: success screen;
            $this->load->view('admin/panel/advertise/edit_advertise', $dataToBeDisplayed);
        }
    }

}