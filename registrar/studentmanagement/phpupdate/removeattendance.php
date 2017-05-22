<?php require_once "../../../resources/config.php"; ?>
<?php
	session_start();
	$stud_id = htmlspecialchars($_GET['stud_id'], ENT_QUOTES);
	$yr_lvl = $_GET['yr_lvl'];


	$statement1 = "DELETE FROM `pcnhsdb`.`attendance` WHERE `stud_id`='$stud_id' and yr_lvl = '$yr_lvl';";


	DB::query($statement1);

    //USER LOGS
    date_default_timezone_set('Asia/Manila');
    $act_msg= "REMOVED ATTENDANCE OF : $stud_id";
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

	header("location: ../student_info.php?stud_id=$stud_id");

?>
