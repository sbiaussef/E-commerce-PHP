<?php
include "database/connect_to_mysql_pdo.php";
$dynamic_list = "";
$path_parts = pathinfo(__FILE__);
$GLOBALS['page'] = $path_parts['dirname'];

if(isset($_GET["id"]))
{   $idprod=$_GET["id"];
    if(!Is_Numeric($idprod))
    {
       header('Location:'. $GLOBALS['page'].'/index.php ');
    }
    


}
else{header('Location:'. $GLOBALS['page'].'/index.php ');}

$res = $dbh->prepare("SELECT * FROM product WHERE product_id=$idprod");
$res->execute();

$productCount = $res->rowCount();    
 ?>
    <?php include_once 'include/header.php';?>
    <?php echo '<title>Product</title>'; ?>
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>المنتج</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                   

                    <div class="single-sidebar">
                        <h2 class="sidebar-title">المنتجات</h2>
                        <div class="thubmnail-recent">
                            <img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">
                            <h2><a href="">Sony Smart TV - 2015</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> 
                            </div>
                        </div>

                    </div>

                    <div class="single-sidebar">
                        <h2 class="sidebar-title">الإضافات الجديدة</h2>
                        <ul>
                            <li><a href="">Sony Smart TV - 2015</a></li>
                         
                        </ul>
                    </div>
                </div>
                <!-- --------------------------------------------------------------------------------------------------------------- -->

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
                    
                    $result = $dbh->prepare("SELECT `categories_name` FROM `categories` WHERE `categories_id` =$product_cat");
                    $result->execute();
                    $row = $result->fetch();
                    $cat_name=$row['categories_name'];
                    echo $cat_name;
?>
                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="product-breadcroumb">
                            <a href="index.php">Home</a>
                            <a href="">
                                <?php echo $cat_name;?>
                            </a>
                            <a href="">
                                <?php echo $product_name;?>
                            </a>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="product-images">
                                    <div class="product-main-img">
                                        <img src="<?php echo $product_image ; ?>" alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="product-inner">
                                    <h2 class="product-name"></h2>
                                    <div class="product-inner-price">
                                        <ins><?php echo $product_price ; ?> dh</ins>
                                    </div>

                                    <form action="" class="cart">
                                        <div class="quantity">
                                            <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                                        </div>
                                        <button class="add_to_cart_button" type="submit">أضف إلى السلة </button>
                                    </form>

                                    <div class="product-inner-category">
                                        <p>Category:
                                            <a href="">
                                                <?php echo $cat_name;?>
                                            </a>.
                                    </div>

                                    <div role="tabpanel">
                                        <ul class="product-tab" role="tablist">
                                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
                                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Reviews</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                <h2>Product Description</h2>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique, diam in consequat iaculis, est purus iaculis mauris, imperdiet facilisis ante ligula at nulla. Quisque volutpat nulla risus, id maximus ex aliquet ut. Suspendisse potenti. Nulla varius lectus id turpis dignissim porta. Quisque magna arcu, blandit quis felis vehicula, feugiat gravida diam. Nullam nec turpis ligula. Aliquam quis blandit elit, ac sodales nisl. Aliquam eget dolor eget elit malesuada aliquet. In varius lorem lorem, semper bibendum lectus lobortis ac.</p>

                                                <p>Mauris placerat vitae lorem gravida viverra. Mauris in fringilla ex. Nulla facilisi. Etiam scelerisque tincidunt quam facilisis lobortis. In malesuada pulvinar neque a consectetur. Nunc aliquam gravida purus, non malesuada sem accumsan in. Morbi vel sodales libero.</p>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="profile">
                                                <h2>Reviews</h2>
                                                <div class="submit-review">
                                                    <p><label for="name">Name</label> <input name="name" type="text"></p>
                                                    <p><label for="email">Email</label> <input name="email" type="email"></p>
                                                    <div class="rating-chooser">
                                                        <p>Your rating</p>

                                                        <div class="rating-wrap-post">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <p><label for="review">Your review</label> <textarea name="review" id="" cols="30" rows="10"></textarea></p>
                                                    <p><input type="submit" value="Submit"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <?php }} ?>
                        <!-- --------------------------------------------------------------------------------------------------------------- -->


                        <div class="related-products-wrapper">
                            <h2 class="related-products-title">منتجات ذات الصلة</h2>
                            <div class="related-products-carousel">
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="img/product-1.jpg" alt="">
                                        <div class="product-hover">
                                            <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> أضف إلى السلة</a>
                                            <a href="" class="view-details-link"><i class="fa fa-link"></i> التفاصيل</a>
                                        </div>
                                    </div>

                                    <h2><a href="">Sony Smart TV - 2015</a></h2>

                                    <div class="product-carousel-price">
                                        <ins>$700.00</ins>
                                    </div>
                                </div>
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="img/product-2.jpg" alt="">
                                        <div class="product-hover">
                                            <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> أضف إلى السلةt</a>
                                            <a href="" class="view-details-link"><i class="fa fa-link"></i> التفاصيل</a>
                                        </div>
                                    </div>

                                    <h2><a href="">Apple new mac book 2015 March :P</a></h2>
                                    <div class="product-carousel-price">
                                        <ins>$899.00</ins>
                                    </div>
                                </div>
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="img/product-3.jpg" alt="">
                                        <div class="product-hover">
                                            <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> أضف إلى السلة</a>
                                            <a href="" class="view-details-link"><i class="fa fa-link"></i> التفاصيل</a>
                                        </div>
                                    </div>

                                    <h2><a href="">Apple new i phone 6</a></h2>

                                    <div class="product-carousel-price">
                                        <ins>$400.00</ins>
                                    </div>
                                </div>
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="img/product-4.jpg" alt="">
                                        <div class="product-hover">
                                            <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> أضف إلى السلة</a>
                                            <a href="" class="view-details-link"><i class="fa fa-link"></i> التفاصيل</a>
                                        </div>
                                    </div>

                                    <h2><a href="">Sony playstation microsoft</a></h2>

                                    <div class="product-carousel-price">
                                        <ins>$200.00</ins>
                                    </div>
                                </div>
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="img/product-5.jpg" alt="">
                                        <div class="product-hover">
                                            <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> أضف إلى السلة</a>
                                            <a href="" class="view-details-link"><i class="fa fa-link"></i> التفاصيل/a>
                                        </div>
                                    </div>

                                    <h2><a href="">Sony Smart Air Condtion</a></h2>

                                    <div class="product-carousel-price">
                                        <ins>$1200.00</ins>
                                    </div>
                                </div>
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="img/product-6.jpg" alt="">
                                        <div class="product-hover">
                                            <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> أضف إلى السلة</a>
                                            <a href="" class="view-details-link"><i class="fa fa-link"></i> التفاصيل</a>
                                        </div>
                                    </div>

                                    <h2><a href="">Samsung gallaxy note 4</a></h2>

                                    <div class="product-carousel-price">
                                        <ins>$400.00</ins>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once 'include/footer.php';?>
