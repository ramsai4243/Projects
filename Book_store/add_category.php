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
<html>
<head>
<title>online- BookStore</title>
<link rel="stylesheet" href="styles.css" type="text/css" />
  <script language="JavaScript">
            <!-- Hide
            var stm
            verify = function(form) {
                stm = 0
                for (i = 0; i < 10; i++) {
                    if (document.forms[0].elements[i].value == "") {
                        alert("Please fill in the " + document.forms[0].elements[i].name + " field");
						document.forms[0].elements[i].focus();
                        return (false);
                    }

                    return true;
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
    	<h1><a href="admin_home.php">Saint<span>Rose</span></a></h1>
        <h2>Online Book Store</h2>
    </header>
    <nav>
    	<ul>
        	<li><a href="admin_home.php">Home</a></li>
            <li><a href="view_books.php">Books</a></li>
            <li><a href="view_categories.php">Categories</a></li>
            <li   class="start selected"><a href="view_users.php">Users</a></li>
            
		   <li class="end"><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

 	<img src="images/adminbanner.jpg" alt="Books" />  

    <div id="body">

		

		<section id="content">

		<article><h2> Add Category </h2>
		</article>
		<article class="expanded">
		
		 <?php
			include("connect.php");
			 
				
if(isset($_POST['save']))
{
 
 $title=$_POST['title'];
 $gen_name=$_POST['gen_name'];
 $descri=$_POST['descri'];
   
  	
 
		 
        
        $sql="select  title from genres where title='$title'";
          $res1=mysqli_query($con,$sql); 
			  $re1=mysqli_num_rows($res1);
			  if($re1==1)
			  {
			  echo "Category is already existed";
			  }
			
			else{

$query=	"INSERT INTO `genres` ( `title`, `gen_name`, `descri`) VALUES
('$title' ,'$gen_name', '$gen_name')";

//echo "<br>". $query;


     	$res=mysqli_query($con,$query);
     	if($res)
			{
			echo "<h1>Successfully Category Created </h1>";
			}
			else
			{
			die(mysqli_error());
			}
			}
  		
			}
			?>
		
		
		
		

          	<!-- Add user form starts-->
 
 
 
          	<!-- Add user form starts-->
<form id="form1" method="post" action="#" enctype="multipart/form-data">
                                 
<table width="200">
                     <td width="39%">Category Title</td>
                    <td width="61%"><input type="text" name="title" /></td>
                  </tr>
                  <tr>
                    <td>Category Name</td>
                    <td><input type="text" name="gen_name" /></td>
                  </tr>
                  <tr>
                    <td>Category Description</td>
                    <td><input type="text" name="descri" id="descri" /></td>
                  </tr>
				  
				   <tr> <td></td>
    <td><input type="submit" name="save" value="Save"  />
      <input type="reset" name="cancel" value="Cancel" />
	   <input type="button" onClick="history.go(-1);" value="Go Back" /></td>
  </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
</table>

   </form>
							<!--Add user form closes-->  	 	 
	                      
                           
                             	                      
                           


                             

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