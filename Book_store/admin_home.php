<?php
//session start

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
        	<li class="start selected"><a href="admin_home.php">Home</a></li>
            <li class=""><a href="view_books.php">Books</a></li>
            <li><a href="view_categories.php">Categories</a></li>
            <li><a href="view_users.php">Users</a></li>
            <li><a href="view_orders.php">Orders</a></li>
		   <li class="end"><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

 	<img src="images/adminbanner.jpg" alt="Books" />  

    <div id="body">

		

		<section id="content">

	    <article>
				
			
			<h2></h2>
<p align="justify">Bookstore gives you an online shopping cart and point-of-sale system for your school's bookstore. Online shoppers can browse and purchase items via the shopping interface or via Buy Now links for individual items embedded on other sites. In-person sales can be handled using Point of Sale, which works with USB barcode scanners and credit card readers. Students who want to pay later can charge their Bookstore orders to their accounts. On the back end, you can manage inventory, process online orders, and run sales reports. Additionally, all Bookstore transactions are automatically fed into your General Ledger.
</p>
<p align="justify">Mr. Vinck is establishing this firm as a growth-oriented endeavor in order to supplement his retirement, continue meeting people with similar interests, and to leave a viable business to his children. Flyleaf Books will be establishing its store in one of the busiest section of Brecksville, an outlying suburb of Cleveland. This area is well know for its upscale residents and high-quality establishments. Our facility is a former 8,000 square ft. furniture store which allows the company to stock a large amount of inventory.</p>
<p align="justify">It is the goal of the company management to acquire local market share in the used bookstore industry through low price, a dominant selection of products, a competitive variety of services including a buyback/trade program and hard to find book search, plus a relaxing, friendly environment that encourages browsing and reading.

Company
Flyleaf will be a limited liability corporation registered in the state of Ohio. The company will be jointly owned by Mr. James Vinck, a former head librarian of the Philadelphia City Library, and his wife Aracela.

Mr. Vinck is establishing this firm as a growth-oriented endeavor in order to supplement his retirement, continue meeting people with similar interests, and to leave a viable business to his children. Flyleaf Books will be establishing its store in one of the busiest section of Brecksville, an outlying suburb of Cleveland. This area is well know for its upscale residents and high-quality establishments. Our facility is a former 8,000 square ft. furniture store which allows the company to stock a large amount of inventory.

Products/Services
Flyleaf Books will offer a wide range of book, magazine, and music selections. This includes just about every conceivable category including fiction, non-fiction, business, science, children's, hobbies, collecting, and other types of books. Our music selection will concentrate on CD's as these are the most popular and take up the least amount of floor space. In addition, we will be offering a competitive buy and trade service to assist in lowering our inventory acquisition costs and making our store more attractive to our customers. In addition, we offer a search and order service for customer seeking to find hard to get items. Flyleaf Books will have a relaxed "reading room" type atmosphere that we will encourage through the placement of chairs, couches, etc.

Market
Our market is facing a decline in growth over the past two years. This is attributed to the overall weak economy. Book store industry sales rose only 3.6% for last year whereas overall U.S. retail sales grew by 4.3%. However, management believes that this may be an advantage to the used bookstore industry. As customers cut back on purchasing, used bookstores will look more attractive to customers who still wish to purchase books. Therefore, management believes this may be a good time to get into the industry and gain market share.

The bookstore industry as a whole is going through a large consolidation. Previously, the market was dominated by local, small stores and regional chains. With the advent of the "superstore" as created by Barnes & Noble, the largest players in the market have been able to gather significant market share and drive many independent booksellers out of the market.

Where independent booksellers can still create a viable position for themselves within the market is in the used books segment. This segment generally does not attract big companies since the "superstore" concept is much more difficult to replicate in a market with such low profit margins. This tends to favor the local independent bookseller in the used book market segment as long as they can acquire a sufficiently large enough facility to house an attractive inventory and compete with the national chains.

Financial Considerations
Our start-up expenses come to $178,000, which are single time fees associated with opening the store. These costs are financed by both private investors and SBA loans. Please note that we expect to be operating at a loss for the first couple of months before advertising begins to take effect and draw in customers. Flyleaf Books will be receiving periodic influxes of cash to cover operating expenses during the first two years as it strives toward sustainable profitability. Funding has been arranged through lending institutions and private investors already. We do not anticipate any cash flow problems during the next three years.




Flyleaf Book's mission is to provide used quality literature of all types at the lowest possible prices in the Cleveland, OH area. The company additionally seeks to provide a comfortable atmosphere for its clients that promotes browsing, relaxation, and an enjoyable environment to spend extend time in. Flyleaf's attraction to its customers will be our large selection of books, magazines, used CD's and our purchasing/buyback option, which lower our book acquisition costs and allows our customers to discard unwanted books/CD's in exchange for cash.</p>
			<div class="article-info"></div>

             
		</article>
	
		<article class="expanded">

            	 	<h2></h2>
			<div class="article-info"></div>
<p> 

</p>
	</article>
        </section>
        
        <aside class="sidebar">
	
            <ul>	
               <li>
                    <h4>Menu</h4>
                    

         
          <ul>
            
<li class="start selected"><a href="admin_home.php">Home</a></li>
            <li class=""><a href="view_books.php">Books</a></li>
            <li><a href="view_categories.php">Categories</a></li>
            <li><a href="view_users.php">Users</a></li>
            
		   <li class="end"><a href="logout.php">Logout</a></li>

		  </ul>
             
                   
                </li>
                
                 <li>
				<h4>Login Details</h4>
				  <?php 
							if(isset($_SESSION['user'])){    
								if($_SESSION['user'] == 'admin')
							echo "You are logged in as <b><a href='admin_home.php'>".$_SESSION['user']."</a></b>";
								else
								echo "You are logged in as <b><a href='user_home.php'>".$_SESSION['user']."</a></b>";
							
							}   
							?>
				
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
            <p>&copy;Saintrose 2017.</p>
         </div>
    </footer>
</div>
</body>
</html>