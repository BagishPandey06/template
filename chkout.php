<?php
/**
 * * PHP version 7.2.10
 * 
 * @category Components
 * @package  PackageName
 * @author   Bagish <Bagishpandey999@gmail.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://localhost/training/taskmy/dashboard.php
 */

require 'config.php';
$error=array();
$message='';
$t=0;
session_start();

$data=json_encode($_SESSION['e']);
foreach ($_SESSION['e'] as $key => $v) {
    $t=$v['price']+$t;
}

if (sizeof($error) == 0) {
        $sql = "INSERT INTO ordertab (`cartdata`,`carttotal`,`date`) 
        VALUES ( '$data', '$t',NOW())";
    if ($con->query($sql) === true) {
            header('Location: thank.php');
    } else {
            echo "Error updating record: " . mysqli_error($con);
    }
        $con->close(); 
  
}
?>