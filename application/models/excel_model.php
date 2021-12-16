<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class excel_model extends CI_Model {

    protected $table = 'users';

    public function __construct() {
        parent::__construct();
    }



public function insert_batch($data){
	$this->db->insert_batch($this->table, $data);
	if($this->db->affected_rows() > 0){
		return true;
	}else{
		return false;
	}
}


public function read_users() {
	$this->db->select(array('id', 'name', 'email', 'phone', 'country', 'country_code'));
	$this->db->from($this->table);  
	$query = $this->db->get();
	return $query->result_array();
}



}
