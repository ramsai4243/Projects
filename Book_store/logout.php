<?php
 //session start

session_start();
  if(isset($_SESSION['user'])){
 $user = $_SESSION['user'];
 }
else
 {
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
    	<h1><a href="/">Company<span>Name</span></a></h1>
        <h2>your website slogan here</h2>
    </header>
    <nav>
    	<ul>
        	<li class="start selected"><a href="index.php">Home</a></li>
                        <li><a href="productsall.php">shop</a></li>
            <li><a href="showcart.php">cart</a></li>
            <li><a href="aboutus.php">Aboutus</a></li>
           <li class="end"><a href="contact.php">Contact</a></li>
		     <li class="end"><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

 	<img src="images/banner.jpg" alt="Books" />  

    <div id="body">

		

		<section id="content">

	    <article>
				
			
			<h2>Introduction to brio</h2>
			<div class="article-info">Posted on <time datetime="2013-05-14">14 May</time> by <a href="#" rel="author">Joe Bloggs</a></div>

             
		</article>
	
		<article class="expanded">

            	 	<h2>Buy unbranded</h2>
			<div class="article-info">Posted on <time datetime="2013-05-14">14 May</time> by <a href="#" rel="author">Joe Bloggs</a></div>
<p> 

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
$results=mysqli_query($con,$query);
if($results){
$num = mysqli_num_rows($results);
}else{
echo mysqli_error();
}
  
  if($num>0){
  while($row=mysqli_fetch_assoc($results,$con)){
   
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
					<a href="aboutus.php" class="readmore">Read More</a></p>
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
           
              <li>
                    <h4></h4>
                    <ul>
                        <li class="text">
              
                             
                           	<?php
 
unset($_SESSION['user']);
session_destroy();
header("Location:index.php");
?>
	 </p>
                            
		</li>
                
            </ul>
            </div>
		
        </aside>
    	<div class="clear"></div>
    </div>
    <footer>
        
        <div class="footer-bottom">
            <p>&copy; Pleasure 
            Reading Inc., 2017.</p>
         </div>
    </footer>
</div>
</body>
</html>