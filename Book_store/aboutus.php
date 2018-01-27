<!doctype html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" href="styles.css" type="text/css" />
 <title>Online Book store</title>
 
</head>
<body>
<div id="container">
    <header>
        <h1><a href="admin_home.php">Saint<span>Rose</span></a></h1>
        <h2>Online Book Store</h2>
    </header>
    <nav>
    	<ul>
        	<li><a href="index.php">Home</a></li>
            <li><a href="productsall.php">shop</a></li>
            <li><a href="showcart.php">cart</a></li>
            <li  class="start selected"><a href="aboutus.php">Aboutus</a></li>
           <li class="end"><a href="contact.php">Contact</a></li>
        </ul>
    </nav>

 	<img src="images/banner.jpg" alt="Books" width="100%" />  

    <div id="body">

		

		<section id="content">

	    <article>
				
			
			<h2>Introduction to Books</h2>
			<div class="article-info">Posted on <time datetime="2017-05-1">14 Feb</time> by <a href="#" rel="author">Joe Bloggs</a></div>
 <p align="justify">
             

Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at ante. Mauris eleifend, quam a vulputate dictum, massa quam dapibus leo, eget vulputate orci purus ut lorem. In fringilla mi in ligula. Pellentesque aliquam quam vel dolor. Nunc adipiscing. Sed quam odio, tempus ac, aliquam molestie, varius ac, tellus. Vestibulum ut nulla aliquam risus rutrum interdum. Pellentesque lorem. Curabitur sit amet erat quis risus feugiat viverra. Pellentesque augue justo, sagittis et, lacinia at, venenatis non, arcu. Nunc nec libero. In cursus dictum risus. Etiam tristique nisl a diam. </p>
 <p align="justify">
Sample Lorem Ipsum Text

Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar hendrerit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque aliquet lacus vitae pede. Nullam mollis dolor ac nisi. Phasellus sit amet urna. Praesent pellentesque sapien sed lacus. Donec lacinia odio in odio. In sit amet elit. Maecenas gravida interdum urna. Integer pretium, arcu vitae imperdiet facilisis, elit tellus tempor nisi, vel feugiat ante velit sit amet mauris. Vivamus arcu. Integer pharetra magna ac lacus. Aliquam vitae sapien in nibh vehicula auctor. Suspendisse leo mauris, pulvinar sed, tempor et, consequat ac, lacus. Proin velit. Nulla semper lobortis mauris. Duis urna erat, ornare et, imperdiet eu, suscipit sit amet, massa. Nulla nulla nisi, pellentesque at, egestas quis, fringilla eu, diam.
            </p>
             
		</article>
	
		<article class="expanded">

            	 	<h2>Buy unbranded</h2>
			<div class="article-info">Posted on <time datetime="2013-05-14">14 jan</time> by <a href="#" rel="author">Joe Bloggs</a></div>
 

        <p align="justify">  Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar hendrerit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque aliquet lacus vitae pede. Nullam mollis dolor ac nisi. Phasellus sit amet urna. Praesent pellentesque sapien sed lacus. Donec lacinia odio in odio. In sit amet elit. Maecenas gravida interdum urna. Integer pretium, arcu vitae imperdiet facilisis, elit tellus tempor nisi, vel feugiat ante velit sit amet mauris. Vivamus arcu. Integer pharetra magna ac lacus. Aliquam vitae sapien in nibh vehicula auctor. Suspendisse leo mauris, pulvinar sed, tempor et, consequat ac, lacus. Proin velit. Nulla semper lobortis mauris. Duis urna erat, ornare et, imperdiet eu, suscipit sit amet, massa. Nulla nulla nisi, pellentesque at, egestas quis, fringilla eu, diam.</p>



 
			
            
 
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
                        <li><a href="http://www.amazon.com/r.cgi?259541" title="Amazon">Amazon</a></li>
                        <li><a href="http://www.https://www.strose.edu/" title="Saintrose">Saintrose</a></li>
                    </ul>
                </li>
                
            </ul>
		
        </aside>
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