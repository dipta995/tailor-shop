<?php 
include_once 'db.php';
class CartClass extends DB
{
        public $db;
        public function __construct()
        {
            $conn = $this->connect();
        }

        public function insertCart($data){
            $cus_id        = mysqli_real_escape_string($this->conn, $data['cus_id']);
            $mes_id        = mysqli_real_escape_string($this->conn, $data['mes_id']);
            $cloth_id      = mysqli_real_escape_string($this->conn, $data['cloth_id']);
            $buying_price  = mysqli_real_escape_string($this->conn, $data['buying_price']);
            $selling_price = mysqli_real_escape_string($this->conn, $data['selling_price']);
            $charge        = mysqli_real_escape_string($this->conn, $data['charge']);
            $quantity      = mysqli_real_escape_string($this->conn, $data['quantity']);   
            
    
            if (empty($cus_id) || empty($mes_id) || empty($cloth_id) || empty($buying_price) || empty($selling_price) || empty($charge) || empty($quantity)) {
                $txt = "<div class='alert alert-danger'>Field must not be empty</div>";
                return $txt;
            } else{
                $query = "INSERT into tbl_cart(cus_id, mes_id, cloth_id, buying_price, selling_price, charge, quantity) values('$cus_id', '$mes_id', '$cloth_id', '$buying_price', '$selling_price', '$charge', '$quantity')";
                $result = $this->conn->query($query);
                if($result){
                    $txt = "<div class='alert alert-success'>Data Inserted Successfully!</div>";
                    return $txt;
                }
            }
    
        }


        public function insertOrder($data){
            $customer_id    = mysqli_real_escape_string($this->conn, $data['cus_id']); 
            $delivery_at    = mysqli_real_escape_string($this->conn, $data['delivery_at']); 
            $time = time();
            $order_at= date('m-d-Y');
            $query = "SELECT * FROM tbl_cart";
            $result = $this->conn->query($query);
            foreach($result as $value){
                	$owner_id = $customer_id;
                    $cus_id = $value['cus_id'];
                    $mes_id = $value['mes_id'];
                    $cloth_id = $value['cloth_id'];
                    $buying_price = $value['buying_price'];
                    $selling_price = $value['selling_price'];
                    $charge = $value['charge'];
                    $quantity = $value['quantity'];
                    $slip_no = $time;


                    $query = "INSERT into tbl_order(owner_id, cus_id, mes_id, cloth_id, buying_price, selling_price, charge, quantity,slip_no) values('$customer_id','$cus_id', '$mes_id', '$cloth_id', '$buying_price', '$selling_price', '$charge', '$quantity', '$slip_no')";
                    $result = $this->conn->query($query);

                    if($result){
                        
                    }


                    
            }

            $query = "INSERT into tbl_slip(slip_no, customer_id, order_at, delivery_at) values('$slip_no','$customer_id', '$order_at', '$delivery_at')";
            $result = $this->conn->query($query);
            if($result){
                $txt = "<div class='alert alert-success'>Data Inserted Successfully!</div>";
                return $txt;
            }
        }
    
        public function viewCart(){  
            $query = "SELECT * FROM tbl_cart where soft_delete=0";
            $result = $this->conn->query($query);
            return $result;
        }


        public function viewOrder(){  
            $query = "SELECT * FROM tbl_cart";    
            $result = $this->conn->query($query);
            return $result;
        }    

        // Select or Read data
        public function select($query){
            $result = $this->conn->query($query) or die($this->conn->error.__LINE__);
            if($result->num_rows > 0){
                return $result;
            } else {
                return false;
            }
        }


        public function deleteCart($id){        
            $query = "UPDATE tbl_cart
                    SET
                    soft_delete  = '1'
                    WHERE id     = $id";
            $result = $this->conn->query($query);
            if($result === TRUE){
                echo $txt = "<div class='alert alert-success'>Successfully Deleted</div>";
            }
        }

        
        
            
}