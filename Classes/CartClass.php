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
    public function insertCart($data)
    {
        $cus_id        = mysqli_real_escape_string($this->conn, $data['cus_id']);
        $mes_id        = mysqli_real_escape_string($this->conn, $data['mes_id']);
        $cloth_id      = mysqli_real_escape_string($this->conn, $data['cloth_id']);
        $charge        = mysqli_real_escape_string($this->conn, $data['charge']);
        $quantity      = mysqli_real_escape_string($this->conn, $data['quantity']);

        $query  = "SELECT * FROM tbl_cloth WHERE id = $cloth_id";
        $result = $this->conn->query($query);
        $value  = mysqli_fetch_array($result);

        $buying_price  = $value['buying_price'];
        $selling_price = $value['selling_price'];
        $stock         = $value['stock'];
        $discount      = $value['discount'];

        if (empty($cus_id) || empty($mes_id) || empty($cloth_id) || empty($buying_price) || empty($selling_price) || empty($charge) || empty($quantity)) {
            $txt = "<div class='alert alert-danger'>Field must not be empty!</div>";
            return $txt;
        } elseif (($stock - $quantity) < 0) {
            $txt = "<div class='alert alert-danger'>Out of Stock</div>";
            return $txt;
        } else {
            $query = "INSERT into tbl_cart(cus_id, mes_id, cloth_id, buying_price, selling_price, charge, quantity,discount) values('$cus_id', '$mes_id', '$cloth_id', '$buying_price', '$selling_price', '$charge', '$quantity', '$discount')";
            $result = $this->conn->query($query);
            $updatQquery = "UPDATE tbl_cloth
            SET
            stock  = $stock-$quantity
            WHERE id     = $cloth_id";
            $this->conn->query($updatQquery);

            if ($result) {
                $txt = "<div class='alert alert-success'>Data Inserted Successfully</div>";
                return $txt;
            }
        }
    }

    // Insert Order
    public function insertOrder($data)
    {
        $customer_id = mysqli_real_escape_string($this->conn, $data['cus_id']);
        $delivery_at = mysqli_real_escape_string($this->conn, $data['delivery_at']);
        $time = time();
        $order_at = date('Y-m-d');

        $query  = "SELECT * FROM tbl_cart";
        $result = $this->conn->query($query);

        if (empty($customer_id) || empty($delivery_at)) {
            $txt = "<div class='alert alert-danger'>Field must not be empty!</div>";
            return $txt;
        } else {
            foreach ($result as $value) {
                $cus_id        = $value['cus_id'];
                $mes_id        = $value['mes_id'];
                $cloth_id      = $value['cloth_id'];
                $buying_price  = $value['buying_price'];
                $selling_price = $value['selling_price'];
                $charge        = $value['charge'];
                $quantity      = $value['quantity'];
                $discount      = $value['discount'];

                $query = "INSERT into tbl_order(owner_id, cus_id, mes_id, cloth_id, buying_price, selling_price, charge, quantity, discount, slip_no) values('$customer_id','$cus_id', '$mes_id', '$cloth_id', '$buying_price', '$selling_price', '$charge', '$quantity', '$discount', '$time')";
                $result = $this->conn->query($query);
            }
        }

        $query = "INSERT into tbl_slip(slip_no, customer_id, order_at, delivery_at) values('$time','$customer_id', '$order_at', '$delivery_at')";
        $result = $this->conn->query($query);

        if ($result) {
            $delque = "DELETE FROM tbl_cart ";
            $delete = $this->conn->query($delque);
            if ($delete) {
                $query = "SELECT * FROM tbl_slip LEFT JOIN tbl_customer ON tbl_slip.customer_id = tbl_customer.cus_id WHERE slip_no = $time";
                $result = $this->conn->query($query);
                if($result) {
                    $valuedata = mysqli_fetch_array($result);
                    $txt = "<div class='alert alert-success'>Order Successful!
                    Name: ". $valuedata['cus_name'] ." Slip no: ". $time
                ."</div>";
                    return $txt;
                    
                }
            }
        }
    }

    // View Cart
    public function viewCart()
    {
        $query = "SELECT tbl_cart.*, tbl_customer.*, tbl_measurement.*, tbl_cloth.*, tbl_cart.buying_price AS buying_price, tbl_cart.selling_price AS selling_price, tbl_cart.id AS cartid FROM tbl_cart 
        LEFT JOIN tbl_customer ON tbl_cart.cus_id = tbl_customer.cus_id
        LEFT JOIN tbl_measurement ON tbl_cart.mes_id =  tbl_measurement.id
        LEFT JOIN tbl_cloth ON tbl_cart.cloth_id = tbl_cloth.id AND tbl_cart.discount = tbl_cloth.discount";
        $result = $this->conn->query($query);
        return $result;
    }

    public function viewSlip()
    {
        $query = "SELECT * FROM tbl_slip
        LEFT JOIN tbl_customer ON tbl_slip.customer_id = tbl_customer.cus_id 
        WHERE tbl_slip.soft_delete=0 order by tbl_slip.soft_delete asc";
        $result = $this->conn->query($query);
        return $result;
    }

    public function searchSlipResult($search)
    {
        $str = mysqli_real_escape_string($this->conn, $search);
        $query = "SELECT * FROM tbl_slip
        LEFT JOIN tbl_customer ON tbl_slip.customer_id = tbl_customer.cus_id
        LEFT JOIN tbl_order ON tbl_slip.slip_no = tbl_order.slip_no
        WHERE tbl_slip.soft_delete=0 AND tbl_slip.slip_no LIKE '%$str%' order by tbl_order.soft_delete asc";
        $result = $this->conn->query($query);
        return $result;
    }

    public function slipOrder($slip_no)
    {
        $query = "SELECT tbl_order.*, tbl_customer.*, tbl_measurement.*, tbl_cloth.*, tbl_order.id 
        AS orderid, tbl_order.selling_price AS sellingprice FROM tbl_order 
        LEFT JOIN tbl_customer ON tbl_order.cus_id = tbl_customer.cus_id 
        LEFT JOIN tbl_measurement ON tbl_order.mes_id = tbl_measurement.id
        LEFT JOIN tbl_cloth ON tbl_order.cloth_id = tbl_cloth.id
        WHERE slip_no = $slip_no";
        $result = $this->conn->query($query);
        return $result;
    }

    public function totalPayment()
    {
        $query = "SELECT * FROM tbl_order";
        $result = $this->conn->query($query);
        return $result;
    }

    public function viewProfit()
    {
        $query = "SELECT * FROM tbl_order order by tbl_order.id desc";
        $result = $this->conn->query($query);
        return $result;
    }

    public function viewOrder()
    {
        $query = "SELECT * FROM tbl_cart";
        $result = $this->conn->query($query);
        return $result;
    }

    // Select or Read data
    public function select($query)
    {
        $result = $this->conn->query($query) or die($this->conn->error . __LINE__);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

    public function deleteCart($id)
    {
        $cartQuery  = "SELECT * FROM tbl_cart WHERE id = $id";
        $cartdata = $this->conn->query($cartQuery);
        $value = mysqli_fetch_array($cartdata);
        $cloth_id = $value['cloth_id'];
        $quantity = $value['quantity'];
        $clothQuery  = "SELECT * FROM tbl_cloth WHERE id = $cloth_id";
        $cartdata = $this->conn->query($clothQuery);
        $valueCloth = mysqli_fetch_array($cartdata);
        $stock = $valueCloth['stock'];
        $query = "Delete from tbl_cart  WHERE id = $id";
        $cartdata = $this->conn->query($query);
        $updatQquery = "UPDATE tbl_cloth
        SET
        stock        = $stock + $quantity
        WHERE id     = $cloth_id";
        $this->conn->query($updatQquery);

        if ($updatQquery === TRUE) {
            $txt = "<div class='alert alert-success'>Successfully Deleted</div>";
            return $txt;
        }
    }

    public function selectAllMeasurement($id)
    {
        $query = "SELECT * FROM tbl_measurement WHERE cus_id = '$id' and soft_delete = 0";
        $result = $this->conn->query($query);
        return $result;
    }

    public function ConfirmOrder($id)
    {
        $query = "UPDATE tbl_order
                SET
                soft_delete      = '1'
                WHERE slip_no    = $id";
        $result = $this->conn->query($query);
        if ($result === TRUE) {
            $txt = "<div class='alert alert-success'>Delivery Successful</div>";
            return $txt;
        }
    }

    public function orderCheck($slip_no)
    {
        $query = "SELECT * FROM tbl_order WHERE slip_no = '$slip_no' AND soft_delete = 1";
        $result = $this->conn->query($query);
        return mysqli_num_rows($result);
    }

      // View Single Order
      public function viewSingleOrder($printid){
        $query  = "SELECT * FROM tbl_slip  
        LEFT JOIN tbl_customer ON tbl_slip.customer_id = tbl_customer.cus_id 
        WHERE tbl_slip.id='$printid'";
        $result = $this->conn->query($query);
        return $result;
    }

}
