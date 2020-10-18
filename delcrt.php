<?php
session_start();
$id=$_REQUEST['id'];
unset($_SESSION['e'][$id]);
header("location:product.php");
?>