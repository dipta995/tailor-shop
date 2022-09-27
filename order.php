<?php
include 'layouts/header.php';

if (isset($_GET['confirm'])) {
    $confirm = $_GET['confirm'];
    $delete = $cart->ConfirmOrder($confirm);
    echo $delete;
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
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Total Profit</h6>
                </div>

                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>Buying Price</th>
                                <th>Selling Price</th>
                                <th>Charge</th>
                                <th>Total Profit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            $buying_price = 0;
                            $selling_price = 0;
                            $charge = 0;

                            $view = $cart->viewProfit();
                            foreach ($view as $value) {
                                $buying_price += $value['buying_price'] * $value['quantity'];
                                $selling_price += ($value['selling_price'] - ($value['discount'] / 100 * $value['selling_price'])) * $value['quantity'];
                                $charge += $value['charge'];

                            ?>

                            <?php } ?>
                            <tr>
                                <td><?php echo $buying_price; ?> BDT</td>
                                <td><?php echo $selling_price; ?> BDT</td>
                                <td><?php echo $charge; ?> BDT</td>
                                <td><?php echo $total = $selling_price + $charge - $buying_price; ?> BDT</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 mb-4">
            <!-- Simple Tables -->
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Order List</h6>
                </div>
                <!-- Search box. -->
                <div class="form-control">
                    <form action="order.php" method="GET">
                        <input type="text" name="search" required>
                        <input type="submit" value="Search">
                    </form>
                </div>

                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush" id="dataTable">
                        <?php
                        $i = 0;
                        if (isset($_GET['search'])) {
                            $view = $cart->searchSlipResult($_GET['search']);
                        } else {

                            $view = $cart->viewSlip();
                        }
                        if ($view->num_rows > 0) {
                            foreach ($view as $value) {
                                $i++;
                                $slip_no = $value['slip_no'];
                                $calculate = $cart->slipOrder($slip_no);
                                $selling_price = 0;
                                $charge = 0;
                                foreach ($calculate as $data) {
                                    $selling_price += ($data['sellingprice'] - ($data['discount'] / 100 * $data['sellingprice'])) * $data['quantity'];
                                    $charge += $data['charge'];
                                }
                                $total_price = $selling_price + $charge;
                        ?>

                                <thead id="<?php echo $i; ?>" class="thead-light">
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><strong>Slip No: <?php echo $slip_no; ?></strong></td>
                                        <td><strong>Customer Name: <?php echo $value['cus_name']; ?></strong></td>
                                        <td><strong>Order at: </strong><?php echo $value['order_at']; ?></td>
                                        <td><strong>Delivery at: </strong><?php echo $value['delivery_at']; ?></td>
                                        <td><strong>Total Payment: </strong><?= $total_price; ?> BDT</td>
                                        <td>
                                            <a href="print.php?printid=<?php echo $value['id']; ?>" class="btn btn-sm btn-primary">Print</a>
                                        </td>

                                        <?php
                                        $s = $cart->orderCheck($value['slip_no']);
                                        if ($s > 0) {
                                            echo "<td><p style='color:green;'>Confirmed</p></td>";
                                        } else {
                                        ?>
                                            <td>
                                                <a href="?confirm=<?php echo $value['slip_no']; ?>" class="btn btn-sm btn-danger">Confirm</a>
                                            </td>
                                        <?php } ?>
                                    </tr>
                                </thead>

                                <tbody id="panel<?php echo $i; ?>">
                                    <tr>
                                        <th></th>
                                        <th>Order No.</th>
                                        <th>Order Name</th>
                                        <th>Measurement Details</th>
                                        <th>Cloth Name</th>
                                        <th>Quantity</th>
                                    </tr>
                                    <?php
                                    $orders = $cart->slipOrder($slip_no);
                                    foreach ($orders as $order) {
                                    ?>
                                        <tr>
                                            <td></td>
                                            <td><?php echo $order['orderid']; ?></td>
                                            <td><?php echo $order['cus_name']; ?></td>
                                            <td><?php echo $order['measurement_details']; ?></td>
                                            <td><?php echo $order['cloth_name']; ?></td>
                                            <td><?php echo $order['quantity']; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>

                                <!-- jQuery Library -->
                                <script src="js\jquery.min.js"></script>
                                <script type="text/javascript">
                                    $(document).ready(function() {
                                        $("#panel<?php echo $i; ?>").hide();
                                        $("#<?php echo $i; ?>").click(function() {
                                            $("#panel<?php echo $i; ?>").fadeToggle("slow");
                                            $("#panel<?php echo $i - 1; ?>").hide();
                                        });
                                    });
                                </script>
                                <!-- jQuery Library -->
                        <?php }
                        } ?>
                    </table>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>
</div>
<!---Container Fluid-->
<?php include 'layouts/footer.php'; ?>