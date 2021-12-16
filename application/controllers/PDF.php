<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PDF extends CI_Controller
{


	function __Construct()
	{
		parent::__Construct();

		 $this->load->database(); // load database
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->helper('file');
		$this->load->helper('email');
		$this->load->helper('security');
		$this->load->library('session');
		$this->load->model('cert_model');

		
	}


	public function convertText2PDF()
	{
		//Input Validation
		$this->form_validation->set_rules('content', 'Text Content', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('errors', validation_errors());
			redirect(base_url() . 'pdf/text', 'refresh');
		} else {

			//Accept Input content
			$content = $this->input->post('content');
			$content = $this->security->xss_clean($content);

			//Instantiate Mpdf 
			$mpdf = new \Mpdf\Mpdf();

			//Prepare for display
			$this->data['content'] = $content;
			$html = $this->load->view('pdf_outputs/textonly', $this->data, true);
			$mpdf->WriteHTML($html);
			$mpdf->Output(); // opens in browser
		}
	}






	public function convertTextImage2PDF()
	{

		//Clear upload folder
		delete_files('./upload');
		//Input Validation
		$this->form_validation->set_rules('firstname', 'FirstName',  'trim|required|xss_clean|min_length[2]|max_length[225]');
		$this->form_validation->set_rules('lastname', 'LastName',  'trim|required|xss_clean|min_length[2]|max_length[225]');
		$this->form_validation->set_rules('occupation', 'Occupation', 'trim|required|xss_clean|min_length[2]|max_length[225]');
		$this->form_validation->set_rules('company', 'Company', 'trim|required|xss_clean|min_length[2]|max_length[225]');
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('errors', validation_errors());
			redirect(base_url() . 'pdf/text', 'refresh');
		} else {

			$config['upload_path'] = './upload/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = 2000;
			$config['max_width'] = 1500;
			$config['max_height'] = 1500;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('profile_pic')) {
				$error = array('error' => $this->upload->display_errors());

				$this->session->set_flashdata('errors', validation_errors());
				redirect(base_url() . 'pdf/text-and-image', 'refresh');
			
			} else {
				$upl_data = $this->upload->data();
				$photo = $upl_data['file_name'];



				//Accept Input content
				$firstname = $this->input->post('firstname');
				$lastname = $this->input->post('lastname');
				$occupation = $this->input->post('occupation');
				$company = $this->input->post('company');



				$user_data = array(
					"firstname" => $firstname,
					"lastname" => $lastname,
					"occupation" => $occupation,
					"company" => $company,
					"photo" => $photo,
					"date" => date("F j, Y, g:i a")
				);
		
				//Instantiate Mpdf 
				$mpdf = new \Mpdf\Mpdf();

				//Prepare for display
				$data['user_data'] = $user_data;
				$html = $this->load->view('pdf_outputs/textimageonly', $data, true);
				$mpdf->WriteHTML($html);
				$mpdf->Output(); // opens in browser


			}
		}
	}






	public function convertTextStyleImage2PDF()
	{


		//Input Validation
		$this->form_validation->set_rules('fullname', 'FullName',  'trim|required|xss_clean|min_length[2]|max_length[225]');
		$this->form_validation->set_rules('department', 'Department',  'trim|required|xss_clean|min_length[2]|max_length[225]');
		$this->form_validation->set_rules('date', 'Date', 'required|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean|min_length[2]|max_length[225] |is_unique[certs.email]');
		$this->form_validation->set_rules('officerName', 'officerName', 'trim|required|xss_clean|min_length[2]|max_length[225]');
		$this->form_validation->set_rules('officerJob', 'officerJob', 'trim|required|xss_clean|min_length[2]|max_length[225]');
		
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('errors', validation_errors());
			redirect(base_url() . 'certificates', 'refresh');
		} else {

			//Accept Input content
			$fullname = $this->input->post('fullname');
			$department = $this->input->post('department');
			$date = $this->input->post('date');
			$email = $this->input->post('email');
			$officerName = $this->input->post('officerName');
			$officerJob = $this->input->post('officerJob');
			$fileName = uniqid() . '.pdf';

			$user_data = array(
				"fullname" => $fullname,
				"department" => $department,
				"email" => $email,
				"date" =>  date("F j, Y", strtotime($date)),
				"officer_job" => $officerJob,
				"officer_name" => $officerName,
				"file" => $fileName
			);
			//Save user_data to DB
			$this->cert_model->create_cert($user_data);

			//Instantiate Mpdf 
			$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
			$fontDirs = $defaultConfig['fontDir'];
			$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
			$fontData = $defaultFontConfig['fontdata'];

			$mpdf = new \Mpdf\Mpdf([

				'fontDir' => array_merge($fontDirs, [
				//	base_url('assets/_pdf/_fonts'),
					$_SERVER['DOCUMENT_ROOT'] . '/assets/_pdf/_fonts',
				]),
				'fontdata' => $fontData + [
					'satisfy' => [
						'R' => 'Satisfy-Regular.ttf',
					],
				
				],
				'default_font' => 'satisfy'
			]);

		
			//Prepare for display
			$data['user_data'] = $user_data;
			$html = $this->load->view('pdf_outputs/textimagestyle', $data, true);
			$mpdf->WriteHTML($html);
			$mpdf->Output('pdf_upload/'.$fileName); // save in memory
			$mpdf->Output(); // opens in browser



		}
	}




















	// public function generatePdf()
	// {


	// 	$html = $this->load->view('html_to_pdf', [], true);
	// 	$this->mpdf->WriteHTML($html);
	// 	$this->mpdf->Output(); // opens in browser
	// 	//$mpdf->Output('arjun.pdf','D'); // it downloads the file into the user system, with give name

	// 	$this->load->view('welcome_message');
	// }
}
