<?php include 'layouts/header.php';
 
if (($_SERVER['REQUEST_METHOD'] == 'POST') && $_POST['add_to_cart']) {
    $addCart = $cart->insertCart($_POST);
}

if (($_SERVER['REQUEST_METHOD'] == 'POST') && $_POST['send_to_order']) {
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
          <form action="" method="POST">
          <div class="form-group">
            <label>Customer ID</label><br>
            <select id="select" name="cus_id">
              <option>-------- Select Customer ID --------</option>
              <?php
                  $query = "select * from tbl_customer where soft_delete=0";
                  $cusid = $cart -> select($query);
                  if($cusid){
                      while($result = $cusid->fetch_assoc()){                             
              ?>
              <option value="<?php echo $result['cus_id'];?>"><?php echo $result['cus_id'];?></option>
              <?php } } ?>
            </select>
          </div>

          <div class="form-group">
            <label>Measurement ID</label><br>
            <select id="select" name="mes_id">
              <option>------ Select Measurement ID ------</option>
              <?php
                  $query = "select * from tbl_measurement where soft_delete=0";
                  $mesid = $cart -> select($query);
                  if($mesid){
                      while($result = $mesid->fetch_assoc()){                             
              ?>
              <option value="<?php echo $result['id'];?>"><?php echo $result['id'];?></option>
              <?php } } ?>
            </select>
          </div>

          <div class="form-group">
            <label>Cloth ID</label><br>
            <select id="select" name="cloth_id" >
              <option>---------- Select Cloth ID -----------</option>
              <?php
                  $query = "select * from tbl_cloth where soft_delete=0";
                  $clothid = $cart -> select($query);
                  if($clothid){
                      while($result = $clothid->fetch_assoc()){                             
              ?>
              <option value="<?php echo $result['id'];?>"><?php echo $result['id'];?></option>
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
              <input name="quantity" type="number" class="form-control" placeholder="Enter Quantity">
            </div>

                <button name="add_to_cart" type="submit" class="btn btn-primary">Submit</button>
            </form>
      </div>


      <div class="col-md-9">
          <div class="card">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Order List</h6>
          </div>
          <div class="table-responsive">
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
                    <th>Action</th>
                  </tr>
              </thead>
              </thead>
              <tbody>
                  <?php
                      $i = 0;
                      $view = $cart->viewCart();
                      foreach($view as $value){
                  ?>
                  <tr>
                      <td><?php echo $i+=1; ?></td>
                      <td><?php echo $value['cus_id']; ?></td>
                      <td><?php echo $value['id']; ?></td>
                      <td><?php echo $value['id']; ?></td>
                      <td><?php echo $value['buying_price']; ?> BDT</td>
                      <td><?php echo $value['selling_price']; ?> BDT</td>
                      <td><?php echo $value['charge']; ?> BDT</td>
                      <td><?php echo $value['quantity']; ?></td>
                      </td>                    
                      <td>
                          <a onclick="return confirm('Are you sure to Delete?');" href="?delCart=<?php echo $value['id'] ;?>" class="btn btn-sm btn-danger">Delete</a>
                      </td>
                  </tr>
                  <?php } ?>
              </tbody>
              </table>

              <table class="table align-items-center table-flush">
              <tbody>
              <form action="" method="post">
                <div>
                <?php 
                  if (isset($addOrder)){
                      echo $addOrder;
                  }  
                ?>
                </div>
              <div class="form-group">
                <label>Delivery Date</label>
                <input name="delivery_at" type="date" class="form-control">     
              </div>
              <button name="send_to_order" type="submit" class="btn btn-primary">Order</button>
              </form>
              </tbody>
              </table>
          </div>
          <div class="card-footer"></div>
          </div>
      </div>
    </div>
  </div>
</div>

<?php include 'layouts/footer.php';?>