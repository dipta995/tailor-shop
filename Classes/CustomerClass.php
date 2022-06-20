<?php 
include_once 'db.php';
class CustomerClass extends DB
{
    public $db;
        public function __construct()
    {
        $conn = $this->connect();
    }
    
    public function insertCustomer($data){
        $cus_name      = mysqli_real_escape_string($this->conn, $data['cus_name']);
        $cus_email     = mysqli_real_escape_string($this->conn, $data['cus_email']);
        $cus_phone     = mysqli_real_escape_string($this->conn, $data['cus_phone']);
        $cus_address   = mysqli_real_escape_string($this->conn, $data['cus_address']);

        $def="+8801";
        $mobileno = $def.$cus_phone;
        $query = "SELECT * FROM tbl_customer WHERE cus_email='$cus_email' OR cus_phone='$cus_phone'";
        $res = $this->conn->query($query);
        
        if (empty($cus_name) || empty($cus_email) || empty($cus_phone) || empty($cus_address)) {
            $txt = "<div class='alert alert-danger'>Field must not be empty</div>";
            return $txt;
        } elseif (!preg_match ("/^[a-zA-z ]*$/", $cus_name) ){
            $txt = "<div style='color:red; font-size: 15px;'>Only alphabets and whitespace are allowed For First name</div>";
            return $txt;
        } elseif (mysqli_num_rows($res)>0){
            $txt = "<div style='color:red; font-size: 15px;'>This Email Already been Registered </div>";
            return $txt;
        } elseif (strlen ($cus_phone) != 9) {  
            $txt = "<div style='color:red; font-size: 15px;'>Mobile no. must have 9 digits. </div>";
            return $txt;
        } elseif (strlen ($cus_address) > 200) {  
            $txt = "<div style='color:red; font-size: 15px;'>200 characters limitation!</div>";
            return $txt;
        } else {
            $query = "INSERT into tbl_customer(cus_name, cus_email, cus_phone, cus_address) values('$cus_name', '$cus_email', '$mobileno', '$cus_address')";
            $result = $this->conn->query($query);
            if($result){
               echo $txt = "<div class='alert alert-success'>Successfully inserted</div>";
            }
        }
    }

    public function viewCustomer(){
        $qry = "SELECT * FROM tbl_customer where soft_delete = 0";
        $result = $this->conn->query($qry);
        return $result;
    }

    public function updateCustomer($data, $customerid){
        $cus_name      = mysqli_real_escape_string($this->conn, $data['cus_name']);
        $cus_email     = mysqli_real_escape_string($this->conn, $data['cus_email']);
        $cus_phone     = mysqli_real_escape_string($this->conn, $data['cus_phone']);
        $cus_address   = mysqli_real_escape_string($this->conn, $data['cus_address']);

        $def="+8801";
        $mobileno = $def.$cus_phone;
        $query = "SELECT * FROM tbl_customer WHERE cus_email='$cus_email' OR cus_phone='$cus_phone'";
        $res = $this->conn->query($query);
        
        if (empty($cus_name) || empty($cus_phone) || empty($cus_address)) {
            $txt = "<div class='alert alert-danger'>Field must not be empty</div>";
            return $txt;
        } elseif (!preg_match ("/^[a-zA-Z ]*$/", $cus_name) ){
            $txt = "<div style='color:red; font-size: 15px;'>Only alphabets and whitespace are allowed For First name</div>";
            return $txt;
        } elseif (strlen ($cus_phone) != 9) {  
            $txt = "<div style='color:red; font-size: 15px;'>Mobile no. must have 9 digits. </div>";
            return $txt;
        } elseif (strlen ($cus_address) > 200) {  
            $txt = "<div style='color:red; font-size: 15px;'>200 characters limitation!</div>";
            return $txt;
        } else {
            $query = "UPDATE tbl_customer
            SET 
            cus_name      = '$cus_name',
            cus_phone     = '$mobileno',
            cus_address   = '$cus_address'         
            WHERE cus_id  = '$customerid'";

            $result = $this->conn->query($query);
            if ($result) {
                echo $txt = "<div class='alert alert-success'>Successfully updated</div>";
            }
        }        
    }

    public function viewSingleCustomer($customerid){
        $query  = "SELECT * FROM tbl_customer WHERE cus_id='$customerid'";
        $result = $this->conn->query($query);
        return $result;
    }

    public function deleteCustomer($id){        
        $query = "UPDATE tbl_customer
                SET
                soft_delete  = '1'
                WHERE cus_id = $id";
        $result = $this->conn->query($query);
        if($result === TRUE){
            echo $txt = "<div class='alert alert-success'>Successfully Deleted</div>";
        }
    }


}




