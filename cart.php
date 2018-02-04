<?php     /*    $path_parts = pathinfo(__FILE__);
            $GLOBALS['page'] = $path_parts['dirname'];
            if(!isset($_POST['item_src']))
            { 
                //header('Location:'. $GLOBALS['page'].'/index.php ');
                echo $_POST['item_src'];
            }*/
if(isset($_POST['reset'])){ session_start();session_destroy();}
            ?>

<?php include_once 'include/header.php';?>
<?php echo '<title>Cart</title>';

if(isset($_SESSION['src'])){?>
                                <script> 
								$(document).ready(function(){
								    $("#confirm_command").click(function(){
								        $("#user_information").slideDown("slow");
								    });
								});
								</script><?php }?>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-show-password/1.0.3/bootstrap-show-password.min.js"></script>
<style>
#user_information{display: none;}
</style>
<script type="text/javascript">
    document.getElementById("cart_div").style.visibility = "hidden";
    </script>

    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>المشتريات</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page title area -->


    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">

                    <div class="single-sidebar">
                        <h2 class="sidebar-title">المنتجات</h2>
                        <div class="thubmnail-recent">
                            <img src="img/product-3.jpg" class="recent-thumb" alt="">
                            <h2>LG L9</h2>
                            <div class="product-sidebar-price">
                                <ins>4000 dh</ins> 
                            </div>
                        </div>
                        <div class="thubmnail-recent">
                            <img src="img/product-4.jpg" class="recent-thumb" alt="">
                            <h2>Sony experia z</a></h2>
                            <div class="product-sidebar-price">
                                <ins>2500 dh</ins>
                            </div>
                        </div>
                        <div class="thubmnail-recent">
                            <img src="img/product-2.jpg" class="recent-thumb" alt="">
                            <h2>NOKIA Lumia L9</h2>
                            <div class="product-sidebar-price">
                                <ins>3590 dh</ins> 
                            </div>
                        </div>
                        <div class="thubmnail-recent">
                            <img src="img/product-1.jpg" class="recent-thumb" alt="">
                            <h2>samsung s8</h2>
                            <div class="product-sidebar-price">
                                <ins>4500 dh</ins> 
                            </div>
                        </div>
                    </div>



                </div>
                <script type="text/javascript">
                    function price(id) {
                        var price = parseInt(document.getElementById("prix_"+id).innerHTML);
                        var qte = parseInt(document.getElementById("qte_"+id).value);
                        var RegExQte=qte.toString().length;
                        if(RegExQte>3 && qte>100)
                        {
                           alert("very big number!!");
                        }
                        else
                        {
                        document.getElementById("total_prix_"+id).value = price * qte ;
                        }
                    }

                    
                        function verify() {
                        var pwd = document.getElementById("pswd").value;
                        var rpwd = document.getElementById("rpwd").value;
                        if(pwd!=rpwd)
                        {
                            document.getElementById("pswd").value="";
                            document.getElementById("rpwd").value="";
                        document.getElementById("pwdrst").innerHTML = "<b>wrong password!!</b>";

                        }
                    }
                </script>
                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="woocommerce">
                     <form method="post" action="">
                               <table cellspacing="0" class="shop_table cart">
                                    <thead>
                                        <tr>                                           
                                            <th class="product-subtotal">المجموع</th>
                                            <th class="product-quantity">الكمية</th>
                                            <th class="product-price">الثمن</th>
                                            <th class="product-name">المنتج</th>
                                            <th class="product-thumbnail">صورة</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                                          <?php
                                                 
                                                $total=0.00;
                                                    if(isset($_POST["calcul_total"]))
                                                    {
                                                    	if(isset($_SESSION['src']))
                                                    	{
                                                        for($j=0;$j<count($_SESSION['src']);$j++)
                                                        {
                                                        	$_SESSION["amount_".$j]=$_POST["amount_".$j] ;
                                                           $total+=intval($_POST["amount_".$j]) ;
                                                           
                                                            
                                                        }
                                                    }
                                                    $_SESSION["totalAmount"]=$total;
                                                    }
                                                ?>

                                        <?php  if(isset($_SESSION['src'])){for($i=0;$i<count($_SESSION['src']);$i++){?>

                                        <tr class="cart_item">
                                            <td class="product-subtotal">
                                                <input type="text" style="border: none;font-weight: bold; text-align: center;width:85px" class="amount" <?php if(isset($_SESSION["amount_".$i])&& isset($_POST["calcul_total"])){?>value="<?php $k=0;if($_SESSION["amount_".$i]>=0){$k= $_SESSION["amount_".$i];}else{$k=0;} echo $k ;  }?>" id="total_prix_<?php echo $i; ?>" name="amount_<?php echo $i; ?>" readonly >
                                                 <b>dh</b>
                                            </td>
                                                                                        <td class="product-quantity">
                                                <div class="quantity buttons_added">
                                                    <input type="button" class="plus" value="+" onclick="price(<?php echo $i;?>);">
                                                    <input type="number" id="qte_<?php echo $i; ?>" size="3" max="100" <?php if(isset($_SESSION["amount_".$i])&& isset($_POST["calcul_total"])){?>value=<?php echo intval($_SESSION["amount_".$i])/$_SESSION['price'][$i];  }?>  class="input-text qty text" title="Qty" value="1" min="0" step="1">
                                                 	<input type="button" class="minus" value="-" onclick="price(<?php echo $i;?>);">

                                                </div>
                                            </td>
                                            <td class="product-price">
                                                <span class="amount" id="prix_<?php echo $i; ?>"><?php echo $_SESSION['price'][$i];?> dh</span>
                                            </td>
                                            <td class="product-name">
                                                <a href="single-product.html">
                                                    <?php echo $_SESSION['name'][$i];?>
                                                </a>
                                            </td>
                                                                                        <td class="product-thumbnail">
                                                <a href="single-product.html"><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="<?php echo $_SESSION['src'][$i];?>"></a>
                                            </td>
                                        </tr>

                                        


                                        <tr><?php }}?>
                                            <td class="actions" colspan="6">

                          
                                                    
                                                        
                                    <input type="submit" value="المجموع" id="calcul_total" name="calcul_total" class="button">
                                               
                                    <input type="button" value="اتمام الطلب" id="confirm_command" name="update_cart" class="button" style="background-color: green;">
                                    <input type="submit" value="احذف الطلب" name="reset" class="checkout-button button alt wc-forward" style="background-color: red;">
                                          </form>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>


                            <div class="cart-collaterals">


						<form action="command.php" method="post">
  
                                <div class="cart_totals ">
                                    <h2>Cart Totals</h2>

                                    <table cellspacing="0">
                                        <tbody>
                                            <tr class="cart-subtotal">
                                                <td><span class="amount" id="amount" ><?php  echo $total." dh";?> </span></td>
                                                <th>المجموع </th>
                                            </tr>

                                            <tr class="shipping">
                                                <td>مجاني</td>
                                                <th>توصيل </th>
                                            </tr>

                                            <tr class="order-total">
                                                <td><strong><span class="amount" id="amount"><?php echo $total." dh";?> </span></strong> </td>
                                                <th>المجموع العام</th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>



                            </div>
                  <?php if(isset($_POST["calcul_total"])){?>          
                            <div id="user_information">
                                     <div class="form-group">
							            <label style="margin-left: 680px;">الاسم الكامل</label>
							            <input type="text" name="userName" class="form-control" placeholder="Tape your name here!" required="required">
							        </div>
							        <div class="form-group">
							            <label style="margin-left: 670px;">البريد الالكتروني</label>
							            <input type="email" name="email" class="form-control"  placeholder="sophie@example.com" required="required">
							        </div>
							         <div class="form-group">
							            <label style="margin-left: 700px;">العنوان</label>
							            <textarea name="adress" class="form-control" placeholder="Tape your adress here!" required="required"></textarea>
							        </div>
							         <div class="form-group">
							            <label style="margin-left: 700px;">الهاتف</label>
							            <input type="tel" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" name="telephone" class="form-control" placeholder="Tape your phone number here!" required="required">
							        </div>
							        <div class="form-group">
							            <label style="margin-left: 690px;"> كلمة السر</label>
							            <input type="password" name="pswd" id="pswd" class="form-control" placeholder="Tape your password here!" required="required">
							        </div>
                            		<div class="form-group">
							            <label style="margin-left: 670px;"> كرر كلمة السر </label>
							            <input type="password" name="rpwd" id="rpwd" class="form-control" placeholder="Re-Tape your password here!" data-toggle="password" onblur="verify();" required="required">
							            <span id="pwdrst"></span>
							        </div>
							        <div class="form-group">
							           <label style="margin-left: 700px">الدفع</label> <ul style="margin-left: 600px;list-style-type: none;">
										 <li>نقدا	  <input type="radio" name="paiment" value="Cache"></li>
										<li>	شيك  <input type="radio" name="paiment" value="Chaque"></li>
									    </ul>
							       </div>
							       

							        <div class="form-group">
							        <input type="submit" value="تأكيد" name="confirmCommand" class="checkout-button button alt wc-forward">
                            		</div>
                            </div>
                            <?php }?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="footer-top-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="footer-about-us">
                        <h2>u<span>Stora</span></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis sunt id doloribus vero quam laborum quas alias dolores blanditiis iusto consequatur, modi aliquid eveniet eligendi iure eaque ipsam iste, pariatur omnis sint! Suscipit, debitis, quisquam. Laborum commodi veritatis magni at?</p>
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
                        <h2 class="footer-wid-title">User Navigation </h2>
                        <ul>
                            <li><a href="#">My account</a></li>
                            <li><a href="#">Order history</a></li>
                            <li><a href="#">Wishlist</a></li>
                            <li><a href="#">Vendor contact</a></li>
                            <li><a href="#">Front page</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Categories</h2>
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
                        <p>&copy; 2015 uCommerce. All Rights Reserved. <a href="http://www.freshdesignweb.com" target="_blank">freshDesignweb.com</a></p>
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
<script type="text/javascript">
	$("#password").password('toggle');
</script>
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
