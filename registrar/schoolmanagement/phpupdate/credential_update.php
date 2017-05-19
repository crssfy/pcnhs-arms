<?php
	require_once "../../../resources/config.php";
	session_start();
	$cred_id = htmlspecialchars($_POST['cred_id'], ENT_QUOTES);
	$cred_name = htmlspecialchars($_POST['cred_name'], ENT_QUOTES);
	$price = htmlspecialchars($_POST['price'], ENT_QUOTES);

	$updatestm = "UPDATE `pcnhsdb`.`credentials` SET `cred_name`='$cred_name', `price`='$price' WHERE `cred_id`='$cred_id';";

	DB::query($updatestm);

    //USER LOGS
    date_default_timezone_set('Asia/Manila');
    $act_msg= "EDITED CREDENTIAL: $cred_name";
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

	header("location: ../credentials.php");
?>
