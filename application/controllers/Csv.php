<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Csv extends CI_Controller {

    public function __construct(){

        parent::__construct();

        // load base_url
        $this->load->helper('url');

        // Load Model
        $this->load->model('Csv_model');
    }
    //upload purchases in batch
    public function index(){

        // Check form submit or not 
        if($this->input->post('upload') != NULL ){ 
            $data = array(); 
            if(!empty($_FILES['file']['name'])){ 
                // Set preference 
                $config['upload_path'] = 'assets/files/'; 
                $config['allowed_types'] = 'csv'; 
                $config['max_size'] = '1000'; // max_size in kb 
                $config['file_name'] = $_FILES['file']['name']; 

                // Load upload library 
                $this->load->library('upload',$config); 
   
                // File upload
                if($this->upload->do_upload('file')){ 
                    // Get data about the file
                    $uploadData = $this->upload->data(); 
                    $filename = $uploadData['file_name']; 

                    // Reading file
                    $file = fopen("assets/files/".$filename,"r");
                    $i = 0;

                    $importData_arr = array();
                       
                    while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                        $num = count($filedata);

                        for ($c=0; $c < $num; $c++) {
                            $importData_arr[$i][] = $filedata[$c];
                        }
                        $i++;
                    }
                    fclose($file);

                    $skip = 0;

                    // insert import data
                    foreach($importData_arr as $userdata){
                        if($skip != 0){
                            $this->Csv_model->insertRecord($userdata);
                        }
                        $skip ++;
                    }
                    $data['response'] = 'successfully uploaded '.$filename; 
                }else{ 
                    $data['response'] = 'failed'; 
                } 
            }else{ 
                $data['response'] = 'failed'; 
            } 
            $this->load->view('header');
            // load view 
            $this->load->view('purchases/Upload_purchases_batch',$data); 
            $this->load->view('footer');
        }else{
            // load view 
            $this->load->view('header');
            $this->load->view('purchases/Upload_purchases_batch'); 
             $this->load->view('footer');
        } 

    }

    //upload sales in batch
    public function sales_batch_upload(){

        // Check form submit or not 
        if($this->input->post('upload') != NULL ){ 
            $data = array(); 
            if(!empty($_FILES['file']['name'])){ 
                // Set preference 
                $config['upload_path'] = 'assets/files/'; 
                $config['allowed_types'] = 'csv'; 
                $config['max_size'] = '1000'; // max_size in kb 
                $config['file_name'] = $_FILES['file']['name']; 

                // Load upload library 
                $this->load->library('upload',$config); 
   
                // File upload
                if($this->upload->do_upload('file')){ 
                    // Get data about the file
                    $uploadData = $this->upload->data(); 
                    $filename = $uploadData['file_name']; 

                    // Reading file
                    $file = fopen("assets/files/".$filename,"r");
                    $i = 0;

                    $importData_arr = array();
                       
                    while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                        $num = count($filedata);

                        for ($c=0; $c < $num; $c++) {
                            $importData_arr[$i][] = $filedata[$c];
                        }
                        $i++;
                    }
                    fclose($file);

                    $skip = 0;

                    // insert import data
                    foreach($importData_arr as $salesData){
                        if($skip != 0){
                            $this->Csv_model->insertSalesRecord($salesData);
                        }
                        $skip ++;
                    }
                    $data['response'] = "<div class='alert alert-success'>successfully uploaded".$filename."</div>"; 
                }else{ 
                    $data['response'] = 'failed'; 
                } 
            }else{ 
                $data['response'] = 'failed'; 
            } 
            $this->load->view('header');
            // load view 
            $this->load->view('sales/upload_sales_in_batch',$data); 
            $this->load->view('footer');
        }else{
            // load view 
            $this->load->view('header');
            $this->load->view('sales/upload_sales_in_batch'); 
             $this->load->view('footer');
        } 

    }


    
}
