<?php include 'layouts/header.php';

if (isset($_GET['deltype'])) {
    $deltype = $_GET['deltype'];
    $delete = $cloth->deleteType($deltype);
    echo $delete;
}
?>

<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">All Cloth Type</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item">Cloth Type</li>
            <li class="breadcrumb-item active" aria-current="page">View Cloth Type</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-10 mb-4">
            <!-- Simple Tables -->
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Cloth Type List</h6>
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th>SL No.</th>
                                <th>Cloth Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $i = 0;
                            $view = $cloth->viewType();
                            foreach ($view as $value) {
                            ?>
                                <tr>
                                    <td><?php echo $i += 1; ?></td>
                                    <td><?php echo $value['name']; ?></td>
                                    <td>
                                        <a href="edit_type.php?typeid=<?php echo $value['id']; ?>" class="btn btn-sm btn-info">Edit</a>
                                        <a onclick="return confirm('Are you sure to Delete?');" href="?deltype=<?php echo $value['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
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