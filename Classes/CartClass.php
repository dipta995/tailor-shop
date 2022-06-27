<?php 
include_once 'db.php';
class CartClass extends DB
{
    public $db;
    public function __construct()
    {
        $conn = $this->connect();
    }

    // Insert Cart
    public function insertCart($data){
        $cus_id        = mysqli_real_escape_string($this->conn, $data['cus_id']);
        $mes_id        = mysqli_real_escape_string($this->conn, $data['mes_id']);
        $cloth_id      = mysqli_real_escape_string($this->conn, $data['cloth_id']);
        $buying_price  = mysqli_real_escape_string($this->conn, $data['buying_price']);
        $selling_price = mysqli_real_escape_string($this->conn, $data['selling_price']);
        $charge        = mysqli_real_escape_string($this->conn, $data['charge']);
        $quantity      = mysqli_real_escape_string($this->conn, $data['quantity']);   
        
        if (empty($cus_id) || empty($mes_id) || empty($cloth_id) || empty($buying_price) || empty($selling_price) || empty($charge) || empty($quantity)) {
            $txt = "<div class='alert alert-danger'>Field must not be empty!</div>";
            return $txt;
        } else {
            $query = "INSERT into tbl_cart(cus_id, mes_id, cloth_id, buying_price, selling_price, charge, quantity) values('$cus_id', '$mes_id', '$cloth_id', '$buying_price', '$selling_price', '$charge', '$quantity')";
            $result = $this->conn->query($query);
            if($result) {
                $txt = "<div class='alert alert-success'>Data Inserted Successfully!</div>";
                return $txt;
            }
        }
    }

    // Insert Order
    public function insertOrder($data){
        $customer_id = mysqli_real_escape_string($this->conn, $data['cus_id']); 
        $delivery_at = mysqli_real_escape_string($this->conn, $data['delivery_at']); 
        $time = time();
        $order_at = date('Y-m-d');
        
        $query  = "SELECT * FROM tbl_cart";
        $result = $this->conn->query($query);

        if (empty($customer_id) || empty($delivery_at)) {
            $txt = "<div class='alert alert-danger'>Field must not be empty</div>";
            return $txt;
        } else {
            foreach($result as $value){
                $cus_id        = $value['cus_id'];
                $mes_id        = $value['mes_id'];
                $cloth_id      = $value['cloth_id'];
                $buying_price  = $value['buying_price'];
                $selling_price = $value['selling_price'];
                $charge        = $value['charge'];
                $quantity      = $value['quantity'];

                $query = "INSERT into tbl_order(owner_id, cus_id, mes_id, cloth_id, buying_price, selling_price, charge, quantity, slip_no) values('$customer_id','$cus_id', '$mes_id', '$cloth_id', '$buying_price', '$selling_price', '$charge', '$quantity', '$time')";
                $result = $this->conn->query($query);                 
            }     
        }

        $query = "INSERT into tbl_slip(slip_no, customer_id, order_at, delivery_at) values('$time','$customer_id', '$order_at', '$delivery_at')";
        $result = $this->conn->query($query);
        if($result){
            $delque = "DELETE FROM tbl_cart ";
            $delete = $this->conn->query($delque);
            if($delete){    
                $txt = "<div class='alert alert-success'>Data Deleted Successfully!</div>";
                return $txt;
            }
        }
    }

    // View Cart
    public function viewCart(){  
        $query = "SELECT * FROM tbl_cart 
        LEFT JOIN tbl_customer ON tbl_cart.cus_id = tbl_customer.cus_id
        LEFT JOIN tbl_measurement ON tbl_cart.mes_id =  tbl_measurement.id
        LEFT JOIN tbl_cloth ON tbl_cart.cloth_id = tbl_cloth.id
        WHERE tbl_cart.soft_delete=0";
        $result = $this->conn->query($query);
        return $result;
    }

    // View Slip
    public function viewSlip(){  
        $query = "SELECT * FROM tbl_slip
        LEFT JOIN tbl_customer ON tbl_slip.customer_id = tbl_customer.cus_id
        WHERE tbl_slip.soft_delete=0";    
        $result = $this->conn->query($query);
        return $result;
    }    

    public function searchSlipResult($search){
        $str = mysqli_real_escape_string($this->conn, $search);
        $query = "SELECT * FROM tbl_slip
        LEFT JOIN tbl_customer ON tbl_slip.customer_id = tbl_customer.cus_id
        WHERE tbl_slip.soft_delete=0 AND tbl_slip.slip_no LIKE '%$str%'";   
        $result = $this->conn->query($query);
        return $result;
    }

    public function slipOrder($slip_no){
        $query = "SELECT tbl_order.*, tbl_customer.*, tbl_measurement.*, tbl_cloth.*, tbl_order.id AS orderid, tbl_order.selling_price AS sellingprice FROM tbl_order 
        LEFT JOIN tbl_customer ON tbl_order.cus_id = tbl_customer.cus_id
        LEFT JOIN tbl_measurement ON tbl_order.mes_id = tbl_measurement.id
        LEFT JOIN tbl_cloth ON tbl_order.cloth_id = tbl_cloth.id
        WHERE slip_no = $slip_no AND tbl_order.soft_delete=0";    
        $result = $this->conn->query($query);
        return $result;
    }
    
    public function viewProfit(){
        $query = "SELECT SUM(buying_price) AS sum_buyingprice, SUM(selling_price) AS sum_sellingprice, SUM(charge) AS sum_charge FROM tbl_order";    
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
            $txt = "<div class='alert alert-success'>Successfully Deleted</div>";
            return $txt;
        }
    }

    public function selectAllMeasurement($id){
        $query = "SELECT * FROM tbl_measurement WHERE cus_id = '$id'";
        $result = $this->conn->query($query);
        return $result;
    }
    
    public function deleteOrder($id){        
        $query = "UPDATE tbl_order
                SET
                soft_delete      = '1'
                WHERE slip_no    = $id";
        $result = $this->conn->query($query);
        if($result === TRUE){
            $txt = "<div class='alert alert-success'>Delivery Successful !</div>";
            return $txt;
        }
    }

    public function orderCheck($slip_no){
        $result = $this->conn->query("SELECT * FROM tbl_order WHERE slip_no = '$slip_no' && soft_delete = 1");
        return mysqli_num_rows($result);
    }
            
}