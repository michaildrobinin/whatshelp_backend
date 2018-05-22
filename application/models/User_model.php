<?php

/**
 * Created by PhpStorm.
 * User: rock
 * Date: 11/10/2017
 * Time: 6:32 PM
 */
class User_model extends MY_Model
{
    public function InsertUser($email, $password, $nickname, $phone)
    {
        $nowTimeStamp = time();
        $insertArray = array(
            'USER_EMAIL' => $email,
            'PASSWORD' => $password,
            'USER_NICKNAME' => $nickname,
            'USER_PHONE' => $phone,
            'ACTIVE' => '1',
            'TOKEN' => '',
            'UPDATED_AT' => $nowTimeStamp,
            'CREATED_AT' => $nowTimeStamp
            );
        if($this->db->insert(self::TABLE_USER_INFO, $insertArray))
        {
            $result[self::DB_REPLY_RESULT_FIELD] = self::DB_RESULT_SUCCESS;
            $result[self::DB_REPLY_MESSAGE_FIELD] = $this->db->insert_id();
        }
        else
        {
            $result[self::DB_REPLY_RESULT_FIELD] = self::DB_RESULT_FAILED;
            $result[self::DB_REPLY_MESSAGE_FIELD] = -1;
        }
        return $result;
    }

    public function GetRecentUserArray()
    {
        return $this->db->select('*')->from(self::TABLE_USER_INFO)->order_by('ID', 'desc')->limit(8,0)->get()->result_array();
    }

    public function FindUserInfo($auth, $password)
    {
        $this->db->where('USER_EMAIL', $auth);
        $this->db->where('PASSWORD', $password);
        return $this->db->get(self::TABLE_USER_INFO)->result_array();
    }

    public function FindUserByArray($array)
    {
        return $this->db->select('*')->from(self::TABLE_USER_INFO)->where($array)->get()->result_array();
    }

    public function FindUserObjectByArray($array)
    {
        return $this->db->select('*')->from(self::TABLE_USER_INFO)->where($array)->get()->row();
    }

    public function GetAllUsersListOrderBy()
    {
        return $this->db->order_by('UPDATED_AT', 'desc')->get(self::TABLE_USER_INFO)->result_array();
    }

    public function UpdateToken($id, $token){
        $this->db->set('TOKEN', $token);
        $this->db->set('UPDATED_AT', time());
        $this->db->where('ID', $id);
        $this->db->update(self::TABLE_USER_INFO);
    }

    public function UpdatePassword($email, $newPass)
    {
        $this->db->set('PASSWORD', $newPass);
        $this->db->set('UPDATED_AT',time());
        $this->db->where('EMAIL', $email);
        $retVal = [];
        if($this->db->update(self::TABLE_USER_INFO))
        {
            $retVal[self::DB_REPLY_RESULT_FIELD] = true;
            $retVal[self::DB_REPLY_MESSAGE_FIELD] = $this->db->affected_rows();
        }
        else
        {
            $retVal[self::DB_REPLY_RESULT_FIELD] = false;
            $retVal[self::DB_REPLY_MESSAGE_FIELD] = -1;
        }
        return $retVal;
    }



    public function UpdateStatus($id, $newValue)
    {
        $this->db->set('ACTIVE', $newValue);
        $this->db->where('ID', $id);
        if($this->db->update(self::TABLE_USER_INFO))
        {
            $retVal[self::DB_REPLY_RESULT_FIELD] = true;
            $retVal[self::DB_REPLY_MESSAGE_FIELD] = $this->db->affected_rows();
        }
        else
        {
            $retVal[self::DB_REPLY_RESULT_FIELD] = false;
            $retVal[self::DB_REPLY_MESSAGE_FIELD] = -1;
        }
        return $retVal;
    }

    public function RemoveUserByArray($array){
        $this->db->where($array)->delete(self::TABLE_USER_INFO);
    }

    public function FindAdminInfo($adminID, $password)
    {
        $this->db->where('USER_ID', $adminID);
        $this->db->where('PASSWORD', $password);
        return $this->db->get(self::TABLE_ADMIN_INFO)->result_array();
    }

    public function FindAdminObjectById()
    {
        return $this->db->select('*')->from(self::TABLE_ADMIN_INFO)->limit(1,0)->get()->row();
    }

    public function UpdateUserInformation($arrayToUpdate)
    {
        $this->db->set('ID', '1');
        $this->db->update(self::TABLE_ADMIN_INFO, $arrayToUpdate);
    }

    public function InsertLoginHistory($ip, $userId)
    {
        $insertArray = array('USER_ID' => $userId, 'IP' => $ip, 'CREATED_AT'=>time());
        $this->db->insert(self::TABLE_LOGIN_INFO, $insertArray);
    }
}