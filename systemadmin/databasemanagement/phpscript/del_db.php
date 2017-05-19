<?php
unlink('myBackups/'.$_GET['file']);
header("location: ../exp_db.php");
?>
