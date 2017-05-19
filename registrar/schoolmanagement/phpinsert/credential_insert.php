<?php
	session_start();
	require_once "../../../resources/config.php";
	include '../../../resources/classes/Popover.php';
// get the latest credential ID
	$cred_id = 1;
	$statement = "SELECT * FROM pcnhsdb.credentials order by cred_id desc limit 1;";
	$result = DB::query($statement);
	if (count($result) > 0) {
		foreach ($result as $row) {
			$cred_id = $row['cred_id'];
			$cred_id = $cred_id+1;
		}
	}else {
			$cred_id = 1;
	}

	$cred_name = htmlspecialchars(filter_var($_POST['cred_name'], FILTER_SANITIZE_STRING),ENT_QUOTES);
	$price = htmlspecialchars(filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION),ENT_QUOTES);
	$willInsert = true;



	if($price < 1 || !is_numeric($price)) {
		$willInsert = false;
		$popover = new Popover();
		$popover->set_popover("danger", "Invalid Input Price.");
		$_SESSION['error_pop'] = $popover->get_popover();
		header("Location: ".$_SERVER['HTTP_REFERER']);
	}
	if(empty($cred_name)) {
		$willInsert = false;
		$popover = new Popover();
		$popover->set_popover("danger", "Invalid Credential Name Input.");
		$_SESSION['error_pop'] = $popover->get_popover();
		header("Location: ".$_SERVER['HTTP_REFERER']);
	}


	if($willInsert) {
		DB::insert('credentials', array(
			'cred_id' => $cred_id,
			'cred_name' => $cred_name,
			'price' => $price
		));
    
    //USER LOGS
    date_default_timezone_set('Asia/Manila');
    $act_msg= "ADDED CREDENTIAL : $cred_name";
    $username = $_SESSION['username'];
	$currTime = date("h:i:s A");
    $log_id = null;
    $currDate = date("Y-m-d");
    $accnt_type = $_SESSION['accnt_type'];

    DB::insert('user_logs', array(
              'log_id' => $log_id,
              'user_name' => $username,
              'time' => $currTime,
              'log_date' => $currDate,
              'account_type' => $accnt_type,
              'user_act' => $act_msg,
    ));

		header('location: ../credentials.php');

	}
?>
