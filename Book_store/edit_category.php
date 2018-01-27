<?php
 //session start

session_start();
ob_start();
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

	    
	
	<article><h2> Edit Category </h2>
		</article>
		<article class="expanded">

		
	<?php	
		
include("connect.php");  ?>
		
			
		 <?php
				if(isset($_POST['update']))
				{
				$genid=$_REQUEST['cid'];
			  $title=$_REQUEST['title'];
			  $gen_name=$_REQUEST['gen_name'];
			  
			  $descri=$_REQUEST['descri'];
			   
			  
			  $sql="update genres set title='$title',gen_name='$gen_name', descri ='$descri' where gen_id=$genid";
			  //echo $sql;
			  $upd=mysqli_query($con,$sql);
			  
			  if($upd)
			  {
			  echo "<p>Successfully updated<p> ";
			  
			  }
			  else
			  {
			  die(mysqli_error());
			  }
			
				
				}
				
				?>
		
             <?php  
         
				 $genid=$_GET['cid'];
			 
				$res=mysqli_query($con,"select * from genres where gen_id=$genid");
				$re=mysqli_fetch_array($res); 

?>
                <form action="#" method="post">
				<input type="hidden" name="cid" value="<?php echo $genid; ?>" />
					<p><table width="100%" height="297" border="0" cellpadding="0" cellspacing="0">
					<td>Category  Title</td>
                     <td colspan="2">
                     
                      <input type="text" name="title" value="<?php echo $re['title']; ?>" />
                      </td>
                  </tr>
                    
                  <tr>
                    <td>Category Name</td>
                    <td><input type="text" name="gen_name" value="<?php echo $re['gen_name']; ?>" /></td>
                  </tr>
                  
                 
					<tr>
                    <td>Description</td>
                    <td><input type="text" name="descri" value="<?php echo $re['descri']; ?>" /></td>
                  </tr>

					<tr>
                    <td>&nbsp;</td>
                    <td><input type="submit" name="update" value="Update" /></td>
                  </tr>
                </table>
                </p>
                </form>				  
	             
               <input type="button" onClick="history.go(-1);" value="Go Back" />
                                            
                                             
                           


                             

</p>
	</article>
        </section>
        
    	<div class="clear"></div>
    </div>
    <footer>
        
        <div class="footer-bottom">
            <p>&copy; Saintrose 2017.</p>
         </div>
    </footer>
</div>
</body>
</html>	