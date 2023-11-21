

<body>


<?PHP
// logon.php - Website Logon

// Start Session	
	include('session.php');
	include('header.php');
	
// Variables 
//	$msg 		= NULL;								// Error Message
	$td 		= "width='20%' align='right'";		// Attributes for 1st column
	$tf 		= "width='80%' align='left'";		// Attributes for 2nd column
	$pgm		= 'logon.php';
	$width		= '800';
  
// Get Form Input  
	if (isset($_POST['user_name']))		$user_name	= trim($_POST['user_name']);		else $user_name 	= NULL;
	if (isset($_POST['pass_code']))		$pass_code 	= trim($_POST['pass_code']);		else $pass_code 	= NULL;
		
	
	if (isset($_POST['f_name']))		$f_name 	= trim($_POST['f_name']);		else $f_name 	= NULL;
	if (isset($_POST['l_name']))		$l_name 	= trim($_POST['l_name']);		else $l_name 	= NULL;
	if (isset($_POST['u_name']))		$u_name 	= trim($_POST['u_name']);		else $u_name 	= NULL;
	if (isset($_POST['p_code']))		$p_code 	= trim($_POST['p_code']);		else $p_code 	= NULL;
	if (isset($_POST['s_type']))		$s_type 	= trim($_POST['s_type']);		else $s_type 	= NULL;
	if (isset($_POST['major']))			$major 	= trim($_POST['major']);			else $major 	= NULL;
	if (isset($_POST['email']))			$email 	= trim($_POST['email']);			else $email 	= NULL;
	if (isset($_POST['number']))		$number = trim($_POST['number']);			else $number 	= 0;
	if (isset($_POST['role']))			$role 	= trim($_POST['role']);				else $role 	= NULL;


 
	$desiredDomain = 'farmingdale.edu';

// Extract the domain from the email address
	$domain = substr($email, strrpos($email, '@') + 1);

// Verify Input
if (isset($_POST['logon'])) {
	echo"";
	if ($user_name == NULL) 		{$msg = "user_name is missing<br>"; }
	if ($pass_code == NULL) 		{$msg = "pass_code is missing<br>"; }
	
// LOGON		
	if ($msg == NULL) {
			
// Query Student Using the user_name			
			include('Supabase_connect.php');

// If user_name is FOUND, Verify pass_code		

$query = 'SELECT * FROM "User" where "User_Name" = \'' . $user_name . '\'';
$result = pg_query($conn, $query);

// Check query result
if (!$result) {
  echo "Query Error [$query] " . pg_last_error($conn);
}



if (pg_num_rows($result) > 0) {
	$row = pg_fetch_assoc($result);
	$User_id = $row['User_id'];
	$F_Name = $row['F_Name'];
	$L_Name = $row['L_Name'];
	$user_name = $row['User_Name'];
	$Pass_Code2 = $row['Pass_Code'];
	$Role = $row['Role'];
	$Year = $row['Year'];
	$Major = $row['Major'];
	$Email = $row['Email'];
	$Phone = $row['Phone'];
	$Date = $row['created_at'];
	$pro_pic = $row['pro_pic'];
	
// If pass_code matches, Complete LOGON				
				if ($pass_code == $Pass_Code2) {
					$_SESSION['logon']		= TRUE;
					$_SESSION['user_name'] 	= $user_name;
					$_SESSION['user'] 		= $user = "$user_name";
					$_SESSION['role']		= $Role; 
					$_SESSION['date']		= $Date; 
					$_SESSION['User_id']	= $User_id; 
					$_SESSION['pro_pic']	= $pro_pic; 
					$msg					= "<font color='green'><b>$user Logon Successful</b></font>";
					$logon 					= TRUE;
					}
				else {$msg = "Invalid pass_code[$pass_code]"; }
				}
			else {$msg = "user_name [$user_name] is invalid"; }
			}
		}



  if (isset($_POST['register'])){
	echo" ";
	if ($f_name == NULL) 		{$msg = "First Name is missing<br>"; }
	if ($l_name == NULL) 		{$msg = "Last Name is missing<br>"; }
	if ($u_name == NULL) 		{$msg = "User Name is missing<br>"; }
	if ($p_code == NULL) 		{$msg = "Pass Code is missing<br>"; }
	if ($s_type == NULL) 		{$msg = "Year is missing<br>"; }
	if ($role == NULL) 			{$msg = "Please, Check the box<br>"; }
	if ($email == NULL) 			{$msg = "Email is missing<br>"; }
	if ($major == NULL) 			{$msg = "Major is missing<br>"; }
	if ($domain != $desiredDomain) {$msg = "Must Use '@Farmingdale.edu'<br>"; }
// LOGON		
	if ($msg == NULL) {

	include('Supabase_connect.php');
	$pic='1Q8aGAfnu81hebmRO9woGIJQ6RqRS6lHQ';
	$query = 'INSERT INTO "User" ( "F_Name", "L_Name", "User_Name", "Pass_Code", "Role", "Year", "Major", "Email", "Phone", "Status", "pro_pic") 
	VALUES (\''.$f_name.'\',\''. $l_name.'\',\''.$u_name.'\', \''.$p_code.'\', \''.$role.'\',
	 \''.$s_type.'\', \''.$major.'\', \''.$email.'\', \''.$number.'\', 1, \''.$pic.'\')';
	$result = pg_query($conn, $query);
	if ($result) $msg="<font color='green'> Your NEW Account Created.";
	else { $msg="Unable to Make Account\n [$query] " . pg_last_error($conn);}
	}
}
// OUTPUT Logon Screen
	if ($msg == NULL)  	{$msg = "Enter User ID and pass_code";}
	else if (!$logon){ $msg = "<font color='red'>$msg Please try again</font>";	}
	include('menubar.php');

	echo"
	
<div id='myDIV' class='modal'>

  <form class='modal-content animate' action='logon.php' method='post' >
  <div class='con' id='con0'>
	<div class='container' id='container0'>
	  <label for='uname'><b>Username</b></label>
	  <input type='text' placeholder='Enter Username' name='user_name'   value=''  >
  
	  <label for='psw'><b>Password</b></label>
	  <input type='Password' placeholder='Enter Password' name='pass_code' value='' >
		
	  <button type='submit'  name='logon' value='LOGON' >Login</button>
	  <label>
		<input type='checkbox' checked='checked' name='remember'> Remember me
	  </label>
	</div>
  
	<div class='container' id='container0' style='background-color:#f1f1f1'>
	  <button type='button' onclick='myFunction()' class='cancelbtn'>Cancel</button>
	  <button type='button'  name='click' value='register' onclick='showRegister(0)' class='register'>Register</button>
	</div>
	<div class='container' id='container0' style='background-color:#f1f1f1'>
	  <p>Message: $msg</p>
	</div> </div>
	<div class='container_register' id='container_register0' style='background-color:#f1f1f1'>
	<label><b>First Name</b></label>
		<input autocomplete='off' type='text' placeholder='Enter First Name' name='f_name'   value='$f_name'>
	<label ><b>Last Name</b></label>
	  <input autocomplete='off' type='text' placeholder='Enter Last Name' name='l_name'   value='$l_name'>
	  <label ><b>Username</b></label>
	  <input autocomplete='off' type='text' placeholder='Enter Username' name='u_name'   value='$u_name'>
	  <label ><b>Password</b></label>
	  <input autocomplete='off' type='text' placeholder='Enter Password' name='p_code'   value='$p_code'>
	  <label>
		<input type='checkbox' name='role' value='student'> Are You A Regular Student
	  </label >
	  <label ><br> 
	  <input type='radio' name='s_type' value='Freshman' >Freshman
	  <input type='radio' name='s_type' value='Sophemore' >Sophemore
	  <input type='radio' name='s_type' value='Junior' >Junior
	  <input type='radio' name='s_type' value='Senior' >Senior
	  </label>
	  <label for='uname'><b>Major</b></label>
	  <input autocomplete='off' type='text' placeholder='Enter Major' name='major'   value='$major'>
	  <label for='uname'><b>Email</b></label>
	  <input autocomplete='off' type='email' placeholder='Enter Email' name='email'   value='$email'>
	  <label for='uname'><b>Phone Number</b></label>
	  <input autocomplete='off' type='number' placeholder='Enter Phone Number' name='number'   value='$number'>
	  
	  <div class='container' style='background-color:#f1f1f1'>
			<button type='button' onclick='myFunction()' class='cancelbtn'>Cancel</button>
			<button type='submit' name='register' value='register' >Submit</button>
		  
		</div>
	
  </div>
  </form>
  </div>
  <script src='click.js'></script>
  <script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
  </body>
  </html>
		
	";
	//include('footer.php');		  


?>
