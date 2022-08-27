<?php include 'layouts/header.php';

if (isset($_GET['deluser'])) {
    $deluser = $_GET['deluser'];
    $delete = $create->deleteUser($deluser);
    echo $delete;
}
?>

<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Admin Details</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item">Admin</li>
            <li class="breadcrumb-item active" aria-current="page">Admin Details</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-12 mb-4">
            <!-- Simple Tables -->
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Admin Details</h6>
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th>SL No.</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $i = 0;
                            $view = $create->userList();
                            foreach ($view as $value) {
                            ?>
                                <tr>
                                    <td><?php echo $i += 1; ?></td>
                                    <td><?php echo $value['first_name']; ?></td>
                                    <td><?php echo $value['last_name']; ?></td>
                                    <td><?php echo $value['email']; ?></td>
                                    <td><?php echo $value['phone']; ?></td>
                                    <td>
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
                                    </td>
                                    <td>
                                        <a href="viewuser.php?viewid=<?php echo $value['id']; ?>" class="btn btn-sm btn-info">View</a>

                                        <?php if ($role == 0 || $id == $value['id']) { ?>
                                            <a href="update_user.php?userid=<?php echo $value['id']; ?>" class="btn btn-sm btn-success">Update</a>

                                            <?php if ($role == 0) { ?>
                                                <a onclick="return confirm('Are you sure to Delete?');" href="?deluser=<?php echo $value['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
                                            <?php } ?>

                                    </td>
                                <?php } ?>
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