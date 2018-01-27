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
 
<!--  http://formoid.com  -->
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
            <li class="start selected"><a href="view_users.php">Users</a></li>
			<li><a href="view_orders.php">Orders</a></li>
		   <li class="end"><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

 	<img src="images/adminbanner.jpg" alt="Books" />  

    <div id="body">

		
<!--
		<section id="content"> -->

	    <article>
				
			
			<h2>View Users</h2>
			             
		</article>
	
		<article class="expanded">

            	 	<h2></h2>
	 
<?php
 include("connect.php");

$select =mysqli_query($con,"SELECT * FROM users");
$a=1;
?>

<table align="center" >
<tr>
<th>SlNo</th> 
<th>First Name</th>
<th>Last Name</th>
<th>User Name</th>
<th>User Type</th>
<th>Email Id</th>
<th>Gender</th>
 
 <th></th>
 

</tr>
<?php
while ($row=mysqli_fetch_array($select)) 
{
 ?>
 <tr>
  <td> <?php echo $a; ?></td>
  <td><?php echo $row['firstname']; ?></td>
  <td><?php echo $row['lastname']; ?></td>
   <td><?php echo $row['username']; ?></td>
     <td><?php echo $row['usertype']; ?></td>
    <td><?php echo $row['email']; ?></td> 
      <td><?php echo $row['gender']; ?></td>
	 
 <td><a href="view_user.php?uid=<?php echo $row['id']; ?>">View</a>
                                    <a href="edit_user.php?uid=<?php echo $row['id']; ?>">Edit</a>
                                    <a href="delete_user.php?uid=<?php echo $row['id']; ?>" onClick="return confirm('Do you want delete this User');">Delete</a></td>
                          

 </tr>
                            <?php
					 $a++;
					  }
					  ?>


</table>
<p align="left"> <a href="add_user.php">Add New</a></p>

                    <br />   <br />  
<br />

</p>
	</article>
     <!--   </section> -->
        
       
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