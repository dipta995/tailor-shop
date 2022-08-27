<?php include 'layouts/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $addCloth = $cloth->insertCloth($_POST);
}

?>

<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Add New Cloth</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item">Cloth Details</li>
      <li class="breadcrumb-item active" aria-current="page">Add New Cloth</li>
    </ol>
  </div>

  <div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
      <!-- Form Basic -->
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Add New Cloth</h6>
        </div>
        <?php
        if (isset($addCloth)) {
          echo $addCloth;
        }
        ?>
        <div class="card-body">
          <form method="POST" enctype="multipart/form-data">

            <div class="form-group">
              <label>Cloth Name</label>
              <input name="cloth_name" type="text" class="form-control" placeholder="Enter Cloth Name">
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
                    <option value="<?php echo $result['id']; ?>"><?php echo $result['name']; ?></option>
                <?php }
                } ?>
              </select>
            </div>

            <div class="form-group">
              <label>Cloth Details</label>
              <textarea class="ckeditor form-control" id="myEditor" name="details" cols="" rows="3"></textarea>
            </div>

            <div class="form-group">
              <label>Upload Image</label>
              <td>
                <input type="file" name="image" class="form-control" placeholder="Enter Image" min="0" />
              </td>
            </div>

            <div class="form-group">
              <label>Stock</label>
              <input name="stock" type="text" class="form-control" placeholder="Cloth in Stock">
            </div>

            <div class="form-group">
              <label>Color</label>
              <input name="color" type="color" class="form-control" placeholder="Enter Cloth Color">
            </div>

            <div class="form-group">
              <label>Brand</label>
              <input name="brand" type="text" class="form-control" placeholder="Enter Cloth Brand">
            </div>

            <div class="form-group">
              <label>Buying Price (BDT) Per Yard (1 Yard = 3 Feet)</label>
              <input name="buying_price" type="number" class="form-control" placeholder="Enter price" min="0">
            </div>

            <div class="form-group">
              <label>Selling Price (BDT) Per Yard (1 Yard = 3 Feet)</label>
              <input name="selling_price" type="number" class="form-control" placeholder="Enter price" min="0">
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

<?php include 'layouts/footer.php'; ?>