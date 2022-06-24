<?php include 'layouts/header.php';?>

<!-- jQuery Library -->
<script src="js\jquery.min.js"></script>
  <script type="text/javascript"> 
    $(document).ready(function(){
        $("#flip").click(function(){
            $("#panel").toggle(1000);
        });
        
    });

  </script>

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
            <table class="table align-items-center table-flush">
            
            <thead id="flip" class="thead-light">
                <tr>
                    <th>SL No.</th>
                    <th>Slip No</th> 
                    <th>Customer Name</th>
                    <th>Order at</th>
                    <th>Delivery at</th>  
                </tr>
            </thead>
            
            <tbody id="panel">
                    <?php
                        $i = 0;
                        $view = $cart->viewSlip();
                        if($view->num_rows > 0){
                        foreach($view as $value){
                    ?>
             
                    <tr>
                        <td><?php echo $i+=1; ?></td>                    
                        <td><?php echo $value['slip_no']; ?></td>
                        <td><?php echo $value['cus_name']; ?></td>
                        <td><?php echo $value['order_at']; ?></td>
                        <td><?php echo $value['delivery_at']; ?></td>
                    </tr>
                    <?php } } ?>
                </tbody>
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