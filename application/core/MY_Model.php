<?php

/**
 * Created by PhpStorm.
 * User: rock
 * Date: 23/7/2017
 * Time: 12:49 AM
 */
class MY_Model extends CI_Model
{

    /**
     * MY_Model constructor.
     */
    const DB_RESULT_SUCCESS = 1;
    const DB_RESULT_FAILED = 0;

    const DB_REPLY_RESULT_FIELD = 'result';
    const DB_REPLY_MESSAGE_FIELD = 'msg';

    const TABLE_USER_INFO = "user_info";
    const TABLE_PROFILE_INFO = "profile_info";
    const TABLE_ADMIN_INFO = "admin_info";
    const TABLE_LOCATION_INFO = "location_info";
    const TABLE_ALARM_INFO = "alarm_info";
    const TABLE_CONTACT_INFO = "contact_info";
//    const TABLE_HISTORY_INFO = "user_tour_history";
//    const TABLE_USER_INFO = "user_info";
//    const TABLE_USER_INFO = "user_info";

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

}