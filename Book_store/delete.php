<?php
include "connect.php";
$PHPSESSID=session_id();
//clean variable
if(isset($_GET['cid'])){
$cleancid = mysqli_escape_string($con,$_GET['cid']);
$removefromcart="DELETE FROM cart_track WHERE cart_id='".$cleancid."' AND session_id ='".$PHPSESSID."' ";
mysqli_query($con, $removefromcart);
 
$_SESSION["cart"]=0;
 
header("location:showcart.php");
}else{
//display error
header("location:errorpage.php?errorno=1");
}
?>