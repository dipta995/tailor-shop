<?php include 'layouts/header.php';
 
if(isset($_GET['delPackage'])){
    $delPackage = $_GET['delPackage'];
    $delete = $pack->deletePackage($delPackage);
	echo $delete;
	
}
?>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">All Cloths</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item">Cloth Type</li>
        <li class="breadcrumb-item active" aria-current="page">All Cloths</li>
    </ol>
    </div>

    <div class="row">
        <div class="col-lg-12 mb-4">
            <!-- Simple Tables -->
            <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">All Cloths</h6>
            </div>
            <div class="table-responsive">
                <div>
                    <?php 
                        if(isset($delete)){
                            echo $delete;
                        }
                    ?>
                </div>
                <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th width="5%">#</th>
                        <th width="15%">Cloth Name</th>
                        <th width="40%">Details</th>                    
                        <th width="10%">Price</th>
                        <th width="10%">Discount <br></th>
                        <th width="20%">Action</th>
                        <th></th>
                    </tr>
                </thead>
                </thead>
                <tbody>
                    <?php
                        $i = 0;
                        $view = $cloth->viewCloth();
                        foreach($view as $value){
                    ?>
                    <tr>
                        <td><?php echo $i+=1; ?></td>
                        <td><?php echo $value['name']; ?></td>
                        <td><?php echo $value['details']; ?></td>
                        <td><?php echo $value['price']; ?> Taka</td>
                        <td><?php echo $value['discount']; ?> % <br> <?php echo $value['price']-(($value['price']*$value['discount'])/100) ?>  Taka</td>
                        <?php  if ($role==0) { ?>
                        <td>
                            <a href="edit_cloth.php?clothid=<?php echo $value['id'] ;?>" class="btn btn-sm btn-info">Edit</a>
                            <a href="?delCloth=<?php echo $value['id'] ;?>" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                        <?php } ?>
                        <!-- <td><a href="customeradmit.php?packid=<?php echo $value['id'] ;?>" class="btn btn-sm btn-danger">Sell</a></td> -->
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