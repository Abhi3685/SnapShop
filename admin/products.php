<?php session_start();
include "../db.php";
if(!isset($_SESSION['id']) && $_SESSION['email'] != 'admin@mail.com'){
    echo "<script>window.location.href='/';</script>";
} 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <link rel="icon" href="../img/favicon.png" sizes="16x16" type="image/png">
    <title>Dashboard: Posts Listing</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">
    <style>
        .pagination{
            margin-top: 30px;
            margin-left: auto;
            margin-right: auto;
        }
        .paglink{
            margin: 0px 5px;
            cursor: pointer;
            padding: 10px 16px;
            background-color: lightgrey;
            border-radius: 5px;
            color: black;
        }
        .table-responsive{
            height: 100%;
        }
        #overlay {
          position: fixed; /* Sit on top of the page content */
          display: none;
          width: 100%; /* Full width (cover the whole page) */
          height: 100%; /* Full height (cover the whole page) */
          top: 0; 
          left: 0;
          right: 0;
          bottom: 0;
          background-color: rgba(0,0,0,0.95); /* Black background with opacity */
          z-index: 999999; /* Specify a stack order in case you're using a different order for other elements */
        }
        #text{
          position: absolute;
          top: 50%;
          left: 50%;
          font-size: 20px;
          color: white;
          transform: translate(-50%,-50%);
          -ms-transform: translate(-50%,-50%);
        }

        .menu-sidebar .logo {
            background:none;
        }

        @media (max-width: 1199.98px) { 
            #overlay {
                display: block;
            }
        }
    </style>

</head>

<body>

<div id="overlay">
    <div id="text" class="text-justify">
        <p>Personalized dashboard is not accessible on small scale devices.</p>
        <p>Please login on desktop or laptop to continue.</p>
    </div>
</div>      

    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="/">
                            <img src="../img/logo4.png">
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li>
                            <a href="/admin">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="products.php">
                                <i class="zmdi zmdi-calendar-note"></i>Products Listing</a>
                        </li>
                        <li>
                            <a href="users.php">
                                <i class="zmdi zmdi-account"></i>Users Listing</a>
                        </li>
                        <li>
                            <a href="categories.php">
                                <i class="zmdi zmdi-view-list-alt"></i>Category Listing</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block" style="width: 250px";>
            <div class="logo">
                <a href="/">
                    <img src="../img/logo4.png">
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a href ="index.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href ="add.php">
                                <i class="fa fa-plus"></i>Add New Product</a>
                        </li>
                        <li class='active'>
                            <a href="products.php">
                                <i class="zmdi zmdi-calendar-note"></i>Products Listing</a>
                        </li>
                        <li>
                            <a href="users.php">
                                <i class="zmdi zmdi-account"></i>Users Listing</a>
                        </li>
                        <li>
                            <a href="categories.php">
                                <i class="zmdi zmdi-view-list-alt"></i>Category Listing</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container" style="background-color: #f5f5f5;">
            <header class="header-desktop" style="left: 251px;">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <div class="header-button" style="margin-left: auto;">
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="https://www.ed.youth4work.com/Images/Users/User-default-image-boy.png">
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn">Admin</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a>
                                                        <img src="https://www.ed.youth4work.com/Images/Users/User-default-image-boy.png">
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="https://www.ed.youth4work.com/Images/Users/User-default-image-boy.png">Admin</a>
                                                    </h5>
                                                    <span class="email">blogieverify@gmail.com</span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="/signin.php">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30" style="padding-left: 0px;">
                    <div class="container-fluid">
                        <div class="row" style="margin-bottom: 40px;">
                            <div class="col-md-12">
                                <h2 class="text-center">Administration Dashboard : Products Listing</h2>
                            </div>
                        </div>
                        <div class="row" style="padding-bottom: 40px;">
                            <div class="table-responsive" style="background-color: #fff;">
                              <table class="table table-hover">
                                <thead class="thead-dark">
                                  <tr>
                                    <th class="text-center">Id</th>
                                    <th class="text-center">Title</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Category</th>
                                    <th class="text-center">Sub-Category</th>
                                    <th class="text-center">Actions</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $limit = 5;  
                                        if (isset($_GET["page"])) { 
                                            $page  = $_GET["page"];
                                            $count = ($page-1) * $limit; 
                                        } else { 
                                            $page = 1; 
                                            $count = 0;
                                        }  
                                        $start_from = ($page-1) * $limit;  
                                          
                                        $query = "SELECT * FROM products LIMIT $start_from, $limit";
                                        $products = mysqli_query($conn, $query);
                                        while($row = mysqli_fetch_assoc($products)){
                                            $count = $count + 1;
                                            $title = $row['p_title'];
                                            $price = $row['p_price'];
                                            $p_id = $row['p_id'];
                                            $sub_cat = $row['p_cat'];
                                            $cat_id = $row['p_cat_id'];
                                            $query = "SELECT * FROM categories WHERE cat_id = '$cat_id'";
                                            $category = mysqli_fetch_assoc(mysqli_query($conn, $query))['cat_title'];
                                    ?>
                                  <tr>
                                    <td class="text-center"><?php echo $count; ?></td>
                                    <td class="text-center"><?php echo $title; ?></td>
                                    <td class="text-center">&#8377; <?php echo $price; ?></td>
                                    <td class="text-center"><?php echo $category; ?></td>
                                    <td class="text-center"><?php echo $sub_cat; ?></td>
                                    <td class="text-center">
                                        <button class="btn btn-primary" onclick="window.location.href='../view.php?p_name=<?php echo $title ?>';">View</button>
                                        <button class="btn btn-info" onclick="window.location.href='edit.php?id=<?php echo $p_id ?>';">Edit</button>
                                    </td>
                                  </tr>
                                    <?php } ?>
                                </tbody>
                              </table>
                            </div>
                            <?php
                                $sql = "SELECT * FROM products";  
                                $products = mysqli_query($conn, $sql);  
                                $prod_count = mysqli_num_rows($products);  
                                $total_pages = ceil($prod_count / $limit);  
                                $pagLink = "<div class='pagination'>";  
                                for ($i=1; $i<=$total_pages; $i++) {  
                                    $pagLink .= "<a class='paglink' href='products.php?page=".$i."'>".$i."</a>";  
                                }  
                                echo $pagLink . "</div>"; 
                            ?>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->
