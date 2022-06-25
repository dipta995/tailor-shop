<?php include 'layouts/header.php'; 

if(isset($_GET['delMes'])){
  $delMes = $_GET['delMes'];
  $delete = $measure->deleteMeasurement($delMes);
  echo $delete;	
}
?>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Customer Measurement</h1>
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./">Home</a></li>
      <li class="breadcrumb-item">Measurement</li>
      <li class="breadcrumb-item active" aria-current="page">Customer Measurement</li>     
  </ol>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Customer Measurement</h6>
        </div>
        <div class="table-responsive p-3">        
          <table class="table align-items-center table-flush" id="dataTable">
            <thead class="thead-light">
              <tr>
                <th>SL No.</th>           
                <th>Customer Name</th>
                <th>Measurement For</th>
                <th>Measurement Details</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
            <?php
                $i = 0;
                $view = $measure->viewMeasurement();
                foreach($view as $value){
            ?>
            <tr>
                <td><?php echo $i+=1; ?></td>
                <td><?php echo $value['cus_name']; ?></td>
                <td><?php echo $value['measurement_for']; ?></td>         
                <td><?php echo $fm->textShorten($value['measurement_details'], 200); ?></td>
                
                <td>
                  <a href="edit_measurement.php?mesid=<?php echo $value['id'] ;?>" class="btn btn-sm btn-info">Edit</a>
                  <a onclick="return confirm('Are you sure to Delete?');" href="?delMes=<?php echo $value['id'] ;?>" class="btn btn-sm btn-danger">Delete</a>
                </td>
            </tr>
            <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>     
  </div>
</div>
<!---Container Fluid-->
<?php include 'layouts/footer.php';?>