<?php

$filepath = realpath (dirname(__FILE__));

require_once($filepath."/connect.php");

require_once("fetch_functions.php");

function autono(){

$num = array(); 
$digits=0;

for ($i=0; $i<=3; $i++) {
   $num[$i] = rand(1,10);
   for ($j=0; $j<$i; $j++) {             
      while ($num[$j] == $num[$i]){               
         $num[$i] = rand(1,10);               
         $j = 0;             
      }           
   }    
}    
for($i = 0;$i < count($num);$i++){
       $digits .= $num[$i];
    
 }
 
 return  $digits;
 }
 

 
 
 ?>