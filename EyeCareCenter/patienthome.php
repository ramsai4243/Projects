<?php
session_start();
include("includes/header.php");
include("includes/conn.php");
$result="";
?>
    <div id="templatemo_main">
   		<div id="sidebar" class="float_l">
        	<div class="sidebar_box"><span class="bottom"></span>
            	<?php
				include("sidebar.php");
				patienthome();
				?>
            </div>
   		</div>
      <div id="content" class="float_r">
        
        <h4><strong> Appointment Details:</strong></h4>
        <table width="686" border="1">
<tr bgcolor="#CCCCCC">
  <td width="89" height="23"><h5><strong>App No.</strong></h5></td>
        <td width="198"><h5><strong>Doctor Name</strong></h5></td>
                <td width="153"><h5><strong>Appointment Date</strong></h5></td>
                    <td width="113"><h5><strong>Time</strong></h5></td>
                <td width="99"><h5><strong>Status</strong></h5></td>
      </tr>
              <?php
		$dt= date("Y-m-d");
		
		$result = mysqli_query($con, "SELECT * FROM  appointment WHERE app_date>='$dt' AND pat_id='$_SESSION[pat_id]' AND status='pending'");
		while($row = mysqli_fetch_array($result))
  		{	
  		$retpat =mysqli_query($con, "SELECT * FROM patient WHERE pat_id= '$row[pat_id]'");
  		$patrec = mysqli_fetch_array($retpat);
	
		$retdoc =mysqli_query($con, "SELECT * FROM doctor WHERE doc_id= '$row[doc_id]'");
	  	$docrec = mysqli_fetch_array($retdoc);

	  echo "<tr>";
	  echo "<td>" . $row['app_id'] . "</td>";
	  echo "<td>" . $docrec['doc_name'] . "</td>";
	  echo "<td>" . $row['app_date'] . "</td>";
	  echo "<td>" . $row['app_time'] . " PM</td>";
	   echo "<td>";

   if($row['status'] == "pending")
   {
	   echo "Pending";
   }
   else
   {
	    $dt= date("Y-m-d");
	   	$rettests =mysqli_query($con, "SELECT * FROM test WHERE dispatch_date='$dt'");
		$rectests = mysqli_fetch_array($rettests);
  
	    echo "Done";
   }
  
 echo "  </td>";
  echo "</tr>";
  }
?>
         </table>
          <br /><br />
        <h4> <strong>Product orders:</strong></h4>
        <table width="682" border="1">
            <tr bgcolor="#CCCCCC">
              <th width="80" scope="col"><h5><strong>Order No.</strong></h5></th>
              <th width="189" scope="col"><h5><strong>Product detail</strong></h5></th>
              <th width="100" scope="col"><h5><strong>Order date</strong></h5></th>
              <th width="228" scope="col"><h5><strong>Payment details</strong></h5></th>
              <th width="51" scope="col"><h5><strong>Status</strong></h5></th>
          </tr> 
            <?php
	 		$dt= date("Y-m-d");
$resorders =  mysqli_query($con, "SELECT * FROM  orders WHERE  dispatch_date >  '$dt' AND status='Pending' AND payment >='1'");

			while($recrows = mysqli_fetch_array($resorders))
			{	
			$resorders1 =  mysqli_query($con, "SELECT * FROM  products WHERE  prod_id =  '$recrows[prod_id]'");
			$recrows1 = mysqli_fetch_array($resorders1);	
										
           echo " <tr>
              <td>&nbsp;$recrows[order_id]</td>
              <td>";
			  $restorders2 =  mysqli_query($con, "SELECT * FROM orders where test_id ='$recrows[test_id]'");
			  		while($recrows2 = mysqli_fetch_array($restorders2))
					{
						 $restorders3 =  mysqli_query($con, "SELECT * FROM products where prod_id ='$recrows2[prod_id]'");
			  				while($recrows3 = mysqli_fetch_array($restorders3))
							{
							echo "&nbsp;".$recrows3['name']. "<br>";
							}
					}

			  echo "</td>
              <td>$recrows[order_date]</td>
              <td>&nbsp;Total: Rs. $recrows[total]<br>
			  &nbsp;Advance paid : Rs. $recrows[payment]<br>";
			  
			 echo "&nbsp;Balance amount : Rs.". $balamt = $recrows['total']-$recrows['payment'];
			  echo "</td>  <td align='center'>&nbsp;
			  $recrows[status]	
			  </td></tr>";
            }   
            ?>
         </table>   
      </div>

        <div class="cleaner"></div>
    </div> 
    <?php
include("includes/footer.php");
?>
  </div>