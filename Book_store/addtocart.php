

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
 
 include "connect.php";
//clean the data:
//1.check if bookid is numeric
//2.then escape it with mysql_escape string
//3.then test to see if a book with that ID exist
if(!is_numeric($_POST['bid'])){
//Non numeric value entered. Someone tampered with the bid
$error=true;
$errormsg=" Security, Serious error. Contact webmaster: bid entered: ".$_POST['bid']."";
}else{
//book_id is numeric number
//Now, lets see if that <code>book ID</code> is valid run a query
$cbID=mysqli_escape_string($con,$_POST['bid']);
}
//Now that the bookid is clean, lets test its validity
$bidcheck = "SELECT title FROM books WHERE book_id='".$cbID."'";
$result=mysqli_query($con,$bidcheck);
if(!$result){
$err=true;
//bookid not valid, sent to index page
header("location:index.php");
}
//now, clean the other form value - quantity
//since it comes from a select-menu it is pretty secure
//but it is still worth filtering, just in case
if(!is_numeric($_POST['qty'])){
$err=true;
}else{
$cqty=mysqli_escape_string($con,$_POST['qty']);
}
if(!$err){
$PHPSESSID=session_id();
//(session_id,bid,date_added,qty)
$addtocart="INSERT INTO cart_track SET session_id='".$PHPSESSID."',bid='".$cbID."',date_added ='".$td."',qty='".$cqty."'";
mysqli_query($con,$addtocart);
//go to showcart
header("location:showcart.php");
exit;
}
ob_end_flush();
?>