<?php

/**
 * Created by PhpStorm.
 * User: rock
 * Date: 11/30/17
 * Time: 4:20 PM
 */
class Location_model extends MY_Model
{
    public function InsertLocation($address, $locationName, $description, $type, $locationLat, $locationLot)
    {
        $nowTimeStamp = time();
        $insertArray = array(
            'ADDRESS' => $address,
            'LOCATION_NAME' => $locationName,
            'DESCRIPTION' => $description,
            'TYPE' => $type,
            'LOCATION_LAT' => $locationLat,
            'LOCATION_LOT' => $locationLot,
            'UPDATED_AT' => $nowTimeStamp,
            'CREATED_AT' => $nowTimeStamp
        );
        if($this->db->insert(self::TABLE_LOCATION_INFO, $insertArray))
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

    public function GetLocationArrayByArrayFilter($array)
    {
        return $this->db->select('*')->from(self::TABLE_LOCATION_INFO)->where($array)->get()->result_array();
    }

    public function GetTotalLocationArray()
    {
        return $this->db->select('*')->from(self::TABLE_LOCATION_INFO)->get()->result_array();
    }
}