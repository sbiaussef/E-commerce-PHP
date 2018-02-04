<?php
include "database/connect_to_mysql_pdo.php";
$dynamic_list = "";

    $res = $dbh->prepare("SELECT * FROM product WHERE active=1  order by product_id desc LIMIT 10");
    $res->execute();

$productCount = $res->rowCount();
 ?>
    <?php session_start(); session_destroy();?>
    <?php include_once 'include/header.php';?>

    <?php echo '<title>Home</title>'; ?>
    <div class="slider-area">
        <!-- Slider -->
        <div class="block-slider block-slider4">
            <ul class="" id="bxslider-home4">
                <li>
                    <img src="img/h4-slide.png" alt="Slide">
                    <div class="caption-group">
                        <h2 class="caption title">
                            iPhone <span class="primary">6 <strong>Plus</strong></span>
                        </h2>
                        <h4 class="caption subtitle">Dual SIM</h4>
                        <a class="caption button-radius" href="#"><span class="icon"></span>اشتري الأن</a>
                    </div>
                </li>
                <li><img src="img/h4-slide2.png" alt="Slide">
                    <div class="caption-group">
                        <h2 class="caption title">
                            اشتري واحدة، واحصل على واحد <span class="primary">-50% <strong></strong></span>
                        </h2>
                        <h4 class="caption subtitle">اللوازم المدرسية وحقائب الظهر</h4>
                        <a class="caption button-radius" href="#"><span class="icon"></span>اشتري الأن</a>
                    </div>
                </li>
                <li><img src="img/h4-slide3.png" alt="Slide">
                    <div class="caption-group">
                        <h2 class="caption title">
                            Apple <span class="primary">Store <strong>Ipod</strong></span>
                        </h2>
                        <h4 class="caption subtitle">اختر</h4>
                        <a class="caption button-radius" href="#"><span class="icon"></span>اشتري الأن</a>
                    </div>
                </li>
                <li><img src="img/h4-slide4.png" alt="Slide">
                    <div class="caption-group">
                        <h2 class="caption title">
                            Apple <span class="primary">Store <strong>Ipod</strong></span>
                        </h2>
                        <h4 class="caption subtitle">& Phone</h4>
                        <a class="caption button-radius" href="#"><span class="icon"></span>اشتري الأن</a>
                    </div>
                </li>
            </ul>
        </div>
        <!-- ./Slider -->
    </div>
    <!-- End slider area -->

    <div class="promo-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo1">
                        <i class="fa fa-refresh"></i>
                        <p>تجديد مستمر</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo2">
                        <i class="fa fa-truck"></i>
                        <p>توصيل مجاني</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo3">
                        <i class="fa fa-lock"></i>
                        <p>دفع آمن</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo4">
                        <i class="fa fa-gift"></i>
                        <p>منتجات جديدة</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End promo area -->

    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">

                        <h2 class="section-title">منتجات جديدة</h2>
                        <div class="product-carousel">
                            <!-- --------------------------------------------------------------------------------------------------------------------- -->
                            <?php if ($productCount > 0)
        {
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
                            <!-- --------------------------------------------------------------------------------------------------------------------- -->
                            <div class="single-product" id="<?php echo $product_id;?>">
                                <div class="product-f-image">
                                    <img src="<?php echo $product_image ; ?>" alt="">
                                    <div class="product-hover">
                                        <a href="#" class="add-to-cart-link" onclick="cart(<?php echo $product_id;?>)"><i class="fa fa-shopping-cart"></i>أضف إلى السلة </a>
                                        <a href="single-product.php?id=<?php echo $product_id ; ?>" class="view-details-link"><i class="fa fa-link"></i>  التفاصيل</a>
                                    </div>
                                </div>
                                <input type="hidden" id="<?php echo $product_id ; ?>_name" value="<?php echo $product_name;?>">
                                <input type="hidden" id="<?php echo $product_id ; ?>_price" value="<?php echo $product_price ; ?>">
                                <h2>
                                    <a href="single-product.php?id=<?php echo $product_id ; ?>">
                                        <?php echo $product_name;?>
                                    </a>
                                </h2>

                                <div class="product-carousel-price">
                                    <ins><?php echo $product_price ; ?> dh</ins>
                                    <!--<del>$100.00</del>  -->
                                </div>
                            </div>
                            <!-- --------------------------------------------------------------------------------------------------------------------- -->
                            <?php       }} ?>
                            <!-- --------------------------------------------------------------------------------------------------------------------- -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End main content area -->

    <div class="brands-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="brand-wrapper">
                        <div class="brand-list">
                            <img src="img/brand1.png" alt="">
                            <img src="img/brand2.png" alt="">
                            <img src="img/brand3.png" alt="">
                            <img src="img/brand4.png" alt="">
                            <img src="img/brand5.png" alt="">
                            <img src="img/brand6.png" alt="">
                            <img src="img/brand1.png" alt="">
                            <img src="img/brand2.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End brands area -->

    <div class="product-widget-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">افضل المبيعات</h2>
                        <a href="" class="wid-view-more">مشاهدة الكل</a>
                        <div class="single-wid-product">
                            <a href="single-product.html"><img src="img/product-thumb-1.jpg" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.html">Sony Smart TV - 2015</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins>4000 dh</ins> 
                            </div>
                        </div>
                        <div class="single-wid-product">
                            <a href="single-product.html"><img src="img/product-thumb-2.jpg" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.html">Apple new mac book 2015</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins>3000 dh</ins>
                            </div>
                        </div>
                        <div class="single-wid-product">
                            <a href="single-product.html"><img src="img/product-thumb-3.jpg" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.html">Apple new i phone 6</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins>3200 dh</ins>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">مشاهد حديثا</h2>
                        <a href="#" class="wid-view-more">مشاهدة الكل</a>
                        <div class="single-wid-product">
                            <a href="single-product.html"><img src="img/product-thumb-4.jpg" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.html">Sony playstation microsoft</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins>5300 dh</ins>
                            </div>
                        </div>
                        <div class="single-wid-product">
                            <a href="single-product.html"><img src="img/product-thumb-1.jpg" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.html">Sony Smart Air Condtion</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins>4500 dh</ins>
                            </div>
                        </div>
                        <div class="single-wid-product">
                            <a href="single-product.html"><img src="img/product-thumb-2.jpg" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.html">Samsung gallaxy note 4</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins>3590 dh</ins>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">الاكثر مبيعا</h2>
                        <a href="#" class="wid-view-more">مشاهدة الكل</a>
                        <div class="single-wid-product">
                            <a href="single-product.html"><img src="img/product-thumb-3.jpg" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.html">Apple new i phone 6</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins>$400.00</ins>
                            </div>
                        </div>
                        <div class="single-wid-product">
                            <a href="single-product.html"><img src="img/product-thumb-4.jpg" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.html">Samsung gallaxy note 4</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins>4550 dh</ins>
                            </div>
                        </div>
                        <div class="single-wid-product">
                            <a href="single-product.html"><img src="img/product-thumb-1.jpg" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.html">Sony playstation microsoft</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins>4200 dh</ins>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End product widget area -->

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
    <!-- End footer bottom area -->

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

    <!-- Slider -->
    <script type="text/javascript" src="js/bxslider.min.js"></script>
    <script type="text/javascript" src="js/script.slider.js"></script>
    </body>

    </html>
