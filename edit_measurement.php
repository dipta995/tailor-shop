<?php include 'layouts/header.php';
 
$mesid = "";
if($_GET['mesid']==NULL || !isset($_GET['mesid'])){
	"<script>window.location = 'view_measurement.php'; </script>"; 
}else{
	$mesid = $_GET['mesid'];
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $updateMeasurement = $measure->updateMeasurement($_POST, $mesid);
}
?>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Update Measurement</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item">Measurement</li>
      <li class="breadcrumb-item active" aria-current="page">Update Measurement</li>
    </ol>
  </div>

  <div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
      <!-- Form Basic -->
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Update Customer Measurement</h6>
        </div>
        <?php
          if(isset($updateMeasurement)){
              echo $updateMeasurement;
          }
        ?>
        <div class="card-body">
          <form method="POST" enctype="multipart/form-data">
            <?php 
                $view = $measure->viewSingleMeasurement($mesid);
                if($view){
                    while($value = $view->fetch_assoc()){
            ?>
                <div class="form-group">
                  <label>Customer Name</label><br>
                  <select id="select" name="cus_id" class="form-control">
                    <?php
                        $query = "select * from tbl_customer where soft_delete=0";
                        $cusid = $cart -> select($query);
                        if($cusid){
                            while($result = $cusid->fetch_assoc()){                             
                    ?>
                    <option 
                    <?php
                        if($value['cus_id'] == $result['cus_id']){ ?>
                            selected = "selected"
                    <?php } ?>
                      value="<?php echo $result['cus_id'];?>"><?php echo $result['cus_name'];?>
                    </option>
                    <?php } } ?>
                  </select>
                </div>

            <div class="form-group">
              <label>Measurement For</label>
              <input name="measurement_for" value="<?php echo $value['measurement_for']?>" type="text" class="form-control" >
            </div>

            <div class="form-group">
              <label>Measurement Details</label>
              <textarea class="ckeditor form-control"  name="measurement_details" cols="" rows="3"><?php echo $value['measurement_details']?></textarea>
            </div>

            <?php } } ?>
            
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!---Container Fluid-->
<?php include 'layouts/footer.php';?>