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

	    
	
	<article><h2> View User </h2>
		</article>
		<article class="expanded">

            	 	 
	                         <?php
			 
				$uid=$_GET['uid'];
				include("connect.php");
				$res=mysqli_query($con,"select * from users where id='$uid'");
				$re=mysqli_fetch_array($res);
				?>

                              
                                <table width="100%" height="297" border="0" cellpadding="0" cellspacing="0">
                                    <tr>
									
                                        <td>
										 <b>FirstName:</b>
										
                                            </td>                                                 
                                        <td>
                                        <?php echo $re['firstname']; ?>                              </td>
                                    </tr>
                                                  <tr>
                                        <td> 
                                                    <b>LastName:</b> </td>
                                          <td><?php echo $re['lastname']; ?> </td>
                                    </tr>
                                            
                                     
									
									<tr>
                                        <td>  <b>UserName:</b></td>
                                        <td>
                                            <?php echo $re['username']; ?>                                    </td>
                                    </tr>
									<tr>
                                        <td><b>UserType:</b></td>
                                        <td>
                                            <?php echo $re['usertype']; ?>                                    </td>
                                    </tr>
									
                                    <tr>
                                        <td><b>Email</b></td>
                                        <td>
                                            <?php echo $re['email']; ?>                                        </td>
                                    </tr>
                                   
 <tr>
                                        <td><b>Gender</b></td>
                                        <td >
                                            <?php echo $re['gender']; ?>                                        </td>
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