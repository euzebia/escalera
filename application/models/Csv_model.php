<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Csv_model extends CI_Model {

    function get_itemId($record){
            $query = $this->db->query("SELECT ItemId FROM item WHERE LOWER(Name)='".preg_replace(' !\s+!', ' ',trim(strtolower($record[0]))."'"))->row_array();
            return $query['ItemId'];
        }

    //get category_id
        public function get_categoryID($record){
            $query = $this->db->query("SELECT id FROM item_category WHERE LOWER(Option) ='".preg_replace(' !\s+!', ' ',trim(strtolower($record[1]))."'"));
            $result = $query->row_array();
            return $result['id'];
        }

    //store records from csv_purchases upload
    function insertRecord($record){
     if(count($record) > 0){
     //insert new purchases: ItemId,Category,UnitPrice,SellPrice,Quantity,DateOfPurchase

            //$get date
            $date = DateTime::createFromFormat('d/m/Y',$record[5]);
            $realDate = $date->format('Y-m-d');
            
            $item_id = $this->get_itemId($record);
            $cat_id = $this->get_categoryID($record);

            //check if record exists
            $response = $this->db->query(
                                        "SELECT * FROM purchases WHERE
                                        ItemId='$item_id' AND Category = '$cat_id'
                                        AND UnitPrice = '$record[2]' AND SellPrice = '$record[3]'
                                        AND Quantity = '$record[4]' AND DateOfPurchase = '$realDate'"
                                        );
            
            // Insert record
            if($response->num_rows() < 1){

            //first check whether the item has some earlier purchases
            $query= $this->db->query("SELECT * FROM purchases WHERE ItemId ='$item_id' AND Category='$cat_id'");
            if($query->num_rows() > 0){

            $current_qty_in_stock = $this->db->query("UPDATE purchases SET current_stock = current_stock + '$record[4]' WHERE ItemId='$item_id' AND Category='$cat_id'");
            }
            else
            {
                $purchases = array(
                    "ItemId" => $item_id,
                    "Category" => $cat_id,
                    "UnitPrice" => $record[2],
                    "SellPrice" => $record[3],
                    "Quantity" => $record[4],
                    "current_stock" => $record[4],
                    "DateOfPurchase" =>$realDate 
                );

                $this->db->insert('purchases', $purchases);
            }
            
        }
        
     }
     else{
        return false;
     }
    }
    //store record from csv_sales_upload
      function insertSalesRecord($record){
     if(count($record) > 0){
            $item_id = $this->get_itemId($record);
            $cat_id = $this->get_categoryID($record);
            //check if already is not duplicate entry
            $response = $this->db->query(
                                        "SELECT * FROM sales WHERE
                                        ItemId='$item_id' AND Category = '$cat_id'
                                        AND Sellingpx = '$record[2]' AND Quantity = '$record[3]'"
                                        );
            
            // Insert record
            if($response->num_rows() < 1){

            //first check whether the item has some earlier sales
            $query= $this->db->query("SELECT * FROM sales WHERE ItemId ='$item_id' AND Category='$cat_id'");
            if($query->num_rows() >= 0){

            $current_qty_in_stock = $this->db->query("UPDATE purchases SET current_stock = current_stock - '$record[3]' WHERE ItemId='$item_id' AND Category='$cat_id'");
            //}
            //else
            //{
                $sales = array(
                    "ItemId" => $item_id,
                    "Category" => $cat_id,
                    "Sellingpx" => trim($record[2]),
                    "Quantity" => trim($record[3])
                );

                $this->db->insert('sales', $sales);
            }
            
        }
        
    }

 }
}