<?php
        require "config.php";
        $error=array();
        if (isset($_POST['submit'])) {
             $file= $_FILES["file"]["name"]; 
             $tempname = $_FILES["file"]["tmp_name"];     
             $folder = "productimg/".$file; 
            if (move_uploaded_file($tempname, $folder)) { 
                 $error=array('input'=>'form','msg'=>'Image Successfully  Added'); 
            } else { 
                $error=array('input'=>'form','msg'=>'Image FAiled to Add');  
            }
             $name=isset($_POST['name'])?$_POST['name']:'';
             $price=isset($_POST['price'])?$_POST['price']:'';
             $cat=isset($_POST['cat'])?$_POST['cat']:'';
             $desc=isset($_POST['desc'])?$_POST['desc']:'';
             $sql = 'INSERT INTO product(`name`,`price`,`img`,`catid`,`desc`) 
    VALUES ("'.$name.'", "'.$price.'", "'.$file.'","'.$cat.'","'.$desc.'")';
            if ($con->query($sql) === true) {
                $error=array('input'=>'form','msg'=>'data inserted');
            } else {
                $error=array('input'=>'form','msg'=>$con->error);
            }
        }
?>
         