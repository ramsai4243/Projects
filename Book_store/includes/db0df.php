<?php

class DB_Class
{
	function __construct()
	{
		$con = mysqli_connect("localhost","chittireddyp416","","chittireddyp416")
or die("Failed to connect to database " . mysqli_error());
	}
}
?>