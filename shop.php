<?php session_start(); session_destroy();?> 
<?php include_once 'include/header.php';?>
<?php echo '<title>Shop</title>'; ?>
<?php 
if(isset($_GET["category"]) && $_GET["category"]>0 && Is_Numeric($_GET["category"]))
{
    $cat_url=intval($_GET["category"]);
}
else {$cat_url=0;}
if(isset($_GET["search"]))
{
    $prod_url=filter_var($_GET["search"], FILTER_SANITIZE_STRING);;
}
else {$prod_url=null;}


?>
<?php
include "database/connect_to_mysql_pdo.php";
$number_prod=5;
$number_prod2=0;
 ?>
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>المتجر</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form action="" method="get" style="margin-left: 100px;margin-right: 100px; margin-top: 30px">
        <div class="form-group">
            <label for="sel1" style="margin-left: 1050px;">الفئات</label><select class="form-control" id="sel1"><option></option>
                <?php

        $result = $dbh->prepare("SELECT DISTINCT * FROM `categories`");
        $result->execute();
        $productCount=$result->rowCount();
        if ($productCount > 0)
        {
            while($row = $result->fetch())
            {

                $cat_name = $row['categories_name'];
                $cat_id = $row['categories_id'];

 ?> 
            <option><?php echo $cat_name;  ?></option>
            <?php }}?></select>
        </div>
        <div class="form-group">
            <label style="margin-left: 1050px;">المنتج</label>
            <input type="text" name="search" class="form-control" placeholder="Tape your search here!">
        </div>
        <input type="hidden" name="category" value="<?php echo $cat_id;?>">
        <div class="form-group" style="margin-left: 20px; margin-top: 30px;">
            <input type="submit" class="btn btn-success " value="بحث">
        </div>
    </form>
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <?php
          if($cat_url==0)
          {
                $res = $dbh->prepare("SELECT * FROM product WHERE active=1  LIMIT $number_prod2, $number_prod");
          }
          elseif($cat_url>0 && $prod_url==null)   
          {
              $res = $dbh->prepare("SELECT * FROM product WHERE active=1 and categories_id=$cat_url  LIMIT $number_prod2, $number_prod");
          }
          elseif ($cat_url>0 && $prod_url!=null)
          {
              $res = $dbh->prepare("SELECT * FROM product WHERE active=1 and categories_id=$cat_url and product_name='.$prod_url.'  LIMIT $number_prod2, $number_prod");
          }
                $res->execute();
                $productsCounts = $res->rowCount();
                
                if ($productsCounts > 0)
                {   $productCount = intval($res->rowCount()/12);
                    while($row = $res->fetch())
                    {
                        $product_id = $row['product_id'];
                        $product_name = $row['product_name'];
                        $product_image = $row['product_image'];
                        $product_price = $row['rate'];
                        $product_cat = $row['categories_id'];
                        $product_details = $row['details'];
                        $check = $product_details;
                        if (strlen(trim($check)) == 0)
                        {
                            $product_details = "<u>No Details</u>";
                        }
                        $more = "";
                        if (strlen($product_details)>60)
                        {
                            $product_details = substr($product_details,60);
                            $more = '...<a href="product.php?id='.$product_id.'">read more</a>';
                        }

 ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="single-shop-product" id="<?php echo $product_id;?>">
                            <div class="product-upper">
                                <img src="<?php echo $product_image;?>" alt="">
                            </div>
                            <h2>
                                <a href="">
                                    <?php echo $product_name; ?>
                                </a>
                            </h2>
                            <div class="product-carousel-price">
                                <ins><?php echo $product_price; ?> dh</ins>
                            </div>
                            <input type="hidden" id="<?php echo $product_id ; ?>_name" value="<?php echo $product_name;?>">
                            <input type="hidden" id="<?php echo $product_id ; ?>_price" value="<?php echo $product_price ; ?>">
                            <div class="product-option-shop">
                                <a class="add_to_cart_button add-to-cart-link" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" onclick="cart(<?php echo $product_id;?>)">أضف إلى السلة </a>
                            </div>
                        </div>
                    </div>
                    <?php }}else{$productCount = -1;}?>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="product-pagination text-center">
                        <nav>
                            <ul class="pagination">

                                <?php if($productCount>0){ for($i=0;$i<$productCount;$i++) ?>
                                <li>
                                    <a href="shop.php?id=<?php if(Is_Numeric($_GET[" id "]) && isset($_GET["id "])){ echo $_GET["id "]-1;}?>" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <?php { ?>
                                <li>
                                    <a href="#">
                                        <?php echo $i+1;?>
                                    </a>
                                </li>
                                <?php } ?>
                                <li>
                                    <a href="shop.php?id=<?php if(Is_Numeric($_GET[" id "]) && isset($_GET["id "])){ echo $_GET["id "]+1;}?>" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                                <?php }else {?>
                                <li>
                                    <a href="#">
                                        <?php echo 1;?>
                                    </a>
                                </li>
                                <?php }?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $number_prod2=$number_prod; $number_prod+=12;?>
  <div class="footer-top-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="footer-about-us">
                        <h2>u<span>Stora</span></h2>
                        <p>نجلب لكم الاحسن لرفاهيتكم</p>
                        <div class="footer-social">
                            <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">تنقل المستخدم </h2>
                        <ul>
                        <li><a href="index.php">الرئيسية</a></li>
                        <li><a href="shop.php?category=0">المتجر</a></li>
                        <li><a href="#">اتصل بنا</a></li>
                        
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">الفئات</h2>
                        <ul>
                            <li><a href="#">Mobile Phone</a></li>
                            <li><a href="#">Home accesseries</a></li>
                            <li><a href="#">LED TV</a></li>
                            <li><a href="#">Computer</a></li>
                            <li><a href="#">Gadets</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">

                </div>
            </div>
        </div>
    </div>
    <!-- End footer top area -->

    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="copyright">
                        <p>&copy; 2015 SBIA Youssef. All Rights Reserved. </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="footer-card-icon">
                        <i class="fa fa-cc-discover"></i>
                        <i class="fa fa-cc-mastercard"></i>
                        <i class="fa fa-cc-paypal"></i>
                        <i class="fa fa-cc-visa"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>   
    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>
    
    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
    <!-- jQuery sticky menu -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    
    <!-- jQuery easing -->
    <script src="js/jquery.easing.1.3.min.js"></script>
    
    <!-- Main Script -->
    <script src="js/main.js"></script>
  </body>
</html>