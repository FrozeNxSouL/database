<?php 
session_start();
require('connect.php');

$acc = $_POST['acc'];
$accpassword = $_POST['acc_password'];

$query = "SELECT * FROM account";

$result = mysqli_query($db, $query);

if (mysqli_num_rows($result) == 1) {

    $row = mysqli_fetch_array($result);

    if ($row == $acc) {
    } 
    else {
        header("Location: index.php");
    }
}

require('disconnect.php');
?>