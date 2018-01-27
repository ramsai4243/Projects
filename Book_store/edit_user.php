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
 
<script language="JavaScript">
		function chkpwds() {
                            var p = document.getElementById("passwd").value;
                            var cp = document.getElementById("cpasswd").value;

                          
                               if (p != cp) {
							 
		//document.getElementById('err').innerText =  "Please check Password and Confirm Passwords";
  
						 alert( "Please check Password and Confirm Passwords");
                 document.getElementById("passwd").value = "";
                                document.getElementById("cpasswd").value = "";
                                document.getElementById("passwd").focus();
								
                 return false;
              }
             return true;
                        }
          

                    </script>
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

	    
	
	<article><h2> Edit User </h2>
		</article>
		<article class="expanded">

		
		
		<?php	
		
			include("connect.php");  ?>
		
			
		 <?php
				if(isset($_POST['update']))
				{
				$uid=$_REQUEST['uid'];
			  $username=$_REQUEST['username'];
			  $email=$_REQUEST['email'];
			  
			  $gender=$_REQUEST['gender'];
			  $passwd=$_REQUEST['passwd'];
			  
			  $sql="update users set username='$username', password = '$passwd', email='$email', gender='$gender' where id=$uid";
			  //echo $sql;
			  $upd=mysqli_query($con,$sql);
			  
			  if($upd)
			  {
			 
			 
			  echo "<p>Successfully updated <p>";
			  
			  }
			  else
			  {
			  die(mysqli_error());
			  }
			
				}
				
		?>
             <?php
				 $userid=$_GET['uid'];
			 
				$res=mysqli_query($con,"select * from users where id=$userid");
				$re=mysqli_fetch_array($res); 

?>
                <form action="#" method="post" onSubmit="return chkpwds();" >
				<input type="hidden" name="uid" value="<?php echo $userid; ?>" />
					<p><table width="100%" height="297" border="0" cellpadding="0" cellspacing="0">
					<td>Username</td>
                     <td colspan="2">
                     
                      <input type="text" name="username" value="<?php echo $re['username']; ?>" />
                      </td>
                  </tr>
                    
                  <tr>
                    <td>Email</td>
                    <td><input type="text" name="email" value="<?php echo $re['email']; ?>" /></td>
                  </tr>
                  
                  <tr>
                    <td>Gender</td>
                    <td><input type="radio" name="gender" value="male"  <?php
					
					if($re['gender']=='male')
					{
					echo "checked='checked' ";
					}
					?>
					
					 />
Male
<input type="radio" name="gender" value="female" <?php
					
					if($re['gender']=='female')
					{
					echo "checked='checked' ";
					}
					?>  />
Female</td>
                  </tr>

 
                 
                  <tr>
                    <td>Password</td>
                    <td>
					 <input type="password" name="passwd" id="passwd" value="<?php echo $re['password']; ?>"/>
                  </td>
				  </tr>
<tr><tr>
                    <td>Confirm Password</td>
                    <td>
					 <input type="password" name="cpasswd" id="cpasswd" value=""/>
                  </td>
				  </tr>
<tr>
                    <td></td>
                    <td><input type="submit" name="update" value="Update" /></td>
                  </tr>
                </table>
                </p>
                </form>				  
	                      
              <td>
               <input type="button" onClick="history.go(-1);" value="Go Back" />
                                            
                                        </td>             


                             

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