<?php
	session_start();
	require_once "../../../resources/config.php";
	include('../../../resources/classes/Popover.php');

	$prog_name = htmlspecialchars(filter_var($_POST['prog_name'], FILTER_SANITIZE_STRING), ENT_QUOTES, 'UTF-8');
	$willInsert = true;
// Get the latest Program ID
	$prog_id = 1;
	$statement = "SELECT * FROM pcnhsdb.programs order by prog_id desc limit 1;";
	$result = DB::query($statement);
	if (count($result) > 0) {
		foreach ($result as $row) {
			$prog_id = $row['prog_id'];
			$prog_id = $prog_id+1;
		}
	}else {
		$prog_id = 1;
	}

	if(empty($prog_name)) {
		$willInsert = false;
		$popover = new Popover();
		$popover->set_popover("danger", "Invalid Program Name Input.");
		$_SESSION['error_pop'] = $popover->get_popover();
		header("Location: ".$_SERVER['HTTP_REFERER']);
	}

	if($willInsert) {
		DB::insert('programs', array(
			'prog_id' => $prog_id,
			'prog_name' => $prog_name
		));

    //USER LOGS
    date_default_timezone_set('Asia/Manila');
    $act_msg= "ADDED PROGRAM : $prog_name";
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

		header('location: ../student_programs.php');
	}
?>
