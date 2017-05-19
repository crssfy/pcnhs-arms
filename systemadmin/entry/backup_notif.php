<?php
	include ('../resources/classes/Popover.php');
	session_start();

    date_default_timezone_set('Asia/Manila');

    $currDate = date("d");

    if ( $currDate === "1") {

   	$alert_type = "success";
    $message = "<strong>Monthly reminder: </strong> Please perform a system backup at the <strong><i class='fa fa-database'></i> Generate Backup </strong> option located at the sidebar. 
    			<br> <br>Disregard notification if system backup is already performed.";
    $popover = new Popover();
    $popover->set_popover($alert_type, $message);
    $_SESSION['backup_notif'] = $popover->get_popover();

    
    }
?>