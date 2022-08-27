<?php include 'layouts/header.php';

if (isset($_POST['submit'])) {
  echo "<script> window.location='users.php'; </script>";
}
?>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Admin Profile</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item">Admin Details</li>
      <li class="breadcrumb-item active" aria-current="page">Admin Profile</li>
    </ol>
  </div>

  <div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
      <!-- Form Basic -->
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Admin Profile</h6>
        </div>
        <div>

          <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
              <?php
              $query = "select * from tbl_admin where id='$id'";
              $view = $create->select($query);
              if ($view) {
                while ($value = $view->fetch_assoc()) {
              ?>

                  <div class="form-group">
                    <label>First Name</label>
                    <input readonly name="first_name" type="text" class="form-control" value="<?php echo $value['first_name']; ?>">
                  </div>

                  <div class="form-group">
                    <label>Last Name</label>
                    <input readonly name="last_name" type="text" class="form-control" value="<?php echo $value['last_name']; ?>">
                  </div>

                  <div class="form-group">
                    <label>Email Address</label>
                    <input readonly name="email" type="email" class="form-control" value="<?php echo $value['email']; ?>">
                  </div>

                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">+8801</span>
                    </div>
                    <input readonly value="<?php echo substr($value['phone'], 5); ?>" type="number" min=0 class="form-control" placeholder="" name="phone" aria-label="Username" aria-describedby="basic-addon1">
                  </div>

                  <div class="form-group">
                    <label>Admin Role</label>
                    <div name="role" type="text" class="form-control">
                      <?php
                      if ($value['role'] == '0') {
                        echo "Super Admin";
                      } elseif ($value['role'] == '1') {
                        echo "Admin";
                      } elseif ($value['role'] == '2') {
                        echo "Employee";
                      } else {
                        echo "Role Not found!";
                      }
                      ?>
                    </div>
                  </div>
              <?php }
              } ?>
              <button type="submit" name="submit" class="btn btn-primary">OK</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!---Container Fluid-->
  <?php include 'layouts/footer.php'; ?>