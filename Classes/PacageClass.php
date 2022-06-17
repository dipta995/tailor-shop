<?php 
include_once 'db.php';
class PacageClass extends DB
{
        public $db;
        public function __construct()
        {
            $conn = $this->connect();
        }
    
       
        public function insertPackage($data){
          $pack_name = mysqli_real_escape_string($this->conn, $data['pack_name']);
          $details = mysqli_real_escape_string($this->conn, $data['details']);
          $month = mysqli_real_escape_string($this->conn, $data['month']);
          $price = mysqli_real_escape_string($this->conn, $data['price']);
          $discount = mysqli_real_escape_string($this->conn, $data['discount']);
           

          if (empty($pack_name) || empty($details) || empty($month) || empty($price) ) {
                $txt = "<div class='alert alert-danger'>Field must not be empty</div>";
                return $txt;
          }else{
                $qry = "INSERT into package_table(pack_name,details,month,price,discount) values('$pack_name','$details','$month','$price','$discount')";
                $result = $this->conn->query($qry);
                if($result){
                    $txt = "<div class='alert alert-success'>Successfully inserted</div>";
                    return $txt;
                }
            }
        }

        public function viewPackage(){
            $qry = "SELECT * FROM package_table  where del_pack=0";
            $result = $this->conn->query($qry);
            return $result;
        }

        public function ShowSelectedpack($package_id){
            $qry = "SELECT * FROM package_table WHERE package_id='$package_id' AND del_pack=0";
            $result = $this->conn->query($qry);
            return $result;
        }
        
        public function deletePackage($id){
            
			$qry = "UPDATE package_table
                    SET
                    del_pack                = '1'
                    WHERE package_id        = $id";
            $result = $this->conn->query($qry);
            if($result === TRUE){
                $txt = "<div class='alert alert-success'>Successfully Deleted</div>";
                return $txt;
            }
        }


        public function viewSinglePackage($packageid){
            $qry = "SELECT * FROM package_table WHERE package_id='$packageid'";
            $result = $this->conn->query($qry);
            return $result;
        }

        public function updatePackage($data,$packageid){
            $pack_name = mysqli_real_escape_string($this->conn, $data['pack_name']);
            $details = mysqli_real_escape_string($this->conn, $data['details']);
            $month = mysqli_real_escape_string($this->conn, $data['month']);
            $price = mysqli_real_escape_string($this->conn, $data['price']);
            $discount = mysqli_real_escape_string($this->conn, $data['discount']);
           
            
            if (empty($pack_name) || empty($details) || empty($month) || empty($price)) {
                $txt = "<div class='alert alert-danger'>Field must not be empty</div>";
                return $txt;
            }else{
                    $qry = "UPDATE package_table
                    SET
                    pack_name               = '$pack_name',
                    details          		= '$details',
                    month          	        = '$month',
                    price             	    = '$price',
                  
                    discount                = '$discount'

                    WHERE package_id        = '$packageid'";
                    $result = $this->conn->query($qry);
                    if($result){
                        $txt = "<div class='alert alert-success'>Successfully updated</div>";
                        return $txt;
                    }
                }
        }

        public function ApplyPack($data,$package_id,$mobile){
            $pack_price = mysqli_real_escape_string($this->conn, $data['pack_price']);
            $pack_month = mysqli_real_escape_string($this->conn, $data['pack_month']);
            $pack_discount = mysqli_real_escape_string($this->conn, $data['pack_discount']);
            $trainer = mysqli_real_escape_string($this->conn, $data['trainer']);
            

            $que = $this->conn->query("SELECT * FROM order_table WHERE pack_id=$package_id AND status=0 AND mobile_no=$mobile");
            $value = mysqli_fetch_array($que);
            if (mysqli_num_rows($que)>0) {
                $txt = "<div class='alert alert-danger'>Already added</div>";
                return $txt;
             }else{

                 $qry = "INSERT INTO order_table(mobile_no,pack_id,pack_price,pack_month,pack_discount,trainer_id)VALUES('$mobile','$package_id','$pack_price','$pack_month','$pack_discount','$trainer')";
                 $result = $this->conn->query($qry);
                     if($result){
                         $txt = "<div class='alert alert-success'>Order Successfully</div>";
                         return $txt;
                     }
             }

        }
        public function confirmorder($order)
        {
            $qry = "UPDATE order_table
                    SET
                    status               = '1' 
                    WHERE order_id        = '$order'";
                    $result = $this->conn->query($qry);
                    if($result){
                        $txt = "<div class='alert alert-success'>Order Confirm</div>";
                        return $txt;
                    }
        }
        public function viewOrderadmin(){
         
            $qry = "SELECT * FROM order_table left join  employee_table   on  order_table .trainer_id=employee_table.emp_id inner JOIN package_table ON order_table.pack_id=package_table.package_id inner JOIN user_table ON order_table.mobile_no=user_table.mobile  ORDER by status ASC";
            
            $result = $this->conn->query($qry);
            return $result;
        }

        public function viewOrder(){
            $mobile = $_SESSION['mobile'];
            $qry = "SELECT * FROM order_table INNER JOIN user_table ON order_table.mobile_no=user_table.mobile INNER JOIN package_table ON order_table.pack_id=package_table.package_id where order_table.mobile_no='$mobile'";
            $result = $this->conn->query($qry);
            // $row = mysqli_num_rows($result);
            // if ($row>0) {
               
            // }
            return $result;
        }
        public function removeEmp($id)
        {
            
            $qry = "DELETE  FROM employee_table WHERE emp_id=$id";
            $result = $this->conn->query($qry);
            if ($result) {
                return "<span style='color:green'>Order Cancelled </span>";
            }else{
                return "<span style='color:green'>Something Wrong</span>";
            }
        }
        public function removeImg($id)
        {
            
            $qry = "DELETE  FROM image_table WHERE image_id=$id";
            $result = $this->conn->query($qry);
            if ($result) {
                return "<span style='color:green'>Image removed</span>";
            }else{
                return "<span style='color:green'>Something Wrong try again</span>";
            }
        }

        public function removeorder($order)
        {
            $mobile = $_SESSION['mobile'];
            $qry = "DELETE  FROM order_table WHERE mobile_no=$mobile AND order_id = $order";
            $result = $this->conn->query($qry);
            if ($result) {
                return "<span style='color:green'>Order Cancelled </span>";
            }else{
                return "<span style='color:green'>Something Wrong</span>";
            }
        }
        public function confirmbuypackbyadmin($data,$packid){
            $mobile_no = mysqli_real_escape_string($this->conn, $data['mobile_no']);
            $trainer = mysqli_real_escape_string($this->conn, $data['trainer']);
            $que = $this->conn->query("SELECT * FROM order_table WHERE pack_id=$packid AND status=0 AND mobile_no=$mobile_no");
            $value = mysqli_fetch_array($que);
            if (mysqli_num_rows($que)>0) {
                $txt = "<div class='alert alert-danger'>Already added</div>";
                return $txt;
             }else{

                $que = $this->conn->query("SELECT * FROM package_table WHERE package_id=$packid");
            $data = mysqli_fetch_array($que);
            $pack_price = $data['price'];
            $pack_month = $data['month'];
            $pack_discount = $data['discount'];
                 $qry = "INSERT INTO order_table(mobile_no,pack_id,pack_price,pack_month,pack_discount,trainer_id,status)VALUES('$mobile_no','$packid','$pack_price','$pack_month','$pack_discount','$trainer','1')";
                 $result = $this->conn->query($qry);
                     if($result){
                         $txt = "<div class='alert alert-success'>Order Successfully</div>";
                         return $txt;
                     }
             }

        }
}
?>