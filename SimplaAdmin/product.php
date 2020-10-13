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
        require 'header.php'; 
        require 'sidebar.php';
        ?>
        <div id="main-content"> <!-- Main Content Section with everything -->
        
        <noscript> <!-- Show a notification if the user has disabled javascript -->
            <div class="notification error png_bg">
                <div>
                 Javascript is disabled or is not supported by your browser. Please 
                <a href="http://browsehappy.com/"title="Upgrade to a better browser">
                upgrade</a>your browser or 
                <a href="http://www.google.com/support/bin/answer.py?answer=23852"
                title="Enable Javascript in your browser">enable</a>
                 Javascript to navigate the interface properly.
                </div>
            </div>
        </noscript>
        
        <?php
        require "config.php";
        $error=array();
        if (isset($_POST['submit'])) {
             $file= $_FILES["file"]["name"]; 
             $tempname = $_FILES["file"]["tmp_name"];     
             $folder = "image/".$file; 
            if (move_uploaded_file($tempname, $folder)) { 
                 $error=array('input'=>'form','msg'=>'Image Successfully  Added'); 
            } else { 
                $error=array('input'=>'form','msg'=>'Image FAiled to Add');  
            }
             $name=isset($_POST['name'])?$_POST['name']:'';
             $price=isset($_POST['price'])?$_POST['price']:'';
             $sql = 'INSERT INTO cart(`name`,`price`,`img`) 
    VALUES ("'.$name.'", "'.$price.'", "'.$file.'")';
            if ($con->query($sql) === true) {
                $error=array('input'=>'form','msg'=>'data inserted');
            } else {
                $error=array('input'=>'form','msg'=>$con->error);
            }
        }
?>
 <div id="wrapper">
  <div id="signup-form">
  <div id="error">
    <?php if(sizeof($error) >0 ) :?>
  <ul>
    <?php foreach($error as $errors):?>
  <li>
<?php 
echo $error['msg']; break?>
  </li>
    <?php endforeach;?>
  </ul>
    <?php endif; ?>
  </div>
   <h2>ADD-PRODUCT</h2>
   <form action="" method="POST" enctype="multipart/form-data">
    <p>
  <label for="name">product name:<br><input type="text"name="name"required>
  </label>
    </p>
    <p>
<label for="price">product price:<br><input type="text"name="price"required>
</label>
    </p>
    <p>
     <label for="img">product img:<br> <input type="file"name="file"required></label>
    </p>
    <p>
     <input type="submit" name="submit" class="btn"value="SUBMIT">
    </p>
   </form>
 </div>
 

        </div>
        <?php
        require 'footer.php';?>