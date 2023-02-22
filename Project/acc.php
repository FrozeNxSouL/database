<?php
session_start();
require('connect.php');

$name= $_REQUEST['name'];
$password = $_REQUEST['password'];
$email = $_REQUEST['email'];
$phonenum = $_REQUEST['phonenum'];
$address = $_REQUEST['address'];
$subdis = $_REQUEST['subdis'];
$dis = $_REQUEST['dis'];
$provice = $_REQUEST['provice'];


$sql = "INSERT INTO customer VALUES ('$email','$name', '$phonenum','$address','$subdis','$dis','$provice')";
mysqli_query($db,$sql);

$sql2 = "INSERT INTO account VALUES ('$email', '$password')";
mysqli_query($db,$sql2);

require('disconnect.php');
?>