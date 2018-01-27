<?php
//session start

session_start();
 if(($_SESSION['user']=="")){
 
 header("Location:index.php");
 }
 ?>
<!Doctype html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>online- BookStore</title>
<link rel="stylesheet" href="styles.css" type="text/css" />
 
</head>
<body>
<div id="container">
    <header>
    	<h1><a href="index.php">Saint<span>Rose</span></a></h1>
        <h2>Online Book Store</h2>
    </header>
    <nav>
    	<ul>
        	<li><a href="admin_home.php">Home</a></li>
            <li><a href="view_books.php">Books</a></li>
            <li><a href="view_categories.php">Categories</a></li>
            <li><a href="view_users.php">Users</a></li>
             
			 <li class="start selected"><a href="view_orders.php">Orders</a></li>
		   <li class="end"><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

 	<img src="images/adminbanner.jpg" alt="Books" />  

    <div id="body">

		

		
	    <article>
				
			
			<h2>Orders </h2>
			
             
		</article>
	
		<article class="expanded">

            	 	
	 
<?php
	include("connect.php");
 	$sel = "SELECT COUNT(*) FROM orders";
	
	$res = mysqli_query($con,$sel);
	$rec = mysqli_fetch_row($res);
	$totalrecs = $rec[0];
	$recperpage = 5;
	$totalpages = ceil($totalrecs/$recperpage);
	if(isset($_GET['page'])){
		$page = $_GET['page'];
	}else{
		$page = 1;
	}
	
	$startindex = ($page-1)*$recperpage;
	$nm="select * from orders order by id LIMIT $startindex,$recperpage";
	$result=mysqli_query($con,$nm) or die(mysqli_error());
	$rows=mysqli_num_rows($result);
	//$rows=$rows+1;
		if($rows==0)
		echo "<br>"."<h3>Sorry No Records in Database</h3>"."<br>";
			           
     ?>
					<table width="100%">
                        <tr>
                            
                             <th>Order ID</th>
							 <th>Name</th>
							<th>Order Date</th>
							<th>Address</th>
                            <th>Order Status</th>
                            <th>Order Total</th>
                            <th>Purchase Order</th>
                             
                            <th>Shipping Cost</th>
                            
                        </tr>


		<?php	

           while($re=mysqli_fetch_array($result))
	{

// make sure that PHP doesn't try to show results that don't exist

					  ?>
                            <tr>
                              <!--  <td>
                                    <?php echo $a; ?>
                                </td> -->
								<td>
                                    <?php echo $re['id']; ?>
                                </td>
								<td>
                                    <?php echo $re['order_address']; ?>
                                </td>
                                <td>
                                    <?php echo $re['order_date']; ?>
                                </td>
                                <td>
                                    <?php echo $re['order_name']; ?>
                                </td>
                                <td>
                                    <?php echo $re['order_status']; ?>
                                </td>
                                <td>
                                    <?php echo $re['order_total']; ?>
                                </td>
                                <td>
                                    <?php echo $re['purchase_order']; ?>
                                </td>
                             
                                <td>
                                    <?php echo $re['shipping_cost']; ?>
                                </td>
                                  
                                      </tr>
                            <?php
					// $a++;
					  }
					  ?>
                    </table>
					<?php
                  $i=1;
echo "<center>";
echo "<p><a href='view_all_orders.php'>View All</a> | <b>View Page:</b> ";

while($i <= $totalpages){
$centerPages = '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?page=' .$i  . '">' . $i . '</a> &nbsp;';
	
echo $centerPages;
$i++;
}
                    
?>
                    <br />   <br />  

</p>
	</article>
        
    	<div class="clear"></div>
    </div>
    <footer>
        
        <div class="footer-bottom">
            <p>&copy; Saintrose 2017.</p>
         </div>
    </footer>
</div>
</body>
</html>		