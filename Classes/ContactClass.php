<?php 
include_once 'db.php';
class ContactClass extends DB
{
        
  
    
   // public $db;
        public function __construct()
        {
            $conn = $this->connect();
        }

       
        public function sendcontact($data)
        {
            $name = mysqli_real_escape_string($this->conn, $data['name']);
            $email = mysqli_real_escape_string($this->conn, $data['email']);
            $phone = mysqli_real_escape_string($this->conn, $data['phone']);
            $message = mysqli_real_escape_string($this->conn, $data['message']);

            
            if (empty($name)||empty($email)||empty($phone)||empty($message)) {
                $txt = "<div class='alert alert-danger'>Field Must not be empty</div>";
                return $txt;
            }elseif ( strlen ($phone) != 11) {  
                return "<span style = 'color:red';>Mobile must have 9 digits.</span>";  
                         
            } elseif ( strlen ($message) > 100) {  
                return "<span style = 'color:red';>200 Degit limitation</span>";  
                         
            } 
             
             
             else{


                 $qry = "INSERT INTO contact_table(name,email,phone,message)VALUES('$name','$email','$phone','$message')";
                 $result = $this->conn->query($qry);
                     if($result){
                         $txt = "<div class='alert alert-success'>Order Successfully</div>";
                         return $txt;
                     }
             }

        }

        public function viewContact(){
            $qry = "SELECT * from contact_table";
			$result = $this->conn->query($qry);
            return $result;
        }
        public function deleteContact($id)
        {
            $qry = "DELETE FROM contact_table WHERE id='$id'";
			$delsalary =$this->conn->query($qry);
			if($delsalary){
                $txt = "<span style='color:green; font-size: 15px;'>Successfully Deleted</span>";
                return $txt;
            }
        }

    }