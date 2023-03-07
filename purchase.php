<?php

session_start();

include('php/connect.php');

if(mysqli_connect_error()){
    echo"<script>
    alert('cannot connect to database');
    window.location.href='mycart.php';
    </script>";
    exit();
}
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if(isset($_POST['purchase']))
        {
            $query1="INSERT INTO `order_manager`(`cus_email`, `Pay_Mode`) VALUES ('$_POST[cus_email]','$_POST[pay_mode]')";
            if(mysqli_query($conn,$query1))
            {
                $Order_Id = mysqli_insert_id($conn);
                $query2="INSERT INTO `user_orders`(`Order_Id`, `food_name`, `food_price`, `food_quantity`, `food_id`) VALUES (?,?,?,?,?)";
                $stmt=mysqli_prepare($conn,$query2);
                if($stmt)
                {
                    mysqli_stmt_bind_param($stmt,"isdii",$Order_Id,$food_name,$food_price,$food_quantity,$food_id);
                    foreach($_SESSION['cart'] as $key => $values)
                    {
                        $food_name=$values['food_name'];
                        $food_price=$values['food_price'];
                        $food_quantity=$values['food_quantity'];
                        $food_id=$values['food_id'];
                        mysqli_stmt_execute($stmt);
                    }
                    unset($_SESSION['cart']);
                    echo"<script>
                        alert('Order Placed');
                        window.location.href='mycart.php';
                        </script>";
                }
                else
                {
                    echo"<script>
                    alert('SQL Query Prepare Error');
                    window.location.href='mycart.php';
                    </script>";
                }
            }
            else
            {
                echo"<script>
                    alert('SQL Error');
                    window.location.href='mycart.php';
                </script>";
            }
        }
    }

?>