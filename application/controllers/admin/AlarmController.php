<?php

/**
 * Created by PhpStorm.
 * User: rock
 * Date: 11/29/17
 * Time: 8:59 PM
 */
class AlarmController extends CI_Controller
{
    public function history()
    {
        if(!isset($this->session->userdata['logged_in']) || $this->session->userdata('logged_in') === false){
            redirect('admin/auth/login');
        }
        else
        {
            $header_layout = $this->load->view('admin/template/header_layout', '', TRUE);
            $adminDataName = array('adminName' => $this->session->userdata['master']['USER_ID']);
            $topbar_layout = $this->load->view('admin/template/topbar_layout', $adminDataName, TRUE);

            $selectedMenu = array('selectedMenu'=>4);
            $sidebar_layout = $this->load->view('admin/template/sidebar_layout', $selectedMenu, TRUE);

            $footer_layout = $this->load->view('admin/template/footer_layout', '', TRUE);

            $dataToBeDisplayed['header'] = $header_layout;
            $dataToBeDisplayed['topbar']  = $topbar_layout;
            $dataToBeDisplayed['sidebar'] = $sidebar_layout;
            $dataToBeDisplayed['footer'] = $footer_layout;

            $alarmHistory = array();
            $recentCallArray = $this->Alarm_model->GetTotalAlarmHistory();
            foreach ($recentCallArray as $recentCallItem)
            {
                $userFrom = $this->Profile_model->FindProfileByUserId($recentCallItem['USER_ID']);
                $userTo = $this->Profile_model->FindProfileByUserId($recentCallItem['TO_USER_ID']);
                $recentCallItem['FROM_NAME'] = $userFrom->NICK_NAME;
                $recentCallItem['TO_NAME'] = $userTo->NICK_NAME;
                $recentCallItem['PHONE'] = $userFrom->PHONE;
                $recentCallItem['USER_OS'] = $userFrom->USER_OS;
                array_push($alarmHistory, $recentCallItem);
            }


            $dataToBeDisplayed['alarmHistory'] = $alarmHistory;
            $this->load->view('admin/panel/alarm/history', $dataToBeDisplayed);
        }
    }
}