<?php
session_start();
include("controls/control.php");
$acc=new Account();
$se_all=$acc->delete_infor($_SESSION['user']);
session_destroy();
//header('location:Login.php');
?>