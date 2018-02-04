<?php session_start();?><!DOCTYPE html>
   <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript">


    $(document).ready(function(){

        $.ajax({
          type:'get',
          url:'store_items.php',
          data:{
            total_cart_items:"total_items"
          },
          success:function(response) {
            document.getElementById("total_items").value=response;
          }
        });

      });
    function cart(id)
    {
	  var ele=document.getElementById(id);
	  var img_src=ele.getElementsByTagName("img")[0].src;
	  var name=document.getElementById(id+"_name").value;
	  var price=document.getElementById(id+"_price").value;
	  
	  $.ajax({
        type:'post',
        url:'store_items.php',
        data:{
          item_src:img_src,
          item_name:name,
          item_price:price
        },
        success:function(response) {
          document.getElementById("total_items").value=response;
        }
        
      });

    }

    function show_cart()
    {
      $.ajax({
      type:'post',
      url:'store_items.php',
      data:{
        showcart:"cart"
      },
      success:function(response) {
        document.getElementById("mycart").innerHTML=response;
        $("#mycart").slideToggle();
      }
     });

    }
	
</script>
  </head>
  <body>
   
    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                            <li></li>
                        </ul>
                    </div>
                </div>
                

            </div>
        </div>
    </div> <!-- End header area -->
    
    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><a href="./"><img src="img/logo.png"></a></h1>
                    </div>
                </div>
                
                <div class="col-sm-6">
                    <div class="shopping-item" id="cart_div" >
                    <p id="cart_button" onclick="show_cart();" >
                        <a href="cart.php"><i class="fa fa-shopping-cart"></i>
                        <b></a><input type="button" id="total_items"  ></b> 
                    </p>
                                    </div>

                    </div>

            </div>
                        <div id="mycart">
						</div>
						</div>
        </div>
    </div> <!-- End site branding area -->
    
    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div> 
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                    	<li><a href="contact.html">اتصل بنا</a></li>
                        <li><a href="shop.php?category=0">المتجر</a></li>
                        <li><a href="index.php">الرئيسية</a></li>
                        
                    </ul>
                </div>  
            </div>
        </div>
    </div> <!-- End mainmenu area -->

        <div class="container">
            <div class="row" style="margin-top: 200px;margin-bottom: 200px">
                <div class="col-md-12">
                <?php



include_once 'database/connect_to_mysql_pdo.php';
if ($_SERVER["REQUEST_METHOD"] == "GET" || !isset($_POST["confirmCommand"]))
{$path_parts = pathinfo(__FILE__);
header('Location:'.$path_parts['dirname'].'/index.php ');
}

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
$clientName = test_input($_POST['userName']);
$clientContact = test_input($_POST['telephone']);
if(isset($_SESSION["totalAmount"])){
$totalAmount=$_SESSION["totalAmount"];}
$email=test_input($_POST['email']);
$adress=test_input($_POST['adress']);
$password=md5($_POST["pswd"]);
$paiment=0;
if($_POST['paiment']=='Cache')
{
	$paiment=1;
}
else{$paiment=2;}
if(isset($_POST["confirmCommand"])){
if(isset($_SESSION['src'])&& $clientName!=null && $clientContact!=null && $totalAmount!=null && $email!=null && $adress!=null && $password!=null){
	try {
$sql = "INSERT INTO `orders`(`order_date`, `client_name`, `client_contact`, `sub_total`, `vat`, `total_amount`, `discount`, `grand_total`, `paid`, `due`, `payment_type`, `payment_status`, `order_status`) 
		VALUES (NOW(),'$clientName','$clientContact','$totalAmount','0','$totalAmount','0','$totalAmount','$totalAmount','0',$paiment,2,2)";
mysqli_query($conn, $sql);

$idOrder=0;
$sql3="SELECT MAX(`order_id`) AS maxOrder FROM `orders`";
$result = mysqli_query($conn, $sql3);

if (mysqli_num_rows($result) > 0) {
	$row = mysqli_fetch_array($result);
       $idOrder=$row['maxOrder'] ;
    }
    	
for($i=0;$i<count($_SESSION['src']);$i++){
	$idProd=0;
	$nameprod= $_SESSION['name'][$i];
	$sql4 ="SELECT `product_id` FROM `product` WHERE `product_name`='$nameprod'";
	$result1 = mysqli_query($conn, $sql4);
	
	if (mysqli_num_rows($result1) >= 1) {
		// output data of each row
		$row1 = mysqli_fetch_array($result1);
			$idProd=$row1['product_id'] ;
		}	
$qte=intval($_SESSION["amount_".$i])/$_SESSION['price'][$i];
$totalRate=$_SESSION['price'][$i]*$qte;
$sql1 = "INSERT INTO `order_item`(`order_id`, `product_id`, `quantity`, `rate`, `total`, `order_item_status`)
		VALUES ($idOrder,$idProd,$qte,$totalRate,$totalRate,2)";
mysqli_query($conn, $sql1);
}
$sql6 ="SELECT * FROM `users` WHERE `email`='$email'";
$result8 = mysqli_query($conn, $sql4);

if (mysqli_num_rows($result8) == 0) {
$sql2 = "INSERT INTO `users`( `username`, `password`, `email`, `adresse`, `telephone`)
		VALUES ('$clientName','$password','$email','$adress',$clientContact)";
mysqli_query($conn, $sql2)


?>
                
    <?php

}echo '<h1 align="center">لقد تم تنفيذ طلبكم بنجاح  </h1><h3 align="center"> '.$idOrder.' رقم طلبكم هو</h3>';}
catch (Exception $e) {
	echo 'Exception reçue : ',  $e->getMessage(), "\n";
}
}else{
	echo "<h1>vous avez oublie quelque etapes ,veuillez repeter svp!</h1>";}	} 
mysqli_close($conn);
session_destroy();

?>

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