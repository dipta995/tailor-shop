<?php 
include 'layouts/header.php';
 
  if (($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['add_to_cart'])) {
      $addCart = $cart->insertCart($_POST);
  }

  if (($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['send_to_order'])) {
      $addOrder = $cart->insertOrder($_POST);
  }
?>

<?php
  if(isset($_GET['delCart'])){
    $delCart = $_GET['delCart'];
    $delete = $cart->deleteCart($delCart);
    echo $delete;
  }
?>

<!-- jQuery Library -->
<script src="js\jquery.min.js"></script>
  <script type="text/javascript">
      $(document).ready(function(){
          $('#cus_id').on('change', function(){
              var cus_id = $(this).val();
              if(cus_id){
                  $.ajax({
                      type: 'POST',
                      url: 'ajaxData.php',
                      data:'cus_id='+cus_id,
                      success:function(html){
                          $('#mes_id').html(html);
                      }
                  });
              }else{
                  $('#mes_id').html('<option value="">Select Customer Name First</option>');
              }
          });
      });
  </script>

<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Add To Cart</h1>
      <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="./">Home</a></li>
          <li class="breadcrumb-item">Cart</li>   
      </ol>
  </div>
        <?php 
          if (isset($addCart)){
              echo $addCart;
          }  
        ?>
      
  <div class="row">
    <div class="col-md-3">
    <div class="card-body">
      <form action="" method="POST">
        <div class="form-group">
          
        <label>Customer Name</label><br>
          <?php      
            //Fetch all the customer data
            $query = "SELECT * FROM tbl_customer WHERE soft_delete = 0 ORDER BY cus_name ASC";
            $result = $cart->select($query);
          ?>
            <!-- Customer Drop-Down -->
            <select id="cus_id" name="cus_id" class="form-control">
                <option value="">Select Customer</option>
                <?php
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        echo '<option value="'.$row['cus_id'].'">'.$row['cus_name'].'</option>';
                    }
                }else{
                    echo '<option value="">Customer Not Available</option>';
                }
                    
                ?>
            </select>
        </div>

        <div class="form-group">
        <label>Measurement For</label><br> 

            <!-- Measurement Drop-Down -->
            <select id="mes_id" name="mes_id" class="form-control">
                <option value="">Select Customer Name</option>          
            </select>
        </div>


        <div class="form-group">
          <label>Cloth Name</label><br>
          <select id="select" name="cloth_id" class="form-control">
            <option>Select Cloth</option>
            <?php
                $query = "select * from tbl_cloth where soft_delete=0";
                $clothid = $cart -> select($query);
                if($clothid){
                    while($result = $clothid->fetch_assoc()){                             
            ?>
            <option value="<?php echo $result['id'];?>"><?php echo $result['cloth_name'];?></option>
            <?php } } ?>
          </select>
        </div>
        
        <div class="form-group">
          <label>Buying Price</label>
          <input name="buying_price" type="number" class="form-control" placeholder="Enter Buying Price">
        </div>
        <div class="form-group">
          <label>Selling Price</label>
          <input name="selling_price" type="number" class="form-control" placeholder="Enter Selling Price">
        </div>
        <div class="form-group">
          <label>Charge</label>
          <input name="charge" type="number" class="form-control" placeholder="Enter Charge">
        </div>
        <div class="form-group">
          <label>Quantity</label>
          <input name="quantity" type="text" class="form-control" placeholder="Enter Quantity">
        </div>

          <button name="add_to_cart" type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
    </div>


    <div class="col-md-9">
      <div class="card-body">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Cart Items</h6>
        </div>
        <div class="table-responsive p-3">
          <table class="table align-items-center table-flush">           
            <thead class="thead-light">
              <tr>
                <th>SL No.</th>
                <th>Customer Name</th>
                <th>Measurement For</th> 
                <th>Cloth Name</th>
                <th>Buying Price</th>  
                <th>Selling Price</th> 
                <th>Charge</th> 
                <th>Quantity</th>
                <th>Action</th>
              </tr>
            </thead>
   
            <tbody>
                  
              <?php
                $i = 0;
                $view = $cart->viewCart();
                if($view->num_rows > 0){
                foreach($view as $value){
              ?>
              <tr>
                <td><?php echo $i+=1; ?></td>  
                <td><?php echo $value['cus_name']; ?></td>
                <td><?php echo $value['measurement_for']; ?></td>          
                <td><?php echo $value['cloth_name']; ?></td>
                <td><?php echo $value['buying_price']; ?> BDT</td>
                <td><?php echo $value['selling_price']; ?> BDT</td>
                <td><?php echo $value['charge']; ?> BDT</td>
                <td><?php echo $value['quantity']; ?></td>
                </td>                    
                <td>
                  <a onclick="return confirm('Are you sure to Delete?');" href="?delCart=<?php echo $value['id'] ;?>" class="btn btn-sm btn-danger">Delete</a>
                </td>
              </tr>
              <?php } } ?>
            </tbody>
          </table>
          <hr>  

          <table class="table align-items-center table-flush">
            <tbody>
              <form action="" method="post">
                <div class="form-group">
                  <label>Customer Name</label><br>
                  <select id="select" name="cus_id" class="form-control">
                    <option>Select Customer</option>
                    <?php
                        $query = "select * from tbl_customer where soft_delete=0";
                        $cusid = $cart -> select($query);
                        if($cusid){
                            while($result = $cusid->fetch_assoc()){                             
                    ?>
                    <option value="<?php echo $result['cus_id'];?>"><?php echo $result['cus_name'];?></option>
                    <?php } } ?>
                  </select>
                </div>

                  <label>Delivery Date</label>
                  <input name="delivery_at" type="date" class="form-control">     
                  <hr>
                  <button name="send_to_order" type="submit" class="btn btn-primary">Order</button>
              </form>
            </tbody>
          </table>
        </div>
      </div>
      <div class="card-footer"></div>
    </div>
  </div>
</div>

<?php include 'layouts/footer.php';?>