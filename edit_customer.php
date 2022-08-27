<?php include 'layouts/header.php';

$customerid = "";
if ($_GET['customerid'] == NULL || !isset($_GET['customerid'])) {
  "<script>window.location = 'customer_list.php'; </script>";
} else {
  $customerid = $_GET['customerid'];
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $updateCustomer = $customer->updateCustomer($_POST, $customerid);
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
        if (isset($updateCustomer)) {
          echo $updateCustomer;
        }
        ?>
        <div class="card-body">
          <form method="POST" enctype="multipart/form-data">
            <?php
            $view = $customer->viewSingleCustomer($customerid);
            if ($view) {
              while ($value = $view->fetch_assoc()) {
            ?>
                <div class="form-group">
                  <label>Name</label>
                  <input name="cus_name" value="<?php echo $value['cus_name'] ?>" type="text" class="form-control">
                </div>

                <div class="form-group">
                  <label>Email</label>
                  <input readonly name="cus_email" value="<?php echo $value['cus_email'] ?>" type="email" class="form-control" placeholder="Enter email">
                </div>

                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">+8801</span>
                  </div>
                  <input value="<?php echo substr($value['cus_phone'], 5); ?>" type="number" min=0 class="form-control" placeholder="" name="cus_phone" aria-label="Username" aria-describedby="basic-addon1">
                </div>

                <div class="form-group">
                  <label>Address</label>
                  <textarea class="ckeditor form-control" name="cus_address" cols="" rows="3"><?php echo $value['cus_address'] ?></textarea>
                </div>

            <?php }
            } ?>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!---Container Fluid-->
<?php include 'layouts/footer.php'; ?>