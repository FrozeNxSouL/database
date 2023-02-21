<?php
session_start();
require('connect.php');

$acc = $_REQUEST['acc'];
$password = $_REQUEST['acc_password'];

$sql = "INSERT INTO account VALUES ('$acc', '$password')";

mysqli_query($db,$sql);

mysqli_close($db);

header("Location: database.html");
?>