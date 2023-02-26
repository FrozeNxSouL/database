<?php

// if (isset($_POST["submit"])) {
    $name= $_REQUEST['name'];
    $password = $_REQUEST['password'];
    $hashpass = password_hash($password, PASSWORD_DEFAULT);
    $email = $_REQUEST['email'];
    $phonenum = $_REQUEST['phonenum'];
    $address = $_REQUEST['address'];
    $subdis = $_REQUEST['subdis'];
    $dis = $_REQUEST['dis'];
    $provice = $_REQUEST['provice'];

    require_once('connect.php');    
    require_once('function.php');

    // emptyInputSignup($email, $password,$name, $phonenum,$address,$subdis,$dis,$provice);
    phonenumcheck($phonenum);
    // checkemail($db,$email);
    // insertDB($db,$email,$hashpass,$name, $phonenum,$address,$subdis,$dis,$provice);
// }
// else {
    header('Location: index.php');
// }



// require('disconnect.php');
