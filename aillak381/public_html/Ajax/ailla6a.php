<?php
header("Cache-Control: post-check=1,pre-check=2");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
$button = $_GET['button'];
switch ($button)
{
case 1:
echo "button1()";
break;
case 2:
echo "button2()";
break;
case 3:
echo "button3()";
break;
case 4:
echo "button4()";
break;
case 5:
echo "button5()";
break;
 
}
?>