<?php

/**
 * Created by PhpStorm.
 * User: rock
 * Date: 24/10/2017
 * Time: 5:37 AM
 */
class DashController extends CI_Controller
{
    public function index()
    {
        if(!isset($this->session->userdata['logged_in']) || $this->session->userdata('logged_in') === false){
            redirect('admin/auth/login');
        }
        else
        {
            $header_layout = $this->load->view('admin/template/header_layout', '', TRUE);
            $adminDataName = array('adminName' => $this->session->userdata['master']['USER_ID']);
            $topbar_layout = $this->load->view('admin/template/topbar_layout', $adminDataName, TRUE);

            $selectedMenu = array('selectedMenu'=>1);
            $sidebar_layout = $this->load->view('admin/template/sidebar_layout', $selectedMenu, TRUE);

            $footer_layout = $this->load->view('admin/template/footer_layout', '', TRUE);

            $dataToBeDisplayed['header'] = $header_layout;
            $dataToBeDisplayed['topbar']  = $topbar_layout;
            $dataToBeDisplayed['sidebar'] = $sidebar_layout;
            $dataToBeDisplayed['footer'] = $footer_layout;
            $dataToBeDisplayed['totalAndroid'] = count($this->Profile_model->GetProfileArrayByArrayFilter(array('USER_OS' => '0')));
            $dataToBeDisplayed['totalApple'] = count($this->Profile_model->GetProfileArrayByArrayFilter(array('USER_OS' => '1')));
            $dataToBeDisplayed['totalLocation'] = count($this->Location_model->GetTotalLocationArray());//$newMessage;

            $userToBeDisplayed = array();
            $recentUserArray = $this->User_model->GetRecentUserArray();
            foreach ($recentUserArray as $recentUserItem)
            {
                $userProfileItem = $this->Profile_model->FindProfileByUserId($recentUserItem['ID']);
                $recentUserItem['NAME'] = $userProfileItem->NICK_NAME;
                $recentUserItem['PHONE'] = $userProfileItem->PHONE;
                $recentUserItem['OS'] = $userProfileItem->USER_OS;
                array_push($userToBeDisplayed, $recentUserItem);
            }
            $dataToBeDisplayed['recentUser'] = $userToBeDisplayed;


            $callToBeDisplayed = array();
            $recentCallArray = $this->Alarm_model->GetRecentAlarmHistory();
            foreach ($recentCallArray as $recentCallItem)
            {
                $userFrom = $this->Profile_model->FindProfileByUserId($recentCallItem['USER_ID']);
                $userTo = $this->Profile_model->FindProfileByUserId($recentCallItem['TO_USER_ID']);
                $recentCallItem['FROM_NAME'] = $userFrom->NICK_NAME;
                $recentCallItem['TO_NAME'] = $userTo->NICK_NAME;
                array_push($callToBeDisplayed, $recentCallItem);
            }

            $dataToBeDisplayed['recentCall'] = $callToBeDisplayed;
            $this->load->view('admin/panel/dashboard/dashboard', $dataToBeDisplayed);
        }
    }

    public function GetWholeLocationPoints()
    {
        $locationArray = $this->Location_model->GetTotalLocationArray();
        echo json_encode($locationArray);
    }

}