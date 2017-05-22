<?php
	require_once "../../../resources/config.php";
	include('../../../resources/classes/Popover.php');
	session_start();

	$willInsert = true;
	$curr_id = htmlspecialchars($_POST['curr_id'], ENT_QUOTES);
	$curr_name = htmlspecialchars($_POST['curr_name'], ENT_QUOTES);
	$year_started = htmlspecialchars($_POST['year_started']);
	$year_ended = htmlspecialchars($_POST['year_ended'], ENT_QUOTES);

	if(is_numeric($year_ended)) {
		if($year_ended < $year_started) {
			$willInsert = false;
			$alert_type = "danger";
			$error_message = "Ooops. The system did not accept the value that you entered, please check and enter a valid value.";
			$popover = new Popover();
			$popover->set_popover($alert_type, $error_message);
			$_SESSION['error_pop'] = $popover->get_popover();
			header("Location: " . $_SERVER["HTTP_REFERER"]);
			die();
		}
	}else {
		if(strtoupper($year_ended) != "PRESENT") {
			$willInsert = false;
			$alert_type = "danger";
			$error_message = "Ooops. The system did not accept the value that you entered, please check and enter a valid value.";
			$popover = new Popover();
			$popover->set_popover($alert_type, $error_message);
			$_SESSION['error_pop'] = $popover->get_popover();
			header("Location: " . $_SERVER["HTTP_REFERER"]);
			die();
		}else {
			$year_ended = strtolower($year_ended);
			$year_ended = ucfirst($year_ended);
		}
	}

	$updatestm = "UPDATE `pcnhsdb`.`curriculum` SET `curr_name`='$curr_name', `year_ended`='$year_ended' WHERE `curr_id`='$curr_id';";

	if($willInsert) {
		DB::query($updatestm);

    //USER LOGS
    date_default_timezone_set('Asia/Manila');
    $act_msg= "EDITED CURRICULUM : $curr_name";
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

		header("location: ../curriculum.php");

	}


?>
