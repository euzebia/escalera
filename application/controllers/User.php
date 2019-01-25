<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	
     public function __construct(){
		 parent:: __construct();
		 $this->load->library('session');
		 $this->load->model('Escalera_Model');
	 }
	 
	 public function index(){
		 $this->load->view('login');
		
	}
	
	public function dashboard(){
		//load session library
		$this->load->library('session');
		$username = $_POST['username'];
		$password = $_POST['password'];

		$data = $this->Escalera_Model->login($username, $password);

		if($data){
			$this->session->set_userdata('user', $data);
			$this->load->view('header');
			$data['staff'] = $this->Escalera_Model->get_total_staff_members();
		    $data['total'] = $this->Escalera_Model->get_amount_in_current_stock();
            /* show monthly sales total by month using visualization*/
            $getMonths = $this->db->query(" 
				                        SELECT MONTHNAME(SoldOn) as Month
				                        FROM item,item_category,sales
				                        WHERE sales.ItemId = item.ItemId
				                        AND sales.category= item_category.id 
				                        AND YEAR(SoldOn)=YEAR(CURDATE())
				                        GROUP BY MONTH(SoldOn)
				                    ")->result();
            $data['months'] = json_encode(array_column($getMonths, 'Month'));

            //get quantity
            $getTotalMonthlySales = $this->db->query(" 
				                        SELECT SUM(Sellingpx*Quantity) as total_sales
				                        FROM item,item_category,sales
				                        WHERE sales.ItemId = item.ItemId
				                        AND sales.category= item_category.id 
				                        AND YEAR(SoldOn)=YEAR(CURDATE())
				                        GROUP BY MONTH(SoldOn)
				                    ")->result();
            $data['MonthlySales'] = json_encode(array_column($getTotalMonthlySales,'total_sales'),JSON_NUMERIC_CHECK);

            /* end of visualization*/
			$this->load->view('dashboard',$data);
			$this->load->view('footer');
		}
		else{
			header('location:'.base_url().$this->index());
			$this->session->set_flashdata('error','Invalid username or password');
		} 
	}
	
	public function home(){
		    $this->load->view('header');
		    $data['staff'] = $this->Escalera_Model->get_total_staff_members();
		    $data['total'] = $this->Escalera_Model->get_amount_in_current_stock();
            /* show monthly sales total by month using visualization*/
            $getMonths = $this->db->query(" 
				                        SELECT MONTHNAME(SoldOn) as Month
				                        FROM item,item_category,sales
				                        WHERE sales.ItemId = item.ItemId
				                        AND sales.category= item_category.id 
				                        AND YEAR(SoldOn)=YEAR(CURDATE())
				                        GROUP BY MONTH(SoldOn)
				                    ")->result();
            $data['months'] = json_encode(array_column($getMonths, 'Month'));

            //get quantity
            $getTotalMonthlySales = $this->db->query(" 
				                        SELECT SUM(Sellingpx*Quantity) as total_sales
				                        FROM item,item_category,sales
				                        WHERE sales.ItemId = item.ItemId
				                        AND sales.category= item_category.id 
				                        AND YEAR(SoldOn)=YEAR(CURDATE())
				                        GROUP BY MONTH(SoldOn)
				                    ")->result();
            $data['MonthlySales'] = json_encode(array_column($getTotalMonthlySales,'total_sales'),JSON_NUMERIC_CHECK);

            /* end of visualization*/
			$this->load->view('dashboard',$data);
			$this->load->view('footer');
	}
	
	public function logout(){
		$this->session->unset_userdata('user');
		header('location:'.base_url());
		//header('location:http://localhost/escalera/');
	}
	
	
	
}
