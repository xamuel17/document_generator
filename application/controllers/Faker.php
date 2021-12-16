<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Faker extends CI_Controller
{

	function __Construct()
	{
		parent::__Construct();

		$this->load->database(); // load database
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->model('user_model');
		$this->load->model('emp_model');
		# Load Fakers own autoloader
		require_once(APPPATH . 'third_party/faker/autoload.php');
	}

	public function index()
	{
		$this->load->view('header');
		$this->load->view('pages/faker/index');
		$this->load->view('footer');
	}


	public function generateUsers()
	{

		$faker = Faker\Factory::create();
		$faker->seed(5);

		$res = false;
		for ($i = 0; $i < 1000; $i++) {
			$data = array(
				'name' => $faker->firstName . ' ' . $faker->lastName,
				'email' => $faker->email,
				'phone' => $faker->phoneNumber,
				'country' => $faker->country,
				'country_code' => $faker->countryCode

			);

			if ($this->user_model->create_user($data)) {
				//echo 'user added ='. $i . '</br>';
				$res = true;
			};
		}
		if ($res == true) {
			$this->session->set_flashdata('success', '1000 Dummy Users Created');
			redirect(base_url() . 'faker', 'refresh');
		} else {
			$this->session->set_flashdata('errors', 'Unexpected Error Occurred');
			redirect(base_url() . 'faker', 'refresh');
		}
	}











	public function generateEmployees()
	{

		$faker = Faker\Factory::create();
		$faker->seed(5);

		$res = false;

	

		for ($i = 0; $i < 10; $i++) {

			$a = array("a"=>"Administrative", "b"=>"Human Resource", "c"=>"ICT Support", "d"=>"Corporate Comms", "e"=>"Marketing", "f"=>"Quality Assurance", "g"=>"Facility", "h"=>"Security");
			$dept = $a[array_rand($a)];
	
	
			$b = array("a"=>"Software Developer", "b"=>"Marketing Manager", "c"=>"Control & Compliance Officer", "d"=>"Data Analyst","e"=> "Research Assistant", "f"=>"Chief Security Officer", "g"=>"Gardener", "h"=>"Data Clerk");
			$job =$b[array_rand($b)];


			$data = array(
				'firstname' => $faker->firstName,
				'lastname' => $faker->lastName,
				'department' => $dept,
				'job_title' => $job,


			);

			if ($this->emp_model->create_employee($data)) {
				//echo 'user added ='. $i . '</br>';
				$res = true;
			};
		}
		if ($res == true) {
			$this->session->set_flashdata('success', '10 Dummy Employees Created');
			redirect(base_url() . 'faker', 'refresh');
		} else {
			$this->session->set_flashdata('errors', 'Unexpected Error Occurred');
			redirect(base_url() . 'faker', 'refresh');
		}
	}
}
