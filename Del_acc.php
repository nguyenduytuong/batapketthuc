<?php
include("controls/control.php");
$del_id=$_GET['del'];
$acc=new Account();
$se_ac=$acc->delete_acc($del_id);
if($se_ac) header('location:All_account.php');
else echo "Notdelete";
?>