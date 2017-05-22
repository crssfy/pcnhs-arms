<?php
require_once "../../../resources/config.php";
include ('../../../resources/classes/Popover.php');

session_start();

$sign_id = $_GET['sign_id'];
$first_name = $_GET['first_name'];
$query = "DELETE FROM signatories WHERE sign_id = '$sign_id'";
DB::query($query);

//USER LOGS
date_default_timezone_set('Asia/Manila');
$sign_act_msg= "DELETED SIGNATORY: $sign_id";
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
      'user_act' => $sign_act_msg,
));

$alert_type = "danger";
$message = "Signatory Deleted";
$popover = new Popover();
$popover->set_popover($alert_type, $message);
$_SESSION['sign_del'] = $popover->get_popover();
header("location: ../signatory_list.php");
?>
