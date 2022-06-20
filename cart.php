<?php include 'layouts/header.php';
 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $addCloth = $cloth->insertCloth($_POST);
}
?>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Add New Cloth</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item">Cloth Details</li>
      <li class="breadcrumb-item active" aria-current="page">Add New Cloth</li>
    </ol>
  </div>

  <div class="row">
     <div class="col-md-6">
        <form action="" method="POST">
              <div class="form-group">
                <label>Cloth Type</label>
                <input name="name" type="text" class="form-control" placeholder="Enter Cloth Type">
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
          </form>
     </div>
     <div class="col-md-6">
     <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Cloth name</th>
                        <th>Action</th>
                       
                    </tr>
                </thead>
                </thead>
                <tbody>
                    <tr>
                      <td>1</td>
                      <td>lkjflkdsf</td>
                      <td> Delete</td>
                    </tr>
                </tbody>
                </table>

                <form action="">
                  <select name="" id="">
                    <option value="">Name 1</option>
                    <option value="">Name 2</option>
                    <option value="">Name 4</option>
                  </select>
                  <button>Order</button>
                </form>
     </div>
  </div>
</div>

<?php include 'layouts/footer.php';?>