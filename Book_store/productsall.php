<?php
include("connect.php");

	if(!isset($_SESSION["cart"]))
	{
		$_SESSION["cart"]=0; 
	}
$error =false;	 
?>

<!doctype html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online Bookstore</title>
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
            
            <li  class="start selected"><a href="productsall.php">shop</a></li>
            <li><a href="showcart.php">cart</a></li>
            <li><a href="aboutus.php">Aboutus</a></li>
           <li class="end"><a href="contact.php">Contact</a></li>
		   <?php
		   if(($_SESSION["user"]!=""))
	{?>
	
 <li class="end"><a href="logout.php">Logout</a></li>
	<?php  }  ?>
		   
        </ul>
    </nav>

<!--	<img src="images/image.jpg" alt="Books" /> -->

    <div id="body">

		

		<section id="content">
 
		<article class="expanded">

  <?php
   	//$query1 ="SELECT * FROM `books` WHERE MONTH(`date_of_pub`) = MONTH(NOW())";
	$query1 ="SELECT * FROM `books`";
$results=mysqli_query($con, $query1);
 
if($results){
 $num = mysqli_num_rows($results);
 }
?>
  <!--  <section class="mainContent"> -->
    <br> <br>
      <div class="productRow"><!-- Each product row contains info of 3 elements -->
      <?php
	 if($num>0){


 
   
  while($rowb=mysqli_fetch_assoc($results)){
 //  print_r($rowb);
 //  echo "<br>";
  ?>
  
      <!-- Each individual product description -->
       <article class="productInfo">
	   <br><br>
	    <?php
		   $img =file_exists("images/".$rowb['book_img'])? $rowb['book_img']: 'default.png';
	  ?>
         <div> <a href="bookdetails.php?bid=<?php echo $rowb['book_id']?>"> <img alt="sample" src="images/<?php echo $img; ?>"></a></div>
          <p class="title" height="200" width="200"><?php echo
trim(stripslashes($rowb['title']))?></p>
          <p class="price"><?php echo "$".trim(stripslashes($rowb['price']))?></p>
          <p class="productContent"><?php echo  $rowb['title']; ?> </p>
    <!--     <input type="button" name="button" value="Buy Now">  
         	<a href="bookdetails.php?bid=<?php echo $rowb['book_id']?>">Add to Cart</a>  --> 
         <button class="buyButton" onClick="window.location.href='bookdetails.php?bid=<?php echo $rowb['book_id']?>'">Buy Now</button>
        	</article> 
     <?php
 
  }}else{
  ?>
  <p>There are no books in this category.</p>
  <?php
  }
  ?>
 
    
 </div>
		</article>
        </section>
        
        <aside class="sidebar">
	
            <ul>	
               <li>
                    <h4>Categories</h4>
                     <?php
                  
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
                	<h4>Search Book</h4>
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
                    <h4>Login Details</h4>
                    <ul>
                        <li class="text">
               <?php

 
if(isset($_POST["submit"])){
$username=$_POST["username"];
$password=$_POST["password"];
$usertype=$_POST["usertype"];
 
 
include("connect.php");
 

$query="select * from users where username='$username' and password='$password' and usertype='$usertype' " ;


$res=mysqli_query($con,$query);
$re=mysqli_fetch_array($res);


$num_rows = mysqli_num_rows($res);

if ($num_rows > 0) {
 
$_SESSION["user"]=$username;
$_SESSION["user"]= $re['username'];
 
if($usertype == 'admin')

header("Location:admin_home.php");
else
header("Location:user_home.php");  
}
else
{
echo "<script>alert('Invalid Login')</script>";

}
}

?>
                             
                             <?php 
							if(isset($_SESSION['user'])){    
								if($_SESSION['user'] == 'admin')
							echo "You are logged in as <b><a href='admin_home.php'>".$_SESSION['user']."</a></b>";
								else
								echo "You are logged in as <b><a href='user_home.php'>".$_SESSION['user']."</a></b>";
							
							}   
							?>
                                <form name="login" action="#" method="post">
                                    <p>Username:
                                        <input type="text" name="username" id="user" />
                                        <br /> Password:
                                        <input type="password" name="password" id="pwd" />
                                        <br /> 
                                        User Type:
                                        <select name="usertype">
            <option value="admin">Admin</option>
            <option value="employee">Employee</option>
          </select>
          <br />
          <input name="submit" type="submit" id="submit" value="Submit" />
        </p>
		</form>
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
            </div>
				
            </ul>
			
			
		
        </aside>
    	<div class="clear"></div>
    </div>
    <footer>
        
        <div class="footer-bottom">
            <p>&copy; Saintrose 2017.</a></p>
         </div>
    </footer>
</div>
</body>
</html>