<?php include 'layouts/header.php';
 if (!isset($_GET['empid']) || empty($_GET['empid'])) {
    "<script>window.location = 'employee_list.php'; </script>"; 
 }else{
     $empid = $_GET['empid'];
 }
 
 $view = $emp->viewEmployeebyid($empid);
 
     $value = mysqli_fetch_array($view);
 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $createPackage = $emp->updateEmployee($_POST,$_FILES);
}
?>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Update Employee</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item">Employee</li>
      <li class="breadcrumb-item active" aria-current="page">Update Employee</li>
    </ol>
  </div>

  <div class="row">
      <div class="col-lg-2"></div>
    <div class="col-lg-8">
      <!-- Form Basic -->
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Update Employee</h6>
        </div>
        <?php if (isset($createPackage)){
                    echo $createPackage;
        }  ?>
        <div class="card-body" >
          <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label>Employee Name</label>
              <input name="emp_name" value="<?php echo $value['emp_name']?>" type="text" class="form-control" >
              <input name="emp_id" value="<?php echo $empid; ?>" type="hidden" class="form-control" >
            </div>
            <div class="form-group">
              <label>Email</label>
              <input readonly name="emp_email" value="<?php echo $value['emp_email']?>" type="email" class="form-control" placeholder="Enter email" >
            </div>
            <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">+8801</span>
                      </div>
                      <input value="<?php echo substr($value['emp_phone'],5); ?>" type="number" min=0 class="form-control" placeholder="" name="emp_phone" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
            <div class="form-group">
              <label>Job Status</label>
                <select name="emp_job_status" class="form-control">
                <option value="<?php echo $value['emp_job_status']?>"><?php echo $value['emp_job_status']?></option>
                    <option value="Instructtor">Instructtor</option>
                    <option value="Manager">Manager</option>
                    <option value="Cleaner">Cleaner</option>
                </select>
            </div>
            <div class="form-group">
              <label>Salary</label>
              <input name="emp_salary" value="<?php echo $value['emp_salary']?>" type="text" class="form-control" placeholder="Enter Salary">
            </div>
            <div class="form-group">
              <label>Image</label>
              <input name="image" type="file" class="form-control">
              <img src="<?php echo $value['emp_image']?>" style="height: 100px;width: 100px;" alt="">
            </div>
            <div class="form-group">
              <label>Address</label>
              <textarea class="ckeditor form-control"  name="emp_address" cols="" rows="3"><?php echo $value['emp_address']?></textarea>
              <!-- <textarea name="details" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Package Description"></textarea> -->
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