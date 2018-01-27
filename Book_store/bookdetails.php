
<?php
 //session start
ob_start();
 session_start();

include "connect.php";
//check if
//A) a bookid has been submitted
//B) the submitted value is numeric
$auth="";
if(isset($_GET['bid'])){
//clean it up
if(!is_numeric($_GET['bid'])){
//Non numeric value entered. Someone tampered with the catid
$error=true;
$errormsg=" Security, Serious error. Contact webmaster: bid enter: ".$_GET['bid']."";
}else{
//book_id is numeric number
//clean it up
$cbID=mysqli_escape_string($con,$_GET['bid']);
$query ="SELECT * from books INNER JOIN genres ON genID=gen_id WHERE book_id='".$cbID."' ";
$results=mysqli_query($con, $query);
if($results){
$num = mysqli_num_rows($results);
$row=mysqli_fetch_assoc($results);
$authno=$row['authID'];
//run a query to get the auth name
if($authno > 0){
$query_auth ="SELECT * from author WHERE auth_id=".$authno." ";
$results_auth=mysqli_query($con, $query_auth);
$row_auth=mysqli_fetch_assoc($results_auth);
$auth=$row_auth['auth_name'];
}
}//results
else{
//there's a query error
$error=true;
$errormsg .=mysqli_error();
}//result test
}//numeric
}//if isset

	if(!isset($_SESSION["cart"]))
	{
		$_SESSION["cart"]=0; 
	}
	 
?>

<!doctype html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>online - bookstore</title>
<link rel="stylesheet" href="styles.css" type="text/css" />

</head>
<body>
<div id="container">
    <header>
    	<h1><a href="/">Saint<span>rose</span></a></h1>
        <h2>Online bookstore</h2>
    </header>
    <nav>
		<ul>
        	<li><a href="index.php">Home</a></li>
           
            <li class="start selected"><a href="productsall.php">Shop</a></li>
             <li class=""><a href="aboutus.php">Aboutus</a></li>
            <li class="end"><a href="contactus">Contact</a></li>
        </ul>
    </nav>

<!--	<img src="images/image.jpg" alt="Books" /> -->

    <div id="body">

		

		<section id="content">
 
		<article class="expanded">
 <div class="productRow">
     
       <table width="100%" border="0" id="prod">

  <tr>
    <td colspan="3"><b><a href="products.php?catid=<?php echo trim(stripslashes($row['gen_id']));?>&catname=<?php echo stripslashes($row['gen_name']);?>"><?php echo stripslashes(strtoupper($row['gen_name']));?></a> > <?php echo $row['title'];?> </b></td>
  </tr>
 
  <tr>
    <td rowspan="5" valign="top" ><img src="<?php echo "images/".$row['book_img']; ?>" width="112" height="108" /></td>

  </tr>
  <tr>
    <td><strong>Price:</strong></td>
    <td><?php echo "<h4> $".$row['price'] ."</h4>";?></td>
  </tr>
  <tr>
    <td><strong>ISBN:</strong></td>
    <td><?php echo $row['ISBN'];?></td>
  </tr>
  <tr>
    <td><strong>Publication Date: </strong></td>
    <td><?php echo $row['date_of_pub'];?></td>
  </tr>
  <tr>
    <td><strong>Author:</strong></td>
    <td><?php echo $auth; ?></td>
  </tr>
  <form action="addtocart.php" method="post">
  <tr>
    <td> </td>
    <td><strong>Quantity</strong></td>
    <td><label>
     <select name="qty">;
<?php
  for($i=1; $i<12; $i++) {
 echo '<option value='.$i.'>'.$i.'</option>';
     }
?>
 </select>

    </label>
   </td>
    <input name="bid" type="hidden" value="<?php echo $row['book_id']?>" /></td>
  </tr>
  <tr>
    <td> </td>
    <td> </td>
    <td><label> <br>
      <input type="submit" name="submit" value="Add to Cart" />
    </label></td>
  </tr>
  </table>
    </form>
   <br><br><br>
       
       
       
       
       
       
   
 
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
				<h4>Login Details</h4>
				  <?php 
							if(isset($_SESSION['user'])){    
								if($_SESSION['user'] == 'admin')
							echo "You are logged in as <b><a href='admin_home.php'>".$_SESSION['user']."</a></b>";
								else
								echo "You are logged in as <b><a href='user_home.php'>".$_SESSION['user']."</a></b>";
							
							}   
							?>
				
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
                	<h4>Search site</h4>
                    <ul>
                    	<li class="text">
                            <form method="get" class="searchform" action="" >
                                <p>
                                    <input type="text" size="26" value="" name="s" class="s" />
                                    
                                </p>
                            </form>	
						</li>
					</ul>
                </li>
                
                <li>
                    <h4>Helpful Links</h4>
                    <ul>
                        <li><a href="http://www.google.com" title="Google.com">Google</a></li>
                        <li><a href="http://www.amazon.com" title="Amazon">Amazon</a></li>
                        <li><a href="http://www.https://www.strose.edu/" title="Saintrose">Saintrose</a></li>
                    </ul>
                </li>
				
				
                
            </ul>
		
        </aside>
    	<div class="clear"></div>
    </div>
    <footer>
        
        <div class="footer-bottom">
            <p>&copy;  2017. <a href=""></a> </p>
         </div>
    </footer>
</div>
</body>
</html>