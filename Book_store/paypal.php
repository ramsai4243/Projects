<?php
include "connect.php";
require_once('paypal.class.php'); 
require_once('includes/functions.php');
require_once('includes/checkout_functions.php');

$order_summery=array();
$check=new checkout_functions();

// include the class file
$p = new paypal_class; // initiate an instance
$p->paypal_url = "https://www.sandbox.paypal.com/cgi-bin/webscr"; //test url
//$p->paypal_url='https://www.paypal.com/cgi-bin/webscr'; // paypal url
$this_script = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];


//if(isset($_POST['submit'])){
 $or=$_SESSION['order_id'];
 $sql="select * from orders where purchase_order=". $or;
 $res = mysqli_query( $con, $sql)  or die(mysql_error());


$row=mysqli_fetch_assoc($res);
$status=$row['order_status'];
 
  
	$date= $row['order_date'];
	$name=  $row['order_name'];
//	$time=  $_POST['time'];
	$amount = $row['order_total'];
//	$orderID = $row['purchase_order'];
	echo 'order id in paypal'.$or;
//	$quantity = $_POST['quantity'];
	$sessionID = $row['session'];
	
//	$email=$_POST['email'];	
  array_push($order_summery,$date,$name,$amount,$or);
	$_SESSION['order_summery']=$order_summery;
 

// if no action variable, set 'process' as default action
if (empty($_GET['action'])) $_GET['action'] = 'process';
switch ($_GET['action']) {
	case 'process': // Process and order...
//	$reservation_id = $_POST['reservation_id'];
	//$order = $check->getOrder($orderID);
//	$shop = $user->getShop();
 $or=$_SESSION['order_id'];
//	$p->add_field('hosted_button_id' ,"EWTLBVGZQLWZY");
//	$p->add_field('cmd',"_s-xclick");
	$p->add_field('business',"asoma-facilitator@gmail.com" );
	
	
	$p->add_field('return', $this_script.'?action=success&type='.$or);
	$p->add_field('cancel_return', $this_script.'?action=cancel&type='.$or);
	$p->add_field('notify_url', $this_script.'?action=ipn');
	$p->add_field('item_name', 'Book purchase Online Ticket Purchase'); // 'ITEM NAME'
	
	
	//$p->add_field('amount', '0.02'); // 'ITEM AMOUNT'  
	
	$p->add_field('amount', $amount);	
	$p->add_field('currency_code', 'USD');//CURRENCY VALUE USD/EUR…
	$p->submit_paypal_post(); // submit the fields to paypal
	break;
	
	case 'success': // successful order...
	  //  echo "we sent email...";
		echo "success    <br>". $_GET['type'];

		
		//updating order status to `completed` on success
	$updateCompleted = $check->updateOrderStatus($or = $_GET['type'], $status  = 'Processed');
		if($updateCompleted){
			echo "<script>alert('Thank you for your order!'); location.href='index.php';</script>";
//mail code
 	foreach ($_POST as $key => $value) {
		echo "$key: $value<br>";
	}
	echo "</body></html>";  
include("ordermail.php");  

//mail code end
	 }
	  
	 
		break;
		
	case 'cancel': // Canceled Order...
	 
     //echo" canceld...";
    $updateCompleted = $check->updateOrderStatus($orderID = $_GET['type'], $status = 'Cancelled');
    		if($updateCompleted){
			echo "<script>alert('Your Booking is Cancelled!'); location.href='index.php';</script>";
		
		}

		
		
		break;
	case 'ipn': // For IPN validation...
	if ($p->validate_ipn()) {
		$subject = 'Instant Payment Notification - Recieved Payment';
		$to =  'asoma@gmail.com';
		$body="An instant payment notification was successfully recieved\n";
		$body .= "from ".$p->ipn_data['payer_email']." on ".date('m/d/Y');
		$body .= "\n\nDetails:\n";
		foreach ($p->ipn_data as $key => $value) {
			$body .= "\n$key: $value";
		}
		@mail($to, $subject, $body);
	}
	break;
	default:
			$updatePending = $check->updateOrderStatus($orderID = $orderID, $status  = 'Cancelled');
}

	
?>