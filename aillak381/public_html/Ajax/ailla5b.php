<?php

header("Cache-Control: post-check=1,pre-check=2");

header("Cache-Control: no-cache, must-revalidate");

header("Pragma: no-cache");

header("Content-type: text/xml"); 

$select = $_GET['id'];

switch ($select)

{

	case "New_Mexico":$selection = array( 'City Name = Rio Rancho ','Largest City =Albuquerque ','Population =545,852 ');
	break;
	
	case "Nevada":$selection = array('City Name = Caliente','Largest City =Las Vegas ','Population =2.839 million ');
	break;

	case "Colorado":$selection = array('City Name = Aspen ','Largest City =Denver','Population =649,495 ');
	break;
	
	case "Oregon":$selection = array('City Name = Portland','Largest City = Portland','Population =3.97 million ');
	break;
	
	case "Montana":$selection = array('City Name =Missoula ','Largest City = Billings','Population =104,170  ');
	break;

	
}

echo '<?xml version = "1.0" ?>';

echo '<selection>';

foreach ($selection as $selectt)

{

echo '<selectt>';

echo $selectt;

echo '</selectt>';

}

echo '</selection>';

?>
