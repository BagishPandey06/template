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
        require 'config.php';
        $id=$_GET["id"];
        $result =  "SELECT * FROM product WHERE id=$id";
          $res = $con->query($result);
while ($ab = $res->fetch_assoc()) {
                $name = $ab['name'];
                $img = $ab['img'];
                $price = $ab['price'];
                $id=$ab['id'];
                $desc = $ab['descr'];
}
if (isset($_POST['submit'])) {
    $file= $_FILES["file"]["name"];
    $tempname = $_FILES ["file"]["tmp_name"];    
    $folder = "productimg/".$file; 
    if (move_uploaded_file($tempname, $folder)) { 
        $error=array('input'=>'form','msg'=>'Image Successfully  Added'); 
    } else { 
        $error=array('input'=>'form','msg'=>'Image FAiled to Add');  
    }
      $id=isset($_POST['id'])?$_POST['id']:'';
    $name=isset($_POST['name'])?$_POST['name']:'';
    $price=isset($_POST['price'])?$_POST['price']:'';
    $cat=isset($_POST['cat'])?$_POST['cat']:'';
    $tagarr=isset($_POST['tags'])?$_POST['tags']:'';
    $tags="";
    foreach ($tagarr as $val) {
        $tags .=$val .",";
    }
    $desc=isset($_POST['desc'])?$_POST['desc']:'';
    $sql ="UPDATE product SET`name`='$name',`img`='$img',`price`='$price',
    `catid`='$cat',`tags`='$tags',`descr`='$desc' WHERE `id`='$id'"; 
    if ($con->query($sql) === true) {
        echo '<script>alert("product updated succesfully!!");</script>';
        echo '<script>window.location="mp.php";</script>';
    } else { 
        echo $con->error;
    }
}
        $error=array();
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
        
        <!-- Page Head -->
        <h2>Welcome John</h2>
        <p id="page-intro">What would you like to do?</p>
        
        <div class="clear"></div> <!-- End .clear -->
        
        <div class="content-box"><!-- Start Content Box -->
            
            <div class="content-box-header">
                
                <h3>Content box</h3>
                <ul class="content-box-tabs">
                    
                <li><a href="#tab1" class="default-tab">update product</a>
                </li> <!-- href must be unique and match the id of target div -->
                </ul>
                <div class="clear"></div>
                
            </div> <!-- End .content-box-header -->
            
            <div class="content-box-content">
                
            <div class="tab-content default-tab" id="tab1">               
                <h2>ADD-PRODUCT</h2>
   <form action="" method="POST" enctype= multipart/form-data >
    <p>
  <label for="id">product id:<br><input type="text"name="id"
  value="<?php echo $id;?>"required>
  </label>
    </p>
    <p>
<label for="name">product name:<br><input type="text"name="name"
value="<?php echo $name;?>"required>
</label>
    </p>
    <p>
     <label for="price">product price:<br> <input type="text"name="price"
     value="<?php echo $price;?>"required></label>
    </p>
    <p>
<label for="img">product image:<br><input type="file" name="file" required></label>
    </p>
    <p>
    <label for="cat">Choose a categorie:</label>
    <select name="cat" id="cat">
    <?php 
  
    $sql="select * from categorie";
                   $r=mysqli_query($con, $sql);
    while ($row=mysqli_fetch_array($r)) { ?>
                   
                    <option value=" <?php echo $row["catid"];?>" required>
                    <?php echo $row["catname"];?></option>
                    <?php  
    }
                        ?>
</select> 
</p>
<br>
<p>
    <label for="tag">Tags:</label>
    <?php  $sql="select * from tag";
                   $r=mysqli_query($con, $sql);
    while ($row=mysqli_fetch_array($r)) { ?>
                    <input type="checkbox" name="tags[]" value="
                    <?php echo $row["tagname"];?>"  />
                        <?php echo $row["tagname"];?>
                    <?php 
    }
                        ?>
</p>
<p>
                                <label>Description</label>
                                <textarea class="text-input textarea wysiwyg" 
                                id="textarea" name="desc" cols="79" rows="15">
                                <?php echo $desc;?>
                            </textarea>
                            </p>
    <p>
     <input type="submit" name="submit" class="btn"value="SUBMIT">
    </p>
                        
                        <div class="clear"></div><!-- End .clear -->
                        
                    </form>
                    
                </div> <!-- End #tab2 -->        
                
            </div> <!-- End .content-box-content -->
            
        </div> <!-- End .content-box -->
        
        <div class="content-box column-left">
            
            <div class="content-box-header">
                
                <h3>Content box left</h3>
                
            </div> <!-- End .content-box-header -->
            
            <div class="content-box-content">
                
                <div class="tab-content default-tab">
                
                    <h4>Maecenas dignissim</h4>
                    <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscin
                     elit.Sed in porta lectus. Maecenas dignissim enim
                      quis ipsum mattis aliquet.
                      Maecenas id velit et elit gravida bibendum.
                       Duis nec rutrum lorem.
                       Donec egestas metus a risus euismod ultricies.
                        Maecenas lacinia orci at 
                       neque commodo commodo.
                    </p>
                    
                </div> <!-- End #tab3 -->        
                
            </div> <!-- End .content-box-content -->
            
        </div> <!-- End .content-box -->
        
        <div class="content-box column-right closed-box">
            
            <div class="content-box-header">
                 <!-- Add the class "closed" to the Content box header
                  to have it closed by default -->
                
                <h3>Content box right</h3>
                
            </div> <!-- End .content-box-header -->
            
            <div class="content-box-content">
                
                <div class="tab-content default-tab">
                
                    <h4>This box is closed by default</h4>
                    <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing
                     elit. Sed in porta lectus. Maecenas dignissim enim quis
                      ipsum mattis aliquet. Maecenas id velit et elit gravida 
                      bibendum. Duis nec rutrum lorem. Donec egestas
                       metus a risus euismod ultricies. Maecenas 
                       lacinia orci at neque commodo commodo.
                    </p>
                    
                </div> <!-- End #tab3 -->        
                
            </div> <!-- End .content-box-content -->
            
        </div> <!-- End .content-box -->
        <div class="clear"></div>  
        <?php
        require 'footer.php';
        ?>