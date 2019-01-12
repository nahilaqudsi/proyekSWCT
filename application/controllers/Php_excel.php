<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Php_excel extends CI_Controller {

	public $nama_tabel = 'housing_temp';

	public function __construct()
	{
		parent::__construct();
		$this->load->library("PHPExcel");
		// $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
		$this->load->model("phpexcel_model");
	}

	public function index(){
		$this->load->view('home');
	}

		public function export(){
            //membuat objek
            $objPHPExcel = new PHPExcel();
            $data = $this->db->query("select * from housing_temp");
				$objPHPExcel->getProperties()->setCreator("PP")->setTitle("SWCT");
		        	$fields = $data->list_fields();
		        	$col = 0;
	        foreach ($fields as $field)
	        {
	            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, 4, $field);
	            $col++;
	        }
				$style = array(
					'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,)
					);
	        // Mengambil Data
	        $row = 5;
	        foreach($data->result() as $data)
	        {
	            $col = 0;
	            foreach ($fields as $field)
	            {
	                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $data->$field);
	                	$col++;
						$objPHPExcel->getActiveSheet()->getStyle('E'.$row)->applyFromArray($style);
						$objPHPExcel->getActiveSheet()->getStyle('F'.$row)->applyFromArray($style);
	            }
	            $row++;
	        }
	        $objPHPExcel->setActiveSheetIndex(0);

            //Set Title
            $objPHPExcel->getActiveSheet()->setTitle('SWCT');

            //Save ke .xlsx, kalau ingin .xls, ubah 'Excel2007' menjadi 'Excel5'
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
				//bold
				$objPHPExcel->getActiveSheet()->getStyle("A1:F4")->getFont()->setBold(true);
				//warna cell
				$objPHPExcel->getActiveSheet()->getStyle("A4:F4")->applyFromArray(
					array(
						'fill' => array(
							'type' => PHPExcel_Style_Fill::FILL_SOLID,
								'color' => array('rgb' => 'ff9004')
							),
							'font'=> array(
								'color' => array('rgb' => '000000'),
								'style' => "bold"
							)
						)
					);
				//setting lebar cell
				$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
				$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(75);
				$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(10);
						
				//set borders
				$BStyle = array('borders'=>array('allborders'=>array('style'=>PHPExcel_Style_Border::BORDER_THIN)));
				$objPHPExcel->getActiveSheet()->getStyle('A4:F'.$row)->applyFromArray($BStyle);

				//center-in bang
				$objPHPExcel->getActiveSheet()->getStyle("A1:F3")->applyFromArray($style);
				$objPHPExcel->getActiveSheet()->getStyle('A1:A'.$row)->applyFromArray($style);
				//merge cell
				$objPHPExcel->getActiveSheet()->mergeCells('A1:F1');
				$objPHPExcel->getActiveSheet()->mergeCells('A2:F2');
				$objPHPExcel->getActiveSheet()->mergeCells('A3:F3');
					
				//add text
				$objPHPExcel->getActiveSheet()->setCellValue('A1','Production Preparation Department Baru');
				$objPHPExcel->getActiveSheet()->setCellValue('A2','Pembuatan SWCT Baru');
				$objPHPExcel->getActiveSheet()->setCellValue('A3','by :');
				
            //Header
            header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
            header("Cache-Control: no-store, no-cache, must-revalidate");
            header("Cache-Control: post-check=0, pre-check=0", false);
            header("Pragma: no-cache");
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            //Nama File
            header('Content-Disposition: attachment;filename="swct-baru.xlsx"');
            //Download
            $objWriter->save("php://output");
        }
}

/* End of file Phpexcel.php */
/* Location: ./application/controllers/Phpexcel.php */
