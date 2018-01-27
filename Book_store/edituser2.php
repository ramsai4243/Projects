<?php

$usersarray = array();
$eid= $_GET['eid'];
 if($eid != ""){

include("db.php");

$query="select * from users where emp_id = ".$eid ;


$res =mysql_query($query);

while($user=mysql_fetch_assoc($res)){
$usersarray[] =  $user;
}

//we send the array as JSON object


echo json_encode($usersarray),"\n";

//echo  var_dump(json_encode($usersarray, true));

}


  


?>