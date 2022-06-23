<?php include 'layouts/header.php';

 if (($_SERVER['REQUEST_METHOD'] == 'POST')) {
    $addOrder = $cart->insertOrder($_POST);
}
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
      <div class="col-lg-12 mb-4">
        <!-- Simple Tables -->
        <div class="card">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Order List</h6>
        </div>
        <div class="table-responsive">
        <?php 
        if (isset($addOrder)){
            echo $addOrder;
        }  
        ?>
            <table class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Customer ID</th>
                    <th>Measurement ID</th> 
                    <th>Cloth ID</th>
                    <th>Buying Price</th>  
                    <th>Selling Price</th> 
                    <th>Charge</th> 
                    <th>Quantity</th>
                    <th>Slip No</th>
                    <th>Action</th>
                </tr>
            </thead>
            </table>
        </div>
        <div class="card-footer"></div>
        </div>
      </div>   
    </div>  
           
    </div>
</div>
<!---Container Fluid-->
<?php include 'layouts/footer.php';?>