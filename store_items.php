<?php
  session_start();

  if(isset($_POST['total_cart_items']))
  {
      echo count($_SESSION['src']);
	exit();
  }
  if(isset($_POST['item_src']))
  {
    $_SESSION['name'][]=$_POST['item_name'];
    $_SESSION['price'][]=$_POST['item_price'];
    $_SESSION['src'][]=$_POST['item_src'];
    echo count($_SESSION['name']);
    exit();
  }

  if(isset($_POST['showcart']))
  {
   if(isset($_SESSION['src'])){
    for($i=0;$i<count($_SESSION['src']);$i++)
    {
      echo "<div class='cart_items'>";
      echo "<img src='".$_SESSION['src'][$i]."'>";
      echo "<p>".$_SESSION['name'][$i]."</p>";
      echo "<p>".$_SESSION['price'][$i]."</p>";
      echo "</div>";
    }
   }
    exit();	
  }

   if(isset($_POST["total_items"+0]))
   {
    $total=0.00;
        for($j=0;$j<count($_SESSION['src']);$j++)
            {
                    $total+=intval($_POST["total_items".$j]) ;
                                                            
            }
       echo $total;
       exit();	
   }                                                 
?>