<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Invoice</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/ruang-admin.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="css/w3.css" rel="stylesheet" />

</head>

<body>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 mt-4">
            <div class="card">
                <div class="container">
                    <div class="card-header">
                        <h3>Customer Invoice</h3>
                    </div>
                    <div class="card-body">
                        <?php
                        include 'Classes/CartClass.php';
                        $cart = new CartClass();
                        $printid = "";
                        if ($_GET['printid'] == NULL || !isset($_GET['printid'])) {
                            "<script>window.location = 'typelist.php'; </script>";
                        } else {
                            $printid = $_GET['printid'];
                        }
                        ?>

                        <table class="w3-table w3-border w3-bordered">
                            <tbody>
                                <?php
                                $view = $cart->viewSingleOrder($printid);
                                if ($view) {
                                    while ($value = $view->fetch_assoc()) {
                                        $slip_no = $value['slip_no'];
                                        $calculate = $cart->slipOrder($slip_no);
                                        $selling_price = 0;
                                        $charge = 0;
                                        $discount = 0;
                                        $total_discount = 0;
                                        foreach ($calculate as $data) {
                                            $discount += ($data['discount'] / 100) * ($data['selling_price'] * $data['quantity']);
                                            $selling_price += ($data['sellingprice'] - ($data['discount'] / 100 * $data['sellingprice'])) * $data['quantity'];
                                            $charge += $data['charge'];
                                        }
                                        $total_discount += $discount;
                                        $total_price = $selling_price + $charge;
                                ?>
                                        <tr>
                                            <p>Slip no: <?php echo $value['slip_no']; ?></p>

                                            <p>Customer Name: <?php echo $value['cus_name']; ?></p>

                                            <p>Order at: <?php echo $value['order_at']; ?></p>

                                            <p>Delivery at: <?php echo $value['delivery_at']; ?></p>

                                            <p>Total Discount: <?php echo $total_discount; ?> BDT</p>

                                            <p>Total Payment: <?php echo $total_price; ?> BDT</p>
                                        </tr>
                                <?php }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col ml-4 mb-4">
                        <button id="print" class="w3-button w3-blue">Print Invoice</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/printThis.js"></script>
    <script>
        $('#print').click(function() {
            $('.container').printThis({
                debug: false, // show the iframe for debugging
                importCSS: true, // import parent page css
                importStyle: false, // import style tags
                printContainer: true, // print outer container/$.selector
                loadCSS: "http://localhost/tailor-shop/w3.css", // path to additional css file - use an array [] for multiple
                pageTitle: "Tailor Shop Management System", // add title to print page
                removeInline: false, // remove inline styles from print elements
                removeInlineSelector: "*", // custom selectors to filter inline styles. removeInline must be true
                printDelay: 333, // variable print delay
                header: null, // prefix to html
                footer: null, // postfix to html
                base: false, // preserve the BASE tag or accept a string for the URL
                formValues: true, // preserve input/form values
                canvas: true, // copy canvas content
                doctypeString: '<!DOCTYPE html>', // enter a different doctype for older markup
                removeScripts: false, // remove script tags from print content
                copyTagClasses: false, // copy classes from the html & body tag
                beforePrintEvent: null, // callback function for printEvent in iframe
                beforePrint: null, // function called before iframe is filled
                afterPrint: null // function called before iframe is removed
            });
        });
    </script>

</body>

</html>