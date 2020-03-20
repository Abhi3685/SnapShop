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

        <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-134716208-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-134716208-1');
</script>

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
        <header class="shop_header_area carousel_menu_area">
            <div class="carousel_menu_inner">
                <div class="container">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <a class="navbar-brand" href="index.php"><img src="img/logo4.png" alt=""></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>

                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item dropdown submenu ">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Sell</a>
                                </li>
                                <li class="nav-item dropdown submenu">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Advertise </a>
                                </li>
                                <li class="nav-item dropdown submenu">
                                    <a class="nav-link dropdown-toggle" href="contact.php">
                                    About Us </a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="#">24x7 Customer Care</a></li>
                                <li class="nav-item dropdown submenu">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php if(isset($_SESSION['id'])){ 
											echo $_SESSION['username'];
										} else { ?>
										My Account
										<?php } ?> <i class="fa fa-angle-down" aria-hidden="true"></i>
                                    </a>
                                    <?php if(isset($_SESSION['id'])){ ?>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a class="nav-link" href="logout.php">LogOut</a></li>
                                        <li class="nav-item"><a class="nav-link" href="<?php if(isset($_SESSION['id'])){ 
                                    $query = "SELECT * FROM orders WHERE o_customer = '$customer_name'";
                                    $order_details = mysqli_query($conn,$query);
                                    $order_count = mysqli_num_rows($order_details);
                                    if($order_count>0){ echo "orders.php";}  else {echo "no-order.php"; }
                                 } else {echo "index.php";} ?>">Order History</a></li>
                                    </ul>
                                    <?php } else { ?>
                                        <ul class="dropdown-menu">
                                        <li class="nav-item"><a class="nav-link" href="login.php">Login / Register</a></li>
                                    </ul>
                                    <?php } ?>
                                </li>
                            </ul>
                            <ul class="navbar-nav justify-content-end">
                            <li class="nav-item dropdown submenu">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-magnifier icons"></i></a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a class="nav-link" style="border:none;padding-left:18px; padding-right: 18px;">
                                        <form method="GET" action="search.php">
                                            <div class="input-group search-box">								
                                            <input type="text" name="search" class="form-control search" placeholder="Search here..." style="padding-left: 8px; padding-right: 8px;">
                                             </div>
                                        </form> 
                                        </a></li>
                                    </ul>
                                </li>
                                <li class="user_icon"><a href="login.php"><i class="icon-user icons"></i></a></li>
                                <li class="cart"><a href="<?php if(isset($_SESSION['id'])){ 
                                    $query = "SELECT * FROM cart WHERE user_id = '$user_id'";
                                    $cart_items = mysqli_query($conn,$query);
                                    $cart_count = mysqli_num_rows($cart_items);
                                    if($cart_count>0){ echo "shopping-cart.php";}  else {echo "empty-cart.php"; }
                                 } else {echo "empty-cart.php";} ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                <span><?php            
                                            $count = 0;
                                            $query = "SELECT * FROM cart WHERE user_id = '$user_id'";
                                            $cart_items = mysqli_query($conn,$query);
                                            $cart_count = mysqli_num_rows($cart_items);
                                            if($cart_count>0){
                                            while($row = mysqli_fetch_assoc($cart_items)){
                                                $count = $count + 1;
                                            } 
                                            echo $count;
                                            } else {
                                            	echo "0";
                                            }
                                            ?></span>
                                </a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </header>