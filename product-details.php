<?php include "header.php" ?>
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
                   <img id="myimage" src="img/product/product_new/<?php echo $p_img ?>" style=" max-width:100%;max-height:100%;">
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
                            <button class="add_cart_btn" id="<?php echo $p_id; ?>" <?php if(isset($_SESSION['id'])) {echo "onclick= 'add_to_cart(this.id)'";} else { echo 'onclick= "window.location.href = \'login.php\';"';} ?>>Add To Cart</button>

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
        
        
        
        <!--================Footer Area =================-->
        <?php include "footer.php" ?>

        <script>
            /* Initiate Magnify Function
            with the id of the image, and the strength of the magnifier glass:*/
            magnify("myimage", 2);
    
            function add_to_cart(id) {
                var quantity = $("#sst").val();
                $.ajax({
                    url: 'add_to_cart.php',
                    type: 'POST',
                    data: { p_id: id, quantity: quantity },
                    success: function(data){
                        $("#modalAbandonedCart").modal('show');
                    }
                });
            }
        </script>