<?php

/**
 * Created by PhpStorm.
 * User: rock
 * Date: 11/10/2017
 * Time: 6:32 PM
 */
class Profile_model extends MY_Model
{
    public function InsertProfile(
                                $accountId,
                                $nickName,
                                $phone,
                                $userOS,
                                $userAge,
                                $firstName,
                               $lastName,
                               $city,
                               $job,
                                $titleStudy,
                                $userSport,
                                $userMarried,
                                $termsAllow)
    {
            $nowTimeStamp = time();
            $profileInsertArray = array(
                'USER_ID'=>$accountId,
                'NICK_NAME' => $nickName,
                'PHONE'=>$phone,
                'USER_OS' => $userOS,
                'AGE' => $userAge,
                'FIRSTNAME'=>$firstName,
                'LASTNAME'=>$lastName,
                'CITY'=>$city,
                'JOB'=>$job,
                'TITLE_STUDY'=>$titleStudy,
                'SPORT'=>$userSport,
                'MARRIED'=>$userMarried,
                'TERMS_ALLOW'=>$termsAllow,
                'UPDATED_AT'=>$nowTimeStamp,
                'CREATED_AT'=>$nowTimeStamp
            );

            if($this->db->insert(self::TABLE_PROFILE_INFO, $profileInsertArray))
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

    public function FindProfileByUserId($userId)
    {
        return $this->db->select('*')->from(self::TABLE_PROFILE_INFO)->where('USER_ID', $userId)->limit(1, 0)->get()->row();
    }

    public function GetProfileArrayByArrayFilter($filterArray)
    {
        return $this->db->select('*')->from(self::TABLE_PROFILE_INFO)->where($filterArray)->get()->result_array();
    }

    public function RemoveProfileByArray($array)
    {
        $this->db->where($array)->delete(self::TABLE_PROFILE_INFO);
    }
}