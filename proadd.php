<?php
require 'config.php';
session_start();
    $id=$_REQUEST['id'];
     
    $sql="SELECT * FROM product WHERE `id`=$id";
    $r = $con->query($sql);
    while ($ab=mysqli_fetch_array($r)) {
        $name = $ab['name'];
        $price = $ab['price'];
        $id = $ab['id'];
        $img = $ab['img'];
        $item = array(
          "name" => $name,
          "price" => $price,
          "pr" => $price,
          "id" => $id,
          "qty"=>1,
          "img" => $img
        );
     
        $_SESSION['e'][$id]= $item; 
         echo '<script>alert("Product Added ")</script>';
         echo '<script>window.location="cart.php";</script>
         ';
    
}
?>