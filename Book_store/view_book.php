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
            
		   <li class="end"><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

 	<img src="images/adminbanner.jpg" alt="Books" />  

    <div id="body">

		

		<section id="content">

	    
	
	<article><h2> View Book </h2>
		</article>
		<article class="expanded">

            	 	 
	                         <?php
			 
				$book_id=$_GET['bid'];
				include("connect.php");
				$res=mysqli_query($con,"select * from books where book_id='$book_id'");
				$re=mysqli_fetch_array($res);
				?>

                              
                                <table width="100%" height="297" border="0" cellpadding="0" cellspacing="0">
                                    <tr>
									
                                        <td width="35%">
										 <p align='justify'> <b>Title:</b>
										<p id="btitle"><?php echo $re['title']; ?></p>
                                            </td>                                                 
                                        <td colspan="2">
                                            <div><img src="images/<?php echo $re['book_img']; ?>" width="200" height="200" /></div>
                                        </td>
                                    </tr>
                                                  <tr>
                                        <td width="35%"><p align='justify'>
                                                    <b>Price:</b></p> </td>
                                          <td colspan="2"><?php echo $re['price']; ?> </td>
                                    </tr>
                                            
                                     
									
									<tr>
                                        <td width="35%"><p align='justify'> <b>Date of Publication:</b></td>
                                        <td width="65%">
                                            <?php echo $re['date_of_pub']; ?>                                    </td>
                                    </tr>
									
                                    <tr>
                                        <td width="35%"><b>Book ID</b></td>
                                        <td width="65%">
                                            <?php echo $re['book_id']; ?>                                        </td>
                                    </tr>
                                   

                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>
                                            <input type="button" onClick="history.go(-1);" value="Go Back" />
                                            
                                        </td>
                                    </tr>
                                     
                                </table>
                           


                             

</p>
	</article>
        </section>
        
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