<?php include 'layouts/header.php';

$clothid = "";
if ($_GET['clothid'] == NULL || !isset($_GET['clothid'])) {
  "<script>window.location = 'all_cloth.php'; </script>";
} else {
  $clothid = $_GET['clothid'];
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $updateCloth = $cloth->updateCloth($_POST, $clothid);
}
?>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Update Cloth</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item">Cloth Type</li>
      <li class="breadcrumb-item active" aria-current="page">Update Cloth</li>
    </ol>
  </div>

  <div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
      <!-- Form Basic -->
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Update Cloth</h6>
        </div>
        <?php
        if (isset($updateCloth)) {
          echo $updateCloth;
        }
        ?>
        <div class="card-body">
          <form method="POST" enctype="multipart/form-data">
            <?php
            $view = $cloth->viewSingleCloth($clothid);
            if ($view) {
              while ($value = $view->fetch_assoc()) {
            ?>

                <div class="form-group">
                  <label>Cloth Name</label>
                  <input name="cloth_name" type="text" class="form-control" value="<?php echo $value['cloth_name']; ?>">
                </div>

                <div class="form-group">
                  <label>Cloth Type</label><br>
                  <select id="select" name="type" class="form-control">
                    <option>Select Type</option>
                    <?php
                    $query = "select * from cloth_type where soft_delete=0";
                    $type = $cloth->select($query);
                    if ($type) {
                      while ($result = $type->fetch_assoc()) {
                    ?>
                        <option <?php
                                if ($value['type'] == $result['id']) { ?> selected="selected" <?php } ?> value="<?php echo $result['id']; ?>"><?php echo $result['name']; ?>
                        </option>
                    <?php }
                    } ?>
                  </select>
                </div>

                <div class="form-group">
                  <label>Cloth Details</label>
                  <textarea name="details" class="form-control" id="exampleFormControlTextarea1" rows="3"><?php echo $value['details']; ?></textarea>
                </div>

                <div class="form-group">
                  <label>Upload Image</label>
                  <br>
                  <td>
                    <img src="<?php echo $value['image']; ?>" height="80px" width="150px" /></br>
                    <input type="file" name="image" class="form-control" placeholder="Enter Image" min="0" />
                  </td>
                </div>

                <div class="form-group">
                  <label>Stock</label>
                  <input name="stock" type="text" class="form-control" value="<?php echo $value['stock']; ?>">
                </div>

                <div class="form-group">
                  <label>Color</label>
                  <input name="color" type="color" class="form-control" value="<?php echo $value['color']; ?>">
                </div>

                <div class="form-group">
                  <label>Brand</label>
                  <input name="brand" type="text" class="form-control" value="<?php echo $value['brand']; ?>">
                </div>

                <div class="form-group">
                  <label>Buying Price (BDT) Per Yard (1 Yard = 3 Feet)</label>
                  <input name="buying_price" type="number" class="form-control" value="<?php echo $value['buying_price']; ?>" min="0">
                </div>

                <div class="form-group">
                  <label>Selling Price (BDT) Per Yard (1 Yard = 3 Feet)</label>
                  <input name="selling_price" type="number" class="form-control" value="<?php echo $value['selling_price']; ?>" min="0">
                </div>

                <div class="form-group">
                  <label>Discount (%)</label>
                  <input name="discount" type="number" min="0" step="1" class="form-control" value="<?php echo $value['discount']; ?>">
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