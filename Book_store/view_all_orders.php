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
        <h2>Online Book store</h2>
    </header>
    <nav>
    	<ul>
        	<li><a href="admin_home.php">Home</a></li>
            <li><a href="view_books.php">Books</a></li>
            <li><a href="view_categories.php">Categories</a></li>
            <li><a href="view_users.php">Users</a></li>
            <li  class="start selected"><a href="view_orders.php">Orders</a></li>
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
 ?>

  <table width="100%" >
                        <tr>
                            <th>Sl No</th>
                             <th>id</th>
							 <th>order_name</th>
							 
                            
							<th>order_date</th>
							<th>order_address</th>
                            <th>order_status</th>
                            <th>order_total</th>
                            <th>purchase_order</th>
                             
                            <th>shipping_cost</th>
                            <th> </th>
                        </tr>
                        <!-- connecting to database -->
                        <?php
                      
                     
                        include("connect.php");
					  $res=mysqli_query($con,"select * from orders");
				    
					
					
					$a=1;
					  while($re=mysqli_fetch_array($res))
					  {
					  
					  ?>
                            <tr>
                                <td>
                                    <?php echo $a; ?>
                                </td>
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
					 $a++;
					  }
					  ?>
                    </table>
                  
                    

                    <br />   <br />  

</p>
	</article>
        
    	<div class="clear"></div>
    </div>
    <footer>
        
        <div class="footer-bottom">
            <p>&copy;  2017.</p>
         </div>
    </footer>
</div>
</body>
</html>		