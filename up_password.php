<?php include 'layouts/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $updatePassword = $create->updatePassword($_POST, $id);
}
?>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Password</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
     
      <li class="breadcrumb-item active" aria-current="page">password</li>
    </ol>
  </div>
 
  <div class="row">
      <div class="col-lg-2"></div>
    <div class="col-lg-8">
      <!-- Form Basic -->
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Password Update</h6>
        </div>
        <?php if (isset($updatePassword)){
                    echo $updatePassword;
        }  ?>
        <div class="card-body">
          <form method="POST">
            <div class="form-group">
              <label>New Password</label>
             
              <input name="password"  class="form-control" type="password" >
            </div>
            <div class="form-group">
              <label>Confirm Password</label>
              <input name="password1"  class="form-control" type="password" >
               
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!---Container Fluid-->
<?php include 'layouts/footer.php';?>