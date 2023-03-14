<?php

session_start();

include('php/connect.php');

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if(isset($_POST['Add_To_Set']))
        {
            if(isset($_SESSION['setting']))
            {
                $myset=array_column($_SESSION['setting'],'food_name');
                if(in_array($_POST['food_name'],$myset))
                {
                    echo"<script>
                        window.location.href='edit-OurSet.php';
                    </script>";
                }
                else
                {
                    $count=count($_SESSION['setting']);
                    $_SESSION['setting'][$count] = array('food_id'=>$_POST['food_id'],'food_name'=>$_POST['food_name'],'food_price'=>$_POST['food_price'],'food_quantity'=>1);
                    echo"<script>
                            window.location.href='edit-OurSet.php';
                        </script>";
                }
            }
            else
            {
                $_SESSION['setting'][0]=array('food_id'=>$_POST['food_id'],'food_name'=>$_POST['food_name'],'food_price'=>$_POST['food_price'],'food_quantity'=>1);
                echo"<script>
                        window.location.href='edit-OurSet.php';
                    </script>";
            }
        }
        if(isset($_POST['Remove_Food']))
        {
            foreach($_SESSION['setting'] as $key => $value)
            {
                if($value['food_name']==$_POST['food_name'])
                {
                    unset($_SESSION['setting'][$key]);
                    $_SESSION['setting']=array_values($_SESSION['setting']);
                    echo"<script>
                        window.location.href='edit-OurSet.php';
                    </script>";
                }
            }
        }
        if(isset($_POST['Mod_Quantity']))
        {
            foreach($_SESSION['setting'] as $key => $value)
            {
                if($value['food_name']==$_POST['food_name'])
                {
                    $_SESSION['setting'][$key]['food_quantity']=$_POST['Mod_Quantity'];
                    echo"<script>
                        window.location.href='edit-OurSet.php';
                    </script>";
                }
            }
        }
    }

?>
