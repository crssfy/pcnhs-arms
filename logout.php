<?php
    require_once "resources/config.php";
    session_start();

    date_default_timezone_set('Asia/Manila');
    $loTime = date("h:i:sa");
    $_SESSION ['loTime'] = $loTime;
    $timeout_message;

    if (isset($_SESSION['timeout_message'])) {
        $timeout_message = $_SESSION['timeout_message'];
    }

    session_unset();
    session_destroy();
    session_start();
    $_SESSION['timeout_message'] = $timeout_message;
    header("location: login.php");
?>
