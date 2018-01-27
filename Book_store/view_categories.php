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
            <li><a href="view_books.php">Books</a></li>
            <li  class="start selected"><a href="view_categories.php">Categories</a></li>
            <li><a href="view_users.php">Users</a></li>
            <li><a href="view_orders.php">Orders</a></li>
		   <li class="end"><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

 	<img src="images/adminbanner.jpg" alt="Books" />  

    <div id="body">

		
<!--
		<section id="content"> -->

	    <article>
				
			
			<h2>View Categories</h2>
			             
		</article>
	
		<article class="expanded">

            	 	<h2></h2>
	 
<?php
 include("connect.php");

$select =mysqli_query($con,"SELECT * FROM genres");
$a=1;
?>

<table align="center" >
<tr>
<th>SlNo</th> 
<th>Title</th>
<th>Category Name</th>
<th>Description</th>

 <th></th>
 

</tr>
<?php
while ($row=mysqli_fetch_array($select)) 
{
 ?>
 <tr>
  <td> <?php echo $a; ?></td>
  
  <td><?php echo $row['title']; ?></td>
   <td><?php echo $row['gen_name']; ?></td>
     <td><?php echo $row['descri']; ?></td>
    
	 
		<td>
	<!--	<a href="view_category.php?cid=<?php echo $row['gen_id']; ?>">View</a>-->
		<a href="edit_category.php?cid=<?php echo $row['gen_id']; ?>">Edit</a>
		<a href="delete_category.php?cid=<?php echo $row['gen_id']; ?>" onClick="return confirm('Do you want delete this Category');">Delete</a></td>


 </tr>
                     <?php
					 $a++;
					  }
					  ?>


</table>
<p align="left"> <a href="add_category.php">Add New</a></p>

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