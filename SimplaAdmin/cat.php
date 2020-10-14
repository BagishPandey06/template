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

if (isset($_POST['submit'])) {
            $cat=isset($_POST['cat'])?$_POST['cat']:'';
                    $sql = 'INSERT INTO categorie(`catname`) 
           VALUES ("'.$cat.'")';
    if ($con->query($sql) === true) {
                       $error=array('input'=>'form','msg'=>'data inserted');
    } else {
                       $error=array('input'=>'form','msg'=>$con->error);
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
                    <li><a href="#tab1" class="default-tab">Manage product</a>
                </li> <!-- href must be unique and match the id of target div -->
                    <li><a href="#tab2">ADD Categorie</a></li>
                </ul>
                
                <div class="clear"></div>
                
            </div> <!-- End .content-box-header -->
            
            <div class="content-box-content">
                
            <div class="tab-content default-tab" id="tab1"> 
            <!-- This is the target div. id must match the href of this div's tab -->

                    <div class="notification attention png_bg">
                    <a href="#" class="close">
                    <img src="resources/images/icons/cross_grey_small.png"
                    title="Close this notification" alt="close"/>
                    </a>
                        <div>
                    This is a Content Box. You can put whatever you want in 
                    it. By the way,you can close this notification with 
                    the top-right cross.
                        </div>
                    </div>
                    
                    <table>
                        
                        <thead>
                            <tr>
                                <!-- <th><input 
                                class="check-all" type="checkbox" /></th> -->
                                <th>Id</th>
                                <th>Categorie Name</th> 
                                <th>Action</th>  
                            </tr>
                            
                        </thead>
                        
                        <tfoot>
                            <tr>
                                <td colspan="6">
                                    <div class="bulk-actions align-left">
                                        <select name="dropdown">
                                        <option value="option1">
                                            Choose an action...</option>
                                            <option value="option2">Edit</option>
                                            <option value="option3">Delete</option>
                                        </select>
                                        <a class="button" href="#">
                                            Apply to selected</a>
                                    </div>
                                    
                                    <div class="pagination">
                                    <a href="#" title="First Page">&laquo; First</a>
                                    <a href="#" title="Previous Page">&laquo; 
                                        Previous</a>
                                        <a href="#" class="number" title="1">1</a>
                                        <a href="#" class="number" title="2">2</a>
                                    <a href="#" class="number current" title="3">
                                        3</a>
                                        <a href="#" class="number" title="4">4</a>
                                    <a href="#" title="Next Page">Next &raquo;</a>
                                    <a href="#" title="Last Page">Last &raquo;</a>
                                    </div> <!-- End .pagination -->
                                    <div class="clear"></div>
                                </td>
                            </tr>
                        </tfoot>
                        
                        <tbody>
                        <?php
                          require 'config.php';
                          $sql="select * from categorie";
                          $r=mysqli_query($con, $sql);
                        while ($row=mysqli_fetch_array($r)) { 
                        ?>
                            <tr>
                                <!-- <td><input type="checkbox" /></td> -->
                                <td><?php echo $row["id"];?></td>
                                <td><?php echo $row["catname"];?></td>
                                <td>
                                    <!-- Icons -->
                                    <a href='delcat.php?id=
                                    <?php echo $row["id"];?>' title="Delete">
                                        <img src="resources/images/icons/cross.png"
                                         alt="Delete" /></a> 
                                </td>
                            </tr>
                        <?php 
                        }
?>
                          
                        </tbody>
                        
                    </table>
                    
                </div> <!-- End #tab1 -->
                
                <div class="tab-content" id="tab2">
 
                <h2>Enter categorie You want to add</h2>
        <form action="" method="POST" >
        <p>
<label for="cat">new categorie:<br><input type="text"name="cat"required>
</label>
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
        require 'footer.php';?>