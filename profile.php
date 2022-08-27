<?php include 'layouts/header.php';

if (isset($_POST['submit'])) {
  echo "<script> window.location='index.php'; </script>";
}
?>

<?php
$role = $_SESSION['role'];
$id = $_SESSION['id'];
?>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Admin Profile</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item">Admin</li>
      <li class="breadcrumb-item active" aria-current="page">Admin Profile</li>
    </ol>
  </div>

  <div class="card-body">
    <form method="POST" enctype="multipart/form-data">
      <?php
      $query = "select * from tbl_admin where id ='$id' AND role='$role'";
      $view = $create->select($query);
      if ($view) {
        while ($value = $view->fetch_assoc()) {

      ?>
          <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" value="<?php echo $value['first_name'] . " " . $value['last_name']; ?>">
          </div>

          <div class="form-group">
            <label>Email Address</label>
            <input readonly name="email" type="email" class="form-control" value="<?php echo $value['email']; ?>">
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">+8801</span>
            </div>
            <input value="<?php echo substr($value['phone'], 5); ?>" type="number" min=0 class="form-control" placeholder="" name="phone" aria-label="Username" aria-describedby="basic-addon1">
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
<!---Container Fluid-->
<?php include 'layouts/footer.php'; ?>