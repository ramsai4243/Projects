<?php
session_start();
include("includes/header.php");
include("includes/conn.php");
if(!isset($_SESSION["login"]))
	{
		header("Location: index.php");
	}
$testid="";
$recpats="";
//$appid ="";
$row99 = array();
$sql="SELECT * FROM patient where pat_id=".$_GET['patid'];
	  $resultpat = mysqli_query($con, $sql);
           	$rowpat = mysqli_fetch_array($resultpat);
?>
    
     <div id="templatemo_main">
      <div id="sidebar" class="float_l">
        <div class="sidebar_box">
        <?php
		include("sidebar.php");
		if($_SESSION["logtype"]=='Administrator')
		{
		patientrecords();
		}
		else if($_SESSION["logtype"]=='Doctor')
		{
		patientrecords();
		}
		
		
		?>
            </div>
   		</div>
      <div id="content" class="faq float_r">
          <table width="686" border="1">
            <tr bgcolor="#FFFFCC">
              <td colspan="4" align="center">Patient Profile</td>
            </tr>
            <tr>
              <td width="104">Patient Name:</td>
              <td width="165"><?php echo $rowpat['pat_name']; ?></td>
              <td width="72">Email-ID:</td>
              <td width="317"><form id="form1" name="form1" method="post" action="">
                <label for="name"></label>
                <?php echo $rowpat['email_id']; ?>
              </form></td>
            </tr>
            <tr>
              <td>Date Of Birth: </td>
              <td><?php echo $rowpat['dob']; ?></td>
              <td>Gender:</td>
              <td><?php echo $rowpat['gender']; ?></td>
            </tr>
            <tr>
              <td>Address:</td>
              <td><?php echo $rowpat['address'];?></td>
              <td>Contact No.</td>
              <td><?php echo $rowpat['contact']; ?></td>
            </tr>
          </table>
          <br />

          <table width="687" border="1">
            <tr bgcolor="#FFFFCC">
              <td colspan="6" align="center">Patient Appointments Details</td>
            </tr>
            <tr>
              <td width="126">Appointment ID</td>
              <td width="99">Branch Name</td>
              <td width="121">Doctor Name</td>
              <td width="115">Date</td>
              <td width="122">Time</td>
              <td width="78">Status</td>
            </tr>
<?php 
	  $result = mysqli_query($con, "SELECT * FROM appointment where pat_id='$_GET[patid]'");
	  
	while($row = mysqli_fetch_array($result))
  {
	  $result1 = mysqli_query($con, "SELECT * FROM branch where branch_id='$row[branch_id]'");
			  $row1 = mysqli_fetch_array($result1);
  echo "<tr>";
  echo "<td>" . $row['app_id'] . "</a></td>";
  echo "<td>" . $row1['branch_name'] . "</td>";
  echo "<td>";
  	  $result99 = mysqli_query($con,"SELECT * FROM doctor where doc_id='$row[doc_id]'");
	$row99 = mysqli_fetch_array($result99);
 echo $row99['doc_name'];
   echo "</td>";
  echo "<td>" . $row['app_date'] . "</td>";
  echo "<td>" . $row['app_time'] . "</td>";
  echo "<td>" . $row['status'] . "</td>";

  echo "</tr>";
  }
  
?>
          </table>
   <br />
        
  <?php
  
$restt = mysqli_query($con, "SELECT * FROM test where app_id='$_GET[appid]'");
$arrrec = mysqli_fetch_array($restt);
$sph = unserialize($arrrec['sph']);
$cyl  = unserialize($arrrec['cyl']);
$axis  = unserialize($arrrec['axis']);
?>
          <?php
		  if(isset($_GET['appid']))
		  {
			  $retdoc=mysqli_fetch_array($result);
			  ?>
          <table width="464" height="110" border="1" >
            <tr>
              <td width="145" height="30"><strong>Test ID:</strong></td>
              <td width="303"><?php 
			 $testid = $arrrec['test_id'];
			  echo $arrrec['test_id']; 
			  ?></td>
            </tr>
            <tr>
              <td height="35"><strong>Appointment ID :</strong></td>
              <td><?php echo $arrrec['app_id']; ?></td>
            </tr>
            <tr>
              <td height="35"><strong>Doctor Name:</strong></td>
              <td>&nbsp;<?php echo $row99['doc_name']; //$retdoc['doc_id'];
			  
			  ?></td>
            </tr>
          </table>
          <br />

        <table width="464" height="228" border="1" >
            <tr  bgcolor="#FFFFCC">
              <td colspan="2" align="center"><strong>Test Results</strong></td>
            </tr>
            <tr bgcolor="#FFFFCC">
              <td width="206" align="center"><strong>Left  Eye </strong></td>
              <td width="248" align="center"><strong>Right Eye  </strong></td>
            </tr>
            <tr>
              <td>SPH:  <?php echo $sph[0]; ?></td>
              <td>SPH:  <?php echo $sph[1]; ?></td>
            </tr>
            <tr >
              <td>CYL: <?php echo $cyl[0]; ?></td>
              <td>CYL: <?php echo $cyl[1]; ?></td>
            </tr>
            <tr >
              <td>Axis: <?php echo $axis[0]; ?></td>
              <td>Axis: <?php echo $axis[1]; ?></td>
            </tr>
            <tr>
              <td height="49">Remarks:</td>
              <td>&nbsp;<?php echo $arrrec['remarks']; ?></td>
            </tr>
            <tr>
              <td>Specs Requirement:</td>
              <td>&nbsp;<?php echo $arrrec['specs_req']; ?></td>
            </tr>
        </table>
<p>&nbsp;</p>
        <table width="686" border="1">
          <tr bgcolor="#FFFFCC">
            <td colspan="6" align="center">Prescription</td>
          </tr>
       
          <tr>
            <td width="144">Medicine Name</td>
            <td width="133">Mg</td>
            <td width="60">Dosage</td>
            <td width="123">Number Of Days</td>
          </tr>
          <tr>
<?php
$respat = mysqli_query($con, "SELECT * FROM appointment where pat_id='$_GET[patid]'");
$recpat = mysqli_fetch_array($respat);



$restest = mysqli_query($con, "SELECT * FROM test where app_id='$_GET[appid]'");
$rettest = mysqli_fetch_array($restest);

			  $res = mysqli_query($con, "SELECT * FROM prescription where test_id=$rettest[test_id]");
			  
			  $retpres = mysqli_fetch_array($res);
			  $nod= unserialize($retpres['no_of_days']);
			  $medname = unserialize($retpres['medicines']);
			  $mg = unserialize($retpres['mg']);
			  $dosage = unserialize($retpres['dosage']);
			  $remarks = $retpres['remarks'];
			 // echo "<td>" . $retpres['test_id'] . "</td>";
     for($k=0; $k<count($nod); $k++)
  {
	  /*for($j=1;$j<=$k;$j++)
	  {
		  echo "<td>"  .    "</td>";
	  }*/
  echo " <tr><td>" . $medname[$k] . "</td>";
  echo "<td>" . $mg[$k] . "</td>";
  echo "<td>" . $dosage[$k] . "</td>";
  echo "<td>" . $nod[$k] . "</td>";

  echo "</tr>";
  }
  
?>
 <tr>
        <td colspan="4">&nbsp;<strong>Remarks:</strong><br />
        &nbsp;<?php echo $remarks; ?></td>
          </tr>
</table>        <br />   
&nbsp; <br />
	
        <table width="685" border="1">
          <tr bgcolor="#FFFFCC">
            <td colspan="3" align="center">
            <?php
			$respats = mysqli_query($con, "SELECT * FROM appointment where app_id ='$_GET[appid]'");
$recpats = mysqli_fetch_array($respats);
			if(isset($_SESSION["logtype"]) and $_SESSION["logtype"]=='Administrator')
			{
			?>
            <strong><a href="products.php?testids=<?php echo $testid; ?>&brid=<?php echo $recpats['branch_id']; ?>">Add Purchase Details</a></strong>
            <?php
		  }
			?>
            </td>
            <td colspan="4" align="left">Purchase Details</td>
          </tr>
          <tr>
            <td width="82">Order ID</td>
            <td width="106">Admin Name</td>
            <td width="98">Test ID</td>
            <td width="111">Product Name</td>
            <td width="87">Order date</td>
            <td width="92">Dispatch Date</td>
            <td width="87">Total Amount</td>
          </tr>
<?php
$res1 = mysqli_query($con,"SELECT * FROM orders where test_id='$testid'");
while($row = mysqli_fetch_array($res1))
  {
  echo "<tr>";
  echo "<td>" . $row['order_id'] . "</td>";
  echo "<td>" . $row['admin_id'] . "</td>";
  echo "<td>" . $row['test_id'] . "</td>";
  echo "<td>" . $row['prod_id'] . "</td>";
  echo "<td>" . $row['order_date'] . "</td>";
  echo "<td>" . $row['dispatch_date'] . "</td>";
  echo "<td>" . $row['total'] . "</td>";

  echo "</tr>";
  }
?>
        </table>
        <?php
		  }
		  ?>
         <br />
        <?php 
		echo "<center><h2><a href='printpatad.php?appid=$_GET[appid]&patid=$_GET[patid]&testid=$testid' target='_blank'>Print This Page</a>   <input type='button' onClick='history.go(-1);' value='Go Back' /></h2></center>";
		?>
</div> 
        <div class="cleaner"></div>
    </div> 
    <?php
include("includes/footer.php");
?>