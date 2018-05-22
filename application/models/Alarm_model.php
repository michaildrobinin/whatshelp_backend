<?php

/**
 * Created by PhpStorm.
 * User: rock
 * Date: 11/30/17
 * Time: 4:20 PM
 */
class Alarm_model extends MY_Model
{

    public function GetRecentAlarmHistory()
    {
        return $this->db->select('*')->from(self::TABLE_ALARM_INFO)->order_by('ID', 'desc')->limit(8,0)->get()->result_array();
    }

    public function GetTotalAlarmHistory()
    {
        return $this->db->select('*')->from(self::TABLE_ALARM_INFO)->order_by('ID', 'desc')->get()->result_array();
    }
}