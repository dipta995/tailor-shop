<?php include 'layouts/header.php';
 
$packageid = "";
if($_GET['packageid']==NULL || !isset($_GET['packageid'])){
	"<script>window.location = 'all_package.php'; </script>"; 
}else{
	$packageid = $_GET['packageid'];
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $updatePackage = $pack->updatePackage($_POST,$packageid);
}
?>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Package</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item">Package</li>
      <li class="breadcrumb-item active" aria-current="page">Edit Package</li>
    </ol>
  </div>

  <div class="row">
      <div class="col-lg-2"></div>
    <div class="col-lg-8">
      <!-- Form Basic -->
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Edit Package</h6>
        </div>
        <?php
            if(isset($updatePackage)){
                echo $updatePackage;
            }
        ?>
        <div class="card-body">
          <form method="POST">
            <?php 
                $view = $pack->viewSinglePackage($packageid);
                if($view){
                    while($value = $view->fetch_assoc()){
            ?>
            <div class="form-group">
              <label>Package Name</label>
              <input name="pack_name" type="text" class="form-control" value="<?php echo $value['pack_name'];?>">
            </div>
            <div class="form-group">
              <label>Details</label>
              <textarea name="details" class="form-control" id="exampleFormControlTextarea1" rows="3"><?php echo $value['details'];?></textarea>
            </div>
            <div class="form-group">
              <label>Month</label>
              <select name="month" class="form-control" id="exampleFormControlSelect1">
              <option><?php echo $value['month'];?></option>
                <option>January</option>
                <option>February</option>
                <option>March</option>
                <option>April</option>
                <option>May</option>
                <option>June</option>
                <option>July</option>
                <option>August</option>
                <option>September</option>
                <option>October</option>
                <option>November</option>
                <option>December</option>
              </select>
            </div>
            <div class="form-group">
              <label>Price (tk)</label>
              <input name="price" type="number" class="form-control" value="<?php echo $value['price'];?>" min="0">
            </div>
            <div class="form-group">
              <label>Discount (%)</label>
              <input name="discount" type="number" min="0" step="1"  class="form-control" value="<?php echo $value['discount'];?>">
            </div>
 
            <?php }} ?>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!---Container Fluid-->
<?php include 'layouts/footer.php';?>