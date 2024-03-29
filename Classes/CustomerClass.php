<?php
include_once 'db.php';
class CustomerClass extends DB
{
    public $db;
    public function __construct()
    {
        $conn = $this->connect();
    }

    // Create Customer
    public function insertCustomer($data)
    {
        $cus_name      = mysqli_real_escape_string($this->conn, $data['cus_name']);
        $cus_email     = mysqli_real_escape_string($this->conn, $data['cus_email']);
        $cus_phone     = mysqli_real_escape_string($this->conn, $data['cus_phone']);
        $cus_address   = mysqli_real_escape_string($this->conn, $data['cus_address']);

        $def = "+8801";
        $mobileno = $def . $cus_phone;
        $query = "SELECT * FROM tbl_customer WHERE cus_email='$cus_email' OR cus_phone='$cus_phone'";
        $res = $this->conn->query($query);

        if (empty($cus_name) || empty($cus_email) || empty($cus_phone) || empty($cus_address)) {
            $txt = "<div class='alert alert-danger'>Field must not be empty!</div>";
            return $txt;
        } elseif (!preg_match("/^[a-zA-z ]*$/", $cus_name)) {
            $txt = "<div class='alert alert-danger'>Only alphabets and whitespace are allowed for First name!</div>";
            return $txt;
        } elseif (!preg_match("/^[a-zA-Z0-9]{0,}([.]?[a-zA-Z0-9]{1,})[@](gmail.com|hotmail.com|yahoo.com)/", $cus_email)) {
            $txt = "<div class='alert alert-danger'>Invalid email address!!</div>";
            return $txt;
        } elseif (mysqli_num_rows($res) > 0) {
            $txt = "<div class='alert alert-danger'>This Email has already been Registered!</div>";
            return $txt;
        } elseif (strlen($cus_phone) != 9) {
            $txt = "<div class='alert alert-danger'>Mobile must have 9 digits!</div>";
            return $txt;
        } elseif (strlen($cus_address) > 200) {
            $txt = "<div class='alert alert-danger'>200 Digit limitation!</div>";
            return $txt;
        } else {
            $query = "INSERT into tbl_customer(cus_name, cus_email, cus_phone, cus_address) values('$cus_name', '$cus_email', '$mobileno', '$cus_address')";
            $result = $this->conn->query($query);
            if ($result) {
                $txt = "<div class='alert alert-success'>Successfully Inserted.</div>";
                return $txt;
            }
        }
    }

    // View Customer
    public function viewCustomer()
    {
        $qry = "SELECT * FROM tbl_customer where soft_delete = 0";
        $result = $this->conn->query($qry);
        return $result;
    }

    // Update Customer
    public function updateCustomer($data, $customerid)
    {
        $cus_name      = mysqli_real_escape_string($this->conn, $data['cus_name']);
        $cus_email     = mysqli_real_escape_string($this->conn, $data['cus_email']);
        $cus_phone     = mysqli_real_escape_string($this->conn, $data['cus_phone']);
        $cus_address   = mysqli_real_escape_string($this->conn, $data['cus_address']);

        $def = "+8801";
        $mobileno = $def . $cus_phone;
        $query = "SELECT * FROM tbl_customer WHERE cus_email='$cus_email' OR cus_phone='$cus_phone'";
        $res = $this->conn->query($query);

        if (empty($cus_name) || empty($cus_phone) || empty($cus_address)) {
            $txt = "<div class='alert alert-danger'>Field must not be empty!</div>";
            return $txt;
        } elseif (!preg_match("/^[a-zA-Z ]*$/", $cus_name)) {
            $txt = "<div class='alert alert-danger'>Only alphabets and whitespace are allowed for first name!</div>";
            return $txt;
        } elseif (!preg_match("/^[a-zA-Z0-9]{0,}([.]?[a-zA-Z0-9]{1,})[@](gmail.com|hotmail.com|yahoo.com)/", $cus_email)) {
            $txt = "<div class='alert alert-danger'>Invalid email address!!</div>";
            return $txt;
        } elseif (strlen($cus_phone) != 9) {
            $txt = "<div class='alert alert-danger'>Mobile must have 9 digits!</div>";
            return $txt;
        } elseif (strlen($cus_address) > 200) {
            $txt = "<div class='alert alert-danger'>200 Digit limitation!</div>";
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
                $txt = "<div class='alert alert-success'>Successfully updated.</div>";
                return $txt;
            }
        }
    }

    // view Single Customer
    public function viewSingleCustomer($customerid)
    {
        $query  = "SELECT * FROM tbl_customer WHERE cus_id='$customerid'";
        $result = $this->conn->query($query);
        return $result;
    }

    // Delete Customer
    public function deleteCustomer($id)
    {
        $query = "UPDATE tbl_customer
                SET
                soft_delete  = '1'
                WHERE cus_id = $id";
        $result = $this->conn->query($query);
        if ($result === TRUE) {
            $txt = "<div class='alert alert-success'>Successfully Deleted.</div>";
            return $txt;
        }
    }
}
