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

// if (isset($_POST['subdis_check'])) {
//     $subdis = $_POST['subdis'];
//     $sql = "SELECT * FROM districts WHERE name_th = '$subdis'";
//     $results = mysqli_query($conn, $sql);
//     if (mysqli_num_rows($results) > 0) {
//         echo 'not_unfound';
//     } else {
//         echo 'unfound';
//     }
//     exit();
// }

// if (isset($_POST['dis_check'])) {
//     $dis = $_POST['dis'];
//     $sql = "SELECT * FROM amphures WHERE name_th = '$dis'";
//     $results = mysqli_query($conn, $sql);
//     if (mysqli_num_rows($results) > 0) {
//         echo 'not_unfound';
//     } else {
//         echo 'unfound';
//     }
//     exit();
// }

// if (isset($_POST['provice_check'])) {
//     $provice = $_POST['provice'];
//     $sql = "SELECT * FROM provinces WHERE name_th = '$provice' ";
//     $results = mysqli_query($conn, $sql);
//     if (mysqli_num_rows($results) > 0) {
//         echo 'not_unfound';
//     } else {
//         echo 'unfound';
//     }
//     exit();
// }

if (isset($_POST['postal_check'])) {
    $subdis = $_POST['subdis'];
    $dis = $_POST['dis'];
    $provice = $_POST['provice'];
    $postal = $_POST['postal'];
    if (strlen($postal)===5) {
        if (!preg_match("/^[0-9]*$/", $postal)) { 
            echo 'errorletter';
            exit();
        }
        else {
            $addresschecksql = "SELECT 
            districts.zip_code,districts.name_th, amphures.name_th, provinces.name_th FROM districts 
            JOIN amphures ON 
            districts.amphure_id = amphures.id 
            JOIN provinces ON 
            provinces.id = amphures.province_id 
            WHERE districts.zip_code = '$postal' AND 
            districts.name_th = '$subdis' AND 
            amphures.name_th = '$dis' AND 
            provinces.name_th = '$provice' ";
            $adcquery = $conn->query($addresschecksql);
            if (mysqli_num_rows($adcquery) > 0) {
                echo 'not_unfound';
            } 
            else {
                echo 'wad';
            }
            exit();
        }
    }
    else {

        echo 'error';
        exit();
    }
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
    $postal = $_POST['postal'];
    $role = 0;
    if (empty($email) || empty($password) || empty($name) || empty($phonenum) || empty($address) || empty($postal) ) {
        echo 'Empty';      
        exit();
    }
    
    else {
        $sql = "INSERT INTO customer(cus_email,password,name,phone_num,address,subdistrict,district,provice,postal_num,user_role) VALUES ( ?,?, ?, ?, ?, ?, ?, ?, ?,?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt,$sql)) {
            echo 'Error';
            exit();
        } 
        else {
            mysqli_stmt_bind_param($stmt,"sssssssssi",$email,$hashpass,$name, $phonenum,$address,$subdis,$dis,$provice,$postal,$role);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            $sql = "SELECT * FROM customer WHERE cus_email = '$email' AND password = '$hashpass' ";
            $results = $conn->query($sql);
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
    $postal = $_POST['postal'];
    $role = 0;
    if (empty($name) || empty($phonenum) || empty($address) || empty($subdis) || empty($dis) || empty($provice) || empty($postal)) {
        echo 'Empty';      
        exit();
    }
    else {
        $sql2 = "UPDATE customer
        SET name = '$name', phone_num = '$phonenum', address = '$address',subdistrict = '$subdis',district = '$dis',provice = '$provice',postal_num = '$postal'
        WHERE cus_email = '$email';";
        $query = mysqli_query($conn,$sql2);
        echo 'Saved';
        exit();
        
    }
}

?>