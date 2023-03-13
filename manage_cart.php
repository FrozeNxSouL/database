<?php

session_start();

include('php/connect.php');

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if(isset($_POST['Add_To_Cart']))
        {
            if(isset($_SESSION['cart']))
            {
                $myfood=array_column($_SESSION['cart'],'food_name');
                if(in_array($_POST['food_name'],$myfood))
                {
                    echo"<script>
                        alert('food Already Added');
                        window.location.href='OurFood.php';
                    </script>";
                }
                else
                {
                    $count=count($_SESSION['cart']);
                    $_SESSION['cart'][$count] = array('food_id'=>$_POST['food_id'],'food_name'=>$_POST['food_name'],'food_price'=>$_POST['food_price'],'food_quantity'=>1);
                    echo"<script>
                            alert('food Added');
                            window.location.href='OurFood.php';
                        </script>";
                }
            }
            else
            {
                $_SESSION['cart'][0]=array('food_id'=>$_POST['food_id'],'food_name'=>$_POST['food_name'],'food_price'=>$_POST['food_price'],'food_quantity'=>1);
                echo"<script>
                        alert('food Added');
                        window.location.href='OurFood.php';
                    </script>";
            }
        }
        if(isset($_POST['Remove_Food']))
        {
            foreach($_SESSION['cart'] as $key => $value)
            {
                if($value['food_name']==$_POST['food_name'])
                {
                    unset($_SESSION['cart'][$key]);
                    $_SESSION['cart']=array_values($_SESSION['cart']);
                    echo"<script>
                        alert('Food Removed');
                        window.location.href='mycart.php';
                    </script>";
                }
            }
        }
        if(isset($_POST['Mod_Quantity']))
        {
            foreach($_SESSION['cart'] as $key => $value)
            {
                if($value['food_name']==$_POST['food_name'])
                {
                    $_SESSION['cart'][$key]['food_quantity']=$_POST['Mod_Quantity'];
                    echo"<script>
                        window.location.href='mycart.php';
                    </script>";
                }
            }
        }
    }


    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if(isset($_POST['Add_To_Cart1']))
        {
            if(isset($_SESSION['cart']))
            {
                $myfood=array_column($_SESSION['cart'],'set_name');
                if(in_array($_POST['set_name'],$myfood))
                {
                    ?>
                    <script>alert('set Already Added');</script>    
                    <?php header('location: OurFood.php'); ?>
<?php
                }
                else
                {
                    $count=count($_SESSION['cart']);
                    $_SESSION['cart'][$count] = array('set_id'=>$_POST['food_id'],'set_name'=>$_POST['food_name'],'set_price'=>$_POST['food_price'],'food_quantity'=>1); 
                    ?>
                    <script type='text/javascript'>alert('set Added');</script>    
                    <?php header('location: OurFood.php'); ?>
<?php
                }
            }
            else
            {
                $_SESSION['cart'][0]=array('set_id'=>$_POST['food_id'],'set_name'=>$_POST['food_name'],'set_price'=>$_POST['food_price'],'food_quantity'=>1);
                ?>
                <script>alert('set Added');</script>    
                <?php header('location: OurFood.php'); ?>
<?php
            }
        }
        if(isset($_POST['Remove_Food']))
        {
            foreach($_SESSION['cart'] as $key => $value)
            {
                if($value['food_name']==$_POST['food_name'])
                {
                    unset($_SESSION['cart'][$key]);
                    $_SESSION['cart']=array_values($_SESSION['cart']);
                    ?>
                    <script>alert('food Removed');</script>    
                    <?php header('location: OurFood.php'); ?>
<?php
                }
            }
        }
        if(isset($_POST['Mod_Quantity']))
        {
            foreach($_SESSION['cart'] as $key => $value)
            {
                if($value['food_name']==$_POST['food_name'])
                {
                    $_SESSION['cart'][$key]['food_quantity']=$_POST['Mod_Quantity'];
                    echo"<script>
                        window.location.href='mycart.php';
                    </script>";
                }
            }
        }
    }


?>