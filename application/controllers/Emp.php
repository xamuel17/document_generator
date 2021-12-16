<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Emp extends CI_Controller
{

	function __Construct()
	{
		parent::__Construct();

		$this->load->database(); // load database
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->model('emp_model');
		$this->load->helper('email');
		$this->load->helper('security');
		$this->load->library('session');
		$this->load->helper('download');

		require_once(APPPATH . 'classes/PayslipConfig.php');
	}


	public function index()
	{
		$this->load->view('header');
		$this->load->view('pages/employee/index');
		$this->load->view('footer');
	}


	public function addEmployee()
	{

		$this->form_validation->set_rules('firstname', 'FirstName',  'trim|required|xss_clean|min_length[2]|max_length[225]');
		$this->form_validation->set_rules('lastname', 'LastName',  'trim|required|xss_clean|min_length[2]|max_length[225]');
		$this->form_validation->set_rules('department', 'Department', 'trim|required|xss_clean|min_length[2]|max_length[225]');
		$this->form_validation->set_rules('job_title', 'Job Title', 'trim|required|xss_clean|min_length[2]|max_length[225]');
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('errors', validation_errors());
			redirect(base_url() . 'employee', 'refresh');
		} else {

			//Accept Input content
			$firstname = $this->input->post('firstname');
			$lastname = $this->input->post('lastname');
			$department = $this->input->post('department');
			$job_title = $this->input->post('job_title');

			$data = array(
				'firstname' => $firstname,
				'lastname' => $lastname,
				'department' => $department,
				'job_title' => $job_title
			);
			if ($this->emp_model->create_employee($data)) {
				$this->session->set_flashdata('success', 'Employee Created');
				redirect(base_url() . 'employee', 'refresh');
			} else {
				$this->session->set_flashdata('error', 'Employee Creation Failed');
				redirect(base_url() . 'employee', 'refresh');
			}
		}
	}






	public function showEmployees()
	{
		$emp = $this->emp_model->read_all_employees();
		$data['employees'] = $emp;
		$this->load->view('header');
		$this->load->view('pages/employee/employees', $data);
	}


	public function deleteEmployee($staff_no)
	{
		$emp = $this->emp_model->delete_employee($staff_no);
		if ($emp != 0) {
			$this->session->set_flashdata('success', 'Employee Deleted');
			redirect(base_url() . 'employees', 'refresh');
		} else {
			$this->session->set_flashdata('error', 'Delete Failed');
			redirect(base_url() . 'employees', 'refresh');
		}
	}



	public function showPayslip()
	{
		$emp = $this->emp_model->read_all_employees();
		$data['employee_data'] = $emp;
		$this->load->view('header');
		$this->load->view('pages/employee/payslip', $data);
		$this->load->view('footer');
	}






	public function generatePaySlip()
	{
		$this->form_validation->set_rules('staff_no', 'Employee Name',  'numeric|required|xss_clean');
		$this->form_validation->set_rules('allowance', 'Allowance',  'numeric|required|xss_clean');
		$this->form_validation->set_rules('deduction', 'Deduction', 'numeric|required|xss_clean');
		$this->form_validation->set_rules('salary', 'Basic Salary', 'numeric|required|xss_clean');
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('errors', validation_errors());
			redirect(base_url() . 'payslip', 'refresh');
		} else {

			//Accept Input content
			$staff_no = $this->input->post('staff_no');
			$allowance = $this->input->post('allowance');
			$deduction = $this->input->post('deduction');
			$salary = $this->input->post('salary');
			$this->generateDownload($staff_no, $allowance, $deduction, $salary);
		}
	}


	public function generateDownload($staff_no, $allowance, $deduction, $salary)
	{

		$config = new PayslipConfig();  //create object 


		$employee_data = $this->emp_model->read_employee($staff_no);
		$filename = $employee_data['firstname'];
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
		header('Cache-Control: max-age=0');

		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$rows = 2;

		$sheet->setCellValue('B' . $rows, 'Lawsikho')->getStyle('B' . $rows)->applyFromArray($config->companyName());
		$sheet->getColumnDimension('B')->setAutoSize(true);
		$sheet->setCellValue('F' . $rows, 'PAYSLIP')->getStyle('F' . $rows)->applyFromArray($config->documentTitle());
		$sheet->getColumnDimension('F')->setAutoSize(true);



		$rows = 4;
		$sheet->setCellValue('B' . $rows, 'Employee No:')->getStyle('B' . $rows)->applyFromArray($config->textName());
		$sheet->setCellValue('C' . $rows, $employee_data['staff_no'])->getStyle('C' . $rows)->applyFromArray($config->textName());
		$sheet->setCellValue('E' . $rows, 'Date:')->getStyle('E' . $rows)->applyFromArray($config->textName());
		$sheet->setCellValue('F' . $rows, date("Y/m/d"))->getStyle('F' . $rows)->applyFromArray($config->textName());


		$rows = 5;
		$sheet->setCellValue('B' . $rows, 'Name:')->getStyle('B' . $rows)->applyFromArray($config->textName());
		$sheet->setCellValue('C' . $rows,  $employee_data['firstname'] . ' ' . $employee_data['lastname'])->getStyle('C' . $rows)->applyFromArray($config->textName());


		$rows = 6;
		$sheet->setCellValue('B' . $rows, 'Department:')->getStyle('B' . $rows)->applyFromArray($config->textName());
		$sheet->setCellValue('C' . $rows, $employee_data['department'])->getStyle('C' . $rows)->applyFromArray($config->textName());

		$rows = 8;
		$sheet->setCellValue('B' . $rows, 'Basic Salary:')->getStyle('B' . $rows)->applyFromArray($config->textName());
		$sheet->setCellValue('C' . $rows, $salary)->getStyle('C' . $rows)->applyFromArray($config->textName());
		$sheet->getStyle('C' . $rows)->getNumberFormat()->setFormatCode(PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_CURRENCY_USD);

		$rows = 9;
		$sheet->setCellValue('B' . $rows, 'Allowance:')->getStyle('B' . $rows)->applyFromArray($config->textName());
		$sheet->setCellValue('C' . $rows, $allowance)->getStyle('C' . $rows)->applyFromArray($config->textName());
		$sheet->getStyle('C' . $rows)->getNumberFormat()->setFormatCode(PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_CURRENCY_USD);


		$rows = 10;
		$sheet->setCellValue('B' . $rows, 'Deduction:')->getStyle('B' . $rows)->applyFromArray($config->textName());
		$sheet->setCellValue('C' . $rows, $deduction)->getStyle('C' . $rows)->applyFromArray($config->textName());
		$sheet->getStyle('C' . $rows)->getNumberFormat()->setFormatCode(PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_CURRENCY_USD);

		$rows = 11;
		$sheet->setCellValue('B' . $rows, 'Net Salary Amount:')->getStyle('B' . $rows)->applyFromArray($config->textName());
		$sheet->setCellValue('C' . $rows, '=SUM(C8+C9-C10)')->getStyle('C' . $rows)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFD5DD64');
		$sheet->getStyle('C' . $rows)->getNumberFormat()->setFormatCode(PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_CURRENCY_USD);


		//Make cells auto fit
		$sheet->getColumnDimension('C')->setAutoSize(true);
		$sheet->getColumnDimension('B')->setAutoSize(true);
		$sheet->getColumnDimension('D')->setAutoSize(true);
		$sheet->getColumnDimension('F')->setAutoSize(true);


		//Add Logo
		// $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
		// $drawing->setName('Logo');
		// $drawing->setDescription('Logo');
		// $drawing->setPath(base_url() . 'assets/img/lawsikho.jpg); // put your path and image here
		// $drawing->setCoordinates('A1');
		// $drawing->setHeight(36);
		// $drawing->setOffsetX(110);
		// $drawing->setRotation(25);
		// $drawing->getShadow()->setVisible(true);
		// $drawing->getShadow()->setDirection(45);
		// $drawing->setWorksheet($spreadsheet->getActiveSheet());




		//Lock Document
		$sheet->getProtection()->setSheet(true);
		$sheet->getStyle('A2:F12')->applyFromArray($config->allDoc());


		$writer = new Xlsx($spreadsheet);
		$writer->save("php://output"); //  download file 


	}
}
