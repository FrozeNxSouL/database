<?php
$server = 'localhost';
$user = 'root';
$password = '123456789';
$table = 'mc';

$conn = mysqli_connect($server,$user,$password,$table);
$count=0;
if(isset($_SESSION['cart']))
{
  $count=count($_SESSION['cart']);
}
echo $count;
?>