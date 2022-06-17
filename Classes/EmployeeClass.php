<?php 
include_once 'db.php';
class EmployeeClass extends DB
{
        public $db;
          public function __construct()
        {
            $conn = $this->connect();
        }
        
        public function createnewgalaryImage($data,$file)
        {
             
        
    
            $caption = mysqli_real_escape_string($this->conn, $data['caption']);
            $caption_two = mysqli_real_escape_string($this->conn, $data['caption_two']);
            $brif = mysqli_real_escape_string($this->conn, $data['brif']);
            if (empty($caption)||empty($caption_two)||empty($brif)) {
                $txt = "<span style='color:red; font-size: 15px;'>Field Must no be empty</span>";
            }elseif ( strlen ($caption) > 15) {  
                return "<span style = 'color:red';>Caption  must have 15  or Less currecter .</span>";  
                         
            }
            elseif ( strlen ($caption_two) > 15) {  
                return "<span style = 'color:red';>Caption  must have 15  or Less currecter .</span>";  
                         
            }
            elseif ( strlen ($brif) > 150) {  
                return "<span style = 'color:red';>Caption  must have 150  or Less currecter .</span>";  
                         
            }else{

           

                $permited  = array('jpg', 'jpeg', 'png', 'gif');
                $file_name = $file['image']['name'];
                $file_size = $file['image']['size'];
                $file_temp = $file['image']['tmp_name'];
    
                $div            = explode('.', $file_name);
                $file_ext       = strtolower(end($div));
                $unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
                $uploaded_image = "img/".$unique_image;
                $move_image = "img/".$unique_image;
               
    
               
               if(empty($file_ext)){
                    $txt = "<span style='color:red; font-size: 15px;'>Image is required</span>";
                    return $txt;
               }
               else if ($file_size >1048567) {
                return "<span class='error'>Image Size should be less then 1MB! </span>";
               } elseif (in_array($file_ext, $permited) === false) {
                return "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
               }
               else{
                    move_uploaded_file($file_temp, $move_image);
               
                    $qry = "INSERT into  image_table (caption,caption_two,brif,image_link) values('$caption','$caption_two','$brif','$uploaded_image')";
                    $result = $this->conn->query($qry);
                     
                    
                    if($result){
                        return "<script>window.location='images.php';</script>";
                    }
                } 
            }
                
        }
        public function createnewEmployee($data,$file)
        {
            $emp_name = mysqli_real_escape_string($this->conn, $data['emp_name']);
            $emp_job_status = mysqli_real_escape_string($this->conn, $data['emp_job_status']);
            $emp_email = mysqli_real_escape_string($this->conn, $data['emp_email']);
            $emp_phone = mysqli_real_escape_string($this->conn, $data['emp_phone']);
            $emp_salary = mysqli_real_escape_string($this->conn, $data['emp_salary']);
            $emp_address = mysqli_real_escape_string($this->conn, $data['emp_address']);
            $def="+8801";
            $mobileno = $def.$emp_phone;
            $query = "SELECT * FROM employee_table WHERE emp_email='$emp_email' OR emp_phone='$emp_phone'";
            $res = $this->conn->query($query);
            // $querya = "SELECT * FROM employee_table WHERE  mobile='$mobile'";
            // $resa = $this->conn->query($querya);
        
    
            if (empty($emp_name) || empty($emp_job_status) || empty($emp_email) || empty($emp_phone) || empty($emp_salary) || empty($emp_address)) {
                    $txt = "<div class='alert alert-danger'>Field must not be empty</div>";
                    return $txt;
            }elseif (!preg_match ("/^[a-zA-z ]*$/", $emp_name) ){
                $txt = "<span style='color:red; font-size: 15px;'>Only alphabets and whitespace are allowed For First name</span>";
                return $txt;
            } elseif (mysqli_num_rows($res)>0){
                $txt = "<span style='color:red; font-size: 15px;'>This Email Already been Registered </span>";
                return $txt;
            }
             elseif ( strlen ($emp_phone) != 9) {  
                return "<span style = 'color:red';>Mobile must have 9 digits.</span>";  
                         
            } elseif ( strlen ($emp_address) > 200) {  
                return "<span style = 'color:red';>200 Degit limitation</span>";  
                         
            } 
            
            else{
    
                $permited  = array('jpg', 'jpeg', 'png', 'gif');
                $file_name = $file['image']['name'];
                $file_size = $file['image']['size'];
                $file_temp = $file['image']['tmp_name'];
    
                $div            = explode('.', $file_name);
                $file_ext       = strtolower(end($div));
                $unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
                $uploaded_image = "img/".$unique_image;
                $move_image = "img/".$unique_image;
                
    
               
               if(empty($file_ext)){
                    $txt = "<span style='color:red; font-size: 15px;'>Image is required</span>";
                    return $txt;
               }
                if ($file_size >1048567) {
            return "<span class='error'>Image Size should be less then 1MB! </span>";
           } elseif (in_array($file_ext, $permited) === false) {
            return "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
           


               }else{
                    move_uploaded_file($file_temp, $move_image);
               
                    $qry = "INSERT into employee_table(emp_name,emp_job_status,emp_email,emp_phone,emp_image,emp_salary,emp_address) values('$emp_name','$emp_job_status','$emp_email','$mobileno','$uploaded_image','$emp_salary','$emp_address')";
                    $result = $this->conn->query($qry);
                    if ($emp_job_status=='Manager') {
                        $qry = "INSERT into admin_table(admin_email,admin_password,admin_status) values('$emp_email','12','1')";
                                        $result = $this->conn->query($qry);
                    }
                    
                    if($result){
                        $txt = "<div class='alert alert-success'>Successfully Employee Created</div>";
                        return $txt;
                    }
                }
                }
        }
        public function updateEmployee($data,$file)
        {
            $emp_name = mysqli_real_escape_string($this->conn, $data['emp_name']);
            $emp_job_status = mysqli_real_escape_string($this->conn, $data['emp_job_status']);
            $emp_email = mysqli_real_escape_string($this->conn, $data['emp_email']);
            $emp_phone = mysqli_real_escape_string($this->conn, $data['emp_phone']);
            $emp_salary = mysqli_real_escape_string($this->conn, $data['emp_salary']);
            $emp_address = mysqli_real_escape_string($this->conn, $data['emp_address']);
            $empid = mysqli_real_escape_string($this->conn, $data['emp_id']);
            $def="+8801";
            $mobileno = $def.$emp_phone;
           
         
            $permited  = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $file['image']['name'];
            $file_size = $file['image']['size'];
            $file_temp = $file['image']['tmp_name'];

            $div            = explode('.', $file_name);
            $file_ext       = strtolower(end($div));
            $unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "img/".$unique_image;
            $move_image = "img/".$unique_image;
           
    
            if (empty($emp_name) || empty($emp_job_status) || empty($emp_email) || empty($emp_phone) || empty($emp_salary) || empty($emp_address)) {
                    $txt = "<div class='alert alert-danger'>Field must not be empty</div>";
                    return $txt;
            }elseif (!preg_match ("/^[a-zA-z ]*$/", $emp_name) ){
                $txt = "<span style='color:red; font-size: 15px;'>Only alphabets and whitespace are allowed For First name</span>";
                return $txt;
            }
             elseif ( strlen ($emp_phone) != 9) {  
                return "<span style = 'color:red';>Mobile must have 9 digits.</span>";  
                         
            } elseif ( strlen ($emp_address) > 200) {  
                return "<span style = 'color:red';>200 Degit limitation</span>";  
                         
            } 
            
            elseif(empty($file_ext)){
                   
                $qry = "UPDATE employee_table 
                SET
                emp_name               = '$emp_name',
                emp_job_status         = '$emp_job_status', 
                emp_email              = '$emp_email',
                emp_phone          	   = '$mobileno', 
                emp_salary             = '$emp_salary',
                emp_address            = '$emp_address'
                WHERE emp_id        = '$empid'";
                $result = $this->conn->query($qry);
                if($result){
                    
                    return "<script>window.location='employee_list.php';</script>";
                }
               }else{
                  
               
                    $qry = "UPDATE employee_table 
                    SET
                    emp_name               = '$emp_name',
                    emp_job_status         = '$emp_job_status', 
                    emp_email              = '$emp_email',
                    emp_phone          	   = '$mobileno', 
                    emp_salary             = '$emp_salary',
                    emp_image             = '$uploaded_image',
                    emp_address            = '$emp_address'
                    WHERE emp_id        = '$empid'";
                    $result = $this->conn->query($qry);
                    
                    
                    if($result){
                        move_uploaded_file($file_temp, $move_image);
                        return "<script>window.location='employee_list.php';</script>";
                    }
                }
                
        }


        public function updateImage($data,$file,$id)
        {
            $caption = mysqli_real_escape_string($this->conn, $data['caption']);
            $caption_two = mysqli_real_escape_string($this->conn, $data['caption_two']);
            $brif = mysqli_real_escape_string($this->conn, $data['brif']);
     
           
         
            $permited  = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $file['image']['name'];
            $file_size = $file['image']['size'];
            $file_temp = $file['image']['tmp_name'];

            $div            = explode('.', $file_name);
            $file_ext       = strtolower(end($div));
            $unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "img/".$unique_image;
            $move_image = "img/".$unique_image;
           
    
            if (empty($caption) || empty($caption_two) || empty($brif)) {
                    $txt = "<div class='alert alert-danger'>Field must not be empty</div>";
                    return $txt;
            }elseif (!preg_match ("/^[a-zA-z ]*$/", $caption) ){
                $txt = "<span style='color:red; font-size: 15px;'>Only alphabets and whitespace are allowed For Caption one</span>";
                return $txt;
            }
            elseif (!preg_match ("/^[a-zA-z ]*$/", $caption_two) ){
                $txt = "<span style='color:red; font-size: 15px;'>Only alphabets and whitespace are allowed For caption_two</span>";
                return $txt;
            }
              
            
            elseif(empty($file_ext)){
                   
                $qry = "UPDATE image_table 
                SET
                caption               = '$caption',
                caption_two         = '$caption_two', 
                brif              = '$brif'
                WHERE image_id        = '$id'";
                $result = $this->conn->query($qry);
                if($result){
                    
                    return "<script>window.location='images.php';</script>";
                }
               }else{
                  
               
                    $qry = "UPDATE image_table 
                    SET
                    caption               = '$caption',
                    caption_two         = '$caption_two', 
                    brif              = '$brif',
                    image_link             = '$uploaded_image'
                    WHERE image_id        = '$id'";
                    $result = $this->conn->query($qry);
                    
                    
                    if($result){
                        move_uploaded_file($file_temp, $move_image);
                        return "<script>window.location='images.php';</script>";
                    }
                }
                
        }
        
        

        public function viewEmployee()
        {
            $qry = "SELECT * FROM employee_table";
            $result = $this->conn->query($qry);
            return $result;
        }
        public function viewEmployeebyid($id)
        {
            $qry = "SELECT * FROM employee_table where emp_id=$id ";
            $result = $this->conn->query($qry);
            return $result;
        }
        public function viewImageid($id)
        {
            $qry = "SELECT * FROM image_table where image_id=$id ";
            $result = $this->conn->query($qry);
            return $result;
        }
        public function alluser()
        {
            $qry = "SELECT * FROM user_table ";
            $result = $this->conn->query($qry);
            return $result;
        }

        // public function Payemployee($id)
        // {
        //     $month = mysqli_real_escape_string($this->db, $data['month']);
		// 	$year = mysqli_real_escape_string($this->db, $data['year']);
		// 	if (empty($month)|| empty($year)) {
		// 		$txt = "<span style = 'color:red';>No result Found</span>";
		// 		return $txt;
		// 	}else{
		// 		$qry = "SELECT * from salary_table LEFT JOIN employee_table ON employee_table.ID = salary_table.e_ID where  month like '%{$month}%' and  year like '%{$year}%' ";
		// 	$result = $this->db->query($qry);
		// 	return $result;
		// 	}
            
        // }
        public function viewSalary($month,$year){
			$qry = "SELECT * FROM salary_table LEFT JOIN employee_table ON employee_table.emp_id = salary_table.emp_id  where  month like '%{$month}%' and  year like '%{$year}%' ";
			$result = $this->conn->query($qry);
			return $result;
		}
        public function employeeViewbyid($id){
			$qry = "SELECT * from employee_table where emp_id = '$id'";
			$result = $this->conn->query($qry);
			$value = mysqli_fetch_assoc($result);
			return $value;
		}
        public function salaraycheck($emp_id)
        {
            $month = date('F');
            $year = date('Y');
            $result = $this->conn->query("SELECT * FROM salary_table WHERE month = '$month' && year = '$year' && emp_id = '$emp_id'");
            return mysqli_num_rows($result);
        }
        public function insertSalary($data){
			$emp_id = mysqli_real_escape_string($this->conn, $data['emp_id']);
			$month = mysqli_real_escape_string($this->conn, $data['month']);
			$salary = mysqli_real_escape_string($this->conn, $data['salary']);
			$year = mysqli_real_escape_string($this->conn, $data['year']);

			if (empty($salary) || empty($year)) {
				$txt = "<span style = 'color:red';>Field must not be empty</span>";
				return $txt;
			}else{
				$result = $this->conn->query("SELECT * FROM salary_table WHERE month = '$month' && year = '$year' && emp_id = '$emp_id'");
                
                if(mysqli_num_rows($result)>0){
                    $txt = "<div class='alert alert-danger'>Month and Year already exist</div>";
                    return $txt;
                }else{
					$qry = "INSERT into salary_table(emp_id,month,salary,year)
                	values('$emp_id','$month','$salary','$year')";
                	$result = $this->conn->query($qry);
					if($result){
						$txt = "<div class='alert alert-success'>Successfully inserted</div>";
                    	return $txt;
					}
					
				}
            }
		}
        public function trainer()
        {
            $qry = "SELECT * from employee_table where emp_job_status = 'Instructtor'";
			$result = $this->conn->query($qry);
            return $result;
        }
        public function viewimage()
        {
            $qry = "SELECT * from image_table";
			$result = $this->conn->query($qry);
            return $result;
        }
        public function deleteSalary($id){
			$qry = "DELETE FROM salary_table WHERE salary_id='$id'";
			$delsalary =$this->conn->query($qry);
			if($delsalary){
                $txt = "<span style='color:green; font-size: 15px;'>Successfully Deleted</span>";
                return $txt;
            }
           
		} 
        public function addratting($data,$userid,$empid){
                $star = mysqli_real_escape_string($this->conn, $data['star']);
                $qry = "SELECT * from check_table where emp_id = $empid and customer_id=$userid";
                $result = $this->conn->query($qry);
                $row = mysqli_num_rows($result);
                if (empty($star)) {
                    $txt = "<span style='color:green; font-size: 15px;'>Choose Ratting</span>";
                    return $txt;
                }elseif($row>0){
                    $txt = "<span style='color:green; font-size: 15px;'>Already Ratted</span>";
                    return $txt;
                }else{
                    $que = "SELECT * from employee_table where emp_id = $empid";
                    $res = $this->conn->query($que);
                    $val = mysqli_fetch_array($res);
                    $past_hit = $val['hit'];
                   $past_hit = $past_hit+1;
                    $past_rat = $val['total_rat'];
                    $qry = "UPDATE employee_table 
                    SET
                    total_rat                = $past_rat+$star,
                    hit                = '$past_hit'
                    WHERE emp_id        = $empid";
            $result = $this->conn->query($qry);

            $ins = "INSERT into check_table(emp_id,customer_id)
                	values('$empid','$userid')";
                	$this->conn->query($ins);



            if($result === TRUE){
                $txt = "<div class='alert alert-success'> Ratting Successfull</div>";
                return $txt;
            }
                }
            }

           

}




