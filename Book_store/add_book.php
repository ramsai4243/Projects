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
    	<h1><a href="index.php">Saint<span>Rose</span></a></h1>
        <h2>Online Book store</h2>
    </header>
    <nav>
    	<ul>
        	<li><a href="admin_home.php">Home</a></li>
            <li><a href="view_books.php">Books</a></li>
            <li><a href="view_categories.php">Categories</a></li>
            <li   class="start selected"><a href="view_users.php">Users</a></li>
           <li><a href="view_orders.php">Orders</a></li> 
		   <li class="end"><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

 	<img src="images/adminbanner.jpg" alt="Books" />  

    <div id="body">

		

		<section id="content">

		<article><h2> Add Book </h2>
		</article>
		<article class="expanded">
		
		 <?php
			include("connect.php");
			 
				
if(isset($_POST['save']))
{
 
 $authID=$_POST['authID'];
 $pubID=$_POST['pubID'];
 $title=$_POST['title'];
 $price=$_POST['price'];
 $date_of_pub =$_POST['date_of_pub'];
  	
 $ISBN=$_POST['ISBN'];
 $genID =$_POST['genID'];
		 $filename=$_FILES['img']['name'];
		  $filetype=$_FILES['img']['type'];
		  $filesize=$_FILES['img']['size'];
		  $filetmp=$_FILES['img']['tmp_name'];
		  //name of the photostored
		  $bookimg=$filename;
        
        $sql="select title from books where title='$title'";
          $res1=mysqli_query($con,$sql);
        
			  $re1=mysqli_num_rows($res1);
			  if($re1==1)
			  {
			  echo "title is already existed";
			  }
			
			else{
	move_uploaded_file($filetmp,"images//".$bookimg);
$query=	"INSERT INTO `books` ( `authID`, `pubID`, `title`, `price`, `date_of_pub`, `book_img`, `ISBN`, `genID`) VALUES
('$authID', '$pubID', '$title',  '$price',  '$date_of_pub', '$bookimg', '$ISBN', '$genID' )";


echo "<br>". $query;


     	$res=mysqli_query($con,$query);
     	if($res)
			{
			echo "<h1>Successfully Book added</h1>";
			}
			else
			{
			die(mysqli_error());
			}
			}
  		
			}
			?>
		
          	<!-- Add user form starts-->
<form id="form1" method="post" action="#" enctype="multipart/form-data" OnSubmit="return verify(this.form)">
                                 
<table width="200">

<tr>
                    <td>authID</td>
					
                    <td><input type="text" name="authID" /></td>
                  </tr>
				  
<tr>
                    <td>pubID</td>
                    <td><input type="text" name="pubID" /></td>
                  </tr>
 <tr>
 
                     <td width="39%">Book Title</td>
                    <td width="61%"><input type="text" name="title" /></td>
                  </tr>
                  <tr>
                    <td>Price</td>
                    <td><input type="text" name="price" /></td>
                  </tr>
                  <tr>
                    <td>Date of publication</td>
                    <td><input type="text" name="date_of_pub" id="date_of_pub" placeholder="yyyy-mm-dd" /></td>
                  </tr>
				  <tr>
                    <td>ISBN</td>
                    <td><input type="text" name="ISBN" id="ISBN" /></td>
                  </tr>
				   <tr>
                    <td>Category ID</td>
                    <td><input type="text" name="genID" id="genID" /></td>
                  </tr>
				   <tr>
                    <td>Book Image</td>
                    <td><input type="file" name="img" id="file" /></td>
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