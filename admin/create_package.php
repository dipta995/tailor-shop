<?php include 'layouts/header.php';
 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $createPackage = $pack->insertPackage($_POST);
}
?>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Add New Package</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item">Package</li>
      <li class="breadcrumb-item active" aria-current="page">Create Package</li>
    </ol>
  </div>

  <div class="row">
      <div class="col-lg-2"></div>
    <div class="col-lg-8">
      <!-- Form Basic -->
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Add New Package</h6>
        </div>
        <?php if (isset($createPackage)){
                    echo $createPackage;
        }  ?>
        <div class="card-body">
          <form method="POST">
            <div class="form-group">
              <label>Package Name</label>
              <input name="pack_name" type="text" class="form-control" placeholder="Enter package">
            </div>
            <div class="form-group">
              <label>Details</label>
              <textarea class="ckeditor form-control" id="myEditor" name="details" cols="" rows="3"></textarea>
              <!-- <textarea name="details" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Package Description"></textarea> -->
            </div>
            <div class="form-group">
              <label>Month</label>
              <input name="month" type="number" class="form-control" placeholder="Enter month" min="3">
            </div>
            <div class="form-group">
              <label>Price (tk)</label>
              <input name="price" type="number" class="form-control" placeholder="Enter price" min="0">
            </div>
            <div class="form-group">
              <label>Discount (%)</label>
              <input name="discount" type="number" min="0" step="1" value="0" class="form-control" placeholder="Enter discount">
            </div>
          
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
 

 
<script type="text/javascript"> 
//<![CDATA[

	CKEDITOR.replace( 'myEditor',
		{
			fullPage : true,
			uiColor : '#efe8ce'
		});
//]]>
</script> -->
<!---Container Fluid-->
<?php include 'layouts/footer.php';?>