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
         <!--================End Menu Area =================-->
        <?php
    							if(isset($_GET['sub_cat'])){
                  				 $cat_name = $_GET['sub_cat'];
                  				}
        ?>
        <!--================Categories Banner Area =================-->
        <section class="product_listing_area" style="margin-top:20px; margin-bottom:20px;">
            <div class="container">
            <div class="single_c_title" >
                    <h2><?php echo "$cat_name" ?></h2>
            </div>
            </div>
        </section>
        <!--================End Categories Banner Area =================-->
        
        <!--================Categories Product Area =================-->
        <section class="no_sidebar_2column_area" style="padding-top:30px;">
            <div class="container">
                <div class="two_column_product">
                    <div class="row">
                            <?php
                                $query = "SELECT * FROM products WHERE p_cat= '$cat_name'";
                                $select_all_prod_query = mysqli_query($conn,$query);
                                while($row = mysqli_fetch_assoc($select_all_prod_query)) {
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
                        <div class="col-lg-3 col-sm-6">
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
                    <nav aria-label="Page navigation example" class="pagination_area">
                      <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item"><a class="page-link" href="#">6</a></li>
                        <li class="page-item next"><a class="page-link" href="#"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                      </ul>
                    </nav>
                </div>
            </div>
        </section>
        <!--================End Categories Product Area =================-->
        
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
        
        
       