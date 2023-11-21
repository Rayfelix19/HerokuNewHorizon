<?php
 

// Variables
	$mysql_host			= 'localhost';
	$mysql_userid		= 'root';
	$mysql_password		= NULL;
	$mysql_database		= 'bcs350';
	
// Connect to the MySQL and the Phone Book Database

	$mysqli = mysqli_connect($mysql_host, $mysql_userid, $mysql_password, $mysql_database);
	if (!$mysqli) echo "MySQL Connection Failure: " . mysqli_connect_error();

	$query = "SELECT * FROM bank 
					  WHERE user_name = '$user_name'";
			$result = mysqli_query($mysqli, $query);
			if (!$result) echo "Query Error [$query] " . mysqli_error($mysqli);


			//INSERT INTO `user` (`User_id`, `F_Name`, `L_Name`, `User_Name`, `Pass_Code`, `Role`, `Year`, `Major`, `Email`, `Phone`, `Date`, `Status`) VALUES ('1000', 'krrish', 'man', 'krrish', '1111', 'student', '2023', 'cpis', NULL, NULL, '2023-03-08 21:43:17', '1');
?>