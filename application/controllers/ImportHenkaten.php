<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ImportHenkaten extends CI_Controller {

	function __construct(){
  		parent::__construct();
        $this->load->library('excel');
        $this->load->model('M_admin');
    }

 public function index() {
    $this->load->view('Crud_Taping/Import_Excel_Henkaten');
 }

 public function upload(){
  $fileName = $this->input->post('file', TRUE);

  $config['upload_path'] = './excel/'; 
  $config['file_name'] = $fileName;
  $config['allowed_types'] = 'xls|xlsx|csv|ods|ots';
  $config['max_size'] = 10000;

  $this->load->library('upload', $config);
  $this->upload->initialize($config); 
  
  if (!$this->upload->do_upload('file')) {
   $error = array('error' => $this->upload->display_errors());
   $this->session->set_flashdata('msg','Ada kesalah dalam upload'); 
   redirect('ImportHenkaten'); 
  } else {
   $media = $this->upload->data();
   $inputFileName = 'fileExcel/'.$media['file_name'];
   
   try {
    $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
    $objPHPExcel = $objReader->load($inputFileName);
   } catch(Exception $e) {
    die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
   }

   $sheet = $objPHPExcel->getSheet(0);
   $highestRow = $sheet->getHighestRow();
   $highestColumn = $sheet->getHighestColumn();

   for ($row = 2; $row <= $highestRow; $row++){  
     $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);

            $machine = $rowData[0][4];
            $color =$rowData[0][9];
            $conveor =$rowData[0][16];
            $subline = $rowData[0][18];

             $id_machine = $this->M_admin->getMachineById($machine);
             $id_color = $this->M_admin->getColorById($color);
             $id_conveor = $this->M_admin->getConveorById($conveor);
             $id_subline = $this->M_admin->getSublineById($subline);

             $id_machine2 = $id_machine[0]->id_machine;
             $id_color2 = $id_color[0]->id_color;
             $id_conveor2 = $id_conveor[0]->id_conveor;
             $id_subline2 = $id_subline[0]->id_subline;

             if($id_machine2 == NULL)
             {
              $this->session->set_flashdata('msg2','Mesin <b>'.$machine.'</b> dalam excel, tidak ada pada tabel database! Silihakan cek!'); 
              redirect('Import'); 
            }else if($id_color2 == NULL){
              $this->session->set_flashdata('msg2','Color <b>'.$color.'</b> dalam excel, tidak ada pada tabel database! Silihakan cek!');
              redirect('Import');
            }else if ($id_conveor2 == NULL) {
              $this->session->set_flashdata('msg2','Conveor <b>'.$conveor.'</b> dalam excel, tidak ada pada tabel database! Silihakan cek!');
              redirect('Import');
            }else if ($id_subline2 == NULL) {
              $this->session->set_flashdata('msg2','Subline <b>'.$subline.'</b> dalam excel, tidak ada pada tabel database! Silihakan cek!');
              redirect('Import');
            }else{
                $data = array( 
                    'code'=>$rowData[0][0], // Ambil data NIS
                    'code1'=>$rowData[0][1], // Ambil data nama
                    'c_no'=>$rowData[0][2], // Ambil data jenis kelamin
                    'cntrl'=>$rowData[0][3], // Ambil data alamat
                    'id_machine'=>$id_machine2,
                    'npg'=>$rowData[0][5],
                    'noproc'=>$rowData[0][6],
                    'kind'=>$rowData[0][7],
                    'size'=>$rowData[0][8],
                    'id_color'=>$id_color2,
                    'tem_a'=>$rowData[0][10],
                    'tem_b'=>$rowData[0][11],
                    'note_a'=>$rowData[0][12],
                    'note_b'=>$rowData[0][13],
                    'qty'=>$rowData[0][14],
                    'c_qty'=>$rowData[0][15],
                    'id_conveor'=>$id_conveor2,
                    'address'=>$rowData[0][17],
                    'id_subline'=>$id_subline2,
                    'issue'=>$rowData[0][19]
              );
                $this->db->replace("kanban",$data);
                delete_files($media['file_path']);
            }            
   } 
   $this->session->set_flashdata('msg','Berhasil upload ...!!'); 
   redirect('ImportHenkaten');
  }  
 } 

}

/* End of file ImportHenkaten.php */
/* Location: ./application/controllers/ImportHenkaten.php */