<?php include 'layouts/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $adduser = $create->insertAdmin($_POST);
}

?>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Create Admin</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item">Admin</li>
      <li class="breadcrumb-item active" aria-current="page">Create Admin</li>
    </ol>
  </div>

  <div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
      <!-- Form Basic -->
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Create Admin</h6>
        </div>
        <?php
        if (isset($adduser)) {
          echo $adduser;
        }
        ?>
        <div class="card-body">
          <form method="POST" enctype="multipart/form-data">

            <div class="form-group">
              <label>First Name</label>
              <input name="first_name" type="text" class="form-control" placeholder="Enter first name">
            </div>

            <div class="form-group">
              <label>Last Name</label>
              <input name="last_name" type="text" class="form-control" placeholder="Enter last name">
            </div>

            <div class="form-group">
              <label>Email</label>
              <input name="email" type="email" class="form-control" placeholder="Enter email address">
            </div>

            <div class="form-group">
              <label>Password</label>
              <input name="password" type="text" class="form-control" placeholder="Enter password">
            </div>

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">+8801</span>
              </div>
              <input type="number" min=0 class="form-control" placeholder="" name="phone" aria-label="Username" aria-describedby="basic-addon1">
            </div>

            <div class="form-group">
              <label>Admin Role</label><br>
              <select id="select" name="role" class="form-control">
                <option>Select Admin Role</option>
                <option value="0">Super Admin</option>
                <option value="1">Admin</option>
                <option value="2">Employee</option>
              </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include 'layouts/footer.php'; ?>