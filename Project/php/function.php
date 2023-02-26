<?php
$_SESSION['error'] = "none";

function emptyInputSignup($email, $password,$name, $phonenum,$address,$subdis,$dis,$provice) {
    if (empty($email) || empty($password) || empty($name) || empty($phonenum) || empty($address) || empty($subdis) || empty($dis) || empty($provice)) {
        $_SESSION['error'] = "emptyinput";
        
        return $_SESSION['error'];
    }
}

function phonenumcheck($phonenum) {
    if (strlen($phonenum)===10) {
        if (!preg_match("/^[0-9]*$/", $phonenum)) {
            header("Location: index.php?error=phoneinput");
            exit();
        }
        else {
            header("Location: index.php");
            exit();
        }
    }
    else {
        header("Location: index.php?error=phoneletterinput");
        exit();
    }
}

function checkemail($db,$email) {
    $sql = "SELECT * FROM customer WHERE email = ?";
    $stmt = mysqli_stmt_init($db);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("Location: index.php?error=DBerror");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"s",$email);
    mysqli_stmt_execute($stmt);

    $resultdata = mysqli_stmt_get_result($stmt);

    if (mysqli_fetch_assoc($resultdata)) {
        header("Location: index.php?error=none");
    }
    else {
        header("Location: index.php?error=emailexist");
    }

    mysqli_stmt_close($stmt);
}

function insertDB($db,$email,$hashpass,$name, $phonenum,$address,$subdis,$dis,$provice) {
    $sql = "INSERT INTO customer(email,password,name,phone_num,address,subdistrict,district,provice) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_stmt_init($db);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("Location: index.php?error=DBerror");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"ssssssss",$email,$hashpass,$name, $phonenum,$address,$subdis,$dis,$provice);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("Location: index.php");
}