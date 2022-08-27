<?php include 'layouts/header.php';

if (isset($_GET['delSalary'])) {
    $delSalary = $_GET['delSalary'];
    $delete = $emp->deleteSalary($delSalary);
    echo $delete;
}
?>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Paid Salary</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item">Employee</li>
            <li class="breadcrumb-item active" aria-current="page">Salary</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-12 mb-4">
            <!-- Simple Tables -->
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Salary List</h6>
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th>SL No.</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Position</th>
                                <th>Salary</th>
                                <th>Month/year</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $month = date('F');
                            $year = date('Y');
                            $i = 0;
                            $view = $emp->viewSalary($month, $year);
                            foreach ($view as $value) {
                            ?>
                                <tr>
                                    <td><?php echo $i += 1; ?></td>
                                    <td><?php echo $value['emp_name']; ?></td>
                                    <td><?php echo $value['emp_phone']; ?></td>
                                    <td><?php echo $value['emp_job_status']; ?> </td>
                                    <td><?php echo $value['emp_salary']; ?> Taka</td>
                                    <td><?php echo $value['month'] . "/" . $value['year']; ?></td>
                                    <td><img style="height: 60px; width:60px;" src="<?php echo $value['emp_image']; ?>" alt=""> </td>
                                    <td>
                                        <a href="?delSalary=<?php echo $value['salary_id']; ?>" class="btn btn-sm btn-danger">Delete</a>
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