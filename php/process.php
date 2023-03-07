<?php 

session_start();
require_once('php/connect.php');

if (isset($_POST['email_check'])) {
    $email = $_POST['email'];
    $sql = "SELECT * FROM customer WHERE cus_email = '$email' ";
    $results = mysqli_query($conn, $sql);
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
    $role = 0;
    if (empty($email) || empty($password) || empty($name) || empty($phonenum) || empty($address) || empty($subdis) || empty($dis) || empty($provice)) {
        echo 'Empty';      
        exit();
    }
    else {
        $sql = "INSERT INTO customer(cus_email,password,name,phone_num,address,subdistrict,district,provice,user_role) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?,?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt,$sql)) {
            echo 'Error';
            exit();
        } 
        else {
            mysqli_stmt_bind_param($stmt,"ssssssssi",$email,$hashpass,$name, $phonenum,$address,$subdis,$dis,$provice,$role);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            $sql = "SELECT * FROM customer WHERE cus_email = '$email' AND password = '$hashpass' ";
    $results = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($results);
            echo 'Saved';
            $_SESSION['email'] = $email;
            $_SESSION['role'] = $row['user_role'];
            exit();
        }
    }
}

if (isset($_POST['search'])) {
    $acc = $_POST['acc'];
    $acc_password = $_POST['acc_password'];
    $acc_hashpassword = md5($acc_password) ;
    $sql = "SELECT * FROM customer WHERE cus_email = '$acc' AND password = '$acc_hashpassword' ";
    $results = mysqli_query($conn, $sql);
    if (mysqli_num_rows($results) > 0) {
        echo 'correct';
        $row = mysqli_fetch_assoc($results);
        $_SESSION['email'] = $acc;
        $_SESSION['role'] = $row['user_role'];
    } 
    else {
        $sql1 = "SELECT * FROM customer WHERE cus_email = '$acc'";
        $accresults = mysqli_query($conn, $sql1);
        if (mysqli_num_rows($accresults) > 0) {
            echo 'wrongpw';
        } 
        else {
            echo 'noacc';
        }
    }
    exit();
}

if (isset($_POST['update'])) {
    $name= $_POST['name'];
    // $password = $_POST['password'];
    // $hashpass = md5($password) ;
    $email = $_POST['email'];
    $phonenum = $_POST['phonenum'];
    $address = $_POST['address'];
    $subdis = $_POST['subdis'];
    $dis = $_POST['dis'];
    $provice = $_POST['provice'];
    $role = 0;
    if (empty($name) || empty($phonenum) || empty($address) || empty($subdis) || empty($dis) || empty($provice)) {
        echo 'Empty';      
        exit();
    }
    else {
        $sql2 = "UPDATE customer
        SET name = '$name', phone_num = '$phonenum', address = '$address',subdistrict = '$subdis',district = '$dis',provice = '$provice'
        WHERE cus_email = '$email';";
        $query = mysqli_query($conn,$sql2);
        echo 'Saved';
        exit();
        
    }
}

?>