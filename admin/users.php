<?php include 'layouts/header.php';
 
?>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Users</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item">Users</li>
       
    </ol>
    </div>

    <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                      <th>#</th>
                        <th>Unique id</th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Image</th>
                        
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                      <th>#</th>
                     <th>Unique id</th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Image</th>
                      </tr>
                    </tfoot>
                    <tbody>
                    <?php
                 
                        $i = 0;
                        $view = $create->userList();
                        foreach($view as $value){
                            $i++;
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $value['user_id']; ?></td>
                         
                        <td><?php echo $value['first_name']. " ".$value['last_name']; ?></td>
                        <td><?php echo $value['mobile']; ?></td>
                        
                <td><?php echo $value['email']; ?></td>
                        

                        <td><img style="height: 100px;width: 100px;" src="../<?php echo $value['image']; ?>"></td>
                         
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