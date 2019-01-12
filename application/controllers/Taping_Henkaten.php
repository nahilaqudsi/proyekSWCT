<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Taping_Henkaten extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('Henkaten_Model');
        $this->load->library('excel');
        $this->load->model('Taping_all_model');
        $this->load->model('Taping_transaksi_model');
        $this->load->helper('url','form');  
        $this->load->library('form_validation');
        $this->load->library('session');
        ini_set('memory_limit', '2048M');
    }

    function index()
    {
    	$this->load->model('Henkaten_Model');
    	$data["ujung"] = $this->Henkaten_Model->getUjung();
    	$ujung = $this->input->post('ujung');
    	//$data["henkaten_list"] = $this->Henkaten_Model->searchUjung($ujung);
        $this->load->view('crud_taping/import_henkaten', $data);
    }

    // public function loading()
    // {
    //     $this->load->view('loading');
    // }
    
    function fetch()
    {
        $this->load->model('Henkaten_Model');
        $data = $this->Henkaten_Model->select();
        $output = '
        <h3 align="center">Total Data - '.$data->num_rows().'</h3>
        <table class="table table-striped table-bordered">
            <tr>
                <th>Customer Name</th>
                <th>Address</th>
                <th>City</th>
                <th>Postal Code</th>
                <th>Country</th>
                <th>Country</th>
                <th>Country</th>
                <th>Country</th>
                <th>Country</th>
                <th>Country</th>
            </tr>
        ';
        foreach($data->result() as $row)
        {
            $output .= '
            <tr>
                <td>'.$row->no.'</td>
                <td>'.$row->ujung.'</td>
                <td>'.$row->no_mat.'</td>
                <td>'.$row->mat_old.'</td>
                <td>'.$row->mat_new.'</td>
                <td>'.$row->method_old.'</td>
                <td>'.$row->method_new.'</td>
                <td>'.$row->critical.'</td>
                <td>'.$row->remarks.'</td>
            </tr>
            ';
        }
        $output .= '</table>';
        echo $output;
    }

    function import()
    {
    	$this->Henkaten_Model->dropTapingHenkaten();
        if(isset($_FILES["file"]["name"]))
        {
            $path = $_FILES["file"]["tmp_name"];
            $object = PHPExcel_IOFactory::load($path);

            foreach($object->getWorksheetIterator() as $worksheet)
            {
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();

                

                for($row=13; $row<=$highestRow; $row++)
                {
                	$nomer = $worksheet->getCellByColumnAndRow(11, 12)->getValue();
                	
                    $ujung = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $no_mat = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $mat_old = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $mat_new = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $method_old = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                    $method_new = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                    $critical = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
                    $remarks = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
                    

                    $datapoints = [];
                    
                    for ($i = 11; $i < 20; $i++) {
                    	$kolom = $worksheet->getCellByColumnAndRow($i, 12)->getValue();
                        // $nomerAssy = $kolom;
                    	if ($kolom == null) {
                    		break;
                    	}

                    	array_push($datapoints,  $kolom);
                    }

                    for ($a = 0; $a < count($datapoints) ; $a++) {
                        $nomerAssy[$a] = $datapoints[$a];
                        $isiAssy = $worksheet->getCellByColumnAndRow(11+$a, $row)->getValue();
                    }

                    // $keys = array_keys($datapoints);
                    // for($a = 0; $a < count($datapoints) ; $a++) {
                    //     echo $keys[$a] . "{<br>";
                    //     foreach($datapoints[$keys[$i]] as $key => $value) {
                    //         echo $key . " : " . $value . "<br>";
                    //     }
                    //     echo "}<br>";
                    // }


 					
                    $data[] = array(
                        'ujung'      =>  $ujung,
                        'no_mat'     =>  $no_mat,
                        'mat_old'    =>  $mat_old,
                        'mat_new'    =>  $mat_new,
                        'method_old' =>  $method_old,
                        'method_new' =>  $method_new,
                        'critical'   =>  $critical,
                        'remarks'    =>  $remarks,
                        //$nomerAssy   =>  array()
                    );



                }
               
                 // var_dump($keys);
                 // var_dump($datapoints[$a]);
            }
           
			for ($i = 0; $i < count($datapoints) ; $i++) {
				$this->Henkaten_Model->addNoAssy($datapoints[$i]);
			}

            $this->Henkaten_Model->insert($data);
           $this->session->set_flashdata('sukses','1');        
            Redirect('Taping_Henkaten', 'refresh');
        }   
    }

    public function searchByUjung(){
        $this->load->helper('url','form');  
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('henkaten_model');

        // session
        $session_admin = $this->session->userdata('logged_swct');
        $data['validasi_admin'] = $session_admin['level'];

        // session
        $data_tampil = array('tampil' => $this->input->post('data_tampil'));
        $this->session->set_userdata('keluarga_berencana',$data_tampil);

        $data['data_tampil'] = $this->input->post('data_tampil');

        $data["detail"] = $this->Taping_transaksi_model->getDetailTaping();
        $data["ujung"] = $this->henkaten_model->getUjung();
        //$data["detail"] = $this->Taping_all_model->getDataDetailCB();

        $data['kop'] = $this->Taping_transaksi_model->getKop();
        $data['tb_assy'] = $this->Taping_transaksi_model->getTableAsi();
        $data['export']=$this->Taping_transaksi_model->getDataExport();

        $ujung = $this->input->post('ujung');

        if (empty($this->input->post('data_tampil'))) {
            $data['search_error'] = 'tolong inputkan FAMILY terlebih dahulu';
            $data["taping_list"] = "tidaktau";
            $this->load->view('CRUD_TAPING/import_henkaten', $data);
        }else{
            $data["henkaten_list"] = $this->henkaten_model->searchUjung($ujung);
            if (empty($data["henkaten_list"])){
                $data["henkaten_list"] = "tidaktau";
            }
            $this->load->view('CRUD_TAPING/import_henkaten', $data);
        }
    }

    public function createSWCT()
    {

        $material = $this->input->post('material'); // mengisi XXX
        $method = $this->input->post('method'); // tanda kurung
        $critical = $this->input->post('critical');
        $remarks= $this->input->post('remarks');
        $std_time = $this->input->post('std_time');
        $jenis = $this->input->post('jenis'); //id temp -  id export
        

        $this->henkaten_model->insertSWCT($method, $critical, $remarks, $material, $std_time, $jenis);

        // $data['tb_assy'] = $this->Taping_transaksi_model->getTableAsi();
        // // session
        // $session_data = $this->session->userdata('keluarga_berencana');
        // $data['data_tampil'] = $session_data['tampil'];
        // $data['export']=$this->Taping_transaksi_model->getDataExport();
        redirect('Taping_Henkaten','refresh');   
    }

    public function openFormSwct()
    {
        $this->load->view('crud_taping/formSWCT');
    }
}
/* End of file Taping_Henkaten.php */
/* Location: ./application/controllers/Taping_Henkaten.php */