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
        	<li class="start selected"><a href="index.php">Home</a></li>
            <li><a href="productsall.php">shop</a></li>
            <li><a href="showcart.php">cart</a></li>
            <li><a href="aboutus.php">Aboutus</a></li>
           <li class="end"><a href="contact.php">Contact</a></li>
		    	
  
	 
        </ul>
    </nav>

 	<img src="images/banner.jpg" alt="Books" />  

    <div id="body">

		

		<section id="content">

	    <article>
				
			
			<h2>Introduction to Best Books</h2>
			<div class="article-info">Posted on <time datetime="2013-05-14">14 May</time> by <a href="#" rel="author">Joe Bloggs</a></div>
<p align="justify">Why write an introduction? Nobody reads it anyhow. And do you know why? Authors get windy and I centered in their long introductions. They think their readers will love their journey. Maybe, but maybe boring. What will your book do for your readers? Only benefits sell. So include 
three to five benefits in sentences following your hook introduction. </p>
<p align="justify">Both of these books look at ordinary family life in a repressive Communist society, and document how political ups and downs affect people helpless to control their situation. Nothing to Envy tracks six North Korean characters over fifteen years. Some lived in terrible poverty and some were comparably well-off. Some were blinded by idealism and some were cynical. At times they loved the oddities of the nation they lived in - black outs are great times for romance. At other times they simply tolerated the deprivation. Sometimes they feared for their lives. Eventually, each person came to the painful realization that the country they loved, and had served all their lives, did not even remotely value them.

The Little Red Guard follows one family, but it's a family that contains multiple generations. These generations show how much China changed in a short time. Wenguang Huang's grandmother suffered under the old imperial system, but she treasures its traditions. When Wenguang is eight, she announces that she wants more than anything to be buried with a traditional ceremony and in a coffin. Wenguang's mother and father are products of the Communist system, who find the grandmother's superstition foolish, but don't want to hurt her. Their experiences with the system have taught them to be cautious, and so each step in a simple process is filled with fear and paranoia. Wenguang also provokes fear in his parents. He's part of the hip younger generation that comes of age when orthodoxy seems to recede, and young people learn new ideas at the university, start their own businesses, and visit the west. Eventually, he learns that he probably should have listened to his elders.
</p>

             
		</article>
	
		<article class="expanded">

            	 	<h2>Buy books of famouse authors </h2>
			<div class="article-info">Posted on <time datetime="2013-05-14">14 May</time> by <a href="#" rel="author">Joe Bloggs</a></div>
<p align="justify"> 
Inside a story brews, information you must share! Unique, needed information you know will benefit lives-hundreds and thousands lives.

Where are you now with your book? Discouraged you don't know how? It will take too long? Be too much work? Cost too much money? Do you worry it won't be good enough to sell? Whether you are an emerging or already published author, ‘Write Your EBook or Other Short Book - Fast!' gives you each step of the way to market while you write, publish quickly, and not make the mistakes even seasoned authors make-all to make you a successful author!

We authors write the books we need—thus, after twenty years of writing, publishing and selling books, this book has evolved to give you an easy-to-use formula to write a quality book fast.

Each chapter gives short, no-nonsense how-to answers to your questions, author's tips, and Internet resources to help you market.

With your passion, intention, attention, and patience, you will finish your treasured book years before you would with the agent/publisher route. You'll get respect for being an expert, your business will flourish, you'll make lifetime income, and you'll love the adventure. So turn the page and begin now!
</p
	</article>
        </section>
        
        <aside class="sidebar">
	
            <ul>	
               <li>
                    <h4>Categories</h4>
                     <?php
                      include("connect.php");
$query ="SELECT * from genres";
$results=mysqli_query($con,$query);
if($results){
$num = mysqli_num_rows($results);
}else{
echo mysqli_error();
}
  
  if($num>0){
  while($row=mysqli_fetch_assoc($results)){
   
?>
        

         
          <ul>
		 
            <!-- List of links under menuset 1 -->
            <li> <a href="products.php?catid=<?php echo $row['gen_id'];?>&catname=<?php echo $row['gen_name'];?>"><?php echo $row['gen_name'];?></a> </li>
           </ul>
             
           <?php 

	//echo $row['desc'];
	
  }
  }  ?>             
                </li>
                
                <li>
                    <h4>About us</h4>
                    <ul>
                        <li class="text">
                        	<p style="margin: 0;">Aenean nec massa a tortor auctor sodales sed a dolor. Duis vitae lorem sem. Proin at velit vel arcu pretium luctus.<br />
					<a href="aboutus.php" class="readmore">Read More</a></p>
                        </li>
                    </ul>
                </li>
                
                <li>
                	<h4>Search Book</h4>
                    <ul>
                    	<li class="text">
                            <form method="get" class="searchform" action="search.php" >
                             
                                    <input type="text"  value="" name="s" class="s" />
                                     <input name="search" type="submit" id="submit" value="Go" />
                              
                            </form>	
						</li>
					</ul>
                </li>
                
               
           
              <li>
                    <h4>Login Details</h4>
                    
                        <li>
               <?php

 
if(isset($_POST["submit"])){
$username=$_POST["username"];
$password=$_POST["password"];
$usertype=$_POST["usertype"];
 
 
include("connect.php");
 

$query="select * from users where username='$username' and password='$password' and usertype='$usertype' " ;


$res=mysqli_query($con,$query);
$re=mysqli_fetch_array($res);


$num_rows = mysqli_num_rows($res);

if ($num_rows > 0) {
 
$_SESSION["user"]=$username;
 
if($usertype == 'admin')

header("Location:admin_home.php");
else
header("Location:user_home.php");  
}
else
{
echo "<script>alert('Invalid Login')</script>";

}
}

?>
                             
                            <?php 
							if(isset($_SESSION['user'])){    
								if($_SESSION['user'] == 'admin')
							echo "You are logged in as <b><a href='admin_home.php'>".$_SESSION['user']."</a></b>";
								else
								echo "You are logged in as <b><a href='user_home.php'>".$_SESSION['user']."</a></b>";
							
							}   
							?>
							 
                                <form name="login" action="#" method="post">
                                    <p>Username:
                                        <input type="text" name="username" id="user" />
                                        <br /> Password:
                                        <input type="password" name="password" id="pwd" />
                                        <br /> <br /> 
                                        User Type:
                                        <select name="usertype">
            <option value="admin">Admin</option>
            <option value="employee">Employee</option>
          </select>
          <br />
          <input name="submit" type="submit" id="submit" value="Submit" />
		  <br />
		  New User? Register <a href="register.php">Here</a><br>
        </p>
		</form>
		</li>
         
				<li>
                    <h4>Helpful Links</h4>
                    <ul>
                       <li><a href="http://www.google.com" title="Google.com">Google</a></li>
                        <li><a href="http://www.amazon.com" title="Amazon">Amazon</a></li>
                        <li><a href="http://www.https://www.strose.edu/" title="Saintrose">Saintrose</a></li>
                    </ul>
                </li>		 
            </ul>
            </div>
		
        </aside>
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