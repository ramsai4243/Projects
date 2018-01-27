<?php
if(!isset($_SESSION)){
    session_start();
}

/*$db = mysqli_connect("localhost","chittireddyp416","") or die("Failed to open connection to MySQL server.");
mysqli_select_db("Booksdb") or die("Unable to select database");

$con = mysqli_connect("localhost","chittireddyp416","","Booksdb")
or die("Failed to connect to database " . mysqli_error());*/

$con = mysqli_connect("localhost","chittireddyp416","","chittireddyp416")
or die("Failed to connect to database " . mysqli_error());




$td = date("Y-m-d");
//$PHPSESSID=session_id();
?>