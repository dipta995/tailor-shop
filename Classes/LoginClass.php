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
                $txt = "<div style='color:red; font-size: 15px;'>Incorrect email and password...!</div>";
                return $txt;
            }
    }
        
    // User registration 
   
}
?>