<?php
	session_start();
	require_once "../../../resources/config.php";
	include '../../../resources/classes/Popover.php';

	$curr_id = 1;
	$statement = "SELECT * FROM pcnhsdb.curriculum order by curr_id desc limit 1;";
	$result = DB::query($statement);
	if (count($result) > 0) {
		foreach ($result as $row) {
		$curr_id = $row['curr_id'];
		$curr_id = $curr_id+1;

		}
	}else {
		$curr_id = 1;

	}

	$curr_code = htmlspecialchars(filter_var(strtoupper($_POST['curr_code']), FILTER_SANITIZE_STRING), ENT_QUOTES, 'UTF-8');
	$curr_name = htmlspecialchars(filter_var($_POST['curr_name'], FILTER_SANITIZE_STRING), ENT_QUOTES, 'UTF-8');
	$year_started = htmlspecialchars($_POST['year_started'], ENT_QUOTES, 'UTF-8');
	$year_ended = htmlspecialchars($_POST['year_ended'], ENT_QUOTES, 'UTF-8');
	$willInsert = true;



	if($year_started >= $year_ended) {
		$willInsert = false;
		$message = "Year Started is Invalid.";
		$alert = "danger";
		$popover = new Popover();
		$popover->set_popover($alert, $message);
		$_SESSION['error_pop'] = $popover->get_popover();
		header("location: ".$_SERVER['HTTP_REFERER']);

	}

	if(empty($curr_code) || empty($curr_name)) {
		$willInsert = false;
		$message = "Invalid Input in Curriculum Code or Curriculum Name.";
		$alert = "danger";
		$popover = new Popover();
		$popover->set_popover($alert, $message);
		$_SESSION['error_pop'] = $popover->get_popover();
		header("location: ".$_SERVER['HTTP_REFERER']);
	}

	if($willInsert) {
		DB::insert('curriculum', array(
			'curr_id' => $curr_id,
			'curr_code' => $curr_code,
			'curr_name' => $curr_name,
			'year_started' => $year_started,
			'year_ended' => $year_ended
		));
    //USER LOGS
    date_default_timezone_set('Asia/Manila');
    $act_msg= "ADDED CURRICULUM : $curr_name";
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

		header('location: ../curriculum.php');
	}


?>
