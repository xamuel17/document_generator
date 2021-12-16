<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{


	function __Construct(){
        parent::__Construct ();
	
        $this->load->helper(array('form','url'));
		$this->load->library('form_validation'); 
		$this->load->model('user_model');
      }

	public function index()
	{
		$this->load->view('header');
		$this->load->view('pages/index');
		$this->load->view('footer');
	}


	public function showTextOnlyPage(){
		$this->load->view('header');
		$this->load->view('pages/textonly');
		$this->load->view('footer');
	}


	public function showTextImagePage(){
		$this->load->view('header');
		$this->load->view('pages/textimage');
		$this->load->view('footer');	
	}


	
	public function showTextImageStylePage(){
		$this->load->view('header');
		$this->load->view('pages/textimagestyle');
		$this->load->view('footer');	
	}


	public function showImportExcelPage(){
		$data['active'] ='import';
		$this->load->view('header');
		$this->load->view('pages/excel/import', $data);
		$this->load->view('footer');	
	}


	
	public function showExportExcelPage(){
		$data['active'] ='export';
		$this->load->view('header');
		$this->load->view('pages/excel/export', $data);
		$this->load->view('footer');	
	}


		
	public function showUsersPage(){
		$data['users'] = $this->user_model->read_all_users();
		$data['active'] ='users';
		$this->load->view('header');
		$this->load->view('pages/excel/users', $data);
		$this->load->view('footer');	
	}




}
