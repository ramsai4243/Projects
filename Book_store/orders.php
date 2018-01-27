<?php
 
include "connect.php";
session_start();
ob_start();

  if(($_SESSION['user']=="")){
 //echo "<script>alert('Please login to Order');location.href='index.php'</script>";
 
 }  

require_once('includes/functions.php');
$PHPSESSID=session_id();
if(isset($_POST['submit'])){
 
 /*  if(!isset($_POST['o_name']) || $_POST['o_name'] == '' ) {
$err= "There is problem! try again later";
  header('Location:index.php');
    // exit();
  } */

//clean all POST vars first

$purchase_order=  autono();
$_SESSION['order_id'] = $purchase_order;
$order_name = mysqli_escape_string($con, $_POST['o_name']);
$order_address = mysqli_escape_string($con, $_POST['address']);
$order_total = mysqli_escape_string($con, $_POST['total']);
$order_shipcost = mysqli_escape_string($con, $_POST['shipcost']);
$order_date = mysqli_escape_string($con, $_POST['o_date']);
$order_status = mysqli_escape_string($con, $_POST['status']);


//Now, insert data
$addorder="INSERT INTO orders SET purchase_order=". "'$purchase_order'". ",order_name='".$order_name."', order_address='".$order_address."',";
$addorder .="order_total='".$order_total."', order_date='".$order_date."', order_status='".$order_status."', session='".$PHPSESSID."', shipping_cost='".$order_shipcost."'";

$result =mysqli_query($con,$addorder);

 echo "<br>".$addorder;
if(!$result){
$msg=mysqli_error();
}
else{
//$msg="Your order has been processed";
header("Location:paypal.php");
 }

}
?>


<!doctype html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>brio - Free CSS Template by ZyPOP</title>
<link rel="stylesheet" href="styles.css" type="text/css" />

</head>
<body>
<div id="container">
    <header>
    	<h1>Saint<span>Rose</span></a></h1>
        <h2>your website slogan here</h2>
    </header>
    <nav>
    	<ul>
        	<li class="start selected"><a href="index.php">Home</a></li>
            <li><a href="productsall.php">shop</a></li>
            <li><a href="showcart.php">cart</a></li>
            <li><a href="aboutus.php">Aboutus</a></li>
           <li class="end"><a href="contact.php">Contact</a></li>
		    	
        </ul>
    </nav>

<!--	<img src="images/image.jpg" alt="books" /> -->

    <div id="body">

		

		<section id="content">

	   
	
		<article class="expanded">

            	 	<h2>Order Checkout</h2>
			<table width="100%" border="0" id="ordtable">
  
  <?php if(!isset($msg)) {?>
   <form action="orders.php" method="post">
  <tr>
    <td width="16%">Name</td>
    <td width="84%"><label>
      <input name="o_name" type="text" size="40" />
    </label></td>
  </tr>
  <tr>
    <td valign="top">Address</td>
    <td><label>
      <textarea name="address"></textarea>
    </label></td>
  </tr>
  <tr>
    <td>Total</td>
    <td><label>
      <input name="total" type="text" size="40" value="<?php echo $_SESSION['gtotal']?>"/>
    </label></td>
  </tr>
  <tr>
    <td>Shipping Cost </td>
    <td><label>
    <?php $shipcost ='20.00' ;?>
      <input name="shipcost" type="text" size="40" value= "<?php echo $shipcost; ?>"/>
    </label></td>
  </tr>
  <tr>
    <td>Date</td>
    <td><label>
      <input name="o_date" type="text" size="40" value="<?php echo "$td";?>"/>
    </label></td>
  </tr>
  <tr>
    <td>Status</td>
    <td><label>
    <select name="status">
    <option>pending</option>
      <option>processed</option>
      
    </select>
    </label></td>
  </tr>
  <tr>
    <td><label>
      <input type="submit" name="submit" value="Send Order" />
    </label></td>
  </tr>
   </form>
   <?php
   }else{
      ?>
      <tr>
      <td>
      <?php echo $msg; ?>
      </td>
      </tr>
<?php } ?>
</table>

</p>
		</article>
        </section>
        
        <aside class="sidebar">
	
            <ul>	
               <li>
                    <h4>Categories</h4>
                     <?php
                      include("connect.php");
$query ="SELECT * from genres";
$results=mysqli_query($con, $query);
if($results){
$num = mysqli_num_rows($results);
}else{
echo mysqli_error();
}
  
  if($num>0){
  while($row=mysqli_fetch_assoc($results)){
   
?>
        

         
          <ul>
            <!-- List of links under menuset 1 -->
            <li> <a href="products.php?catid=<?php echo $row['gen_id'];?>&catname=<?php echo $row['gen_name'];?>"><?php echo $row['gen_name'];?></a> </li>
           </ul>
             
           <?php 

	//echo $row['desc'];
	
  }
  }  ?>
                    
                    
                    
                </li>
                
                <li>
                    <h4>About us</h4>
                    <ul>
                        <li class="text">
                        	<p style="margin: 0;">Aenean nec massa a tortor auctor sodales sed a dolor. Duis vitae lorem sem. Proin at velit vel arcu pretium luctus.<br />
					<a href="#" class="readmore">Read More</a></p>
                        </li>
                    </ul>
                </li>
                
                <li>
                	<h4>Search book</h4>
                    <ul>
                    	<li class="text">
                             <form method="get" class="searchform" action="search.php" >
                             
                                    <input type="text"  value="" name="s" class="s" />
                                     <input name="search" type="submit" id="submit" value="Go" />
                              
                            </form>	
						</li>
					</ul>
                </li>
                
                <li>
                    <h4>Helpful Links</h4>
                  <ul>
                        <li><a href="http://www.google.com" title="Google.com">Google</a></li>
                        <li><a href="http://www.amazon.com/" title="Amazon">Amazon</a></li>
                        <li><a href="http://www.https://www.strose.edu/" title="Saintrose">Saintrose</a></li>
                    </ul>
                </li>
                
            </ul>
		
        </aside>
    	<div class="clear"></div>
    </div>
    <footer>
        
    <div class="footer-bottom">
            <p>&copy;  2017.</a></p>
         </div>
    </footer>
</div>
</body>
</html>