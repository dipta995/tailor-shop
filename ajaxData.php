<?php
    include_once 'Classes/CartClass.php';
    $cart = new CartClass();
    $cus_id = $_POST["cus_id"];
    
    //fetch measurement data based on specific customer
    $result = $cart->selectAllMeasurement($cus_id);

    //Generate HTML of measurement options list
    if($result->num_rows > 0){
        echo '<option value="">Select Measurement</option>';
        while ($row = $result->fetch_assoc()) {
            echo '<option value='.$row['id'].'>'.$row['measurement_for'].'</option>';
        }
    } else {
        echo '<option value="">Measurement not available</option>';
    }
?>

    


