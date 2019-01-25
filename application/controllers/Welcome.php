<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		 parent:: __construct();
		 $this->load->library('session');
		 $this->load->library('cart');
		 $this->load->model('Escalera_Model');
	}
	 
	public function register(){	
		$this->load->view('register');
	}
	
	public function tables(){
	    $this->load->view('tables');
	}
	
	public function forgot_password(){
		$this->load->view('forgot_password');
	}
	
	public function blank(){
		$this->load->view('header');
		$this->load->view('blank');
		$this->load->view('footer');
	}
	
	public function charts(){
		$this->load->view('charts');
	}

	
	/************************************* ESCALERA INVESTMENTS LIMITED ************************************************/
	#.................................................. Load views .......................................................
	
	public function AddStaff(){
		$this->load->view('header');
		$this->load->view('staff/Add_staff');
		$this->load->view('footer');
	}
	
	public function AddItem(){
		$this->load->view('header');
		$this->load->view('products/AddItem');
		$this->load->view('footer');
	}

	public function ProductCategory(){
		$this->load->view('header');
		$data['item_names'] = $this->Escalera_Model->get_all_items();
		$this->load->view('products/product_category',$data);
		$this->load->view('footer');
	}
	
	public function Purchases(){
		$this->load->view('header');
		$data['item_names'] = $this->Escalera_Model->get_all_items();
		$this->load->view('purchases/Purchases',$data);
		$this->load->view('footer');
	}
	
	public function Sales(){
		$this->load->view('header');
		$data['item_names'] = $this->Escalera_Model->get_all_items();
        $this->load->view('sales/Sales',$data);
		$this->load->view('footer');
	}

	public function Services(){
		$this->load->view('header');
		$this->load->view('Services/add_service_type');
		$this->load->view('footer');
	}

	public function service_sales(){
		$this->load->view('header');
		$data['service_types'] = $this->Escalera_Model->get_service_types();
		$this->load->view('services/service_sales',$data);
		$this->load->view('footer');
	}
	
	public function sales_monthly_performance(){
		$this->load->view('header');
		$data['monthly_sales'] = $this->Escalera_Model->get_sales_monthly_performance();
		//get product names
		$Names = $this->db->query("SELECT DISTINCT(Name) FROM item
			                       JOIN purchases ON purchases.ItemId = item.ItemId
			                       JOIN item_category ON purchases.Category = item_category.id 

			                       ")->result();
        $data['pdts'] = json_encode(array_column($Names , 'Name'));
        //get quantity of item in stock
        $quantity = $this->db->query("SELECT SUM(current_stock) as qty 
        	                          FROM purchases
        	                          GROUP BY ItemId
        	                          ")->result();
        $data['quantity_in_stock'] = json_encode(array_column($quantity , 'qty'),JSON_NUMERIC_CHECK);
		$this->load->view('sales/monthly_performance',$data);
	}

	//expenditure_categories
    public function expenditure_categories(){
    	$this->load->view('header');
    	$this->load->view('expenditures/add_category');
    	$this->load->view('footer');
    }
    
     public function expenses(){
    	$this->load->view('header');
    	$data['types'] = $this->Escalera_Model->fetch_expenditure_types();
    	$this->load->view('expenditures/add_expenditure',$data);
    	$this->load->view('footer');
    }

	#............................................... Record details .....................................................
	
	//record new staff member
	public function recordNewStaff(){
		$email = $this->input->post('email');
		$data['staff'] = $this->Escalera_Model->add_staff($email);
	}
	
	//record new item
	public function recordNewItem(){//************** restricting duplicate entries has issues
		//$this->library('session');
	    $item = $this->input->post('item');
		$data['items_found'] = $this->Escalera_Model->add_item($item);

	}
	
	//record product category
	public function recordProductCategory(){
		$item = $this->input->post('item');
		$category = $this->input->post('category');
		$data = $this->Escalera_Model->add_category($category);        
		}

	//sales 
	public function  recordSales(){
		$Id= $this->input->post('item');
		$category = $this->input->post('category');
		$sellpx= $this->input->post('sellpx');
		$qty= $this->input->post('qty');
		$data = $this->Escalera_Model->add_new_sales($sellpx,$qty,$Id,$category);
	}

	//purchases
	public function recordPurchases(){
		$Id = $this->input->post('item');
		$category = $this->input->post('category');
		$unitpx = $this->input->post('unitPx');
		$sellPx = $this->input->post('sellPx');
		$qty = $this->input->post('qty');
		$dateOfPurchase = $this->input->post('purchase_date');
		$data = $this->Escalera_Model->add_new_purchases($unitpx,$sellPx,$qty,$dateOfPurchase,$category,$Id);
	}
	
	//upload purchases as batch
    public function upload_items_csv(){
		 // Check form submit or not 
        if($this->input->post('upload') != NULL ){ 
            $data = array(); 
            if(!empty($_FILES['file']['name'])){ 
                // Set preference 
                $config['upload_path'] = 'assets/files/'; 
                $config['allowed_types'] = 'csv'; 
                $config['max_size'] = '1000000'; // max_size in MB
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
                    foreach($importData_arr as $item){
                        if($skip != 0){
                            $this->Csv_model->insertRecord($item);
                        }
                        $skip ++;
                    }
                    $data['response'] = 'successfully uploaded '.$filename; 
                }else
                { 
                    $data['response'] = 'failed'; 
                } 
            }else
            { 
                $data['response'] = 'failed'; 
            } 
            // load view 
            $this->load->view('products/AddItem',$data); 
        }
        else
        {
            // load view 
            $this->load->view('products/AddItem',$data); 
        }
	}

    public function add_expenditure_category(){
    	$cat = $this->input->post('exp_category');
    	$budget_line = $this->input->post('budget_line');
    	$data = $this->Escalera_Model->insert_expenditure_category($cat,$budget_line);
    }

    public function manage_expenses(){
    	$category = $this->input->post('type');
    	$amount = $this->input->post('amount');
    	$data = $this->Escalera_Model->record_expenses($category,$amount);
    }

    public function manage_service_types(){
    	$type = $this->input->post('service_type');
    	$data = $this->Escalera_Model->add_service_type($type);
    }

    public function manage_service_sales(){
    	$type = $this->input->post('type');
    	$qty = $this->input->post('qty');
    	$amount = $this->input->post('amount');
    	$data = $this->Escalera_Model->insert_service_sales($type,$qty,$amount);	
    }

	#....................................... DISPLAY ...........................................................................
	
	//view items in database
	public function view_items(){

		$id = $this->input->post_get('ID',TRUE);
		$this->load->view('header');
		$data['item_names'] = $this->Escalera_Model->get_all_items();
		$this->load->view('products/view_items',$data);
		$this->load->view('table_footer',$data);
	}

	//view current stock details
	public function available_products(){
		$this->load->view('header');
		$data['total'] = $this->Escalera_Model->get_amount_in_current_stock();
		$data['stock'] = $this->Escalera_Model->fetch_current_stock();
		$this->load->view('products/products_in_stock',$data);
		$this->load->view('table_footer');
	}

    //view daily purchases
    public function display_purchases(){
    	$this->load->view('header');
    	$data['purchases'] = $this->Escalera_Model->get_all_purchases();
    	$this->load->view('purchases/purchases_display',$data);
    }

	//view daily sales
	public function view_daily_sales(){
		$this->load->view('header');
		$data['daily_sales']= $this->Escalera_Model->get_daily_sales();
		$this->load->view('sales/daily_sales',$data);
		$this->load->view('table_footer');
	}
    //view service types
    public function view_service_types(){
    	$this->load->view('header');
    	$data['types'] =$this->Escalera_Model->get_service_types();
    	$this->load->view('services/view_types',$data);
    	$this->load->view('table_footer');
    }
    //view service sales
    public function view_service_sales(){
    	$this->load->view('header');
    	$data['sales'] = $this->Escalera_Model->fetch_service_sales();
    	$data['total_monthly_sales'] = $this->Escalera_Model->get_total_service_sales();
    	$this->load->view('services/service_sales_display',$data);
    	$this->load->view('table_footer');
    }
	//delete item
	public function delete_item(){
		$id= $this->input->post_get('del',TRUE);
		$data = $this->Escalera_Model->delete_product($id);
		if($data){
			echo "<script type='text/javascript'>
			     window.location.replace('".base_url()."index.php/Welcome/view_items');
                </script>";
		}
	}
    
    //fetch category basing on product id
	public function fetch_category()
     {
       if($this->input->post('item_id'))
       {
         echo $this->Escalera_Model->fetch_product_category($this->input->post('item_id'));
       }
    }

	public function total_monthly_sales(){
		$this->load->view('header');
		$data['monthly_sales'] = $this->Escalera_Model->get_sales_monthly_performance();
		$this->load->view('sales/total_monthly_sales',$data);
		$this->load->view('table_footer');
	}
	//display expenditures
	public function show_expenditures(){
		$this->load->view('header');
		$data['expenses'] = $this->Escalera_Model->fetch_expenditures();
		$data['monthly_expenditures'] = $this->Escalera_Model->get_total_monthly_expenditures();
		$this->load->load->view('expenditures/display_expenditures',$data);
		$this->load->view('table_footer');
	}
}
