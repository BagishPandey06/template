<?php
/**
 * * PHP version 7.2.10
 * 
 * @category Components
 * @package  PackageName
 * @author   Bagish <Bagishpandey999@gmail.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://localhost/training/taskmy/delete.php
 */
$error=array();
$message='';
require 'config.php';
$id=$_REQUEST['id'];
$sql = "DELETE FROM product WHERE `id`=$id";
if ($con->query($sql) === true) {
    $error=array('input'=>'form','message'=>'Data Deleted Succesfully'); 
    header('Location: mp.php');
} else {
    $error=array('input'=>'form','message'=>$con->error); 
}
$con->close();
?>