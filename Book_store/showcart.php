<?php

session_start();
ob_start();

  if(($_SESSION['user']=="")){
 
 //header("Location:index.php");
 }  

include "connect.php";
//Check if user wants to checkout or shop:
if(isset($_POST['checkout'])){
header("location:orders.php");
}
if(isset($_POST['shop'])){
header("location:productsall.php");
}
//retrieve items . use session_id and/or datetime
$PHPSESSID=session_id();
$showcart = "SELECT * from cart_track INNER JOIN books ON bid=book_id WHERE session_id = '".$PHPSESSID."' AND date_added='".$td."'";
$result=mysqli_query($con, $showcart);
//print_r($result);
if(!$result){
$err=true;
//i recommend writing this error to a log or some text file, for security reasons.
$errmsg=mysqli_error();
}else{
$err=false;
$num=mysqli_num_rows($result);
}
?>
<!doctype html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>online- BookStore</title>
<link rel="stylesheet" href="styles.css" type="text/css" />


</head>
<body>
<div id="container">
    <header>
    	<h1><a href="index.php">Saint<span>Rose</span></a></h1>
        <h2>Online Book store</h2>
    </header>
    <nav>
    	<ul>
        	<li><a href="index.php">Home</a></li>
                        <li><a href="productsall.php">shop</a></li>
            <li  class="start selected"><a href="showcart.php">cart</a></li>
            <li><a href="aboutus.php">Aboutus</a></li>
           <li class="end"><a href="contact.php">Contact</a></li>
        </ul>
    </nav>

<!--	<img src="images/image.jpg" alt="Books" /> -->


				
    <div id="body">
			
		<table width="100%" border="0">
  <tr>
    <td colspan="5"><h1>Online Bookstore - Shopping Cart </h1><p> cart : <?php echo  $num; ?> </p></td>
  </tr>
  <tr>
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
  </tr>
  <?php if(!$err){ ?>
  <tr>
    <td bgcolor="#ECE9D8"><strong>Book Title</strong></td>
    <td bgcolor="#ECE9D8"><strong>Qty</strong></td>
    <td bgcolor="#ECE9D8"><strong>Price</strong></td>
    <td bgcolor="#ECE9D8"><strong>Total</strong></td>
    <td bgcolor="#ECE9D8"><strong>Action</strong></td>
  </tr>
   <?php
   $gtotal=0;
   $totalitems=0;
    if($num > 0){
  while($row=mysqli_fetch_assoc($result)){
  ?>
  <tr>
    <td><?php echo trim(stripslashes($row['title']))?></td>
    <td><?php echo trim(stripslashes($row['qty']))?></td>
    <td><?php echo trim(stripslashes($row['price']))?></td>
    <td><?php
        $total= $row['qty'] * $row['price'];
        $totalitems += $row['qty'];
        $_SESSION["cart"]=$totalitems;
         
     $ctotal=number_format($total,2);
          $gtotal = $gtotal + $ctotal;
        $_SESSION['gtotal'] = $gtotal;
        echo "$".$total;?></td>
    <td><a href="delete.php?cid=<?php echo $row['cart_id'] ?>">Remove</a></td>
  </tr>
   <?php
    }
    }else{
       ?>
    <tr>
    <td colspan="5"><p>There are no items in your shopping cart.</p></td>
   </tr>
   <?php
   }
   ?>
   <tr>
   <td></td>
   <td></td>
   <td><strong>Grand Total:</strong></td>
   <td bgcolor="#ECE9D8"><strong><?php echo "$".$gtotal;?></strong></td>
      </tr>
   <form action="showcart.php" method="post">
  <tr>
    <td><label></label></td>
    <td></td>
    <td><input type="submit" name="checkout" value="Check Out" /></td>
    <td><input type="submit" name="shop" value="Back to Shopping" /></td>
    <td> </td>
  </tr>
  </form>
  <?php
  }else{
  ?>
  <tr>
  <td colspan="5">
  <p><?php echo $errmsg;?></p>
  </td>
  </tr>
  <?php  } ?>
</table>

     <br><br><br><br><br><br><br><br>
	
	 
     
        
     
    	<div class="clear"></div>
    </div>
    <footer>
        
        <div class="footer-bottom">
             <p>&copy; Saintrose 
             2017.</p>
         </div>
    </footer>
</div>
</body>
</html>