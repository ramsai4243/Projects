<?php

$filepath = realpath (dirname(__FILE__));

require_once("connect.php");
require_once("db0df.php");
 
class Fetch_functions

{

	public function __construct() 

	{

        $db = new DB_Class();

	}

	public function query($sql)

	{

		return mysqli_query($con,$sql);

	}

	public function num_rows($sql)

	{

		return mysqli_num_rows($sql);

	}
	public function insertId(){
		return mysqli_insert_id();
	}
	public function result($sql)

	{

		return mysqli_fetch_array($sql);

	}

	public function assoc($sql)

	{

		return mysqli_fetch_assoc($sql);

	}

	public function row($con, $sql)
 
	{

		return mysqli_fetch_row($sql);

	}

 

}

 



?>