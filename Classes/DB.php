<?php 
class DB 
{
 
    public $conn;
    public function connect(){
        // Create connection
        $this->conn = new mysqli("localhost","root","","tailor_shop");

        if ($this->conn->connect_error) {
          die("Connection failed: " . $this->conn->connect_error);
        }
        else{
            return $msg =  "connected";
        }
    }
}
 
?>