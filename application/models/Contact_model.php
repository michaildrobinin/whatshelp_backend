<?php

/**
 * Created by PhpStorm.
 * User: rock
 * Date: 11/30/17
 * Time: 4:20 PM
 */
class Contact_model extends MY_Model
{


    public function GetContactArrayByArrayFilter($array)
    {
        return $this->db->select('*')->from(self::TABLE_CONTACT_INFO)->where($array)->get()->result_array();
    }

}