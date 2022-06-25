<?php 
include_once 'db.php';

class LoginClass extends DB
{
    public $db;
    public function __construct()
    {
        $conn = $this->connect();
    }
    
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
            $txt ="<div class='alert alert-danger'>Incorrect email and password...!</div>";  
            return $txt;
        }
    }

    public function checkprofile(){
        $id = $_SESSION['id'];
        $query = "SELECT * FROM tbl_admin WHERE id = $id";
        $result = $this->conn->query($query);
        return $result;
    }
        
    // User registration 
    public function insertUser($data){
        $name     = mysqli_real_escape_string($this->conn, $data['name']);
        $email    = mysqli_real_escape_string($this->conn, $data['email']);
        $phone    = mysqli_real_escape_string($this->conn, $data['phone']);
        $password = mysqli_real_escape_string($this->conn, $data['password']);
        $role     = mysqli_real_escape_string($this->conn, $data['role']);
       
        $def = "+8801";
        $mobileno = $def.$phone;
        $query = "SELECT * FROM tbl_admin WHERE email='$email' OR phone='$phone' limit 1";
        $res = $this->conn->query($query);

        if (empty($name) || empty($email) || empty($phone) || empty($password) || empty($role)) {
            $txt = "<div class='alert alert-danger'>Field must not be empty!</div>";
            return $txt;
        }elseif (!preg_match ("/^[a-zA-z ]*$/", $name) ){
            $txt = "<div class='alert alert-danger'>Only alphabets and whitespace are allowed for name!</div>";
            return $txt;
        }elseif (mysqli_num_rows($res)>0){
            $txt = "<div class='alert alert-danger'>This Email has already been Registered!</div>";
            return $txt;
        }elseif (mysqli_num_rows($res)>0){
            $txt = "<div class='alert alert-danger'>This mobile no. has already been Registered!</div>";
            return $txt;
        }elseif ( strlen ($phone) != 9) {  
            $txt = "<div class='alert alert-danger'>Mobile must have 9 digits.</div>";  
            return $txt;
        }elseif ( strlen ($password) < 6) {  
            $txt = "<div class='alert alert-danger'>Password must have 6 digits.</div>";  
            return $txt;
        }else{
            $qry = "INSERT into tbl_admin(name, email, phone, password, role) values('$name','$email','$mobileno','$password','$role')";
            $result = $this->conn->query($qry);
            
            if($result){
                $txt = "<div class='alert alert-success'>Registered Successfully!</div>";
                return $txt;
            }
        }
            
    }
    
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

    public function userList(){
        $query = "SELECT * FROM tbl_admin where soft_delete = 0 order by id DESC";
        $result = $this->conn->query($query);
        return $result;       
    }

    public function deleteUser($id){        
        $query = "UPDATE tbl_admin
                SET
                soft_delete  = '1'
                WHERE id     = $id";
        $result = $this->conn->query($query);
        if($result === TRUE){
            echo $txt = "<div class='alert alert-success'>Successfully Deleted</div>";
        }
    }

    public function viewSingleUser($userid){
        $query  = "SELECT * FROM tbl_admin WHERE id='$userid'";
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
}
?>