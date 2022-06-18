<?php 
include_once 'db.php';
class ClothClass extends DB
{
    public $db;
    public function __construct()
    {
        $conn = $this->connect();
    }

    
    public function insertCloth($data){
        $name = mysqli_real_escape_string($this->conn, $data['name']);
        $details = mysqli_real_escape_string($this->conn, $data['details']);
        $price = mysqli_real_escape_string($this->conn, $data['price']);
        $discount = mysqli_real_escape_string($this->conn, $data['discount']);
        

        if (empty($name) || empty($details) || empty($price) ) {
            $txt = "<div class='alert alert-danger'>Field must not be empty</div>";
            return $txt;
        }else{
            $qry = "INSERT into tbl_cloth(name,details,price,discount) values('$name','$details','$price','$discount')";
            $result = $this->conn->query($qry);
            if($result){
                $txt = "<div class='alert alert-success'>Successfully inserted</div>";
                return $txt;
            }
        }
    }

    public function viewCloth(){
        $query = "SELECT * FROM tbl_cloth order by id desc";
        $result = $this->conn->query($query);
        return $result;
    }

    
}
?>