<?php
ob_start();
include("connect.php");
 
	if(!isset($_SESSION["cart"]))
	{
		$_SESSION["cart"]=0; 
	}
	
	 
?>

<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online - Bookstore</title>                        
<link rel="stylesheet" href="styles.css" type="text/css" />

</head>
<body>
<div id="container">
    <header>
    	<h1><a href="/">Saint<span>Rose</span></a></h1>
        <h2>Online Book store</h2>
    </header>
    <nav>
    <ul>
        	<li class="start selected"><a href="index.php">Home</a></li>
            
            <li><a href="productsall.php">shop</a></li>
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

//check if
//A) a catid has been submitted
//B) the submitted value is numeric
if(isset($_GET['catid'])){
//clean it up
if(!is_numeric($_GET['catid'])){
//Non numeric value entered. Someone tampered with the catid
$error=true;
$errormsg=" Serious error. Contact webmaster: Invalid Category id entered: ".$_GET['catid']."";
}else{
//cat_id is numeric number
//clean it up
$error=false; 
$aID=mysqli_escape_string($con, $_GET['catid']);
$query ="SELECT * from books INNER JOIN genres ON genID=gen_id WHERE genID=".$aID;
$results=mysqli_query($con,$query);
if($results){
$num = mysqli_num_rows($results);

//$row=mysqli_fetch_assoc($results);
//$row['gen_name'];
$_SESSION['catname']=$_GET["catname"];
}//results
else{
//there's a query error
$error=true;
$errormsg .=mysqli_error();
}//result test
}//numeric
}//if isset

if(!$error){
?>

 <div class="productRow">
  
   <b>Catatory: <?php echo strtoupper(trim(stripslashes($_SESSION['catname']))); ?></b><br><br>
   <?php
  if($num>0){
   
  while($rowb=mysqli_fetch_assoc($results)){
 //  print_r($rowb);
 //  echo "<br>";
  ?>
  
      <!-- Each individual product description -->
       <article class="productInfo"><?php
	  
	   $img =file_exists("images/".$rowb['book_img'])? $rowb['book_img']: 'default.png';
	   ?>

         <div> <a href="bookdetails.php?bid=<?php echo $rowb['book_id']?>"> <img alt="sample" src="images/<?php echo $img ; ?>"></a></div>
          <p class="title"><?php echo
trim(stripslashes($rowb['title']))?></p>
          <p class="price"><?php echo "$".trim(stripslashes($rowb['price']))?></p>
          <p class="productContent"><?php echo  $rowb['descri']; ?> </p>
    <!--     <input type="button" name="button" value="Buy Now">  
         	<a href="bookdetails.php?bid=<?php echo $rowb['book_id']?>">Add to Cart</a>  --> 
         <button class="buyButton" onClick="window.location.href='bookdetails.php?bid=<?php echo $rowb['book_id']?>'">Buy Now</button>
        	</article>
     <?php
 }
  }else{
  ?>
  <p>There are no books in this category.</p>
  <?php
  }
  ?>
  
<?php
  }else{
  ?>
  <?php
        echo "The following errors occurred: ".$errormsg.""
        ?></p>
<?php } ?> 
       
       
       
       
       
   
       
       
       
       
       </div>
   
 
		</article>
        </section>
        
        <aside class="sidebar">
	
            <ul>	
               <li>
                    <h4>Categories</h4>
                     <?php
                      include("connect.php");
$query ="SELECT * from genres";
$results=mysqli_query($con,$query);
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
            2017         </div>
    </footer>
</div>
</body>
</html>