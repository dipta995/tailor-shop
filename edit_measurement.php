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
    <h1 class="h3 mb-0 text-gray-800">Update Customer</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item">Customer Details</li>
      <li class="breadcrumb-item active" aria-current="page">Update Customer</li>
    </ol>
  </div>

  <div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
      <!-- Form Basic -->
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Update Customer</h6>
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
              <label>Customer ID</label>
              <input name="cus_id" value="<?php echo $value['cus_id']?>" type="text" class="form-control" >
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