<?php

/**
 * Created by PhpStorm.
 * User: rock
 * Date: 24/10/2017
 * Time: 5:37 AM
 */
class UserController extends CI_Controller
{
    public function ulist()
    {
        if(!isset($this->session->userdata['logged_in']) || $this->session->userdata('logged_in') === false){
            redirect('admin/auth/login');
        }
        else {

            $header_layout = $this->load->view('admin/template/header_layout', '', TRUE);
            $adminDataName = array('adminName' => $this->session->userdata['master']['USER_ID']);
            $topbar_layout = $this->load->view('admin/template/topbar_layout', $adminDataName, TRUE);
            $selectedMenu = array('selectedMenu' => 2);
            $sidebar_layout = $this->load->view('admin/template/sidebar_layout', $selectedMenu, TRUE);

            $footer_layout = $this->load->view('admin/template/footer_layout', '', TRUE);
            $dataToBeDisplayed['header'] = $header_layout;
            $dataToBeDisplayed['topbar'] = $topbar_layout;
            $dataToBeDisplayed['sidebar'] = $sidebar_layout;
            $dataToBeDisplayed['footer'] = $footer_layout;

            $userToDisplay = array();
            $userList = $this->User_model->GetAllUsersListOrderBy();
            foreach ($userList as $userItem)
            {
                $userProfileItem = $this->Profile_model->FindProfileByUserId($userItem['ID']);
                $userItem['NICKNAME'] = $userProfileItem->NICK_NAME;
                $userItem['NAME'] = $userProfileItem->FIRST_NAME." ".$userProfileItem->LAST_NAME;
                $userItem['PHONE'] = $userProfileItem->PHONE;
                $userItem['CITY'] = $userProfileItem->CITY;
                $userItem['OS'] = $userProfileItem->USER_OS;
                $userItem['CONTACT'] = count($this->Contact_model->GetContactArrayByArrayFilter(array('OWNER_ID'=>$userItem['ID'])));

                array_push($userToDisplay, $userItem);
            }

            $dataToBeDisplayed['userList'] = $userToDisplay;
            $this->load->view('admin/panel/users/userlist', $dataToBeDisplayed);
        }
    }

    public function uedit($id)
    {
        if(!isset($this->session->userdata['logged_in']) || $this->session->userdata('logged_in') === false){
            redirect('admin/auth/login');
        }
        else {
            $header_layout = $this->load->view('admin/template/header_layout', '', TRUE);
            $adminDataName = array('adminName' => $this->session->userdata['master']['USER_ID']);
            $topbar_layout = $this->load->view('admin/template/topbar_layout', $adminDataName, TRUE);
            $selectedMenu = array('selectedMenu' => 2);
            $sidebar_layout = $this->load->view('admin/template/sidebar_layout', $selectedMenu, TRUE);
            $footer_layout = $this->load->view('admin/template/footer_layout', '', TRUE);
            $dataToBeDisplayed['header'] = $header_layout;
            $dataToBeDisplayed['topbar'] = $topbar_layout;
            $dataToBeDisplayed['sidebar'] = $sidebar_layout;
            $dataToBeDisplayed['footer'] = $footer_layout;

            $userObject = $this->User_model->FindUserByArray(array('ID' => $id));
            $userProfileObject = $this->Profile_model->GetProfileArrayByArrayFilter(array('USER_ID' => $id));

            $userContactArray = $this->Contact_model->GetContactArrayByArrayFilter(array('OWNER_ID'=>$id));
            $userContactToBeDisaplayed = array();
            if(count($userContactArray) >0) {

                foreach ($userContactArray as $userContactItem) {
                    $contactDispItem = array();
                    $contactorProfile = $this->Profile_model->FindProfileByUserId($userContactItem['CONTACT_ID']);
                    $contactDispItem['NICK'] = $contactorProfile->NICK_NAME;
                    $contactDispItem['NAME'] = $contactorProfile->FIRST_NAME." ".$contactorProfile->LAST_NAME;
                    $contactDispItem['ID'] = $contactorProfile->ID;
                    $contactDispItem['PHONE'] = $contactorProfile->PHONE;
                    array_push($userContactToBeDisaplayed, $contactDispItem);
                }
            }

            $dataToBeDisplayed['userObject'] = $userObject[0];
            $dataToBeDisplayed['profileObject'] = $userProfileObject[0];
            $dataToBeDisplayed['contactObject'] = $userContactToBeDisaplayed;

            $this->load->view('admin/panel/users/useredit', $dataToBeDisplayed);
        }
    }


    public function uremove($id){
        $removeUser = $this->User_model->RemoveUserByArray(array('ID' => $id));
        $removeProfile = $this->Profile_model->RemoveProfileByArray(array('USER_ID' => $id));

    }

    public function upasschange($id){
        $newPass = $this->input->post('newPass');
        $reTypePass = $this->input->post('reTypePass');
        if($newPass !== $reTypePass)
        {
            echo "Password doesn't match.";
        }
        else
        {
            $userEmail = $this->User_model->FindUserObjectByArray(array('ID' => $id))->EMAIL;
            $this->User_model->UpdatePassword($userEmail, md5($newPass));
            echo "Password changed successfully";
        }

    }

    public function ustatuschange($id)
    {
        $newApprove = $this->input->post('approve');
        $this->User_model->UpdateStatus($id, $newApprove);
        echo true;
    }

    public function utourtarget($id){

        $jsonTarget = $this->input->post('chooseTarget');
        $arrayChooseItem = json_decode($jsonTarget);
        $this->Tourism_model->RemoveTourismPerUser($id);
        foreach ($arrayChooseItem as $item)
        {
            $this->Tourism_model->InsertTourismTarget($id, $item);
        }

    }

    /***
     * Functions for admin
     */
    public function admin()
    {
        if(!isset($this->session->userdata['logged_in']) || $this->session->userdata('logged_in') === false){
            redirect('admin/auth/login');
        }
        else {
            $dataToBeDisplayed = array();
            $header_layout = $this->load->view('admin/template/header_layout', '', TRUE);
            $adminDataName = array('adminName' => $this->session->userdata['master']['USER_ID']);
            $topbar_layout = $this->load->view('admin/template/topbar_layout', $adminDataName, TRUE);
            $selectedMenu = array('selectedMenu' => 10);
            $sidebar_layout = $this->load->view('admin/template/sidebar_layout', $selectedMenu, TRUE);
            $footer_layout = $this->load->view('admin/template/footer_layout', '', TRUE);
            $dataToBeDisplayed['header'] = $header_layout;
            $dataToBeDisplayed['topbar'] = $topbar_layout;
            $dataToBeDisplayed['sidebar'] = $sidebar_layout;
            $dataToBeDisplayed['footer'] = $footer_layout;
            $dataToBeDisplayed['admin'] = $this->User_model->FindAdminObjectById();

            $this->load->view('admin/panel/admin/editprofile', $dataToBeDisplayed);
        }
    }

    public function adminprofile()
    {
        $adminEmail = $this->input->post("adminEmail");
        $adminWhatapp = $this->input->post("adminWhatapp");
        $this->User_model->UpdateUserInformation(array('CONTACT_EMAIL'=>$adminEmail, 'WHAT_APP'=>$adminWhatapp, 'UPDATED_AT' => time()));
        redirect('admin/user/admin', false);
    }

    public function adminpassword()
    {
        $adminPassword = $this->input->post("adminPassword");
        $adminConfirmPassword = $this->input->post("adminConfirmPassword");
        if($adminPassword !== $adminConfirmPassword)
        {
            echo "0";
            return;
        }
        $this->User_model->UpdateUserInformation(array('PASSWORD'=>md5($adminPassword), 'UPDATED_AT' => time()));
        echo "1";
    }
}