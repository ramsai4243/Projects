    
<?php
require_once('functions.php');
require_once('checkout_functions.php');

$check=new checkout_functions();
$updateCompleted = $check->updateOrderStatus($orderID ='61', $status = 'Cancelled');
    		if($updateCompleted){
			echo "<script>alert('Your Booking is Cancelled!'); location.href='../index.php';</script>";
		}
?>