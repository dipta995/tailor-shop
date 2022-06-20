<?php include 'layouts/header.php';
 
?>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Order</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item">Order</li>
       
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
                      <th>Order Id</th>
                        <th>User Name</th>
                        <th>User Mobile</th>
                        <th>Package Name</th>
                        <th>Issue at<br>Decline at</th>
                        <th>Month/price</th>
                         
                        <th>Discount price</th>
                        <th>Instructor</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                      <th>#</th>
                      <th>Order Id</th>
                        <th>User Name</th>
                        <th>User Mobile</th>
                        <th>Package Name</th>
                        <th>Issue at<br>Decline at</th>
                        <th>Month/price</th>
                        <th>Discount Price</th>
                        <th>Instructor</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                    <tbody>
                    <?php
                    if (isset($_GET['confirm'])) {
                        echo $confirm = $pack->confirmorder($_GET['confirm']);
                        
 
                     }
                        $i = 0;
                        $view = $pack->viewOrderadmin();
                        foreach($view as $value){
                            $i++;
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $value['order_id']; ?></td>
                        <td><a href="singleuser.php?id=<?php echo $value['user_id']; ?>"><?php echo  $value['first_name']." ".$value['last_name']; ?></a></td>
                        <td><?php echo $value['mobile_no']; ?></td>
                        <td><?php echo $value['pack_name']; ?></td>
                        <td><?php echo $value['created_at']."<br>".$effectiveDate = date('Y-m-d', strtotime("+".$value['month']." months", strtotime($value['created_at']))); ?></td>
                
                        <td><?php echo $value['month'].' Month ||'. $value['price']; ?> Taka</td>
                        <td><?php echo $value['price']-($value['price']*($value['discount']/100)); ?> Taka</td>

                        <td><?php echo $value['emp_name']; ?></td>
                        <td>
                        <?php if ($value['status']==0) { ?>
                            <a href="?confirm=<?php echo $value['order_id']; ?>" class="btn btn-sm btn-info">Confirm</a>
                            
                      <?php   }elseif($value['status']==1){  
                    
                    $date=date("Y-m-d");
                      if ($effectiveDate< $date) {
                         
                         echo "expaired</br>";
                     }else{ 
                         
                         echo "Running</br>";
                         echo "<a class='btn btn-danger' href=../idcart1.php?orderid=".$value['order_id']." >Id Cart</a>";
                        
                        }
                    
                    
                    
                    
                    } ?>
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