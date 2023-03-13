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
//     $dis = $_POST['dis'];
//     $provice = $_POST['provice'];
//     $addresschecksql = "SELECT 
//     districts.name_th, amphures.name_th, provinces.name_th FROM districts 
//     JOIN amphures ON 
//     districts.amphure_id = amphures.id 
//     JOIN provinces ON 
//     provinces.id = amphures.province_id 
//     WHERE districts.name_th = '$subdis' AND 
//     amphures.name_th = '$dis' AND 
//     provinces.name_th = '$provice' ";
//     $results = mysqli_query($conn, $addresschecksql);
//     if (mysqli_num_rows($results) > 0) {
//         echo 'not_unfound';
//     } else {
//         echo 'unfound';
//     }
//     exit();
// }

// if (isset($_POST['dis_check'])) {
//     $dis = $_POST['dis'];
//     $provice = $_POST['provice'];
//     $addresschecksql = "SELECT 
//     amphures.name_th, provinces.name_th FROM amphures 
//     JOIN provinces ON 
//     provinces.id = amphures.province_id 
//     WHERE amphures.name_th = '$dis' AND 
//     provinces.name_th = '$provice' ";
//     $results = mysqli_query($conn, $addresschecksql);
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

if (isset($_POST['add_branch'])) {
    $branchid = '';
    $branch_name = $_POST['branch_name'];
    $branch_address = $_POST['branch_address'];
    $branch_phone = $_POST['branch_phone'];
    $branch_subdis = $_POST['branch_subdistrict'];
    $branch_dis = $_POST['branch_district'];
    $branch_province = $_POST['branch_province'];
    $branch_postal = $_POST['branch_postal'];

    $insertbsql = "INSERT INTO branch(branchID,branchName,branch_address,branch_subdistrict,branch_district,branch_province,branch_phone,branch_postal) VALUES (?,?,?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$insertbsql)) {
        echo 'Error';
        exit();
    } 
    else {
        mysqli_stmt_bind_param($stmt,"isssssss",$branchid,$branch_name,$branch_address,$branch_subdis,$branch_dis,$branch_province,$branch_phone,$branch_postal);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        echo 'Saved';
        exit();
    }
} 

if(isset($_POST['save_edit'])) {

    $branchID   = $_POST['branchID'];
    $branchName		  = $_POST['branchName'];
    $branch_phone = $_POST['branch_phone'];
    $branch_address		  = $_POST['branch_address'];
    $branch_subdistrict	  = $_POST['branch_subdistrict'];
    $branch_district	  = $_POST['branch_district'];
    $branch_province	  = $_POST['branch_province'];
    $branch_postal = $_POST['branch_postal'];
    $sql = "UPDATE branch 
        SET branchName = '$branchName', 
        branch_address = '$branch_address', 
        branch_subdistrict = '$branch_subdistrict', 
        branch_district = '$branch_district', 
        branch_province = '$branch_province',
        branch_phone = '$branch_phone',
        branch_postal = '$branch_postal'
        WHERE branchID = '$branchID' ";

    $objQuery = mysqli_query($conn, $sql);
    echo 'updated';
    exit();
}

if(isset($_POST['admin_update'])) {
    $cus_email    = $_POST['email'];
    $name		  = $_POST['name'];
    $phone_num 		  = $_POST['phonenum'];
    $address		  = $_POST['address'];
    $subdistrict	  = $_POST['subdis'];
    $district	  = $_POST['dis'];
    $provice	  = $_POST['provice'];
    $user_role = $_POST['role'];
    $postal = $_POST['postal'];

    $usersql = "UPDATE customer
        SET name = '$name',  
        phone_num = '$phone_num', 
        address = '$address', 
        subdistrict = '$subdistrict', 
        district = '$district', 
        provice = '$provice' ,
        user_role = '$user_role',
        postal_num = '$postal'
        WHERE cus_email = '$cus_email' ";
    
    $objQuery = mysqli_query($conn, $usersql);
    echo 'admin_Saved';
    exit();
}


?>