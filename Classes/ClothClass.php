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
        $name     = mysqli_real_escape_string($this->conn, $data['name']);
        $details  = mysqli_real_escape_string($this->conn, $data['details']);
        $price    = mysqli_real_escape_string($this->conn, $data['price']);
        $discount = mysqli_real_escape_string($this->conn, $data['discount']);

        $permited  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "upload/".$unique_image;
        

        if (empty($name) || empty($details) || empty($file_name) || empty($price) ) {
            $txt = "<div class='alert alert-danger'>Field must not be empty</div>";
            return $txt;
        } elseif ($file_size >1048567) {
            $txt = "<div class='alert alert-danger'>Image Size should be less then 1MB!</div>";
            return $txt;
        } elseif (in_array($file_ext, $permited) === false) {
            $txt = "<div class='alert alert-danger'>You can upload only: " .implode(', ', $permited)."</div>";
            return $txt;
        } else{
            move_uploaded_file($file_temp, $uploaded_image);
            $query = "INSERT into tbl_cloth(name, details, image, price, discount) values('$name','$details', '$uploaded_image', '$price','$discount')";
            $result = $this->conn->query($query);
            if($result){
                $txt = "<div class='alert alert-success'>Successfully inserted</div>";
                return $txt;
            }
        }
    }

    public function viewType(){
        $query = "SELECT * FROM cloth_type order by id desc";
        $result = $this->conn->query($query);
        return $result;
    }

    public function viewCloth(){
        $query  = "SELECT * FROM tbl_cloth order by id desc";
        $result = $this->conn->query($query);
        return $result;
    }

    public function viewSingleCloth($clothid){
        $query  = "SELECT * FROM tbl_cloth WHERE id='$clothid'";
        $result = $this->conn->query($query);
        return $result;
    }

    public function updateType($data, $typeid){
        $name = mysqli_real_escape_string($this->conn, $data['name']);
        if (empty($name)) {
            $txt = "<div class='alert alert-danger'>Field must not be empty</div>";
            return $txt;
        } else {
            $query = "UPDATE cloth_type
                    SET 
                    name     = '$name'          
                    WHERE id = '$typeid'";

                    $result = $this->conn->query($query);
                    if ($result) {
                        $txt = "<div class='alert alert-success'>Successfully updated</div>";
                        return $txt;
                    }
        }
    }

    public function viewSingleType($typeid){
        $query  = "SELECT * FROM cloth_type WHERE id='$typeid'";
        $result = $this->conn->query($query);
        return $result;
    }

    public function updateCloth($data, $clothid){
        $name     = mysqli_real_escape_string($this->conn, $data['name']);
        $details  = mysqli_real_escape_string($this->conn, $data['details']);
        $price    = mysqli_real_escape_string($this->conn, $data['price']);
        $discount = mysqli_real_escape_string($this->conn, $data['discount']);
       
        $permited  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "upload/".$unique_image;
        
        if (empty($name) || empty($details) || empty($price)) {
            $txt = "<div class='alert alert-danger'>Field must not be empty</div>";
            return $txt;
        } else {
            if(!empty($file_name)){ 
                if ($file_size >1048567) {
                    echo "<span class='error'>Image Size should be less then 1MB!</span>";
                } elseif (in_array($file_ext, $permited) === false) {
                    echo "<span class='error'>You can upload only: " .implode(', ', $permited)."</span>";
                } else {
                    move_uploaded_file($file_temp, $uploaded_image);
                    $query = "UPDATE tbl_cloth
                              SET 
                              name     = '$name',
                              details  = '$details',
                              image    = '$uploaded_image',
                              price    = '$price',
                              discount = '$discount'
                              WHERE id = '$clothid'";

                    $result = $this->conn->query($query);
                    if ($result) {
                        $txt = "<div class='alert alert-success'>Successfully updated</div>";
                        return $txt;
                    }
                }
            } else {
                $query = "UPDATE tbl_cloth
                          SET 
                          name     = '$name',
                          details  = '$details',
                          price    = '$price',
                          discount = '$discount'
                          WHERE id = '$clothid' ";
                $result = $this->conn->query($query);
                if ($result) {
                    $txt = "<div class='alert alert-success'>Successfully updated</div>";
                    return $txt;
                }
            }
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


    // Delete data
    public function delete($query){
        $delete_row = $this->conn->query($query) or die($this->conn->error.__LINE__);
        if($delete_row){
            return $delete_row;
        } else {
            return false;
        }
    } 

    public function insertType($data){
        $name = mysqli_real_escape_string($this->conn, $data['name']);

        if (empty($name)) {
            $txt = "<div class='alert alert-danger'>Field must not be empty</div>";
            return $txt;
        } else{
            $query = "INSERT into cloth_type(name) values('$name')";
            $result = $this->conn->query($query);
            if($result){
                $txt = "<div class='alert alert-success'>Successfully inserted!</div>";
                return $txt;
            }
        }

    }



    // public function deleteCloth($id){        
    //     $query = "UPDATE tbl_cloth
    //             SET
    //             del_cloth  = '1'
    //             WHERE id   = $id";
    //     $result = $this->conn->query($query);
    //     if($result === TRUE){
    //         $txt = "<div class='alert alert-success'>Successfully Deleted</div>";
    //         return $txt;
    //     }
    // }

    
}
?>