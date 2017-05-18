<?php
include("php-mysqlimporter.php");
include ('../../../resources/classes/Popover.php');
session_start();

$mysqlImport = new MySQLImporter("localhost", "root", "root");
$fileName = $_GET['file'];

$mysqlImport->doImport("./myBackups/$fileName", "pcnhsdb", true, true);

$alert_type = "info";
$message = "Imported Database Backup Succesfully";
$popover = new Popover();
$popover->set_popover($alert_type, $message);

$_SESSION['db_msg_import'] = $popover->get_popover();

header("location: ../exp_db.php");
?>
