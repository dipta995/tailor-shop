<?php 
include_once 'db.php';

class LoginClass extends DB
{
    public $db;
    
    public function adminlogin($email, $pass){
        $result = $this->conn->query("SELECT * FROM admin_table WHERE admin_email = '$email' AND admin_password='$pass'");
        $value = mysqli_fetch_array($result);
        
            if (mysqli_num_rows($result)>0) {
                session_start();
                $_SESSION['loginauth'] = 'admin';
                $_SESSION['admin_id'] = $value['admin_id'];
                $_SESSION['admin_email'] = $value['admin_email'];
                $_SESSION['admin_status'] = $value['admin_status'];
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