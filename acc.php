<?php

function fetchuser($db,$email) {
    $sql = "SELECT * FROM customer WHERE email = $email";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_assoc($result);
    return $row;
}

//     $name= $_POST['name'];
//     $email = $_POST['email'];
//     $phonenum = $_POST['phonenum'];
//     $address = $_POST['address'];
//     $subdis = $_POST['subdis'];
//     $dis = $_POST['dis'];
//     $provice = $_POST['provice'];
    
//     require_once('function.php');

//     emptyInputSignup($email, $password,$name, $phonenum,$address,$subdis,$dis,$provice);
//     // phonenumcheck($phonenum);
//     // checkemail($db,$email);
//     // insertDB($db,$email,$hashpass,$name, $phonenum,$address,$subdis,$dis,$provice);
// // }
// // else {
//     header('Location: index.php');
// }



// require('disconnect.php');
