<?php
// role_access.php - Check Role Access to Selected Pages
 

// Variables
	$role_value = 'admin'; 

// Check for Correct Role to Access Page, if not redirect to LOGON page
	if ($role != $role_value) {
		header('Location: logon.php');
		exit;
		}
?>