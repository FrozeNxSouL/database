<?php
    require_once('php/connect.php');

    if(isset($_POST['send'])){
        $fid = $_POST['fid'];
        $fname = $_POST['fname'];
        $fprice = $_POST['fprice'];
        $fpict = $_POST['fpict'];
        $fcategory = $_POST['fcategory'];
        $fqty = 1;
        $cart_id = '';
        $tt = 100;

        $query = "INSERT INTO cart(cart_id,product_name,product_price,product_image,qty,total_price,product_id,product_category) VALUES ($cart_id,'$fname','$fprice','$fpict', '$fqty','$tt','$fid','$fcategory')";
        $query_run = mysqli_query($conn,$query);
        echo "yee";
    }
?>
