<?php 
$id=$_GET["id"];
$con = mysqli_connect("localhost","aillak381","","aillak381") or die("Failed to connect to database ");

$sql_command = "SELECT SALEID, SALEDATE, CUSTOMERID FROM SALES WHERE SALEID=$id";

 $result = mysqli_query($con,$sql_command);

      $returnValue = "<TABLE BORDER='1'><THEAD><TH>SALEID</TH><TH>SALEDATE</TH>" .  

  "<TH>CUSTOMERID</TH></THEAD><TBODY>";

      while($row = mysqli_fetch_array($result))

      {

            $returnValue .= "<TR>";

            $returnValue .= "<TD>" . $row['SALEID'] . "</TD>" ;

            $returnValue .= "<TD>" . $row['SALEDATE'] . "</TD>" ;

            $returnValue .= "<TD>" . $row['CUSTOMERID'] . "</TD>" ;

            $returnValue .= "</TR>";

      }

      $returnValue .= "</TBODY></TR></TABLE>";

      echo $returnValue;

      
	  ?>
