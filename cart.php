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
session_start();
require 'header.php'; 
require 'config.php';

//session_destroy();
// if (empty($_SESSION['e'])) {
//     echo '<script>
//   alert("ADD PRODUCT FIRST!!!");
//   </script>';
//     header("refresh:0;url=product.php");
//     return false;

// }
foreach ($_SESSION['e'] as $key => $a) {
    if (isset($_POST[$key])) {
        $val = $_POST['qty'];
        $id = $a["id"];
        $img = $a["img"];
        $name = $a["name"];
        $price = $a["price"];
        $qty = $a["qty"];

        $sql='SELECT * FROM product where `id`='.$id.'';
        $r=mysqli_query($con, $sql);
        while ($row=mysqli_fetch_array($r)) {
            if ($row["id"] == $a["id"]) {
                $p = $row["price"];
                $cart = array(
                "id" => $id,
                "img" => $img,
                "name" => $name,
                "price" => $p * $val,
                "qty" => $val
                  );
                $_SESSION['e'][$id] = $cart;
                
            }
        }
    }
}
?>

 <!-- Cart view section -->
 <section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table">
             <form action="">
               <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th></th>
                        <th></th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                        <?php 
                        // print_r($_SESSION);
                        foreach ($_SESSION['e'] as $key => $value) {
                            // session_destroy();
                    ?>
                    <tbody>
                      <tr>
                        <td><a class="remove" 
                        href='delcrt.php?id=<?php echo $value['id'];?>
                        '><fa class="fa fa-close"></fa></a></td>
                        <td><?php echo 
                        '<img src="SimplaAdmin/productimg/' . $value['img'] . '">' ?>
                        </td>
                        <td><a class="aa-cart-title" href="#"><?php echo 
                        $value['name']?></a></td>
                        <td><?php echo $value['price']?></td>
                        <td>
                        <form method='POST'>
                        <input type = "text" name ='qty' class="aa-cart-quantity"
                        value="<?php echo $value['qty']?>">
                        <input type='submit' name=
                        "<?php echo $key;?>"value='update'></form>
                        </form>
                        </td>
                        <td><?php 
                        echo $value['price'];
                        ?></td>
                      </tr>
                    <?php
                        }
                    
                    ?>
                      <tr>
                        <td colspan="6" class="aa-cart-view-bottom">
                          <div class="aa-cart-coupon">
                            <input class="aa-coupon-code" 
                            type="text" placeholder="Coupon">
                            <input class="aa-cart-view-btn" 
                            type="submit" value="Apply Coupon">
                          </div>
                  <input class="aa-cart-view-btn" type="submit" value="Update Cart">
                        </td>
                      </tr>
                      </tbody>
                  </table>
                </div>
             </form>
             <!-- Cart Total view -->
             <div class="cart-view-total">
               <h4>Cart Totals</h4>
               <table class="aa-totals-table">
                 <tbody>
                    <?php
                    $t = 0;
                    foreach ($_SESSION['e'] as $key => $value) {
                        $t = $value['price'] + $t;
                    }
                    ?>
                   <tr>
                     <th>Subtotal</th>
                     <td><?php echo $t; ?></td>
                   </tr>
                   <tr>
                     <th>Total</th>
                     <td><?php echo $t; ?></td>
                   </tr> 
                 </tbody>
               </table>
               <a href="chkout.php" class="aa-cart-view-btn">Proced to Checkout</a>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->
<?php
require 'footer.php';
?>