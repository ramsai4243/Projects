<?php
session_start();
include("includes/header.php");
include("includes/conn.php");

$restest=mysqli_query($con, "SELECT * from test where test_id='$_GET[testi]'");
$retest= mysqli_fetch_array($restest);
$resapp=mysqli_query($con, "SELECT * from appointment where app_id='$retest[app_id]'");
$retapp= mysqli_fetch_array($resapp);
$respat=mysqli_query($con, "SELECT * from patient where pat_id='$retapp[pat_id]'");
$retpat= mysqli_fetch_array($respat);

if(isset($_POST['pres']))
{
	$arraynod = serialize($_POST['nod']);
	$arraymedname = serialize($_POST['medname']);
	$arraymg = serialize($_POST['mg']);
	$arraydosage = serialize($_POST['dosage']);
	if($arraymedname!="")
	{
	$_ins="INSERT INTO prescription (test_id,no_of_days,medicines,mg,dosage,remarks) VALUES ('$_GET[testi]','$arraynod','$arraymedname','$arraymg','$arraydosage','$_POST[remarks]');";
	//echo $_ins;
	$res=mysqli_query($con, $_ins);
	if (!$res)
  	{
  		die('Error: ' . mysqli_error());
  	}
  
 	else
  	{
 		$rcsucc = "<font  color='#009900' >Prescription Details Added Successfully.";
 	}
	}

}

?>
    
    <div id="tm_main">
   		<div id="sidebar" class="float_l">
        	<div class="sidebar_box"><span class="bottom"></span>
            	<?php
				include("sidebar.php");
			patientrecords();
				?>
            </div>
   		</div>

        <div id="content" class="float_r">
          <h2>Prescription Details:</h2>
         
<script type="application/javascript" >
function validation()
{
	if(document.form1.medname.value == "")
	{
		alert("Enter Medicine Name.");
		document.form1.medname.focus();
		return false;
	}
	if(document.form1.mg.value == "")
	{
		alert("Enter MG Value.");
		document.form1.mg.focus();
		return false;
	}
	if(document.form1.dosage.value == "")
	{
		alert("Enter Dosage.");
		document.form1.dosage.focus();
		return false;
	}
	if(document.form1.nod.value == "")
	{
		alert("Enter How Many Days.");
		document.form1.nod.focus();
		return false;
	}
	if(document.form1.remarks.value == "")
	{
		alert("Enter Remarks");
		document.form1.remarks.focus();
		return false;
	}
	return true;
}
</script>
          <form id="form1" name="form1" method="post" action="" onSubmit="return validation();"  >
            <p>
              <label for="fname2" class="left"> </label>
            </p>
            <?php
if(isset($_POST['pres']))
{
       echo $rcsucc;
	?>
    <a href="docbill.php?testi=<?php echo $_GET['testi']."&pat_id=",$retpat['pat_id']; ?>">Generate Doctor Bill</a>
    <?php
}
else
{
?>      
            <table width="618" border="0">
              <tr>
                <td>Test ID:</td>
                <td colspan="8"><input name="testid" type="text" id="testid" value="<?php echo $_GET['testi'];?>" readonly="readonly" /></td>
              </tr>
              <tr>
                <td>Appointment No.</td>
                <td colspan="8"><input name="appid" type="text" id="appid" readonly="readonly" value="<?php echo $retest['app_id'];?>" /></td>
              </tr>
              <tr>
                <td width="210">Patient Name:</td>
                <td colspan="8"><input name="patname" type="text" id="patname" value="<?php echo $retpat['pat_name'];?>" readonly="readonly" /></td>
              </tr>
              
              <tr>
                <td>&nbsp;</td>
                <td colspan="8">&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="6">&nbsp;</td>
              </tr>

              <tr bgcolor="#CCCCCC">
                <td>Medicine Name</td>
                <td width="92"><div align="center">Mg</div></td>
                <td width="133"><div align="center">Dosage</div></td>
                <td colspan="6"><div align="center">No Of Days</div></td>
              </tr>
<?php
	$i=0;
if(!isset($_SESSION['counts'])){
$_SESSION['counts']=1;
}
if(isset($_POST['submitpres']))
{
$_SESSION['counts'] = $_SESSION['counts']+1;
}	

	do
	{
	?>              
				<!--   <tr bgcolor='#FFFFCC'>
					<td>	<input name="medname[]" type="text" id="medname[]" size="35" value="<?php isset($_POST['medname'])? $_POST['medname'][$i]:''; ?>"/></td>
					<td><input name="mg[]" type="text" id="mg[]" size="10"  value="<?php isset($_POST['mg'])? $_POST['mg'][$i]:''; ?>"/></td>
					<td><input name="dosage[]" type="text" id="dosage[]" size="15"  value"<?php isset($_POST['dosage'])?$_POST['dosage'][$i]:''; ?>"/></td>
					<td width="105"><input name="nod[]" type="text" id="nod[]" size="10"  value="<?php isset($_POST['nod'])?$_POST['nod'][$i]:''; ?>"/></td>
					<td width="56"><input type="submit" name="submitpres" id="submitpres" value="+" /></td>            
				  </tr>-->
				  
				  	
				    <tr bgcolor='#FFFFCC'>
					<td>	<input name="medname[]" type="text" id="medname[]" size="35" value="<?php echo $_POST['medname'][$i]; ?>"/></td>
					<td><input name="mg[]" type="text" id="mg[]" size="10"  value="<?php echo $_POST['mg'][$i]; ?>"/></td>
					<td><input name="dosage[]" type="text" id="dosage[]" size="15"  value="<?php echo $_POST['dosage'][$i]; ?>"/></td>
					<td width="105"><input name="nod[]" type="text" id="nod[]" size="10"  value="<?php echo $_POST['nod'][$i]; ?>"/></td>
					<td width="56"><input type="submit" name="submitpres" id="submitpres" value="+" /></td>            
				  </tr>
	<?php
	$i++ ;
	}
	while($i < $_SESSION['counts'] );


?>
              <tr>
                <td>&nbsp;</td>
                <td colspan="8">&nbsp;</td>
              </tr>
              <tr>
                <td>Remarks:</td>
                <td colspan="8"><label for="remarks">
                  <textarea name="remarks" id="remarks" cols="45" rows="5"></textarea>
                </label></td>
              </tr>
              <tr>
                <td colspan="9" align="center"><input type="submit" name="pres" id="pres" value="Save Prescription" /></td>
              </tr>
            </table>
             <?php
}
?>
          </form>
</div>
  </div>
        <div class="cleaner"></div>
    </div>
    <?php
include("includes/footer.php");
?>