<?php

/*********************************************************

*                 CHECKOUT FUNCTIONS 

*********************************************************/

require_once("functions.php");

class checkout_functions{

	function updateOrderStatus($orderID, $status){

		$fetch = new Fetch_functions();

		$updateOrderstatus = $fetch->query("update orders set order_status='$status' where purchase_order='$orderID'");

		if($updateOrderstatus){

			return true;

		}else{

			return false;

		}

	}
	}
	
?>