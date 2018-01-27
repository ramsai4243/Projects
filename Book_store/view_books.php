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
            <li  class="start selected"><a href="view_books.php">Books</a></li>
            <li><a href="view_categories.php">Categories</a></li>
            <li><a href="view_users.php">Users</a></li>
            <li><a href="view_orders.php">Orders</a></li>
		   <li class="end"><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

 	<img src="images/adminbanner.jpg" alt="Books" />  

    <div id="body">

		

		<section id="content">

	    <article>
				
			
			<h2>Books Info</h2>
			<div class="article-info">Posted on <time datetime="2013-05-14">14 May</time> by <a href="#" rel="author">Joe Bloggs</a></div>

             
		</article>
	
		<article class="expanded">

            	 	<h2>View Books </h2>
	 
<?php
 include("connect.php");
 ?>

  <table width="100%" >
                        <tr>
                            <th>Sl No</th>
                             <th>Book_id</th>
                            <th>Author-ID</th>
                            <th>Publisher-ID</th>
                            <th>Title</th>
                            <th>Price</th>
                            <th>Date_of_Pub</th>
                            <th>Image</th>
                            <th> </th>
                        </tr>
                        <!-- connecting to database -->
                        <?php
                      
                     
                        include("connect.php");
					  $res=mysqli_query($con,"select * from books");
				    $a=1;
					  while($re=mysqli_fetch_array($res))
					  {
					  
					  ?>
                            <tr>
                                <td>
                                    <?php echo $a; ?>
                                </td>
                                <td>
                                    <?php echo $re['book_id']; ?>
                                </td>
                                <td>
                                    <?php echo $re['authID']; ?>
                                </td>
                                <td>
                                    <?php echo $re['pubID']; ?>
                                </td>
                                <td>
                                    <?php echo $re['title']; ?>
                                </td>
                                <td>
                                    <?php echo $re['price']; ?>
                                </td>
                             
                                <td>
                                    <?php echo $re['date_of_pub']; ?>
                                </td>
                                   <td>
                                    <img src="images/<?php echo $re['book_img']; ?>" height="30" width="30" /> 
                                </td>
                                <td>
									<a href="view_book.php?bid=<?php echo $re['book_id']; ?>">View</a>
                                    <a href="edit_book.php?bid=<?php echo $re['book_id']; ?>">Edit</a>
                                    <a href="delete_book.php?bid=<?php echo $re['book_id']; ?>" onClick="return confirm('Do you want delete this Book');">Delete</a></td>
                            </tr>
                            <?php
					 $a++;
					  }
					  ?>
                    </table>
                  
                    <p align="left"> <a href="add_book.php">Add New</a></p>

                    <br />   <br />  

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
                    <ul>
                        <li class="text">
              
                             
                            <?php 
							if(isset($_SESSION['user'])){    
		 
							echo "You are logged in as <b>".$_SESSION['user']."</b>";
								}   
							?>
                               
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
            </div>
		
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