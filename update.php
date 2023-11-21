<?php
// faculty.php - Faculty, restricted access, LOGON required, Role = Faculty


error_reporting(E_ALL);
$add=0;
$acc=0;
$type="";
$dd= date("Y-m-d");
$sign="";
include('session.php');
	include('check_logon.php');
	include('header.php');
	include('menubar.php');
	include('bcs350_mysqli_connect.php');
	if (mysqli_num_rows($result) > 0) {
		list($account_number, $user_name, $pass_code, $account_type, $role, $account_balance, $date) = mysqli_fetch_row($result);
		//$account_number $user_name $pass_code $account_type$role $account_balance $date;
	}


if (isset($_POST['task']))					$task = $_POST['task'];								else $task = "First";
//	if (isset($_GET['r']))					{$user_name = $_GET['r']; $task = "Show";}			// else $user_name = NULL;
	if (isset($_GET['r']))					{$task = $_GET['r'];}			//else $task = "pay";
	if (isset($_POST['user_name']))			$user_name = $_POST['user_name']; 					// else $user_name = NULL;
	if (isset($_POST['account_number']))	$account_number = trim($_POST['account_number']);	// else $account_number = NULL;
	if (isset($_POST['pass_code']))			$pass_code = trim($_POST['pass_code']);				//else $pass_code = NULL;	
	if (isset($_POST['role']))				$role = trim($_POST['role']);						//else $role = NULL;
	if (isset($_POST['account_type']))		$account_type = trim($_POST['account_type']);		//else $account_type = NULL;
	if (isset($_POST['account_balance']))	$account_balance = trim($_POST['account_balance']);	//else $account_balance = NULL;	
	if (isset($_POST['date']))				$date = trim($_POST['date']);						//else $date = NULL;
	if (isset($_POST['add']))				$add = trim($_POST['add']);						//else $date = NULL;
	if (isset($_POST['acc']))				$acc = trim($_POST['acc']);						//else $date = NULL;
	if (isset($_POST['type']))				$type = trim($_POST['type']);						//else $date = NULL;
	if (isset($_POST['sign']))				$type = trim($_POST['sign']);						//else $date = NULL;
	foreach($_POST as $keyx => $value) echo "<p align='center'>$keyx = $value<br>"; 

switch($task) {
	case "user_name_change":	
							echo "    <form action='update.php' method='post'>
							<input type='hidden' name='account_number' value='$account_number'> 
							<table width='550' align='center' style='background-color: #FAF0E6'>
							<tr><td>Username    </td><td><input type='text' name='user_name' value='$user_name'   size='08'></td>
							<td align='center'><input type='submit' name='task' value='submit'></td></tr>
							</table></form>";
							break;

	case "submit":
					$query = "UPDATE `bank` SET `user_name` = '$user_name'
          				  WHERE `bank`.`account_number` = '$account_number'";
 				   $result = mysqli_query($mysqli, $query);
  					if ($result) $msg="New $user_name Updated<br>";
  					else { $msg= "Change $user_name Failed" . mysqli_error($mysqli);}
					break;

		case "submit01":
						$query = "UPDATE `bank` SET `pass_code` = '$pass_code'
								WHERE `bank`.`account_number` = '$account_number'";
						$result = mysqli_query($mysqli, $query);
						if ($result) $msg= "New Pass_code Updated<br>";
						else { $msg="Change Pass_code Failed" . mysqli_error($mysqli);}
			
						break;
	case "Error":		$color = "red"; break;

	case "pass_code_change": 
						echo "    <form action='update.php' method='post'>
						<input type='hidden' name='account_number' value='$account_number'> 
						<table width='550' align='center' style='background-color: #FAF0E6'>
						<tr><td>Password    </td><td><input type='text' name='pass_code' value='$pass_code'   size='08'></td>
						<td align='center'><input type='submit' name='task' value='submit01'></td></tr>
						</table></form>";
						break;
	case "transfer":
						echo "    <form action='update.php' method='post'>
						<input type='hidden' name='account_number' value='$account_number'> 
						<table width='550' align='center' style='background-color: #FAF0E6'>
						<tr><td>Total Banalce    </td><td>$account_balance</td>
						<tr><td>Transfer Amount    </td><td><input type='number' name='add' value='$add'   size='08'></td>
						<tr><td>Receiver Account Number    </td><td><input type='number' name='acc' value='$acc'   size='08'></td>
						<td align='center'><input type='submit' name='task' value='send money'></td></tr>
						</table></form>";
						break;
	case "send money":
						//include('check_acc.php');
						$query = "SELECT * FROM `bank`
									WHERE `bank`.`account_number` = $acc";
						$result = mysqli_query($mysqli, $query);
						if (mysqli_num_rows($result)== 0) {$msg="Wrong Account Number";break;}
						else {

						$query = "UPDATE `bank` SET `account_balance` = account_balance + $add
									WHERE `bank`.`account_number` = '$acc'";
						$result = mysqli_query($mysqli, $query);
						//if (mysqli_num_rows($result)== 0) {break;}
						if ($result > 0) { $msg="We are Sending $add $ To $acc";
							$query = "INSERT INTO `transaction` (`id`, `account_number`, `sign`, `reason`, `amount`, `date_created`)
							VALUES (NULL, '$acc','+', 'transfer', '$add', '$dd')";
							$result = mysqli_query($mysqli, $query);
							if ($result) $msg="$add $ Send.";
							else { $msg="Unable to Send MONEY" . mysqli_error($mysqli);}
											$query = "UPDATE `bank` SET `account_balance` = account_balance - $add
													WHERE `bank`.`account_number` = '$account_number'";
											$result = mysqli_query($mysqli, $query);
											if ($result) {$msg="WE take $add $ from Your Account";
												$query = "INSERT INTO `transaction` (`id`, `account_number`,`sign`, `reason`, `amount`, `date_created`)
												VALUES (NULL, '$account_number', '-','Transfer', '$add', '$dd')";
												$result = mysqli_query($mysqli, $query);
												if ($result) $msg="WE took  $add $ fund Your Account";
												else { $msg="Unable to Take MONEY" . mysqli_error($mysqli);}
											}
											else { $msg="MONEY Failed" . mysqli_error($mysqli);}
						}
						else { $msg="Wrong Account Number" . mysqli_error($mysqli);}
					}
					
						break;
	case "deposit":		echo "    <form action='update.php' method='post'>
						<input type='hidden' name='account_number' value='$account_number'> 
						<table width='550' align='center' style='background-color: #FAF0E6'>
						<tr><td>Total Banalce    </td><td>$account_balance</td>
						<tr><td>Amount    </td><td><input type='number' name='add' value='$add'   size='08'></td>
						<td align='center'><input type='submit' name='task' value='add money'></td></tr>
						</table></form>";
						break;
	case "add money":
						$query = "UPDATE `bank` SET `account_balance` = account_balance + $add
									WHERE `bank`.`account_number` = '$account_number'";
						$result = mysqli_query($mysqli, $query);
						if ($result) {$msg="Deposit Added";
							$query = "INSERT INTO `transaction` (`id`, `account_number`, `sign`,`reason`, `amount`, `date_created`)
							VALUES (NULL, '$account_number','+', 'Deposit', '$add', '$dd')";
							$result = mysqli_query($mysqli, $query);
							if ($result) $msg="$add $ Added to Your Bank";
							else { $msg="Deposit Failed" . mysqli_error($mysqli);}
						
						}
						else { $msg="Deposit Failed" . mysqli_error($mysqli);}
				
						break;
	case "withdraw":
						echo "    <form action='update.php' method='post'>
						<input type='hidden' name='account_number' value='$account_number'> 
						<table width='550' align='center' style='background-color: #FAF0E6'>
						<tr><td>Total Banalce    </td><td>$account_balance</td>
						<tr><td>Amount    </td><td><input type='number' name='add' value='$add'   size='08'></td>
						<td align='center'><input type='submit' name='task' value='take money'></td></tr>
						</table></form>";
						break;
	case "take money":
						$query = "UPDATE `bank` SET `account_balance` = account_balance - $add
									WHERE `bank`.`account_number` = '$account_number'";
						$result = mysqli_query($mysqli, $query);
						if ($result) {echo "ROW ID $user_name Updated<br>";
							$query = "INSERT INTO `transaction` (`id`, `account_number`,`sign`, `reason`, `amount`, `date_created`)
							VALUES (NULL, '$account_number','-', 'Withdraw', '$add', '$dd')";
							$result = mysqli_query($mysqli, $query);
							if ($result) $msg="Withdraw Updated";
							else { $msg="Withdraw Failed" . mysqli_error($mysqli);}
						}
						else { $msg="Withdraw Failed" . mysqli_error($mysqli);}
					
						break;
	case "pay": 		echo "    <form action='update.php' method='post'>
						<input type='hidden' name='account_number' value='$account_number'> 
						<table width='550' align='center' style='background-color: #FAF0E6'>
						<tr><td>Total Banalce    </td><td>$account_balance</td>
						<tr><td>Amount    </td><td><input type='number' name='add' value='$add'   size='08'></td>
						<tr ><td>Pay    </td>
						<td ><input type='radio' name='type' value='Pay Bill' >Pay Bill
						<input type='radio' name='type' value='Shopping' >Shopping
						<input type='radio' name='type' value='Travel'  >Travel
						<input type='radio' name='type' value='Food'  >Food
						<input type='radio' name='type' value='Other'  >Other
						<input type='submit' name='task' value='Pay Bill'  size='08'></td></tr>
						</table></form>";
						break;
	case "Pay Bill":
						$query = "UPDATE `bank` SET `account_balance` = account_balance - $add
									WHERE `bank`.`account_number` = '$account_number'";
						$result = mysqli_query($mysqli, $query);
						if ($result) {echo "ROW ID $user_name Updated<br>";
							$query = "INSERT INTO `transaction` (`id`, `account_number`,`sign`, `reason`, `amount`, `date_created`)
							VALUES (NULL, '$account_number','-', '$type', '$add', '$dd')";
							$result = mysqli_query($mysqli, $query);
							if ($result)$msg="Payment Updated";
							else { $msg="Payment Failed" . mysqli_error($mysqli);}
						}
						else { $msg="Payment Failed" . mysqli_error($mysqli);}
						
						break;
	}
 	echo"
		  
		  <table width='1024' align='center'
		  <tr><td align='center'><a href='Dashboard.php'><button>Return to Account</button></a></td></tr>
		  </table>";

	echo "<p align='center'>This is the User Page
		  <p align='center'>Only User and Admin can access this page, LOGON is required";
	include('footer.php');
	//INSERT INTO `transaction` (`id`, `account_number`, `reason`, `amount`, `date_created`) VALUES (NULL, '', '', '', '')

?>