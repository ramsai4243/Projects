<?php
 //session start
ob_start();
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
    	<h1><a href="index.php">Saint<span>Rose</span></a></h1>
        <h2>Online Book store</h2>
    </header>
    <nav>
    	<ul>
        	<li><a href="admin_home.php">Home</a></li>
            <li  class="start selected"><a href="view_books.php">Books</a></li>
            <li><a href="view_categories.php">Categories</a></li>
            <li><a href="view_users.php">Users</a></li>
            
		   <li class="end"><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

 	<img src="images/adminbanner.jpg" alt="Books" />  

    <div id="body">

		

		<section id="content">

	    
	
	<article><h2> Delete Book </h2>
		</article>
		<article class="expanded">

            		 
	                      
          <?php
		  	include("connect.php");
				$bid=$_GET['bid'];
				$sql="delete from books where book_id=$bid";
				//echo $sql;
				$res=mysqli_query($con,$sql);
				if($res)
				{
				echo "<h1>Successfully deleted </h1>";
				}
				?>
                 <p align="center"><input type="button" onclick="history.go(-1);"  value="Go Back"/></p>                  


                             

</p>
	</article>
        </section>
        
    	<div class="clear"></div>
    </div>
    <footer>
        
        <div class="footer-bottom">
            <p>&copy;  Saintrose 2017.</p>
         </div>
    </footer>
</div>
</body>
</html>	