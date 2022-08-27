<?php include 'layouts/header.php';

if (isset($_GET['delCloth'])) {
    $delCloth = $_GET['delCloth'];
    $delete = $cloth->deleteCloth($delCloth);
    echo $delete;
}

?>

<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Existing Cloth</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item">Cloth Details</li>
            <li class="breadcrumb-item active" aria-current="page">View Existing Cloth</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-12 mb-4">
            <!-- Simple Tables -->
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Existing Cloth</h6>
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th>SL No.</th>
                                <th>Name</th>
                                <th>Details</th>
                                <th>Image</th>
                                <th>Type</th>
                                <th>Stock</th>
                                <th>Color</th>
                                <th>Brand</th>
                                <th>Buying</th>
                                <th>Selling</th>
                                <th>Discount</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $i = 0;
                            $view = $cloth->viewCloth();
                            foreach ($view as $value) {
                            ?>
                                <tr>
                                    <td><?php echo $i += 1; ?></td>
                                    <td><?php echo $value['cloth_name']; ?></td>
                                    <td><?php echo $fm->textShorten($value['details'], 100); ?></td>
                                    <td><img src="<?php echo $value['image']; ?>" height="40px" width="60px" /></td>
                                    <td><?php echo $value['name']; ?></td>
                                    <td><?php echo $value['stock']; ?></td>
                                    <td><?php echo $value['color']; ?></td>
                                    <td><?php echo $value['brand']; ?></td>
                                    <td><?php echo $value['buying_price']; ?> BDT</td>
                                    <td><?php echo $value['selling_price']; ?> BDT</td>
                                    <td><?php echo $value['discount']; ?> % <br> <?php echo $value['selling_price'] - (($value['selling_price'] * $value['discount']) / 100) ?> BDT
                                    </td>

                                    <td>
                                        <a href="edit_cloth.php?clothid=<?php echo $value['id']; ?>" class="btn btn-sm btn-info">Edit</a>
                                        <a onclick="return confirm('Are you sure to Delete?');" href="?delCloth=<?php echo $value['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>
</div>
<!---Container Fluid-->
<?php include 'layouts/footer.php'; ?>