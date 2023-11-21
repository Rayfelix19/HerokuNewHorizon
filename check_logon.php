<?php
 

// Check for Logon, if not Logged on, redirect to LOGON page
	if (!$logon) {
		header('Location: logon.php');
		exit;
		}
?>