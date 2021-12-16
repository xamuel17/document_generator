<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class emp_model extends CI_Model {

    protected $table = 'employees';

    public function __construct() {
        parent::__construct();
    }



	

	public function create_employee($data){
		$query = $this->db->insert($this->table, $data);
		if($query != null){
			return true;
		}
	}

	public function read_all_employees(){
		$this->db->order_by('created_at','DESC');
        $query = $this->db->get($this->table);
        return $query->result();
	}

	public function delete_employee($staff_no){
		$this->db->where('staff_no' , $staff_no);
		$result = $this->db->delete($this->table);
		return $result;
	}


	public function read_employee($staff_no){
		$this->db->where('staff_no',$staff_no);
        $query = $this->db->get($this->table);
        return $query->row_array();	
	}

	}
