<?php 
include_once 'db.php';

class LoginClass extends DB
{
    public $db;
    public function __construct()
    {
        $conn = $this->connect();
    }
    
    // Admin Login
    public function adminlogin($email, $pass){
        $result = $this->conn->query("SELECT * FROM tbl_admin WHERE email = '$email' AND password='$pass'");
        $value = mysqli_fetch_array($result);
        
        if (mysqli_num_rows($result)>0) {
            session_start();
            $_SESSION['loginauth'] = 'admin';
            $_SESSION['id'] = $value['id'];
            $_SESSION['email'] = $value['email'];
            $_SESSION['role'] = $value['role'];
            echo "<script> window.location = 'index.php';</script>";
            }
            else{
            $txt ="<div class='alert alert-danger'>Incorrect email and password!</div>";  
            return $txt;
        }
    }

    public function checkprofile(){
        $id = $_SESSION['id'];
        $query = "SELECT * FROM tbl_admin WHERE id = $id";
        $result = $this->conn->query($query);
        return $result;
    }
        
    //Admin Registration 
    public function insertAdmin($data){
        $first_name = mysqli_real_escape_string($this->conn, $data['first_name']);
        $last_name  = mysqli_real_escape_string($this->conn, $data['last_name']);
        $email      = mysqli_real_escape_string($this->conn, $data['email']);
        $phone      = mysqli_real_escape_string($this->conn, $data['phone']);
        $password   = mysqli_real_escape_string($this->conn, $data['password']);
        $role       = mysqli_real_escape_string($this->conn, $data['role']);
       
        $def = "+8801";
        $mobileno = $def.$phone;
        $query = "SELECT * FROM tbl_admin WHERE email='$email' OR phone='$phone' limit 1";
        $res = $this->conn->query($query);

        if (empty($first_name) || empty($last_name) || empty($email) || empty($phone) || empty($password) || empty($role)) {
            $txt = "<div class='alert alert-danger'>Field must not be empty!</div>";
            return $txt;
        }elseif (!preg_match ("/^[a-zA-z]*$/", $first_name) ){
            $txt = "<div class='alert alert-danger'>Only alphabets and whitespace are allowed for first name!</div>";
            return $txt;
        }elseif (!preg_match ("/^[a-zA-z]*$/", $last_name) ){
            $txt = "<div class='alert alert-danger'>Only alphabets and whitespace are allowed for last name!</div>";
            return $txt;
        }elseif (mysqli_num_rows($res)>0){
            $txt = "<div class='alert alert-danger'>This Email has already been Registered!</div>";
            return $txt;
        }elseif (mysqli_num_rows($res)>0){
            $txt = "<div class='alert alert-danger'>This mobile no. has already been Registered!</div>";
            return $txt;
        }elseif ( strlen ($phone) != 9) {  
            $txt = "<div class='alert alert-danger'>Mobile must have 9 digits!</div>";  
            return $txt;
        }elseif ( strlen ($password) < 6) {  
            $txt = "<div class='alert alert-danger'>Password must have 6 digits.</div>";  
            return $txt;
        }else{
            $qry = "INSERT into tbl_admin(first_name, last_name, email, phone, password, role) values('$first_name', '$last_name','$email','$mobileno','$password','$role')";
            $result = $this->conn->query($qry);
            
            if($result){
                $txt = "<div class='alert alert-success'>Registered Successfully.</div>";
                return $txt;
            }
        }           
    }

    // Update Admin Profile
    public function updateAdmin($data, $userid){
        $first_name = mysqli_real_escape_string($this->conn, $data['first_name']);
        $last_name  = mysqli_real_escape_string($this->conn, $data['last_name']);
        $phone      = mysqli_real_escape_string($this->conn, $data['phone']);
        $def = "+8801";
        $mobileno = $def.$phone;

        if (empty($first_name) || empty($last_name) || empty($phone)) {
            $txt = "<div class='alert alert-danger'>Field must not be empty!</div>";
            return $txt;
        }elseif (!preg_match ("/^[a-zA-z]*$/", $first_name) ){
            $txt = "<div class='alert alert-danger'>Only alphabets and whitespace are allowed for first name!</div>";
            return $txt;
        }elseif (!preg_match ("/^[a-zA-z]*$/", $last_name) ){
            $txt = "<div class='alert alert-danger'>Only alphabets and whitespace are allowed for last name!</div>";
            return $txt;
        }elseif ( strlen ($phone) != 9) {  
            $txt = "<div class='alert alert-danger'>Mobile must have 9 digits!</div>";
            return $txt;                
        }else{  
            $query = "UPDATE tbl_admin
            SET    
            first_name      = '$first_name',
            last_name       = '$last_name',
            phone           = '$mobileno'
            WHERE id        = '$userid'";
            $result = $this->conn->query($query);
            if($result){
                $txt = "<div class='alert alert-success'>Updated Successfully.</div>";
                return $txt;
            }
        }
    
    }

    // Update Password
    public function updatePassword($data, $id) {
        $password  = mysqli_real_escape_string($this->conn, $data['password']);
        $password1 = mysqli_real_escape_string($this->conn, $data['password1']);
        if (empty($password) || empty($password1)) {
            $txt = "<div class='alert alert-danger'>Field must not be empty!</div>";
            return $txt;
        }elseif ( strlen ($password) < 6) {  
            $txt = "<div class='alert alert-danger'>Password must have 6 digits.</div>";  
            return $txt;                 
        }elseif ($password == $password1) {        
            $query = "UPDATE tbl_admin 
            SET
            password        = $password
            WHERE id        = $id";
            $result = $this->conn->query($query);
            if ($result) {
                $txt = "<div class='alert alert-success'>Password Updated.</div>";
                return $txt;
            }
        }else{
            $txt = "<div class='alert alert-danger'>Password Doesn't Match!</div>";
            return $txt;
        }     

    }

    // View Users
    public function userList(){
        $query = "SELECT * FROM tbl_admin where soft_delete = 0 order by id DESC";
        $result = $this->conn->query($query);
        return $result;       
    }

    // Delete User 
    public function deleteUser($id){        
        $query = "UPDATE tbl_admin
                SET
                soft_delete  = '1'
                WHERE id     = $id";
        $result = $this->conn->query($query);
        if($result === TRUE){
            $txt = "<div class='alert alert-success'>Successfully Deleted.</div>";
            return $txt;
        }
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
}
