<?php
	session_start();
	require_once "../../../resources/config.php";
	include('../../../resources/classes/Popover.php');
	$stud_id = $_GET['stud_id'];
	$schl_name = $_POST['s_schl_name'];
	$yr_level = $_GET['yr_level'];
	$average_grade = 0.0;
	$total_credit = 0.0;
	$schl_year = $_POST['s_schl_year'];
	$remarks = htmlspecialchars($_POST['remarks']);
	$statement = "";
	$inserted = false;
	$explode_date_input = explode("-", $schl_year);

    $input_year1 = intval($explode_date_input[0]);
    $input_year2 = intval($explode_date_input[1]);

    if($input_year1 >= $input_year2 || $input_year2 != ($input_year1+1)) {
        $yr_level_check = $_GET['yr_level'];
        header("Location: " . $_SERVER["HTTP_REFERER"]);
        die();
    }
	switch($remarks) {
		case "PP":
			$remarks = "PEPT PASSER";
			$statement = "INSERT INTO `pcnhsdb`.`grades` (`stud_id`, `schl_name`, `schl_year`, `yr_level`, `average_grade`, `total_credit`, `remarks`) VALUES ('$stud_id', '$schl_name', '$schl_year', '$yr_level', '$average_grade', '$total_credit', '$remarks');";
			DB::query($statement);
			$inserted = true;
			//echo $statement;
			break;
		case "D":
			$remarks = "DROPPED";
			$statement = "INSERT INTO `pcnhsdb`.`grades` (`stud_id`, `schl_name`, `schl_year`, `yr_level`, `average_grade`, `total_credit`, `remarks`) VALUES ('$stud_id', '$schl_name', '$schl_year', '$yr_level', '$average_grade', '$total_credit', '$remarks');";
			DB::query($statement);
			//echo $statement;
			$inserted = true;
			break;

		case "T":
			$remarks = "TRANSFERRED";
			$statement = "INSERT INTO `pcnhsdb`.`grades` (`stud_id`, `schl_name`, `schl_year`, `yr_level`, `average_grade`, `total_credit`, `remarks`) VALUES ('$stud_id', '$schl_name', '$schl_year', '$yr_level', '$average_grade', '$total_credit', '$remarks');";
			DB::query($statement);
			//echo $statement;
			$inserted = true;
			break;
		case "R":
			$remarks = "REPEATER";
			$statement = "INSERT INTO `pcnhsdb`.`grades` (`stud_id`, `schl_name`, `schl_year`, `yr_level`, `average_grade`, `total_credit`, `remarks`) VALUES ('$stud_id', '$schl_name', '$schl_year', '$yr_level', '$average_grade', '$total_credit', '$remarks');";
			DB::query($statement);
			//echo $statement;
			$inserted = true;
			break;
		default:
			header("Location: " . $_SERVER["HTTP_REFERER"]);
			break;
	}
	if($inserted) {
			header("location: ../student_info.php?stud_id=$stud_id");
	}
?>