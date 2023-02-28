<?php 
    session_start();
    require('connect.php');

    $name= $_REQUEST['name'];
    $password = $_REQUEST['password'];
    $hashpass = password_hash($password, PASSWORD_DEFAULT);
    $email = $_REQUEST['email'];
    $phonenum = $_REQUEST['phonenum'];
    $address = $_REQUEST['address'];
    $subdis = $_REQUEST['subdis'];
    $dis = $_REQUEST['dis'];
    $provice = $_REQUEST['provice'];

?>