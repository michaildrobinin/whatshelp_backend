<?php

/**
 * Created by PhpStorm.
 * User: rock
 * Date: 11/30/17
 * Time: 1:38 AM
 */
class LocationController extends CI_Controller
{
    public function locations()
    {
        if(!isset($this->session->userdata['logged_in']) || $this->session->userdata('logged_in') === false){
            redirect('admin/auth/login');
        }
        else
        {
            $header_layout = $this->load->view('admin/template/header_layout', '', TRUE);
            $adminDataName = array('adminName' => $this->session->userdata['master']['USER_ID']);
            $topbar_layout = $this->load->view('admin/template/topbar_layout', $adminDataName, TRUE);

            $selectedMenu = array('selectedMenu'=>5);
            $sidebar_layout = $this->load->view('admin/template/sidebar_layout', $selectedMenu, TRUE);

            $footer_layout = $this->load->view('admin/template/footer_layout', '', TRUE);

            $dataToBeDisplayed['header'] = $header_layout;
            $dataToBeDisplayed['topbar']  = $topbar_layout;
            $dataToBeDisplayed['sidebar'] = $sidebar_layout;
            $dataToBeDisplayed['footer'] = $footer_layout;

            $locationToBeDisplay = $this->Location_model->GetTotalLocationArray();

            $dataToBeDisplayed['locations'] = $locationToBeDisplay;
            $this->load->view('admin/panel/location/list', $dataToBeDisplayed);
        }
    }

    public function add()
    {
        if(!isset($this->session->userdata['logged_in']) || $this->session->userdata('logged_in') === false){
            redirect('admin/auth/login');
        }
        else
        {
            $header_layout = $this->load->view('admin/template/header_layout', '', TRUE);
            $adminDataName = array('adminName' => $this->session->userdata['master']['USER_ID']);
            $topbar_layout = $this->load->view('admin/template/topbar_layout', $adminDataName, TRUE);

            $selectedMenu = array('selectedMenu'=>6);
            $sidebar_layout = $this->load->view('admin/template/sidebar_layout', $selectedMenu, TRUE);

            $footer_layout = $this->load->view('admin/template/footer_layout', '', TRUE);

            $dataToBeDisplayed['header'] = $header_layout;
            $dataToBeDisplayed['topbar']  = $topbar_layout;
            $dataToBeDisplayed['sidebar'] = $sidebar_layout;
            $dataToBeDisplayed['footer'] = $footer_layout;
            $this->load->view('admin/panel/location/add', $dataToBeDisplayed);
        }
    }

    public function getlocation($id)
    {
        $locationInfo = $this->Location_model->GetLocationArrayByArrayFilter(array('ID'=>$id));
        echo(json_encode($locationInfo[0]));
    }

    public function updatelocation()
    {
        redirect(base_url().'admin/map/locations');
    }

}