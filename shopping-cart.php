<?php include "header.php" ?>
<?php 
session_start();
?>
<?php if(isset($_SESSION['id'])){
    $user_id = $_SESSION['id'];
} else {
    $user_id = 0;
} ?>
   <?php   

if(isset($_GET['delete']))
{
    $the_c_id = $_GET['delete'];
    $query = "DELETE FROM cart WHERE c_id = {$the_c_id}";
    $delete_query = mysqli_query($conn, $query);
    $query1 = "SELECT * FROM cart WHERE user_id = '$user_id'";
    $find_cart = mysqli_query($conn, $query1);
    $order_count = mysqli_num_rows($find_cart);
    if($order_count>0){
    echo "<script type='text/javascript'>window.location.href = 'shopping-cart.php';</script>";
    } else {
        echo "<script type='text/javascript'>window.location.href = 'empty-cart.php';</script>";
    }
}

?>
               
        <!--================Shopping Cart Area =================-->
        <section class="shopping_cart_area p_100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="cart_product_list">
                            <h3 class="cart_single_title">Discount Cupon</h3>
                            <div class="table-responsive-md">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col">product</th>
                                            <th scope="col">price of each</th>
                                            <th scope="col">quantity</th>
                                            <th scope="col">price</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php            
                                            $query = "SELECT * FROM cart WHERE user_id = '$user_id'";
                                            $cart_items = mysqli_query($conn,$query);
                                            while($row = mysqli_fetch_assoc($cart_items)){
                                                $c_id = $row['c_id'];
        
                                                $c_title = $row['c_title'];
                                                        
                                                $c_price = $row['c_price'];
                                                        
                                                $c_img = $row['c_img'];

                                                $product_id = $row['pid'];

                                                $quantity = $row['quantity'];

                                                $c_total = $c_total + $c_price;

                                                $productinfo .= $c_title.",";

                                    ?>
                                        <tr>
                                            <th scope="row">
                                            <a href="shopping-cart.php?delete='<?php echo $c_id ; ?>'"><i class="fa fa-window-close fa-2x" aria-hidden="true"></i></a>
                                            </th>
                                            <td>
                                                <div class="media">
                                                    <div class="d-flex" style="width:140px; height:120px;">
                                                        <img src="img/product/product_new/<?php echo $c_img; ?>" style="max-height:100%; max-width:100%">
                                                    </div>
                                                    <div class="media-body">
                                                        <h4><?php echo $c_title; ?></h4>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><p>&#8377; <?php echo number_format( (float) $c_price/$quantity, 2, '.', ''); ?></p></td>   
                                            <td><p>&#8377; <?php echo $quantity ?></p></td>
                                            <td><p>&#8377; <?php echo number_format( (float) $c_price, 2, '.', ''); ?></p></td>
                                        </tr>
                                 <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="total_amount_area">
                            <div class="cart_totals">
                                <h3 class="cart_single_title">Total cart</h3>
                                <div class="cart_total_inner">
                                    <ul>
                                        <li><a href="#"><span>Cart Subtotal</span>&#8377; <?php echo $c_total; ?></a></li>
                                        <li><a href="#"><span>Shipping</span> Free</a></li>
                                        <li><a href="#"><span>Totals</span>&#8377; <?php echo $c_total; ?></a></li>
                                    </ul>
                                </div>
                                <button type="submit" class="btn btn-primary update_btn" onclick="window.location.href='index.php'";>update cart</button>                             
                                <?php
                                    $query = "SELECT * FROM users WHERE id = $user_id";
                                    $user_details = mysqli_fetch_assoc(mysqli_query($conn,$query));
                                ?>
                                <form method="POST" action="PayUMoney_form.php">
                                    <input type="text" name="amount" value="<?php echo $c_total;?>" hidden>
                                    <input type="text" name="firstname" value="<?php echo $user_details['username'];?>" hidden>
                                    <input type="text" name="email" value="<?php echo $user_details['email'];?>" hidden>
                                    <input type="text" name="phone" value="<?php echo $user_details['mobile'];?>" hidden>
                                    <input type="text" name="productinfo" value="<?php print_r($productinfo); ?>" hidden>
                                    <input type="text" name="lastname" value="" hidden>
                                    <input type="text" name="address1" value="Rohini" hidden>
                                    <input type="text" name="city" value="Delhi" hidden>
                                    <input type="text" name="state" value="Delhi" hidden>
                                    <input type="text" name="country" value="India" hidden>
                                    <input type="text" name="zipcode" value="110035" hidden>
                                    <button type="submit" class="btn btn-primary checkout_btn" style="margin-left:0px;">proceed to checkout</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
  
        <!--================End Shopping Cart Area =================-->


        <!--================Footer Area =================-->
        <?php include "footer.php" ?>