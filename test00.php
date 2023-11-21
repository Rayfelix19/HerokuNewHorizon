


<!DOCTYPE html>
	<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="loginclick.css">
    </head>
<body>

<div id="myDIV" class="modal" style="display: none;">
  
  <form class="modal-content animate" action="./Home.php" method="post" >

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name='user_name'   value=''  required>

      <label for="psw"><b>Password</b></label>
      <input type="Password" placeholder="Enter Password" name='pass_code' value=''  required>
        
      <button type="submit"  name='logon' value='LOGON' >Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="myFunction()" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>


<script src="click.js"></script>
</body>
</html>
<?php
include('logon.php');


?>