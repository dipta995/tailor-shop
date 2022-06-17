<?php include 'layouts/header.php';

?>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Bio Data</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
   
    </ol>
  </div>
 
  <div class="row">
      <div class="col-lg-2"></div>
    <div class="col-lg-8">
      <!-- Form Basic -->
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">User information</h6>
        </div>
        <?php 
        $id = $_GET['id'];
        $data = $create->userListSingle($id) ?>
        <div class="card-body" >
          <p>Name: <?php echo $data['first_name']." " .$data['last_name']; ?> </p>
           <p>Email: <?php echo $data['email']; ?> </p>
            <p>Phone no: <?php echo $data['mobile']; ?> </p>
             <p>Deth of birth: <?php echo $data['dob']; ?> </p>
              <p>Gender: <?php echo $data['gender']; ?> </p>
              <p>Address: <?php echo $data['address']; ?> </p>
               <p>Register at: <?php echo $data['reg_at']; ?> </p>
               <img style="height: 120px; width: 120px;" src="<?php echo $data['image']; ?> ">
                
          
        </div>
      </div>
    </div>
  </div>
</div>
<!---Container Fluid-->
<?php include 'layouts/footer.php';?>