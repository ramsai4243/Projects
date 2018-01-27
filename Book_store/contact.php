<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>online - BookStore</title>
<link rel="stylesheet" href="styles.css" type="text/css" />
 <script>
 function reply(){
 alert("Successfully form submitted");
 }
 </script>
</head>

<div id="container">
  <header>
    	<h1>Saint<span>Rose</span></h1>
        <h2>Online Book Store</h2>
    </header>
    <nav>
    	<ul>
        <li><a href="index.php">Home</a></li>
          <li><a href="productsall.php">shop</a></li>
            <li><a href="showcart.php">cart</a></li>
            <li><a href="aboutus.php">Aboutus</a></li>
           <li  class="start selected"><a href="contact.php">Contact</a></li>
        </ul>
    </nav>
	<!--
<img src="images/banner.jpg" alt="Books" />  -->
    <div id="body">
		
        

	     <h3>Form</h3>

            <fieldset>
                <legend></legend>
                <form action="#" method="get" onsubmit="return reply();">
                    <p><label for="name">Name:</label>
                    <input name="name" id="name" value="" type="text" /></p>
                    <p><label for="email">Email:</label>
                    <input name="email" id="email" value="" type="text" /></p>

                    <p><label for="message">Message:</label>
                    <textarea cols="37" rows="11" name="message" id="message"></textarea></p>
                    <p><input name="send" style="margin-left: 150px;" class="formbutton" value="Send" type="submit" />
                    </p>
                </form>
            </fieldset>
      
        
       
    	<div class="clear"></div>
    </div>
    <footer>
        
        <div class="footer-bottom">
            <p>&copy; SaintRose 2017.</p>
         </div>
    </footer>
</div>
</body>
</html>