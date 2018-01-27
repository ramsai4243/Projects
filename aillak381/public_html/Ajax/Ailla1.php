<html>
<body>
<?php
$states  = array( 	"State"=>array("State_name","Capital_city","Largest_city","Population"),
					"_____"=>array("________","________","___________","_________"),
					"Alabama"=>array("Alabama","Montgomery", "Birmingham", "4858979"),
					"California"=>array("California","Sacramento", "Los Angeles","39144818"),
					"Delaware"=>array("Delaware","Dover", "Wilmington", "945934" ),
					"Florida"=>array("Florida","Tallahassee", "Jacksonville","20271272"),
					"New_Jersey"=>array("New_Jersey","Trenton", "Newark", "8958013"));
				

				$out = "";
				$out .="<table>";
				foreach($states as $st => $element)
				{
					$out .= "<tr>";
					foreach($element as $subkey => $subelement)
					{
						$out .= "<td>$subelement</td>";
					}
					$out .="</tr>";
					
				}
				$out .= "</table>";
				echo $out;

?>
</body>
</html>