<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Certificate extends CI_Controller
{


	function __Construct()
	{
		parent::__Construct();

		$this->load->database(); // load database
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->model('cert_model');
		$this->load->helper('download');
	}

	public function index()
	{
		$certs = $this->cert_model->read_all_certs();
		$data['certs'] = $certs;
		$this->load->view('header');
		$this->load->view('pages/certificates', $data);
	}


	public function deleteCert($id)
	{

		//Fetch Certificate details
		$cert = $this->cert_model->read_cert($id);
		$filename = $cert['file'];

		// Delete file
		$path_to_file = './pdf_upload/' . $filename;
		if (unlink($path_to_file)) {

			if ($this->cert_model->delete_cert_by_id($id)) {

				$this->session->set_flashdata('errors', 'Certificate has been deleted');
				redirect(base_url() . 'certificates', 'refresh');
			}
		} else {
			$this->session->set_flashdata('errors', 'Unexpected Error Occured');
				redirect(base_url() . 'certificates', 'refresh');
		}
	}
}
