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
        if(isset($_POST['setcomp']))
        {
            $GetIdNo=mysqli_query($conn, "SELECT * FROM `set_menu` ");
            $GetIdNo1=mysqli_num_rows($GetIdNo);
            $realid = 's-' . str_pad($GetIdNo1, 4, '0', STR_PAD_LEFT);
            $query1="INSERT INTO `set_menu`(`set_id`,`set_name`, `set_price`, `set_pict`) VALUES ('$realid','$_POST[set_name]','$_POST[set_price]','$_POST[set_pict]')";
            if(mysqli_query($conn,$query1))
            {
                $query2="INSERT INTO `list_set`(`setmenu_id`, `food_id`, `food_quantity`) VALUES (?,?,?)";
                $stmt=mysqli_prepare($conn,$query2);
                if($stmt)
                {
                    mysqli_stmt_bind_param($stmt,"ssi",$realid,$food_id,$food_quantity);
                    foreach($_SESSION['setting'] as $key => $values)
                    {
                        $food_id=$values['food_id'];
                        $food_quantity=$values['food_quantity'];
                        mysqli_stmt_execute($stmt);
                    }
                    unset($_SESSION['setting']);
                    echo"<script>
                        alert('Set Placed');
                        window.location.href='edit-OurSet.php';
                        </script>";
                }
                else
                {
                    echo"<script>
                    alert('SQL Query Prepare Error');
                    window.location.href='edit-OurSet.php';
                    </script>";
                }
            }
            else
            {
                echo"<script>
                    alert('SQL Error');
                    window.location.href='edit-OurSet.php';
                </script>";
            }
        }
    }

?>