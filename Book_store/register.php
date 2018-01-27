<?php
 //session start
ob_start();
 //session_start();


 ?>

<!Doctype html>
<html>
<head>
<title>online- BookStore</title>
<link rel="stylesheet" href="styles.css" type="text/css" />
  <script language="JavaScript">
            <!-- Hide
            var stm
            verify = function(form) {
                stm = 0
                for (i = 0; i < 9; i++) {
                    if (document.forms[0].elements[i].value == "") {
                        alert("Please fill in the " + document.forms[0].elements[i].name + " field");
						alert("Please"+ i+document.forms[0].elements[i].value );
                        document.forms[0].elements[i].focus();
                        return (false);
                    }



                }
                if (stm == 0) {
                    if (document.forms[0].elements[4].value == document.forms[0].elements[5].value)
                        return true;
                    else {
                        alert("Please Check The PassWords!");
                        document.forms[0].elements[4].value = ""
                        document.forms[0].elements[5].value = ""
                        document.forms[0].elements[4].focus();
                        return (false);
                    }

                    return true;
                    document.forms[0].elements[0].focus();
                }

            }

            function form_load(form) {
                document.forms[0].elements[0].focus();
            }
            -->

        </script> <!--Closing of the script tag-->
</head>
<body>
<div id="container">
    <header>
    	<h1><a href="index.php">Saint<span>Rose</span></a></h1>
        <h2>Online Book store</h2>
    </header>
    <nav>
    	<ul>
        	<li class="start selected"><a href="index.php">Home</a></li>
            <li><a href="productsall.php">shop</a></li>
            <li><a href="showcart.php">cart</a></li>
            <li><a href="aboutus.php">Aboutus</a></li>
           <li class="end"><a href="contact.php">Contact</a></li>
		  
        </ul>
    </nav>

 	<img src="images/banner.jpg" alt="Books" />  

    <div id="body">

		

	<!--	<section id="content -->

		<article><h2>Registration Form </h2>
		</article>
		<article class="expanded">
		
		 <?php
			include("connect.php");
			 
				
if(isset($_POST['save']))
{
 
 $username=$_POST['username'];
 $password=$_POST['passwd'];
  $firstname=$_POST['firstname'];
 $lastname=$_POST['lastname'];
 $email =$_POST['email'];
  $gender=$_POST['gender'];
  	
 $address=$_POST['address'];
		$usertype =$_POST['usertype'];
        
        $sql="select username from users where username='$username'";
          $res1=mysqli_query($con,$sql);
         // echo "select emp_id from users where username=$username";
			  $re1=mysqli_num_rows($res1);
			  if($re1==1)
			  {
			  echo "Username is already existed";
			  }
			
			else{

$query=	"INSERT INTO users (`lastname`, `firstname`, `username`, `password`, `usertype`, `email`, `gender`, `address`) 
values('$lastname' ,'$firstname', '$username' , '$password', '$usertype' , '$email' , '$gender', '$address' )";


//echo "<br>". $query;


     	$res=mysqli_query($con,$query);
     	if($res)
			{
			echo "<h1>Successfully Registered</h1>";
			}
			else
			{
			die(mysqli_error());
			}
			}
  		
			}
			?>
		
          	<!-- Add user form starts-->
<form id="form1" method="post" action="#" OnSubmit="return verify(this.form)">
 <!--   -->
                                 
<table width="80%">
<tr>
    <td height="36">First Name</td>
    <td> 
      <input type="text" name="firstname" />
    </td>
    <td></td>
    <td>Last Name</td>
    <td>
      <input type="text" name="lastname" />
    </td>
  </tr>
  <tr>
  
  <td width="19%">User Name</td>
				<td width="29%"> 
				  <input type="text" name="username" />
			 </td>
  <td> </td>
				 <td>Email</td>
    <td> 
      <input type="text" name="email" />
    </td>
				
				
  </tr>
  
  <tr>
    <td> Password</td>
    <td> 
      <input type="password" name="passwd" /> 
    <td></td>
    <td>Confirm Password </td>
    <td>
      <input type="password" name="cpasswd" />
    </td>
  </tr>
   
    <tr>
    <td>Gender</td>
    <td> 
	  <input type="radio" name="gender" value="male" checked />Male
	  <input type="radio" name="gender" value="female" checked />Female
            
	  <td></td>
    <td> Address </td>
    <td> 
       <textarea name="address"></textarea>
  </td>
  </tr>
    <tr>
    <td>User Type </td>
    <td> 
      <select name="usertype">
		<option value="admin">Admin</option>
		<option value="employee">Employee</option>
	</select>  
     </td>
    <td> </td>
    <td> </td>
    <td><input type="submit" name="save" value="Save" />
      <input type="reset" name="cancel" value="Cancel" /></td>
  </tr>
   
</table>

   </form>
							<!--Add user form closes-->  	 	 
	                      
                           


                             

</p>
	</article>
     <!--   </section> -->
        
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