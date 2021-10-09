<?php
$hostname='localhost';
$user='root';
$pass='';
$database='quanly';

$conn=mysqli_connect($hostname,$user,$pass,$database);
mysqli_query($conn,'set names"utf8"');
?>