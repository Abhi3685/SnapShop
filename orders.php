<?php include "header.php" ?>
<?php 
session_start();
?>
<?php if(isset($_SESSION['id'])){
    $user_id = $_SESSION['id'];
} else {
    $user_id = 0;
} ?>
       
       <section class="product_listing_area" style="margin-top:20px; margin-bottom:20px;">
            <div class="container">
            <div class="single_c_title" >
                    <h2>Orders History</h2>
            </div>
            </div>
        </section>
        <!--================Shopping Cart Area =================-->
        <section class="shopping_cart_area" style="padding-top:50px;padding-bottom:50px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cart_product_list">
                            <div class="table-responsive-md">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Order No.</th>
                                            <th scope="col" style="text-align:center;">Transaction Id</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Products</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php       
                                            $query1 = "SELECT * FROM users WHERE id = '$user_id'";
                                            $find_user = mysqli_query($conn,$query1);
                                            $row = mysqli_fetch_assoc($find_user);
                                            $customer_name = $row['username'];
                                    
                                            $query = "SELECT * FROM orders WHERE o_customer = '$customer_name'";
                                            $order_detail = mysqli_query($conn,$query);
                                            while($row = mysqli_fetch_assoc($order_detail)){
                                                $o_id = $row['o_id'];
        
                                                $o_status = $row['o_status'];
                                                        
                                                $o_txnid = $row['o_txnid'];
                                                        
                                                $o_amount = $row['o_amt'];

                                                $o_products = $row['o_products'];
                                    ?>
                                        <tr>
                                            <td><p><?php echo $o_id ?></p></td>
                                            <td><p><?php echo $o_txnid ?></p></td>   
                                            <td><p>&#8377; <?php echo $o_amount ?></p></td>
                                            <td><p><?php echo $o_products ?></p></td>
                                        </tr>
                                 <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
  
        <!--================End Shopping Cart Area =================-->


        <!--================Footer Area =================-->
        <?php include "footer.php" ?>