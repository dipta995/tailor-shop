<?php include 'layouts/header.php';
 
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $addMeasurement = $measure->addMeasurement($_POST);
  }

?>

<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Add Customer Measurement</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item">Take Measurement</li>
      <li class="breadcrumb-item active" aria-current="page">Add Customer Measurement</li>
    </ol>
  </div>

  <div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
      <!-- Form Basic -->
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Add Customer Measurement</h6>
        </div>
        <?php 
          if (isset($addMeasurement)){
              echo $addMeasurement;
          }  
        ?>
        <div class="card-body">
          <form method="POST" enctype="multipart/form-data">
          
          <div class="form-group">
            <label>Customer ID</label><br>
            <select id="select" name="cus_id">
              <option>Select Customer</option>
              <?php
                $query = "select * from tbl_customer where soft_delete=0";
                $cusid = $cloth -> select($query);
                if($cusid){
                    while($result = $cusid->fetch_assoc()){                             
              ?>
              <option value="<?php echo $result['cus_id'];?>"><?php echo $result['cus_name'];?></option>
              <?php } } ?>
            </select>
          </div>

          <div class="form-group">
            <label>Measurement For</label>
            <input name="measurement_for" type="text" class="form-control" placeholder="">
          </div>

          <div class="form-group">
            <label>Measurement Details</label>
            <textarea class="ckeditor form-control" id="myEditor" name="measurement_details" cols="" rows="3" placeholder="Enter Measurement Details"></textarea>
          </div> 
        
          <button type="submit" class="btn btn-primary">Submit</button>
          
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include 'layouts/footer.php';?>