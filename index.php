<?php include "header.php" ?>


<style>
    .btn-info {
        color: #3c3cff;
        background-color: #3c3cff;
        border-color: #3c3cff;
    }

    .btn-info:hover {
        color: white;
        background-color: white;
        border-color: white;
    }

    .btn-outline-info:hover {
    color: #3c3cff;
    background-color: #3c3cff;
    border-color: #17a2b8;
    }
</style>


<!-- Modal: modalAbandonedCart-->
<div class="modal fade right" id="modalAbandonedCart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-info" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header" style="background-color: #3c3cff; color: #fff; font-size: 18px;">
        <p class="heading">Product has been added to the cart
        </p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">

        <div class="row">
          <div class="col-3">
            <p></p>
            <p class="text-center"><i class="fa fa-shopping-cart fa-4x"></i></p>
          </div>

          <div class="col-9" style="font-size: 17px; line-height: 28px;">
            <p>Do you need more time to make a purchase decision?</p>
            <p>No pressure, your product will be waiting for you in the cart.</p>
          </div>
        </div>
      </div>

      <!--Footer-->
      <div class="modal-footer justify-content-center">
        <a type="button" onclick="window.location.href='shopping-cart.php'"; class="btn btn-info">Go to cart</a>
        <a onclick="location.reload();" type="button" class="btn btn-outline-info waves-effect" data-dismiss="modal">Cancel</a>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
<!-- Modal: modalAbandonedCart-->

<style>
.p_list_text h3:before {
    background: #3c3cff;
}
.p_list_text ul li:hover a,.fillter_l_p_inner .fillter_l_p li.active a, .fillter_l_p_inner .fillter_l_p li:hover a,.l_product_item .l_p_text h5  {
    color: #3c3cff;
}
=
</style>
        <!--================End Menu Area =================-->


        <!--================Home Carousel Area =================-->
        <section class="home_carousel_area">
            <div class="home_carousel_slider owl-carousel">
                <div class="item">
                    <div class="h_carousel_item">
                        <img src="img/home-carousel/home-c-1.jpg" alt="">
                        <div class="carousel_hover">
                            <h3>Furniture</h3>
                            <h4>We sell the best furniture </h4>
                            <h5>Material:</h5>
                            <p>Metal, Steel, Wood, SunMica, Glass, Leather</p>
                            <a class="discover_btn" href="#">discover now</a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="h_carousel_item">
                        <img src="img/home-carousel/home-c-2.jpg" alt="">
                        <div class="carousel_hover">
                            <h3>Women</h3>
                            <h4>We feature the best women clothings </h4>
                            <h5>Including:</h5>
                            <p>Jeans, Shoes, Tops, Purses, Jackets, Kurti</p>
                            <a class="discover_btn" href="#">discover now</a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="h_carousel_item">
                        <img src="img/home-carousel/home-c-3.jpg" alt="">
                        <div class="carousel_hover">
                            <h3>Gadgets</h3>
                            <h4>We have all the gadgets </h4>
                            <h5>Including:</h5>
                            <p>Phones, Tablets, Headphones, Smart Watches, Laptops</p>
                            <a class="discover_btn" href="#">discover now</a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="h_carousel_item">
                        <img src="img/home-carousel/home-c-4.jpg" alt="">
                        <div class="carousel_hover">
                            <h3>Men</h3>
                            <h4>We feature the best men clothings </h4>
                            <h5>Including:</h5>
                            <p>Jeans, Shoes, Trousers, Shirts, Coats, T-Shirts</p>
                            <a class="discover_btn" href="#">discover now</a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="h_carousel_item">
                        <img src="img/home-carousel/home-c-5.jpg" alt="">
                        <div class="carousel_hover">
                            <h3>Electronics</h3>
                            <h4>We sell the best electronics </h4>
                            <h5>Including:</h5>
                            <p>Television, Refrigerator, Washing Machine, Microwave, Gas Stove</p>
                            <a class="discover_btn" href="#">discover now</a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="h_carousel_item">
                        <img src="img/home-carousel/home-c-6.jpg" alt="">
                        <div class="carousel_hover">
                            <h3>Sports</h3>
                            <h4>We feature the best sports equipments </h4>
                            <h5>Including:</h5>
                            <p>Cricket, Football, Basketball, Baseball, Badminton</p>
                            <a class="discover_btn" href="#">discover now</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Home Carousel Area =================-->
        
        <!--================Special Offer Area =================-->
        <section class="special_offer_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="special_offer_item">
                            <img class="img-fluid" src="img/feature-add/special-offer-1.jpg" alt="">
                            <div class="hover_text">
                                <h4>Special Offer</h4>
                                <h5>Young Couple</h5>
                                <a class="shop_now_btn" href="#">Shop Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="special_offer_item2">
                            <img class="img-fluid" src="img/feature-add/special-offer-2.jpg" alt="">
                            <div class="hover_text">
                                <h5>girls bag</h5>
                                <a class="shop_now_btn" href="#">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Special Offer Area =================-->

        <!--================Category_listing Area =================-->
        <section class="product_listing_area" style="margin-top:40px; margin-bottom:0px;">
            <div class="container">
            <div class="single_c_title" style="margin-bottom:40px;" >
                    <h2>Our Categories</h2>
                </div>
                <div class="row p_listing_inner">
                    <?php

                        $query = "SELECT * FROM categories";    
                        $select_all_category_query = mysqli_query($conn,$query);

                        while($row = mysqli_fetch_assoc($select_all_category_query)) {
                        $cat_id = $row['cat_id'];
                        $cat_title = $row['cat_title'];
                        $cat_img = $row['cat_img'];
                        $cat_sub = $row['cat_sub'];

                    ?>
                    
                    <div class="col-lg-4" style="padding-top:20px;">
                        <div class="row">
                            <div class="col-lg-6 col-sm-8">
                                <div class="p_list_text">
                                    <h3><?php echo $cat_title ?></h3>
                                    <ul style ="padding-top: 3px">
                                        <?php $tags = explode(",", $row['cat_sub']); foreach($tags as $tag){ ?>
                                        <li><i class="fa fa-adjust" style="padding-right:8px;"></i><a href="categories.php?sub_cat=<?php echo $tag; ?>"><?php echo $tag; ?></a></li><?php } ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-4">
                                <div class="p_list_img">
                                    <img src="img/product/p-categories-list/<?php echo $cat_img;?>" style="max-height:100%; max-width:100%;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    
                </div>
            </div>
        </section>
        <!--================End Category_listing Area =================-->
        
        <!--================Latest Product isotope Area =================-->
        <section class="fillter_latest_product">
            <div class="container">
                <div class="single_c_title">
                    <h2>Featured Products</h2>
                </div>
                <div class="fillter_l_p_inner">
                    <ul class="fillter_l_p">
                        <li class="active" data-filter=".all"><a href="#">All</a></li>
                        <li data-filter=".woman"><a href="#">Women</a></li>
                        <li data-filter=".man"><a href="#">Men</a></li>
                        <li data-filter=".gadget"><a href="#">Gadget</a></li>
                        <li data-filter=".electronics"><a href="#">Electronics</a></li>
                        <li data-filter=".furniture"><a href="#">Furniture</a></li>
                        <li data-filter=".sports"><a href="#">Sports</a></li>
                    </ul>
                    <div class="row isotope_l_p_inner">
                        <?php

                            $query = "SELECT * FROM products WHERE p_cat IN ('shirts','t-shirts','men jeans','trousers','men shoes') LIMIT 4";    
                            $select_men_query = mysqli_query($conn,$query);

                            while($row = mysqli_fetch_assoc($select_men_query)) {
                            $p_id = $row['p_id'];
                            $p_title = $row['p_title'];
                            $p_img = $row['p_img'];
                            $p_price = $row['p_price'];
                            if($p_price <1000){
                                $num = (rand(100,400));
                                } else if ($p_price > 1000 && $p_price < 7000 ) {
                                    $num = (rand(500,1000)); 
                                } else {
                                    $num = (rand(2000,7000)); 
                                }
                                $p_g_price= $p_price + $num;
                        ?>
                        <div class="col-lg-3 col-md-4 col-sm-6 man all">
                            <div class="l_product_item">
                                    <div class="l_p_img">
                                        <img class="img-fluid" src="img/product/product_new/<?php echo $p_img ?>">
                                        <h5 class="sale">Sale</h5>
                                    </div>
                                    <div class="l_p_text">
                                    <ul>
                                            <li class="p_icon"><a href="product-details.php?p_name=<?php echo $p_title ?>"><i class="icon_piechart"></i></a></li>
                                            <li><button class="add_cart_btn" id="<?php echo $p_id; ?>" <?php if(isset($_SESSION['id'])) {echo "onclick= 'add_to_cart(this.id)'";} else { echo 'onclick= "window.location.href = \'login.php\';"';} ?>>Add To Cart</button></li>
                                            <li class="p_icon"><a href="#"><i class="icon_heart_alt"></i></a></li>
                                        </ul>
                                        <h4><?php echo $p_title ?></h4>
                                        <h5><del>&#8377; <?php echo $p_g_price ?></del>&nbsp;&nbsp;&#8377;<?php echo $p_price ?></h5>
                                    </div>
                            </div>
                        </div>
                            <?php } ?>

                            <?php

                        $query = "SELECT * FROM products WHERE p_cat IN ('Purses','Shoes','Jackets','Tops','Jeans') LIMIT 4";    
                        $select_women_query = mysqli_query($conn,$query);

                        while($row = mysqli_fetch_assoc($select_women_query)) {
                        $p_id = $row['p_id'];
                        $p_title = $row['p_title'];
                        $p_img = $row['p_img'];
                        $p_price = $row['p_price'];
                        if($p_price <1000){
                            $num = (rand(100,400));
                            } else if ($p_price > 1000 && $p_price < 7000 ) {
                                $num = (rand(500,1000)); 
                            } else {
                                $num = (rand(2000,7000)); 
                            }
                            $p_g_price= $p_price + $num;
                        ?>
                        <div class="col-lg-3 col-md-4 col-sm-6 woman all">
                        <div class="l_product_item">
                                <div class="l_p_img">
                                    <img class="img-fluid" src="img/product/product_new/<?php echo $p_img ?>">
                                    <h5 class="sale">Sale</h5>
                                </div>
                                <div class="l_p_text">
                                <ul>
                                            <li class="p_icon"><a href="product-details.php?p_name=<?php echo $p_title ?>"><i class="icon_piechart"></i></a></li>
                                            <li><button class="add_cart_btn" id="<?php echo $p_id; ?>" <?php if(isset($_SESSION['id'])) {echo "onclick= 'add_to_cart(this.id)'";} else { echo 'onclick= "window.location.href = \'login.php\';"';} ?>>Add To Cart</button></li>
                                            <li class="p_icon"><a href="#"><i class="icon_heart_alt"></i></a></li>
                                    </ul>
                                    <h4><?php echo $p_title ?></h4>
                                    <h5><del>&#8377; <?php echo $p_g_price ?></del>&nbsp;&nbsp;&#8377;<?php echo $p_price ?></h5>
                                </div>
                        </div>
                        </div>
                        <?php } ?>
                        <?php

                            $query = "SELECT * FROM products WHERE p_cat IN ('Mobiles','Tablets','Headphones','Smart Watches','Laptops') LIMIT 4";    
                            $select_gadgets_query = mysqli_query($conn,$query);

                            while($row = mysqli_fetch_assoc($select_gadgets_query)) {
                            $p_id = $row['p_id'];
                            $p_title = $row['p_title'];
                            $p_img = $row['p_img'];
                            $p_price = $row['p_price'];
                            if($p_price <1000){
                                $num = (rand(100,400));
                                } else if ($p_price > 1000 && $p_price < 7000 ) {
                                    $num = (rand(500,1000)); 
                                } else {
                                    $num = (rand(2000,7000)); 
                                }
                                $p_g_price= $p_price + $num;
                        ?>
                            <div class="col-lg-3 col-md-4 col-sm-6 gadget all">
                            <div class="l_product_item">
                                    <div class="l_p_img">
                                        <img class="img-fluid" src="img/product/product_new/<?php echo $p_img ?>">
                                        <h5 class="sale">Sale</h5>
                                    </div>
                                    <div class="l_p_text">
                                    <ul>
                                            <li class="p_icon"><a href="product-details.php?p_name=<?php echo $p_title ?>"><i class="icon_piechart"></i></a></li>
                                            <li><button class="add_cart_btn" id="<?php echo $p_id; ?>" <?php if(isset($_SESSION['id'])) {echo "onclick= 'add_to_cart(this.id)'";} else { echo 'onclick= "window.location.href = \'login.php\';"';} ?>>Add To Cart</button></li>
                                            <li class="p_icon"><a href="#"><i class="icon_heart_alt"></i></a></li>
                                        </ul>
                                        <h4><?php echo $p_title ?></h4>
                                        <h5><del>&#8377; <?php echo $p_g_price ?></del>&nbsp;&nbsp;&#8377;<?php echo $p_price ?></h5>
                                    </div>
                            </div>
                            </div>
                        <?php } ?>
                        <?php

                            $query = "SELECT * FROM products WHERE p_cat IN ('Television','Refrigerator','Washing Machine','Microwave','Gas Stove') LIMIT 4";    
                            $select_electronics_query = mysqli_query($conn,$query);

                            while($row = mysqli_fetch_assoc($select_electronics_query)) {
                            $p_id = $row['p_id'];
                            $p_title = $row['p_title'];
                            $p_img = $row['p_img'];
                            $p_price = $row['p_price'];
                            if($p_price <1000){
                                $num = (rand(100,400));
                                } else if ($p_price > 1000 && $p_price < 7000 ) {
                                    $num = (rand(500,1000)); 
                                } else {
                                    $num = (rand(2000,7000)); 
                                }
                                $p_g_price= $p_price + $num;
                        ?>
                            <div class="col-lg-3 col-md-4 col-sm-6 electronics all">
                            <div class="l_product_item">
                                    <div class="l_p_img">
                                        <img class="img-fluid" src="img/product/product_new/<?php echo $p_img ?>">
                                        <h5 class="sale">Sale</h5>
                                    </div>
                                    <div class="l_p_text">
                                    <ul>
                                            <li class="p_icon"><a href="product-details.php?p_name=<?php echo $p_title ?>"><i class="icon_piechart"></i></a></li>
                                            <li><button class="add_cart_btn" id="<?php echo $p_id; ?>" <?php if(isset($_SESSION['id'])) {echo "onclick= 'add_to_cart(this.id)'";} else { echo 'onclick= "window.location.href = \'login.php\';"';} ?>>Add To Cart</button></li>
                                            <li class="p_icon"><a href="#"><i class="icon_heart_alt"></i></a></li>
                                        </ul>
                                        <h4><?php echo $p_title ?></h4>
                                        <h5><del>&#8377; <?php echo $p_g_price ?></del>&nbsp;&nbsp;&#8377;<?php echo $p_price ?></h5>
                                    </div>
                            </div>
                            </div>
                        <?php } ?>
                        <?php

                            $query = "SELECT * FROM products WHERE p_cat IN ('Table','Sofa','Chair','Bed','Almirah') LIMIT 4";    
                            $select_furniture_query = mysqli_query($conn,$query);

                            while($row = mysqli_fetch_assoc($select_furniture_query)) {
                            $p_id = $row['p_id'];
                            $p_title = $row['p_title'];
                            $p_img = $row['p_img'];
                            $p_price = $row['p_price'];
                            if($p_price <1000){
                                $num = (rand(100,400));
                                } else if ($p_price > 1000 && $p_price < 7000 ) {
                                    $num = (rand(500,1000)); 
                                } else {
                                    $num = (rand(2000,7000)); 
                                }
                                $p_g_price= $p_price + $num;
                        ?>
                            <div class="col-lg-3 col-md-4 col-sm-6 furniture all">
                            <div class="l_product_item">
                                    <div class="l_p_img">
                                        <img class="img-fluid" src="img/product/product_new/<?php echo $p_img ?>">
                                        <h5 class="sale">Sale</h5>
                                    </div>
                                    <div class="l_p_text">
                                    <ul>
                                            <li class="p_icon"><a href="product-details.php?p_name=<?php echo $p_title ?>"><i class="icon_piechart"></i></a></li>
                                            <li><button class="add_cart_btn" id="<?php echo $p_id; ?>" <?php if(isset($_SESSION['id'])) {echo "onclick= 'add_to_cart(this.id)'";} else { echo 'onclick= "window.location.href = \'login.php\';"';} ?>>Add To Cart</button></li>
                                            <li class="p_icon"><a href="#"><i class="icon_heart_alt"></i></a></li>
                                        </ul>
                                        <h4><?php echo $p_title ?></h4>
                                        <h5><del>&#8377; <?php echo $p_g_price ?></del>&nbsp;&nbsp;&#8377;<?php echo $p_price ?></h5>
                                    </div>
                            </div>
                            </div>
                        <?php } ?>
                        <?php

                            $query = "SELECT * FROM products WHERE p_cat IN ('Cricket','Football','Basketball','Baseball','Badminton') LIMIT 4";    
                            $select_sports_query = mysqli_query($conn,$query);

                            while($row = mysqli_fetch_assoc($select_sports_query)) {
                            $p_id = $row['p_id'];
                            $p_title = $row['p_title'];
                            $p_img = $row['p_img'];
                            $p_price = $row['p_price'];
                            if($p_price <1000){
                                $num = (rand(100,400));
                                } else if ($p_price > 1000 && $p_price < 7000 ) {
                                    $num = (rand(500,1000)); 
                                } else {
                                    $num = (rand(2000,7000)); 
                                }
                                $p_g_price= $p_price + $num;
                        ?>
                            <div class="col-lg-3 col-md-4 col-sm-6 sports all">
                            <div class="l_product_item">
                                    <div class="l_p_img">
                                        <img class="img-fluid" src="img/product/product_new/<?php echo $p_img ?>">
                                        <h5 class="sale">Sale</h5>
                                    </div>
                                    <div class="l_p_text">
                                    <ul>
                                            <li class="p_icon"><a href="product-details.php?p_name=<?php echo $p_title ?>"><i class="icon_piechart"></i></a></li>
                                            <li><button class="add_cart_btn" id="<?php echo $p_id; ?>" <?php if(isset($_SESSION['id'])) {echo "onclick= 'add_to_cart(this.id)'";} else { echo 'onclick= "window.location.href = \'login.php\';"';} ?>>Add To Cart</button></li>
                                            <li class="p_icon"><a href="#"><i class="icon_heart_alt"></i></a></li>
                                        </ul>
                                        <h4><?php echo $p_title ?></h4>
                                        <h5><del>&#8377; <?php echo $p_g_price ?></del>&nbsp;&nbsp;&#8377;<?php echo $p_price ?></h5>
                                    </div>
                            </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Latest Product isotope Area =================-->
        
        <!--================Footer Area =================-->

        <?php include "footer.php" ?>

        <!--================End Footer Area =================-->

        <script> 
            function add_to_cart(id) {
                $.ajax({
                    url: 'add_to_cart.php',
                    type: 'POST',
                    data: { p_id: id, quantity:'1' },
                    success: function(data){
                    $("#modalAbandonedCart").modal('show');
                    }
                });
            }
        </script>