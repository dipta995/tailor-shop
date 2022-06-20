<?php include 'layouts/header.php';
 
if(isset($_GET['delemp'])){
    $delemp = $_GET['delemp'];
    $delete = $pack->removeEmp($delemp);
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
                <h6 class="m-0 font-weight-bold text-primary">All Employee</h6>
            </div>
            <div class="table-responsive">
                <div>
                    <?php 
                        // if(isset($delete)){
                        //     echo $delete;
                        // }
                    ?>
                </div>
                <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>Employee Name</th>
                        <th>Ratting</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Position||Joning Date</th>
                        <th>Salary <br></th>
                        <th>Address</th>
                        <th>Image</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                </thead>
                <tbody>
                    <?php
                        $i = 0;
                        $view = $emp->viewEmployee();
                        foreach($view as $value){
                    ?>
                    <tr>
                        <td><?php echo $value['emp_id']; ?></td>
                        <td><?php echo $value['emp_name']; ?></td>
                        <td><?php 
               
                
               if ($value['total_rat'] ==NULL || $value['hit'] ==NULL) {
                  for ($i=0; $i < 5; $i++) { 
                      echo '<span style="color:#444;" class="fa fa-star"></span>';
                      }
              }else{ $count = round($value['total_rat']/$value['hit']);
                  for ($i=0; $i < $count; $i++) { 
                      echo '<span style="color: orange;" class="fa fa-star checked"></span>';
                      }
                      for ($i=0; $i < 5- $count; $i++) { 
                       echo '<span style="color:#444;" class="fa fa-star"></span>';
                      }
              }?>
              <style>
              .checked {
                color: orange;
              }
              </style></td>
                        <td><?php echo $value['emp_email']; ?></td>
                        <td><?php echo $value['emp_phone']; ?></td>
                        <td><?php echo $value['emp_job_status']."||". date("F j, Y, g:i a", strtotime($value['create_emp'])); ?> </td>
                        <td><?php echo $value['emp_salary']; ?> Taka</td>
                        <td><?php echo $value['emp_address']; ?> </td>
                        <td><img style="height: 60px; width: 60px;" src="<?php echo $value['emp_image']; ?>" alt=""> </td>
                        <?php  if ($status==0) { ?>
                        <td>
                            <a href="edit_employee.php?empid=<?php echo $value['emp_id'] ;?>" class="btn btn-sm btn-info">Edit</a>
                            <a href="?delemp=<?php echo $value['emp_id'] ;?>" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                        <?php } ?>
                        <?php
                        $s = $emp->salaraycheck( $value['emp_id']);
                        if ($s>0) { echo "<td><p style='color:green;'>Paid</p> </td>"; }else{
                      ?>
                        <td><a href="payemployee.php?salid=<?php echo $value['emp_id'] ;?>" class="btn btn-sm btn-danger">Pay</a></td> <?php } ?>
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
<?php include 'layouts/footer.php';?>