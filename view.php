<?php include "db.php"; ?>
<?php 
session_start();
?>
<?php if(isset($_SESSION['id'])){
    $user_id = $_SESSION['id'];
} else {
    $user_id = 0;
} 
    $query1 = "SELECT * FROM users WHERE id = '$user_id'";
    $find_user = mysqli_query($conn,$query1);
    $row = mysqli_fetch_assoc($find_user);
    $customer_name = $row['username'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="icon" href="img/favicon.png" type="image/x-icon" />
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>SnapShop</title>

        <!-- Icon css link -->
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="vendors/line-icon/css/simple-line-icons.css" rel="stylesheet">
        <link href="vendors/elegant-icon/style.css" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Rev slider css -->
        <link href="vendors/revolution/css/settings.css" rel="stylesheet">
        <link href="vendors/revolution/css/layers.css" rel="stylesheet">
        <link href="vendors/revolution/css/navigation.css" rel="stylesheet">
        
        <!-- Extra plugin css -->
        <link href="vendors/owl-carousel/owl.carousel.min.css" rel="stylesheet">
        <link href="vendors/bootstrap-selector/css/bootstrap-select.min.css" rel="stylesheet">
        
        <link href="css/style.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
    <style>
            .shop_now_btn:hover{
                color: #3c3cff;
            }

            .shop_now_btn {
                background: #3c3cff;
                border: 1px solid #3c3cff;
            }    

            .special_offer_item .hover_text h4:before {
                color: #3c3cff;
            }

            .shop_header_area .navbar .navbar-nav li:hover a {
                color: #3c3cff
            }
            .search-box {
                width: 100%;
                position: relative;
            }	
            .search-box input {		
                border-color: #dfe3e8;        
                box-shadow: none
            }
        </style>
        <!--================Menu Area =================-->

<style>
    * {box-sizing: border-box;}

    .img-magnifier-container {
    position:relative;
    }

    .img-magnifier-glass {
    position: absolute;
    border: 3px solid #000;
    border-radius: 50%;
    cursor: none;
    /*Set the size of the magnifier glass:*/
    width: 70px;
    height: 70px;
    }

    #sst::-webkit-inner-spin-button, 
    #sst::-webkit-outer-spin-button { 
    -webkit-appearance: none; 
    margin: 0; 
}
</style>
<script>
    function magnify(imgID, zoom) {
        var img, glass, w, h, bw;
        img = document.getElementById(imgID);
        /*create magnifier glass:*/
        glass = document.createElement("DIV");
        glass.setAttribute("class", "img-magnifier-glass");
        /*insert magnifier glass:*/
        img.parentElement.insertBefore(glass, img);
        /*set background properties for the magnifier glass:*/
        glass.style.backgroundImage = "url('" + img.src + "')";
        glass.style.backgroundRepeat = "no-repeat";
        glass.style.backgroundSize = (img.width * zoom) + "px " + (img.height * zoom) + "px";
        bw = 3;
        w = glass.offsetWidth / 2;
        h = glass.offsetHeight / 2;
        /*execute a function when someone moves the magnifier glass over the image:*/
        glass.addEventListener("mousemove", moveMagnifier);
        img.addEventListener("mousemove", moveMagnifier);
        /*and also for touch screens:*/
        glass.addEventListener("touchmove", moveMagnifier);
        img.addEventListener("touchmove", moveMagnifier);
        function moveMagnifier(e) {
            var pos, x, y;
            /*prevent any other actions that may occur when moving over the image*/
            e.preventDefault();
            /*get the cursor's x and y positions:*/
            pos = getCursorPos(e);
            x = pos.x;
            y = pos.y;
            /*prevent the magnifier glass from being positioned outside the image:*/
            if (x > img.width - (w / zoom)) {x = img.width - (w / zoom);}
            if (x < w / zoom) {x = w / zoom;}
            if (y > img.height - (h / zoom)) {y = img.height - (h / zoom);}
            if (y < h / zoom) {y = h / zoom;}
            /*set the position of the magnifier glass:*/
            glass.style.left = (x - w) + "px";
            glass.style.top = (y - h) + "px";
            /*display what the magnifier glass "sees":*/
            glass.style.backgroundPosition = "-" + ((x * zoom) - w + bw) + "px -" + ((y * zoom) - h + bw) + "px";
        }
        function getCursorPos(e) {
            var a, x = 0, y = 0;
            e = e || window.event;
            /*get the x and y positions of the image:*/
            a = img.getBoundingClientRect();
            /*calculate the cursor's x and y coordinates, relative to the image:*/
            x = e.pageX - a.left;
            y = e.pageY - a.top;
            /*consider any page scrolling:*/
            x = x - window.pageXOffset;
            y = y - window.pageYOffset;
            return {x : x, y : y};
        }
    }
</script>

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

        <?php
            if(isset($_GET['p_name'])){
                $p_name = $_GET['p_name'];
            }
        ?>
        <!--================Categories Banner Area =================-->
        <section class="product_listing_area" style="margin-top:20px; margin-bottom:20px;">
            <div class="container">
            <div class="single_c_title" >
                    <h2>Product Description</h2>
            </div>
            </div>
        </section>
        <!--================End Categories Banner Area =================-->

        <?php
                $query = "SELECT * FROM products WHERE p_title= '$p_name'";    
                $select_product_query = mysqli_query($conn,$query);

            while($row = mysqli_fetch_assoc($select_product_query)) {
                $p_id = $row['p_id'];
                $p_title = $row['p_title'];
                $p_img = $row['p_img'];
                $p_price = $row['p_price'];
            }          
        ?>
        
        <!--================Product Details Area =================-->
        <section class="product_details_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5" >
                   <img id="myimage" src="<?php echo $p_img ?>" style=" max-width:100%;max-height:100%;">
                    </div>
                    <div class="col-lg-7">
                        <div class="product_details_text">
                            <h3><?php echo $p_title ?></h3>
                            <ul class="p_rating">
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                            </ul>
                            <div class="add_review">
                                <a href="#">5 Reviews</a>
                                <a href="#">Add your review</a>
                            </div>
                            <h6>Available In <span>Stock</span></h6>
                            <h4>&#8377;<?php echo $p_price ?></h4>
                            <p>Curabitur semper varius lectus sed consequat. Nam accumsan dapibus sem, sed lobortis nisi porta vitae. Ut quam tortor, facilisis nec laoreet consequat, malesuada a massa. Proin pretium tristique leo et imperdiet.</p>
                            <div class="p_color">
                                <h4 class="p_d_title">color <span>*</span></h4>
                                <ul class="color_list">
                                    <li><a href="#"></a></li>
                                    <li><a href="#"></a></li>
                                    <li><a href="#"></a></li>
                                    <li><a href="#"></a></li>
                                    <li><a href="#"></a></li>
                                    <li><a href="#"></a></li>
                                </ul>
                            </div>
                            <div class="p_color">
                                <h4 class="p_d_title">size <span>*</span></h4>
                                <select class="selectpicker">
                                    <option>Select your size</option>
                                    <option>Select your size M</option>
                                    <option>Select your size XL</option>
                                </select>
                            </div>
                            <div class="quantity">
                                <div class="custom">
                                    <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="icon_minus-06"></i></button>
                                    <input type="number" name="qty" id="sst" value="1" title="Quantity: " class="input-text qty">
                                    <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;" class="increase items-count" type="button"><i class="icon_plus"></i></button>
                                </div>
                            <button class="add_cart_btn"></button>

                            </div>
                            <div class="shareing_icon">
                                <h5>share :</h5>
                                <ul>
                                    <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo 'http://snapshop.epizy.com/product-details.php?p_name='.$p_name; ?>"><i class="social_facebook"></i></a></li>
                                    <li><a href="https://twitter.com/share?url=<?php echo 'http://snapshop.epizy.com/product-details.php?p_name='.$p_name; ?>&amp;text=Check%20out%20this%20product%20on%20SnapShop:"><i class="social_twitter"></i></a></li>
                                    <li><a href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());"><i class="social_pinterest"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="product_table_details">
                            <div class="table-responsive-md">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th scope="row">Return Policy:</th>
                                            <td>
                                                <h6>$24.01 International Priority Shipping to Bangladesh  via the Global Shipping Program </h6>
                                                <h5>Item location:</h5>
                                                <p>Edison, New Jersey, United States</p>
                                                <h5>Ships to:</h5>
                                                <p>United States and many other countries | See details</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Delivery:</th>
                                            <td>
                                                <p>Estimated between <span>Fri. Dec. 30 and Thu. Jan. 5</span> <br /> Includes international tracking</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Payments:</th>
                                            <td>
                                                <a href="#"><img src="img/master-card.png" alt=""></a>
                                                <p>Any international shipping and import charges are paid in part to Pitney Bowes Inc.</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Product Details Area =================-->
        
        <!--================Product Description Area =================-->
        <section class="product_description_area">
            <div class="container">
                <nav class="tab_menu">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Product Description</a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Reviews (1)</a>
                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Tags</a>
                        <a class="nav-item nav-link" id="nav-info-tab" data-toggle="tab" href="#nav-info" role="tab" aria-controls="nav-info" aria-selected="false">additional information</a>
                        <a class="nav-item nav-link" id="nav-gur-tab" data-toggle="tab" href="#nav-gur" role="tab" aria-controls="nav-gur" aria-selected="false">gurantees</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.  Emo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur.</p>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <h4>Rocky Ahmed</h4>
                        <ul>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.  Emo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur.</p>
                    </div>
                    <div class="tab-pane fade" id="nav-info" role="tabpanel" aria-labelledby="nav-info-tab">
                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.  Emo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur.</p>
                    </div>
                    <div class="tab-pane fade" id="nav-gur" role="tabpanel" aria-labelledby="nav-gur-tab">
                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.  Emo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur.</p>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Product Details Area =================-->
         

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery-3.2.1.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <!-- Rev slider js -->
        <script src="vendors/revolution/js/jquery.themepunch.tools.min.js"></script>
        <script src="vendors/revolution/js/jquery.themepunch.revolution.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.actions.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.video.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
        <!-- Extra plugin css -->
        <script src="vendors/counterup/jquery.waypoints.min.js"></script>
        <script src="vendors/counterup/jquery.counterup.min.js"></script>
        <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="vendors/bootstrap-selector/js/bootstrap-select.min.js"></script>
        <script src="vendors/image-dropdown/jquery.dd.min.js"></script>
        <script src="js/smoothscroll.js"></script>
        <script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
        <script src="vendors/isotope/isotope.pkgd.min.js"></script>
        <script src="vendors/magnify-popup/jquery.magnific-popup.min.js"></script>
        <script src="vendors/vertical-slider/js/jQuery.verticalCarousel.js"></script>
        <script src="vendors/jquery-ui/jquery-ui.js"></script>
        <script>magnify("myimage", 2);</script>
        <script src="js/theme.js"></script>
    </body>
</html>

        