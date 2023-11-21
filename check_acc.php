<?php
 

// Variables
	$mysql_host			= 'localhost';
	$mysql_userid		= 'root';
	$mysql_password		= NULL;
	$mysql_database		= 'bcs350';
	
// Connect to the MySQL and the Phone Book Database
	$mysqli = mysqli_connect($mysql_host, $mysql_userid, $mysql_password, $mysql_database);
	if (!$mysqli) echo "MySQL Connection Failure: " . mysqli_connect_error();

	$query = "SELECT * FROM bank  WHERE account_number = '$acc'";
			$result = mysqli_query($mysqli, $query);
			if (!$result) {echo "Query Error [$query] " . mysqli_error($mysqli);echo "baaaaaaaaad";}

            if (mysqli_num_rows($result)== 0) {
                echo "gggggood";
				list($account_number2, $user_name, $pass_code, $account_type, $role, $account_balance, $date) = mysqli_fetch_row($result);
				}
?>