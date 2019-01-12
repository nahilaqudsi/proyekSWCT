<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CobaBar extends CI_Controller {

	public function __construct()
		{
			parent::__construct();
			$this->load->helper('url','form');	
			$this->load->library('form_validation');
			$this->load->model('Taping_transaksi_model1');
			// session
			$session_admin = $this->session->userdata('logged_swct');
			$data['validasi_admin'] = $session_admin['id'];
			
		}	

	public function index()
	{
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->load->model('Taping_transaksi_model1');
		$data["export"] = $this->Taping_transaksi_model1->getDataBar();		
		$this->load->view('CRUD_TAPING/ViewCobaBar', $data);
	}

	public function viewData()
	{
		$this->load->model('Taping_all_model');
		$data["taping_all_list"] = $this->Taping_all_model->getDataAll();;
		//  // session
		$session_admin = $this->session->userdata('logged_swct');
		$data['validasi_admin'] = $session_admin['id'];
		
		$this->load->view('CRUD_TAPING/lihat', $data);
	}

	public function excel()
	{
		$this->load->model('Taping_transaksi_model1');
		$data["export"] = $this->Taping_transaksi_model1->getDataExport();
		$data["exportAssy"] = $this->Taping_transaksi_model1->getDataAssy();
		$data['tb_assy'] = $this->Taping_transaksi_model1->getTableAsi();
		$data['kop'] = $this->Taping_transaksi_model1->getKop();
		// $this->load->view('CRUD_TAPING/lihat', $data);
		$this->load->view('CRUD_taping/ExcelCoba',$data);
	}

	public function export(){
        $this->load->model('Taping_transaksi_model1');
		$data["export"] = $this->Taping_transaksi_model1->getDataExport();
		$data["exportAssy"] = $this->Taping_transaksi_model1->getDataAssy();
		$data['tb_assy'] = $this->Taping_transaksi_model1->getTableAsi();
		$data['kop'] = $this->Taping_transaksi_model1->getKop();
         
        if(count($data)>0){
            $objPHPExcel = new PHPExcel();
            // Set properties
            $objPHPExcel->getProperties()
                  ->setCreator("SAMSUL ARIFIN") //creator
                    ->setTitle("Programmer - Regional Planning and Monitoring, XL AXIATA");  //file title
 
            $objset = $objPHPExcel->setActiveSheetIndex(0); //inisiasi set object
            $objget = $objPHPExcel->getActiveSheet();  //inisiasi get object
 
            $objget->setTitle('Sample Sheet'); //sheet title
             
            $objget->getStyle("A1:C1")->applyFromArray(
                array(
                    'fill' => array(
                        'type' => PHPExcel_Style_Fill::FILL_SOLID,
                        'color' => array('rgb' => '92d050')
                    ),
                    'font' => array(
                        'color' => array('rgb' => '000000')
                    )
                )
            );
 
            //table header
            $cols = array("A","B","C");
             
            $val = array("Detail Elemen Kerja","Grafik","Standart Time");
             
            for ($a=0;$a<3; $a++) 
            {
                $objset->setCellValue($cols[$a].'1', $val[$a]);
                 
                //Setting lebar cell
                $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(25); // NAMA
                $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25); // ALAMAT
                $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Kontak
             
                $style = array(
                    'alignment' => array(
                        'horizontal' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                    )
                );
                $objPHPExcel->getActiveSheet()->getStyle($cols[$a].'1')->applyFromArray($style);
            }
             
            $baris  = 2;
            foreach ($export as $frow){
                 
                //pemanggilan sesuaikan dengan nama kolom tabel
                $objset->setCellValue("A".$baris, $frow->t_detail); //membaca data nama
                $objset->setCellValue("B".$baris, $frow->alamat); //membaca data alamat
                $objset->setCellValue("C".$baris, $frow->kontak); //membaca data kontak
                 
                //Set number value
                $objPHPExcel->getActiveSheet()->getStyle('C1:C'.$baris)->getNumberFormat()->setFormatCode('0');
                 
                $baris++;
            }
             
            $objPHPExcel->getActiveSheet()->setTitle('Data Export');
 
            $objPHPExcel->setActiveSheetIndex(0);  
            $filename = urlencode("Data".date("Y-m-d H:i:s").".xls");
               
              header('Content-Type: application/vnd.ms-excel'); //mime type
              header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
              header('Cache-Control: max-age=0'); //no cache
 
            $objWriter = IOFactory::createWriter($objPHPExcel, 'Excel5');                
            $objWriter->save('php://output');
        }else{
            redirect('Excel');
        }
    }

}
?>