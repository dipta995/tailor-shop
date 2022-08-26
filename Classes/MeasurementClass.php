<?php 
include_once 'db.php';
class MeasurementClass extends DB
{
    public $db;
        public function __construct()
    {
        $conn = $this->connect();
    }
    
    // Add Measurement
    public function addMeasurement($data){
        $cus_id                = mysqli_real_escape_string($this->conn, $data['cus_id']);
        $measurement_for       = mysqli_real_escape_string($this->conn, $data['measurement_for']);
        $measurement_details   = mysqli_real_escape_string($this->conn, $data['measurement_details']);

        if (empty($cus_id) || empty($measurement_for) || empty($measurement_details)) {
            $txt = "<div class='alert alert-danger'>Field must not be empty!</div>";
            return $txt;
        } else{
            $query = "INSERT into tbl_measurement(cus_id, measurement_for, measurement_details) values('$cus_id', '$measurement_for', '$measurement_details')";
            $result = $this->conn->query($query);
            if($result){
                $txt = "<div class='alert alert-success'>Successfully Inserted!</div>";
                return $txt;
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

    // View Measurement
    public function viewMeasurement(){
        $query  = "SELECT tbl_measurement.*, tbl_customer.cus_name FROM tbl_measurement INNER JOIN tbl_customer ON 
        tbl_measurement.cus_id = tbl_customer.cus_id WHERE tbl_measurement.soft_delete = 0 ORDER By tbl_measurement.id";
        $result = $this->conn->query($query);
        return $result;
    }

    // Update Measurement
    public function updateMeasurement($data, $mesid){
        $cus_id                = mysqli_real_escape_string($this->conn, $data['cus_id']);
        $measurement_for       = mysqli_real_escape_string($this->conn, $data['measurement_for']);
        $measurement_details   = mysqli_real_escape_string($this->conn, $data['measurement_details']);

        if (empty($cus_id) || empty($measurement_for) || empty($measurement_details)) {
            $txt = "<div class='alert alert-danger'>Field must not be empty!</div>";
            return $txt;
        } else {
            $query = "UPDATE tbl_measurement
            SET 
            cus_id              = '$cus_id',
            measurement_for     = '$measurement_for',
            measurement_details = '$measurement_details'         
            WHERE id            = '$mesid'";

            $result = $this->conn->query($query);
            if ($result) {
                echo $txt = "<div class='alert alert-success'>Successfully updated!</div>";
            }
        }        
    }

    // View Single Measurement
    public function viewSingleMeasurement($mesid){
        $query  = "SELECT * FROM tbl_measurement WHERE id='$mesid'";
        $result = $this->conn->query($query);
        return $result;
    }

    // Delete Measurement
    public function deleteMeasurement($id){        
        $query = "UPDATE tbl_measurement
                SET
                soft_delete  = '1'
                WHERE id     = $id";
        $result = $this->conn->query($query);
        if($result === TRUE){
            echo $txt = "<div class='alert alert-success'>Successfully Deleted!</div>";
        }
    }
}

