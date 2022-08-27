<?php include 'layouts/header.php';

if (isset($_GET['delemp'])) {
    $delemp = $_GET['delemp'];
    $delete = $emp->removeEmp($delemp);
    echo $delete;
}
?>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">All Employee</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item">Employee</li>
            <li class="breadcrumb-item active" aria-current="page">All Employee</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-12 mb-4">
            <!-- Simple Tables -->
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Employee List</h6>
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Position</th>
                                <th>Joined</th>
                                <th>Salary</th>
                                <th>Address</th>
                                <th>Image</th>
                                <th>Pay</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $i = 0;
                            $view = $emp->viewEmployee();
                            foreach ($view as $value) {
                            ?>
                                <tr>
                                    <td><?php echo $value['emp_id']; ?></td>
                                    <td><?php echo $value['emp_name']; ?></td>
                                    <td><?php echo $value['emp_email']; ?></td>
                                    <td><?php echo $value['emp_phone']; ?></td>
                                    <td><?php echo $value['emp_job_status']; ?> </td>
                                    <td><?php echo $fm->formatDate($value['create_emp']); ?></td>
                                    <td><?php echo $value['emp_salary']; ?> BDT</td>
                                    <td><?php echo $fm->textShorten($value['emp_address'], 30); ?> </td>
                                    <td><img style="height: 60px; width: 60px;" src="<?php echo $value['emp_image']; ?>" alt=""> </td>

                                    <td>
                                        <?php
                                        $s = $emp->salaraycheck($value['emp_id']);
                                        if ($s > 0) {
                                            echo "<p class='btn btn-sm btn-success'>Paid</p>";
                                        } else {
                                        ?>

                                            <a href="payemployee.php?salid=<?php echo $value['emp_id']; ?>" class="btn btn-sm btn-warning">Pay</a>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <a href="edit_employee.php?empid=<?php echo $value['emp_id']; ?>" class="btn btn-sm btn-info">Edit</a>

                                        <a onclick="return confirm('Are you sure to Delete?');" href="?delemp=<?php echo $value['emp_id']; ?>" class="btn btn-sm btn-danger">Delete</a>
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