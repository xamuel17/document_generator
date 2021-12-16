<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Excel extends CI_Controller
{

	function __Construct()
	{
		parent::__Construct();

		$this->load->database(); // load database
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->model('excel_model');
		$this->load->helper('download');
		require_once(APPPATH . 'classes/PayslipConfig.php');
	}


	public function downloadExcel()
	{
		$config = new PayslipConfig();  //create object 

		$filename = 'users';
		$userData = $this->excel_model->read_users();
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
		header('Cache-Control: max-age=0');
		
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'Id')->getStyle('A1')->applyFromArray($config->textName());
		$sheet->setCellValue('B1', 'Name')->getStyle('B1')->applyFromArray($config->textName());
        $sheet->setCellValue('C1', 'Email')->getStyle('C1')->applyFromArray($config->textName());
        $sheet->setCellValue('D1', 'Phone')->getStyle('D1')->applyFromArray($config->textName());
        $sheet->setCellValue('E1', 'Country')->getStyle('E1')->applyFromArray($config->textName());
		$sheet->setCellValue('F1', 'Country_code')->getStyle('F1')->applyFromArray($config->textName());     
        $rows = 2;

		foreach ($userData as $val){
			$sheet->setCellValue('A' . $rows, $val['id']);
            $sheet->setCellValue('B' . $rows, $val['name']);
            $sheet->setCellValue('C' . $rows, $val['email']);
            $sheet->setCellValue('D' . $rows, $val['phone']);
            $sheet->setCellValue('E' . $rows, $val['country']);
	   		 $sheet->setCellValue('F' . $rows, $val['country_code']);
          
            $rows++;
        }


		$writer = new Xlsx($spreadsheet);
		$writer->save("php://output"); //  download file 

	}





	public function uploadExcel()
	{
			//clear temp_storage
			delete_files('./upload/excel');

		if (!empty($_FILES['file']['name'])) {

			// Set preference
			$config['upload_path'] = 'upload/excel/';
			$config['allowed_types'] = 'xlsx|csv|xls';
			$config['max_size'] = '1024'; // max_size in kb
			$config['file_name'] = $_FILES['file']['name'];

			//Load upload library
			$this->load->library('upload', $config);

			// File upload
			if ($this->upload->do_upload('file')) {
				// Get data about the file
				$uploadData = $this->upload->data();

				$dname = explode(".", $_FILES['file']['name']);
					$extension = end($dname);

				//$extension = pathinfo($uploadData, PATHINFO_EXTENSION);

				if ($extension == 'csv') {
					$reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
				} else if ($extension == 'xls') {
					$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
				} else {
					$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
				}

				$spreadsheet = $reader->load($_FILES['file']['tmp_name']);
				$sheetdata = $spreadsheet->getActiveSheet()->toArray();
				$sheetcount = count($sheetdata);

				$data = [];
				if ($sheetcount > 1) {
					for ($i = 1; $i < $sheetcount; $i++) {
						$name = $sheetdata[$i][0];
						$email = $sheetdata[$i][1];
						$phone = $sheetdata[$i][2];
						$country = $sheetdata[$i][3];
						$country_code = $sheetdata[$i][4];

						$data[] = array(
							'name' => $name,
							'email' => $email,
							'phone' => $phone,
							'country' => $country,
							'country_code' => $country_code
						);
					}
					$insertdata = $this->excel_model->insert_batch($data);
					if ($insertdata) { 
						$this->session->flashdata('message', '<div class="alert alert-success"> Successfully Added</div>');
					redirect('excel');
					} else {
						$this->session->flashdata('message', '<div class="alert alert-danger"> Failed to upload data</div>');
						redirect('excel');
					}
				}
			}
		}
	}


	public function spreadsheetImport()
	{
	}
}
