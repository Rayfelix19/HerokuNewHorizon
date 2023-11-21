<?php
// menubar.php - Navigation Bar for Enrollments
 
 
// Varaiables
	$headr		= array('Home' , 'Club' , 'Event' , 'About');
	$logg 		= array('logon' => '#ffc21c');
	$pages		= array( 
						'bank' 			=> 'lightgreen',
						'profile' 		=> 'yellow', 
						'admin'			=> 'orange');
	$restricted	= array('bank','profile', 'admin');
	$role_pages = array('admin');
	$role_value = 'admin'; 
	#color: #006f71
	#color: #6d55a4
	#color: #2fc5f4
	#color: #ffc21c
	#color: #f5f5f5
	#color: rgb(0, 100, 86)
	#color: rgb(25, 118, 210)
	#rgba(1, 79, 81, 0.85)

	$btn='color: black; padding: 10px 15px;  border: none; cursor: pointer;';
// Output
	echo "  <div class='header'>
	<div class='header_front'>
                   <p> </p>
    </div>
	<div class='header_table'>
	<table align='center' width='1366' align='center' cellpadding='5' > <tr>";
	
	echo "<td style='font-size: 14px; color: white;'>
	<b >Farmingdale State Collage <br align='center'> RamCentral</b><br> \n
	<p>Welcome $user,  $role </p></td>";
	foreach($headr as $ki) {
		echo "<td><a href='$ki.php'  style='text-decoration: none; color: white; font-weight:bold;'>
			  <p align='center' >" . ucfirst($ki) . "</p>
			  </a></td> \n";
		}

	foreach($pages as $key => $value) {
		if (($key == 'logon') AND ($logon)) $key = 'logoff';
		if (in_array($key, $restricted) AND (!$logon)) continue;
		if (in_array($key, $role_pages) AND ($role != $role_value)) continue;
		echo "<td align='center'><a href='$key.php'>
			  <button style='background-color:$value; font-weight:bold; $btn '>" . ucfirst($key) . "</button>
			  </a></td> \n";
		}
		foreach($logg as $k => $v) {
			if (($k == 'logon') AND ($logon)) {$k = 'logoff'; $link='logoff.php'; $lg='#';}
			else{$link='logon.php'; $lg="onclick='myFunction()'";}

			echo "<td align='center'><a href='$link'>
				  <button id='login-btn' $lg 
				  style='background-color:$v; font-weight:bold; $btn '>" . ucfirst($k) . "</button>
				  </a></td> \n";
			}


	echo "</tr></table></div><div class='header_back'> <p> </p></div></div>";

?>
