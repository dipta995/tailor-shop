<?php include 'layouts/header.php';
if (!isset($_GET['salid']) || empty($_GET['salid'])) {
    echo "<script> window.location= 'employee_list.php';</script>";
}else{
   $salid = $_GET['salid'];
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $createSalary = $emp->insertSalary($_POST);
}
?>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Add New Salaray Sheet</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item">Salaray</li>
      <li class="breadcrumb-item active" aria-current="page">Create Salaray</li>
    </ol>
  </div>
<!--   <a class="btn btn-success" href="food.php"> Food Menu</a> -->
  <div class="row">
      <div class="col-lg-2"></div>
    <div class="col-lg-8">
      <!-- Form Basic -->
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Add New Salaray</h6>
        </div>
      
        <div class="card-body">
        <form method="POST" action="">
                    <?php
                        if(isset($createSalary)){
                            echo $createSalary;
                        }
                    ?>
                    <div class="form-group">
                        <label>Employee Name</label>
                        <select name="emp_id" class="form-control">
                            <option disabled>Select Employee</option>
                            <?php
                            $data = $emp->employeeViewbyid($salid);
                           
                            ?>
                                <option value="<?php echo $data['emp_id'];?>"><?php echo $data['emp_name'];?></option>
                         
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Month</label>
                        <select name="month" class="form-control">
                            <option value="<?php echo date('F'); ?>"><?php echo date('F'); ?></option>
                            <option value="January">January</option>
                            <option value="February">February</option>
                            <option value="March">March</option>
                            <option value="April">April</option>
                            <option value="May">May</option>
                            <option value="June">June</option>
                            <option value="July">July</option>
                            <option value="August">August</option>
                            <option value="September">September</option>
                            <option value="October">October</option>
                            <option value="Novembver">Novembver</option>
                            <option value="December">December</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Salary</label>
                        <input type="number" name="salary" min="10000" class="form-control" value="<?php echo $data['emp_salary']; ?>">
                    </div>
                    <div class="form-group">
                        <label class="title">Year</label>
                        <input type="number"  min="2000" name="year" value="<?php echo date('Y'); ?>" class="form-control" placeholder="Year">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!---Container Fluid-->
<?php include 'layouts/footer.php';?>