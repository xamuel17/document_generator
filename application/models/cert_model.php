<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cert_model extends CI_Model {

    protected $table = 'certs';

    public function __construct() {
        parent::__construct();
    }



	public function create_cert($data){
		$query = $this->db->insert($this->table, $data);
		if($query != null){
			return true;
		}
	}



    public function read_all_certs() {
        $this->db->order_by('created_at','DESC');
        $query = $this->db->get($this->table);
        return $query->result();
    }


	public function read_cert($id){
		$this->db->where('id',$id);
        $query = $this->db->get($this->table);
        return $query->row_array();	
	}

	public function delete_cert_by_id($id){
		$this->db->where('id' , $id);
		$result = $this->db->delete($this->table);
		return $result;
	}
}
