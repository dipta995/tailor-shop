<?php include 'layouts/header.php';

if (isset($_GET['delCustomer'])) {
    $delCustomer = $_GET['delCustomer'];
    $delete = $customer->deleteCustomer($delCustomer);
    echo $delete;
}
?>

<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Customer Details</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item">Customer</li>
            <li class="breadcrumb-item active" aria-current="page">Customers Details</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-12 mb-4">
            <!-- Simple Tables -->
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Customers Details</h6>
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th>SL No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $i = 0;
                            $view = $customer->viewCustomer();
                            foreach ($view as $value) {
                            ?>
                                <tr>
                                    <td><?php echo $i += 1; ?></td>
                                    <td><?php echo $value['cus_name']; ?></td>
                                    <td><?php echo $value['cus_email']; ?></td>
                                    <td><?php echo $value['cus_phone']; ?></td>
                                    <td><?php echo $value['cus_address']; ?></td>
                                    <td>
                                        <a href="edit_customer.php?customerid=<?php echo $value['cus_id']; ?>" class="btn btn-sm btn-info">Edit</a>
                                        <?php if (($role == 0) || ($role == 1)) { ?>
                                            <a onclick="return confirm('Are you sure to Delete?');" href="?delCustomer=<?php echo $value['cus_id']; ?>" class="btn btn-sm btn-danger">Delete</a>
                                        <?php } ?>
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