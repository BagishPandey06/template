<?php
/**
 * * PHP version 7.2.10
 * 
 * @category Components
 * @package  PackageName
 * @author   Bagish <Bagishpandey999@gmail.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://localhost/training/taskmy/update.php
 */
require 'config.php';
$error=array();
$message='';
$id=$_REQUEST["id"];
$result =  "SELECT * FROM user WHERE id=$id";
  $res = $con->query($result);
while ($ab = $res->fetch_assoc()) {
        $username = $ab['username'];
        $role = $ab['role'];
        $email = $ab['email'];
        $password = $ab['password'];
        $id=$ab['id'];
}
if (isset($_POST['submit'])) {

    $id=isset($_POST['id'])?$_POST['id']:'';
    $username=isset($_POST['username'])?$_POST['username']:'';
    $email=isset($_POST['email'])?$_POST['email']:'';
    $password=isset($_POST['password'])?$_POST['password']:'';

    
    if (sizeof($error) == 0) {
        $sql ="UPDATE user SET `username`='$username', `email`='$email',
         `password`='$password' WHERE `id`=$id"; 
        $res = $con->query($sql);
        if ($res) {
            echo "Record updated successfully";
            echo '<script>window.location="mu.php"</script>';
        } else {
            echo "Error updating record: " . mysqli_error($con);
        }
        $con->close();  
    }   
}
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
   <form action="" method="POST" >

   <div id="error">
    <?php if(sizeof($error) >0 ) :?>
  <ul>
    <?php foreach($error as $errors):?>
  <li>
<?php echo $error['msg']; break?>
  </li>
    <?php endforeach;?>
  </ul>
    <?php endif; ?>
  </div>
 
   <p>
  <label for="id">User ID:
  <br><input type="text"name="id"value="<?php echo $id;?>"required>
  </label>
    </p>

    <p>
  <label for="username">Username:
  <br><input type="text"name="username"
  value="<?php echo $username;?>" required />
  </label>
    </p>

    <p>
  <label for="password">Password:
  <br><input type="password" name="password"
  value="<?php echo $password;?>" required />
  </label>
    </p>

    <p>
<label for="email">Email:
<br><input type="email"name="email"
value="<?php echo $email;?>" required /></label>
    </p>

    <p>
     <input type="submit" name="submit" class="button" value="SUBMIT">
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

