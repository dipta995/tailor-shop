<?php include 'layouts/header.php';
 
$typeid = "";
if($_GET['typeid']==NULL || !isset($_GET['typeid'])){
	"<script>window.location = 'typelist.php'; </script>"; 
}else{
	$typeid = $_GET['typeid'];
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $updateType = $cloth->updateType($_POST, $typeid);
}
?>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Update Cloth</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item">Cloth Type</li>
      <li class="breadcrumb-item active" aria-current="page">Update Cloth Type</li>
    </ol>
  </div>

  <div class="row">
      <div class="col-lg-2"></div>
    <div class="col-lg-8">
      <!-- Form Basic -->
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Update Cloth Type</h6>
        </div>
        <?php
            if(isset($updateType)){
                echo $updateType;
            }
        ?>
        <div class="card-body">
          <form method="POST" enctype="multipart/form-data">
            <?php 
                $view = $cloth->viewSingleType($typeid);
                if($view){
                    while($value = $view->fetch_assoc()){
            ?>
            <div class="form-group">
              <label>Cloth Type</label>
              <input name="name" type="text" class="form-control" value="<?php echo $value['name'];?>">
            </div>
 
            <?php } } ?>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!---Container Fluid-->
<?php include 'layouts/footer.php';?>