<?php 

require_once('connect.php');


if (isset($_POST['email_check'])) {
    $email = $_POST['email'];
    $sql = "SELECT * FROM customer WHERE email = '$email' ";
    $results = mysqli_query($db, $sql);
    if (mysqli_num_rows($results) > 0) {
        echo 'taken';
    } else {
        echo 'not_taken';
    }
    exit();
}

if (isset($_POST['phone_check'])) {
    $phonenum = $_POST['phonenum'];
    if (strlen($phonenum)===10) {
        if (!preg_match("/^[0-9]*$/", $phonenum)) {
            echo 'errorletter';
            exit();
        }
        else {
            echo 'pass';
            exit();
        }
    }
    else {
        echo 'error';
        exit();
    }
}


if (isset($_POST['save'])) {
    $name= $_POST['name'];
    $password = $_POST['password'];
    $hashpass = md5($password) ;
    $email = $_POST['email'];
    $phonenum = $_POST['phonenum'];
    $address = $_POST['address'];
    $subdis = $_POST['subdis'];
    $dis = $_POST['dis'];
    $provice = $_POST['provice'];
    if (empty($email) || empty($password) || empty($name) || empty($phonenum) || empty($address) || empty($subdis) || empty($dis) || empty($provice)) {
        echo 'Empty';      
        exit();
    }
    else {
        $sql = "INSERT INTO customer(email,password,name,phone_num,address,subdistrict,district,provice) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($db);
        if (!mysqli_stmt_prepare($stmt,$sql)) {
            echo 'Error';
            exit();
        } 
        else {
            mysqli_stmt_bind_param($stmt,"ssssssss",$email,$hashpass,$name, $phonenum,$address,$subdis,$dis,$provice);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            echo 'Saved';
            $_SESSION['email'] = $email;
            $_SESSION['login'] = 1;
            exit();
        }
    }
}

if (isset($_POST['search'])) {
    $acc = $_POST['acc'];
    $acc_password = $_POST['acc_password'];
    $acc_hashpassword = md5($acc_password) ;
    $_SESSION['email'] = '';
    $sql = "SELECT * FROM customer WHERE email = '$acc' AND password = '$acc_hashpassword' ";
    $results = mysqli_query($db, $sql);
    if (mysqli_num_rows($results) > 0) {
        echo 'correct';
        // header('Location: index.php?email=$acc_email');
        $_SESSION['email'] = $acc;
        $_SESSION['login'] = 1;
    } 
    else {
        $sql1 = "SELECT * FROM customer WHERE email = '$acc'";
        $accresults = mysqli_query($db, $sql1);
        if (mysqli_num_rows($accresults) > 0) {
            echo 'wrongpw';
        } 
        else {
            echo 'noacc';
        }
    }
    exit();
}


?>