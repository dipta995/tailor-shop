<?php include 'layouts/header.php'; ?>

<?php
    if(!isset($_GET['delCloth']) || $_GET['delCloth'] == NULL){
        echo "<script>window.location='all_cloth.php';</script>";
    } else {
        $clothid = $_GET['delCloth'];
        $query = "select * from tbl_cloth where id='$clothid'";
        $getData = $cloth->select($query);
        if($getData){
            while($delimg = $getData->fetch_assoc()){
                $dellink = $delimg['image'];
                unlink($dellink);
            }
        }

        $delquery = "delete from tbl_cloth where id = '$clothid'";
        $delData = $cloth->delete($delquery);
        if($delData === TRUE){
            echo "<script>window.location='all_cloth.php';</script>";
            $txt = "<div class='alert alert-success'>Successfully Deleted</div>";
            echo $txt;
        } 
    }
?>