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
session_start();
if (isset($_REQUEST['id'])) {
    $id=$_REQUEST['id'];
    $sql="SELECT * FROM product WHERE `id`=$id";
    $res = $con->query($sql);
    
    while ($ab=mysqli_fetch_array($res)) {
        $pri = $ab['price'];
        foreach ($_SESSION['e'] as $key => $value) {
            if ($ab['id'] == $value['id']) {
                $id= $value['id'];
                $name     = $value['name'];
                $price    = $value['price'];
                $img    = $value['img'];
                $qty =$value['qty']+1;
                $item = array(
                "id" => $id,
                "name" => $name,
                "pr"=>$pri,
                "price" => $pri*$qty,
                "qty" => $qty,
                "img" => $img
                    );
                echo '<script>alert("Product Quantity Increased in cart 
                Succefully")
                </script>';
                 header("location:product.php");
                $_SESSION['e'][$id] = $item;

                // show();
                return;
            }
        }
        $name = $ab['name'];
        $price = $ab['price'];
        $id = $ab['id'];
        $img = $ab['img'];
        $qty =1;
        $item = array(
            "name" => $name,
            "price" => $price,
            "pr" => $pri,
            "id" => $id,
            "qty"=> $qty,
            "img" => $img
        );
       
        $_SESSION['e'][$id]= $item; 
        echo '<script>alert("Product Added ")</script>';
        header("location:product.php"); 
    }
}

?>