<?php
 class Escalera_Model extends CI_Model{
		 public function __construct(){
			 parent:: __construct();
			 $this->load->database('escalera');
		 }
		 
		 //login
		 public function login($username,$password)
		 {
			return $this->db->get_where('admin',array('username'=>$username,'password'=>$password))->row_array();
		 }
		 
		//register new staff
		public function add_staff($email)
		{
			$query = $this->db->query("SELECT * FROM staff WHERE Email ='$email'");
			if($query->num_rows() < 1)
			{
			    $staffInfo = array(
						       'firstName' => $this->input->post('fname'),
						       'lastName' => $this->input->post('lname'),
						       'DateOfBirth'=> $this->input->post('dateOfBirth'),
						       'Email' => $this->input->post('email'),
						       'Username' => $this->input->post('username'),
						       'Password' => $this->input->post('password')
						  );
			    $insert =  $this->db->insert('staff',$staffInfo);	
			    if($insert){
                       echo "
				 	      <script type='text/javascript'>
				 	       alert('New staff added successfully');
				 	       window.location.replace('".base_url()."index.php/Welcome/AddStaff');
				 	      </script>";
			    }
			}		
		}
		 
		//add new item
		public function add_item($item)
		{
			 $query = $this->db->get_where('item',array('Name' =>$item));
			if($query->num_rows() == 0)
			{
				 $data = array('Name' => $item);
				 $insert = $this->db->insert('item',$data);
				 if($insert)
				 {
				 	 echo "
				 	      <script type='text/javascript'>
				 	       alert('New product name added successfully');
				 	       window.location.replace('".base_url()."index.php/Welcome/view_items');
				 	      </script>";
			    }	
			}
			else
			{
				 	  echo "
				 	      <script type='text/javascript'>
				 	       alert('Failure! Provided product name already exists ');
				 	       window.location.replace('".base_url()."index.php/Welcome/view_items');
				 	      </script> ";
			}		
		}
		 
		//get itemID
		public function get_itemID()
		{
			$item = $this->input->post('item');
			$query = $this->db->query("SELECT ItemId FROM item WHERE Name = '$item'");
			$row = $query->row_array();
			return $row['ItemId'];
		}

		//get category_id
		public function get_categoryID()
		{
			$category = $this->input->post('category');
			$query = $this->db->query("SELECT id FROM item_category WHERE Option ='$category'");
	        $result = $query->row_array();
	        return $result['id'];
		}

		//add product category
		public function add_category($category)//still has bugs that need to be rectified
		{
			$ID = $this->get_itemID();
			$check = $this->db->query("SELECT * FROM item_category WHERE ItemId='$ID' AND Option='$category' ");
			if($check->num_rows() < 1)
			{
				$data = array(
				          'ItemId'=>$ID,
				          'Option'=>$category
			             );
				$query = $this->db->insert('item_category',$data);
				if($query)
				{
			     echo "<script type='text/javascript'>
			             alert('New item category recorded');
			             window.location.replace('".base_url()."index.php/Welcome/ProductCategory');
			          </script>";
			    }
			}	
			
			else 
			{
				echo "<script type='text/javascript'>
			            alert('Provided category already exists');
			            window.location.replace('".base_url()."index.php/Welcome/ProductCategory');
			          </script>";
			}

		}
		 
		//add new sales
		public function add_new_sales($sellpx,$qty,$Id,$category)
		{
			$details= array(
							'ItemId'=> $Id,
							'category'=>$category,
							'Sellingpx'=>$sellpx,
							'Quantity'=>$qty
						   );

			//check if provided quantity is available in stock
			$is_qty_available = $this->db->query("SELECT current_stock as new_qty 
				                                  FROM purchases 
				                                  WHERE ItemId='$Id' 
				                                  AND Category='$category'"
				                                );
			$quantity_in_stock = $is_qty_available->row_array();
			$current_qty_in_stock = $quantity_in_stock['new_qty'];

			if( $current_qty_in_stock < $qty)
			{
				echo "<script type='text/javascript'>";
			    echo "alert('Product is out of stock');
			          window.location.replace('".base_url()."index.php/Welcome/Sales');
			         </script>";
            }
            else
            {
	        	//update stock 'current_stock'table: deduct quantity that has been sold
			 	$this->db->query("UPDATE purchases
			 		              SET current_stock = current_stock - '$qty'  
			 		              WHERE ItemId='$Id' AND Category='$category'"
			 		            );
			   $insert_sales  = $this->db->insert('sales',$details);
			   if($insert_sales ){
			   	 echo "<script type='text/javascript'>";
			    echo "alert('New sales recorded successfully');
			         window.location.replace('".base_url()."index.php/Welcome/Sales');
			     </script>";
			   }
            } 
		}
		
		//add new purchases
		public function add_new_purchases($unitpx,$sellPx,$qty,$dateOfPurchase,$category,$Id)
		{
			//first check whether the item has some earlier purchases
			$query= $this->db->query("SELECT * FROM purchases WHERE ItemId='$Id' AND Category='$category' ");
			if($query->num_rows() > 0)
			{

            $record_exists = $this->db->query("UPDATE purchases 
            	                               SET 
            	                                      ItemId='$Id',
            	                                      Category='$category',
            	                                      UnitPrice ='$unitpx',
            	                                      SellPrice ='$sellPx',
            	                                      Quantity = Quantity + '$qty',
            	                                      current_stock = current_stock + '$qty'
            	                               WHERE ItemId='$Id' AND Category='$category'"
            	                                    );
            if($record_exists){
            	echo "<script type='text/javascript'>
			             alert('New purchases recorded successfully');
			             window.location.replace('".base_url()."index.php/Welcome/display_purchases');
			          </script>";
            }
              
            }
            else
            {
            	
			    $new_purchase = array(
								'ItemId'=> $Id,
								'Category'=>$category,
								'UnitPrice'=> $unitpx,
								'SellPrice'=>$sellPx,
								'Quantity'=> $qty,
								'current_stock'=> $qty,
								'DateOfPurchase'=>$dateOfPurchase
								 );
			    $insert =  $this->db->insert('purchases',$new_purchase);
			    if($insert){
                  echo "<script type='text/javascript'>
			             alert('New purchases recorded successfully');
			             window.location.replace('".base_url()."index.php/Welcome/display_purchases');
			          </script>";
			    }
            }
	    }

	    //add service types
	    public function add_service_type($name)
	    {
	    	$select = $this->db->query("SELECT Name FROM service_type WHERE Name='$name'");
	    	$data = array('Name'=> $name);
	    	if($select->num_rows() < 1)
	    	{
	    		 $insert = $this->db->insert('service_type',$data);
	    		 if($insert)
	    		 {
	    		 	echo "
	    		 	      <script type='text/javascript'>
	    		 	       alert('New service has been recorded successfully');
	    		 	       window.location.replace('".base_url()."index.php/Welcome/Services');
	    		 	      </script>
	    		 	     ";
	    		 }
	    	}
	    	else
	    	{
	    		echo "
	    		 	  <script type='text/javascript'>
	    		 	    alert('Provided service type already exists');
	    		 	    window.location.replace('".base_url()."index.php/Welcome/Services');
	    		 	  </script>";
	    	}

	    }

	    public function insert_service_sales($service_name,$qty,$amount)
	    { 
	    	//get service type ID
	    	$get_id = $this->db->query("SELECT Id FROM service_type WHERE Name ='$service_name'")->row_array();
	    	$type_id =  $get_id['Id'];
	    	$sales = array(
	    		           'service_type'=> $type_id,
	    		           'Quantity' => $qty,
	    		           'amount' => $amount
	    	              );
	    	$insert = $this->db->insert('service_sales',$sales); 
	    	if($insert)
	    	{
	    		echo "
	    		 	  <script type='text/javascript'>
	    		 	    alert('Sales recorded successfully');
	    		 	    window.location.replace('".base_url()."index.php/Welcome/service_sales');
	    		 	  </script>";

	    	}
	    }

		#---------------------------------RETRIEVING CONTENT ----------------------------------------------------------------
		#... ajax auto drop down
		public function get_all_items()
		{
	      $this->db->order_by("ItemId", "ASC");
	      $query = $this->db->get("item");
	      return $query->result();
	     }

	    public function fetch_product_category($item_id)
	    {
		      $this->db->where('ItemId', $item_id);
		      $this->db->order_by('Option', 'ASC');
		      $query = $this->db->get('item_category');
		      $output = '<option value="">Select category</option>';
		      foreach($query->result() as $row)
			      {
			       $output .= '<option value="'.$row->id.'">'.$row->Option.'</option>';
			      }
	      return $output;
	    }

		//retrieve all purchases
		 public function get_all_purchases()
		{
			return $this->db->query("SELECT PurchaseId,Name,Option,UnitPrice,SellPrice,Quantity,(UnitPrice * Quantity) 
				                     as InitialAmount,((SellPrice-UnitPrice)*Quantity) as Profit,DateOfPurchase
				                     FROM item,item_category,purchases
				                     WHERE item.ItemId=item_category.ItemId AND item_category.ItemId = purchases.ItemId AND item_category.id = purchases.category
				                     ")->result();
		}

		//fetch all sales
		public function get_daily_sales()
		{
			$query = $this->db->query(" 
				                        SELECT Name, Option,Quantity,SoldOn,Sellingpx,SalesId
				                        FROM item,item_category,sales
				                        WHERE sales.ItemId = item.ItemId
				                        AND sales.category= item_category.id 

				                    ");
			return $query->result();
		}

		//fetch current quantity in stock
		public function fetch_current_stock()
		{
			return $this->db->query(
						      "SELECT PurchaseId,Name,Option,current_stock
						      FROM item
						      JOIN purchases ON item.ItemId = purchases.ItemId
						      JOIN item_category ON purchases.Category  = item_category.id
						      WHERE  Quantity > 0"
			                  )->result();
		}

		//delete product using item_id
		public function delete_product($id)
		{
			return $this->db->delete('item',array('ItemId'=>$id));
		}
       
		//determine total amount in current_stock
		public function get_amount_in_current_stock()
		{
			$query = $this->db->query("
				                       SELECT SUM(UnitPrice * current_stock) as total  FROM item
				                       JOIN purchases ON item.ItemId = purchases.ItemId
				                       JOIN item_category ON purchases.Category = item_category.id"
				                    )->row_array();

			$total_amount_in_current_stock = $query['total'];
			return $total_amount_in_current_stock;
		}
        //calculate expected profits in existing stock
        public function expected_profits_in_existing_stock(){
        	$expected_profits = $this->db->query("");
        }

		//get total sales by month
		public function get_sales_monthly_performance()
		{
			$query = $this->db->query(" 
				                        SELECT SoldOn,SUM(Sellingpx*Quantity) as total_month_sales
				                        FROM item,item_category,sales
				                        WHERE sales.ItemId = item.ItemId
				                        AND sales.category= item_category.id 
				                        AND YEAR(SoldOn)=YEAR(CURDATE())
				                        GROUP BY MONTH(SoldOn)
				                    ")->result();
            return $query;
		}

		//expenditure types
		public function insert_expenditure_category($category,$budget_line)
		{
			$this->db->where('Name',$category);
			$this->db->where('BudgetLine',$budget_line);
			$check_if_exists = $this->db->get('expenditure_category');
			if($check_if_exists->num_rows() < 1)
			{
              $insert =  $this->db->insert('expenditure_category',array('Name'=> $category,
                                                                         'BudgetLine' =>$budget_line));
              if($insert){
              	 echo "
	    		 	  <script type='text/javascript'>
	    		 	    alert('New expenditure type successfully added');
	    		 	    window.location.replace('".base_url()."index.php/Welcome/expenditure_categories');
	    		 	  </script>";
                }
			}
			else
			{
               echo "
	    		 	  <script type='text/javascript'>
	    		 	    alert('Provided type already exists');
	    		 	    window.location.replace('".base_url()."index.php/Welcome/expenditure_categories'); </script>";
			}
		}
        
        //manage expenditures made
		public function record_expenses($type,$amount)
		{
			$expense_details = array('Category'=>$type,
		                              'Amount'=>$amount);
			$insert= $this->db->insert('expenditures',$expense_details);
			 if($insert){
              	 echo "
	    		 	  <script type='text/javascript'>
	    		 	    alert('New expenditure recorded successfully');
	    		 	    window.location.replace('".base_url()."index.php/Welcome/expenses');
	    		 	  </script>";
                }
		}

		public function fetch_expenditure_types()
		{
			return $this->db->get('expenditure_category')->result();
		}

		//test graph
		//get Names of products
		public function get_names()
		{
			$Names = $this->db->get('item')->result();
		}

		//get quantity remaining in stock
        public function get_quantity()
        {
        	$qty = $this->db->query("SELECT SUM(current_stock) FROM purchases,item WHERE 
        		                    purchase.ItemId = item.ItemId")->result();
        }
        
        //get service types
        public function get_service_types()
        {
        	return $this->db->get('service_type')->result();
        }

        //get service sales for current month
        public function fetch_service_sales(){
        	$retrieve_sales = $this->db->query('
        		                                SELECT Name,service_sales.Id as sales_id,Quantity,amount, (Quantity * amount) as total_amount,DATE(service_sales.RecordedOn) as recorded_date
        		                                FROM service_type,service_sales
        		                                WHERE service_type.Id = service_sales.service_type
        		                                AND MONTH(service_sales.RecordedOn) = MONTH(CURRENT_DATE())
        		                                AND  YEAR(service_sales.RecordedOn) = YEAR(CURRENT_DATE())
        		                                
        		                               ')->result();
        	return $retrieve_sales;
        }

        //get total sales per month
        public function get_total_service_sales(){
        	$total_sales = $this->db->query('
        		                                SELECT SUM(Quantity * amount) as total
        		                                FROM service_sales
        		                                WHERE MONTH(service_sales.RecordedOn) = MONTH(CURRENT_DATE())
        		                                AND  YEAR(service_sales.RecordedOn) = YEAR(CURRENT_DATE())
        		                               ')->row_array();
        	return $total_sales['total'];

        }

        //display all expenditures
        public function fetch_expenditures(){
        	return $this->db->query(
        		                    "SELECT expenditures.Id as exp_id,Name,amount,DATE(expenditures.RecordedOn) as exp_date 
        		                     FROM expenditure_category,expenditures
        		                     WHERE expenditure_category.Id = expenditures.Id"
        	                       )->result();
        }

        //get total expenditures for current month
        public function get_total_monthly_expenditures(){
        	$result = $this->db->query("SELECT SUM(Amount) as total FROM expenditures
        		                        WHERE
        		                        MONTH(RecordedOn) = MONTH(CURRENT_DATE())")->row_array();
        	return $result['total'];
        }      
        //get total staff members
        public function get_total_staff_members(){
        	$result = $this->db->query("SELECT COUNT(StaffId) as Id FROM staff")->row_array();
        	return $result['Id'];
        }
		
		}
?>