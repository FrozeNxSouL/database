<?php
    require 'php/connect.php';

    if(isset($_POST['fid'])){
        $fid = $_POST['fid'];
        $fname = $_POST['fname'];
        $fprice = $_POST['fprice'];
        $fpict = $_POST['fpict'];
        $fcategory = $_POST['fcategory'];
        $fqty = 1;

        $stmt = $conn->prepare("SELECT product_id FROM cart WHERE product_id=?");
        $stmt->bind_param('i',$fid);
        $stmt->execute();
        $res = $stmt->get_result();
        $r = $res->fetch_assoc();
        $code = $r['product_id'];

        if(!$code){
            $query = "INSERT INTO `cart`(`product_name`,`product_price`,`product_image`,`qty`,`total_price`,`product_id`,`product_category`) VALUES ('$fname','$fprice','$fpict', '$fqty','$fid','$fcategory')";
            $query_run = mysqli_query($conn,$query);

            echo '<div class="alert alert-success alert-dismissible">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        <strong>Item added to your cart!</strong>
                    </div>';
        }
        else{
            echo '<div class="alert alert-success alert-dismissible">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        <strong>Item already added to your cart!</strong>
                    </div>';
        }
    }
?>
