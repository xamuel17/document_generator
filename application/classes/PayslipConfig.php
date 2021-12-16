<?php



class PayslipConfig
{


	public function companyName()
	{
		return 	$styleArray = [
			'font' => [
				'bold' => true,
				'size' => 20,
				'color' => ['argb' => 'FFFF0000'],
			
			],
			'alignment' => [
				'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_GENERAL,
			],
			'borders' => [
				'outline' => [
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_NONE,
				],
			],
			'fill' => [
				'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
				// 'rotation' => 90,
				// 'startColor' => [
				// 	'argb' => 'FFA0A0A0',
				// ],
				// 'endColor' => [
				// 	'argb' => 'FFFFFFFF',
				// ],
			],
		];
	}



	public function textName(){
		return 	$styleArray = [
			'font' => [
				'bold' => true,
				'size' => 10,
		
			
			],
			'alignment' => [
				'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_JUSTIFY,
			],
			'borders' => [
				'outline' => [
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
				],
			],
			'fill' => [
				'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
				'color' => ['argb' => \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_YELLOW],
			
			],
		];
	}


	public function documentTitle(){

		return 	$styleArray = [
			'font' => [
				'italic' => true,
				'size' => 10,
				'color' => ['argb' => 'FFFF0000'],
			
			],
			'alignment' => [
				'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_GENERAL,
			],
			'borders' => [
				'outline' => [
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_NONE,
				],
			],
			'fill' => [
				'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
		
			],
		];

	}







	public function allDoc(){
		

			return 	$styleArray = [
			
		
				'borders' => [
					'outline' => [
						'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
						'color' => ['argb' => 'FFFF0000'],
					],
				],
		
			];
	
		
	}













}
