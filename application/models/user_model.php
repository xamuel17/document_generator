<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user_model extends CI_Model {

    protected $table = 'users';

    public function __construct() {
        parent::__construct();
    }



    public function read_all_users() {
        $this->db->order_by('created_at','DESC');
        $query = $this->db->get($this->table);
        return $query->result();
    }


	public function create_user($data){
		$query = $this->db->insert($this->table, $data);
		if($query != null){
			return true;
		}
	}

	
}
