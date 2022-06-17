<?php 
include_once 'db.php';
class FoodClass extends DB
{
        public $db;
        public function __construct()
        {
            $conn = $this->connect();
        }
    
 
        public function insertFood($data){
          $menu = mysqli_real_escape_string($this->conn, $data['menu']);
          $age_limit = mysqli_real_escape_string($this->conn, $data['age_limit']);
 

          if (empty($menu) || empty($age_limit)) {
                $txt = "<div class='alert alert-danger'>Field must not be empty</div>";
                return $txt;
          }else{
                $qry = "INSERT into food_table(menu,age_limit) values('$menu','$age_limit')";
                $result = $this->conn->query($qry);
                if($result){
                    $txt = "<div class='alert alert-success'>Successfully Created</div>";
                    return $txt;
                }
            }
        }

        public function viewFood(){
            $qry = "SELECT * FROM food_table ";
            $result = $this->conn->query($qry);
            return $result;
        }

        public function viewSingleFood($id)
        {
            $qry = "SELECT * FROM food_table where id=$id";
            $result = $this->conn->query($qry);
            return $result;
        }

        public function updateFood($data,$id)
        {
            $menu = mysqli_real_escape_string($this->conn, $data['menu']);
            $age_limit = mysqli_real_escape_string($this->conn, $data['age_limit']);
   
  
            if (empty($menu) || empty($age_limit)) {
                  $txt = "<div class='alert alert-danger'>Field must not be empty</div>";
                  return $txt;
            }else{
                    $qry = "UPDATE food_table
                    SET
                    menu               = '$menu',
                    age_limit          		= '$age_limit' 

                    WHERE id        = '$id'";
                    $result = $this->conn->query($qry);
                    if($result){
                        $txt = "<div class='alert alert-success'>Successfully updated</div>";
                        return $txt;
                    }
                }
        }

        public function deleteFood($id)
        {
           
            $qry = "DELETE  FROM food_table Where id = $id";
            $result = $this->conn->query($qry);
            if ($result) {
                return "<span style='color:green'>Food Menu Cancelled </span>";
            }else{
                return "<span style='color:green'>Something Wrong</span>";
            }
        }

        public function myfoodmenu($age){
     


            $qry = "SELECT * FROM food_table WHERE age_limit LIKE  '%$age%' ";
            $result = $this->conn->query($qry);

           return $result;     
 
    }
 
 
 

        
}
?>