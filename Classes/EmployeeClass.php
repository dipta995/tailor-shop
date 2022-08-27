<?php
include_once 'db.php';
class EmployeeClass extends DB
{
    public $db;
    public function __construct()
    {
        $conn = $this->connect();
    }

    public function createnewEmployee($data, $file)
    {
        $emp_name       = mysqli_real_escape_string($this->conn, $data['emp_name']);
        $emp_job_status = mysqli_real_escape_string($this->conn, $data['emp_job_status']);
        $emp_email      = mysqli_real_escape_string($this->conn, $data['emp_email']);
        $emp_phone      = mysqli_real_escape_string($this->conn, $data['emp_phone']);
        $emp_salary     = mysqli_real_escape_string($this->conn, $data['emp_salary']);
        $emp_address    = mysqli_real_escape_string($this->conn, $data['emp_address']);
        $def = "+8801";
        $mobileno = $def . $emp_phone;
        $query = "SELECT * FROM employee_table WHERE emp_email='$emp_email' OR emp_phone='$emp_phone'";
        $res = $this->conn->query($query);

        if (empty($emp_name) || empty($emp_job_status) || empty($emp_email) || empty($emp_phone) || empty($emp_salary) || empty($emp_address)) {
            $txt = "<div class='alert alert-danger'>Field must not be empty!</div>";
            return $txt;
        } elseif (!preg_match("/^[a-zA-z ]*$/", $emp_name)) {
            $txt = "<div class='alert alert-danger'>Only alphabets and whitespace are allowed for first name!</div>";
            return $txt;
        } elseif (mysqli_num_rows($res) > 0) {
            $txt = "<div class='alert alert-danger'>This Email has already been Registered!</div>";
            return $txt;
        } elseif (strlen($emp_phone) != 9) {
            $txt = "<div class='alert alert-danger'>Mobile must have 9 digits!</div>";
            return $txt;
        } elseif (strlen($emp_address) > 200) {
            $txt = "<div class='alert alert-danger'>200 Digit limitation!</div>";
            return $txt;
        } else {
            $permited  = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $file['image']['name'];
            $file_size = $file['image']['size'];
            $file_temp = $file['image']['tmp_name'];

            $div            = explode('.', $file_name);
            $file_ext       = strtolower(end($div));
            $unique_image   = substr(md5(time()), 0, 10) . '.' . $file_ext;
            $uploaded_image = "img/" . $unique_image;

            if (empty($file_ext)) {
                $txt = "<div class='alert alert-danger'>Image is required!</div>";
                return $txt;
            } elseif ($file_size > 1048567) {
                $txt = "<div class='alert alert-danger'>Image Size should be less then 1MB!</div>";
                return $txt;
            } elseif (in_array($file_ext, $permited) === false) {
                $txt = "<div class='alert alert-danger'>You can upload only: " . implode(', ', $permited) . "</div>";
                return $txt;
            } else {
                move_uploaded_file($file_temp, $uploaded_image);
                $qry = "INSERT into employee_table(emp_name,emp_job_status,emp_email,emp_phone,emp_image,emp_salary,emp_address) values('$emp_name','$emp_job_status','$emp_email','$mobileno','$uploaded_image','$emp_salary','$emp_address')";
                $result = $this->conn->query($qry);
                if ($emp_job_status == 'Manager') {
                    $qry = "INSERT into admin_table(admin_email,admin_password,admin_status) values('$emp_email','12','1')";
                    $result = $this->conn->query($qry);
                } elseif ($result) {
                    $txt = "<div class='alert alert-success'>Employee Created Successfully.</div>";
                    return $txt;
                }
            }
        }
    }

    public function updateEmployee($data, $file)
    {
        $emp_name       = mysqli_real_escape_string($this->conn, $data['emp_name']);
        $emp_job_status = mysqli_real_escape_string($this->conn, $data['emp_job_status']);
        $emp_email      = mysqli_real_escape_string($this->conn, $data['emp_email']);
        $emp_phone      = mysqli_real_escape_string($this->conn, $data['emp_phone']);
        $emp_salary     = mysqli_real_escape_string($this->conn, $data['emp_salary']);
        $emp_address    = mysqli_real_escape_string($this->conn, $data['emp_address']);
        $empid          = mysqli_real_escape_string($this->conn, $data['emp_id']);
        $def = "+8801";
        $mobileno = $def . $emp_phone;

        $permited  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $file['image']['name'];
        $file_size = $file['image']['size'];
        $file_temp = $file['image']['tmp_name'];

        $div            = explode('.', $file_name);
        $file_ext       = strtolower(end($div));
        $unique_image   = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "img/" . $unique_image;


        if (empty($emp_name) || empty($emp_job_status) || empty($emp_email) || empty($emp_phone) || empty($emp_salary) || empty($emp_address)) {
            $txt = "<div class='alert alert-danger'>Field must not be empty!</div>";
            return $txt;
        } elseif (!preg_match("/^[a-zA-z ]*$/", $emp_name)) {
            $txt = "<div class='alert alert-danger'>Only alphabets and whitespace are allowed for first name!</div>";
            return $txt;
        } elseif (strlen($emp_phone) != 9) {
            $txt = "<div class='alert alert-danger'>Mobile must have 9 digits!</div>";
            return $txt;
        } elseif (strlen($emp_address) > 200) {
            $txt = "<div class='alert alert-danger'>200 Digit limitation!</div>";
            return $txt;
        } elseif (!empty($file_name)) {
            if ($file_size > 1048567) {
                $txt = "<div class='alert alert-danger'>Image Size should be less then 1MB!</div>";
                return $txt;
            } elseif (in_array($file_ext, $permited) === false) {
                $txt = "<div class='alert alert-danger'>You can upload only: " . implode(', ', $permited) . "</div>";
                return $txt;
            } else {
                move_uploaded_file($file_temp, $uploaded_image);
                $qry = "UPDATE employee_table 
                SET
                emp_name               = '$emp_name',
                emp_job_status         = '$emp_job_status', 
                emp_email              = '$emp_email',
                emp_phone          	   = '$mobileno', 
                emp_salary             = '$emp_salary',
                emp_image              = '$uploaded_image',
                emp_address            = '$emp_address'
                WHERE emp_id           = '$empid'";
                $result = $this->conn->query($qry);
                if ($result) {
                    $txt = "<div class='alert alert-success'>Updated Successfully.</div>";
                    return $txt;
                }
            }
        } else {
            $qry = "UPDATE employee_table 
            SET
            emp_name               = '$emp_name',
            emp_job_status         = '$emp_job_status', 
            emp_email              = '$emp_email',
            emp_phone          	   = '$mobileno', 
            emp_salary             = '$emp_salary',
            emp_address            = '$emp_address'
            WHERE emp_id           = '$empid'";
            $result = $this->conn->query($qry);
            if ($result) {
                $txt = "<div class='alert alert-success'>Updated Successfully.</div>";
                return $txt;
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


    public function Payemployee($data)
    {
        $month = mysqli_real_escape_string($this->db, $data['month']);
        $year  = mysqli_real_escape_string($this->db, $data['year']);
        if (empty($month) || empty($year)) {
            $txt = "<div class='alert alert-danger'>No Result Found!</div>";
            return $txt;
        } else {
            $qry = "SELECT * from salary_table LEFT JOIN employee_table ON employee_table.ID = salary_table.e_ID where  month like '%{$month}%' and  year like '%{$year}%' ";
            $result = $this->db->query($qry);
            return $result;
        }
    }

    public function viewSalary($month, $year)
    {
        $qry = "SELECT * FROM salary_table LEFT JOIN employee_table ON employee_table.emp_id = salary_table.emp_id  where  month like '%{$month}%' and  year like '%{$year}%' ";
        $result = $this->conn->query($qry);
        return $result;
    }

    public function employeeViewbyid($id)
    {
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
        $value = mysqli_num_rows($result);
        return $value;
    }

    // Insert Salary
    public function insertSalary($data)
    {
        $emp_id = mysqli_real_escape_string($this->conn, $data['emp_id']);
        $month  = mysqli_real_escape_string($this->conn, $data['month']);
        $salary = mysqli_real_escape_string($this->conn, $data['salary']);
        $year   = mysqli_real_escape_string($this->conn, $data['year']);

        if (empty($salary) || empty($year)) {
            $txt = "<div class='alert alert-danger'>Field must not be empty!</div>";
            return $txt;
        } else {
            $result = $this->conn->query("SELECT * FROM salary_table WHERE month = '$month' && year = '$year' && emp_id = '$emp_id'");

            if (mysqli_num_rows($result) > 0) {
                $txt = "<div class='alert alert-danger'>Month and Year already exist!</div>";
                return $txt;
            } else {
                $qry = "INSERT into salary_table(emp_id, month, salary, year)
                values('$emp_id','$month','$salary','$year')";
                $result = $this->conn->query($qry);
                if ($result) {
                    $txt = "<div class='alert alert-success'>Successfully Inserted.</div>";
                    return $txt;
                }
            }
        }
    }

    // Delete Salary
    public function deleteSalary($id)
    {
        $qry = "DELETE FROM salary_table WHERE salary_id='$id'";
        $delsalary = $this->conn->query($qry);
        if ($delsalary) {
            $txt = "<div class='alert alert-success'>Successfully Deleted.</div>";
            return $txt;
        } else {
            $txt = "<div class='alert alert-danger'>Something went wrong!</div>";
            return $txt;
        }
    }

    // Remove Employee
    public function removeEmp($id)
    {
        $qry = "DELETE  FROM employee_table WHERE emp_id=$id";
        $result = $this->conn->query($qry);
        if ($result) {
            $txt = "<div class='alert alert-success'>Employee Removed Successfully.</div>";
            return $txt;
        } else {
            $txt = "<div class='alert alert-danger'>Something went wrong!</div>";
            return $txt;
        }
    }
}
