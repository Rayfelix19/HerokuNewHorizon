
<!DOCTYPE html>
<html>
<body>
<?php
//$first_name = $middle_name = $last_name = $email = "";
//$research_interest = "";

if (isset($_POST['task']))					$task = $_POST['task'];								else $task = "First";
//	if (isset($_GET['r']))					{$user_name = $_GET['r']; $task = "Show";}			// else $user_name = NULL;
	if (isset($_GET['r']))					{$task = $_GET['r'];}		
	if (isset($_POST['first_name']))			$first_name = $_POST['first_name']; 					
	if (isset($_POST['middle_name']))   	$middle_name = trim($_POST['middle_name']);	
	if (isset($_POST['last_name']))			  $last_name = trim($_POST['last_name']);
  if (isset($_POST['email']))			      $email = trim($_POST['email']);
  if (isset($_POST['gender']))			    $gender = trim($_POST['gender']);
  if (isset($_POST['education']))			  $education = trim($_POST['education']);
  if (isset($_POST['programming_skills']))			      $programming_skills = ($_POST['programming_skills']);
  if (isset($_POST['research_interest']))			      $research_interest = trim($_POST['research_interest']);
  if(isset($_FILES['image'])) {
    $file_name = $_FILES['image']['name'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    //$file_ext = strtolower(end(explode('.', $file_name)));
    $file_parts = explode('.', $file_name);
    $file_ext = strtolower(end($file_parts));


    $valid_exts = array("jpg", "jpeg", "png","tif","gif");
    
    if(in_array($file_ext, $valid_exts)) {
      $upload_path = "New/" . $file_name;
      move_uploaded_file($file_tmp, $upload_path);
      echo "File uploaded successfully.";
    } else {
      echo "Invalid file type. JPG, GIF, PNG or TIF files are allowed.";
    }
  }
  
   /*
  if(isset($_FILES['imageToUpload'])){
    move_uploaded_file($_FILES['imageToUpload']['tmp_name'], "New/". $_FILES['imageToUpload']['name']);
  }
  else{
      echo "image not found!";
  }
 
  if($_FILES){
    $profile_photo = $_FILES['filename']['name'] ;
    switch($_FILES['filename']['type'])
    {
    case 'image/jpeg': $ext = 'jpg';break;
    case 'image/gif': $ext = 'gif';break;
    case 'image/png': $ext = 'png';break;
    case 'image/tiff': $ext = 'tif';break;
    default: $ext = '';break;
    }
    if($ext){
    $n = "image.$ext";
    move_uploaded_file($_FILES['filename']['tmp_name'], $n);
    echo "Uploaded image '$name' as '$n':<br>";
    echo "<img src='$n'>";}
    else echo "'$name' is not an accepted image file";}
    else echo "You have not uploaded any images.";
    

$uploaddir = '/New folder';
$photo = $uploaddir . basename($_FILES['userfile']['name']);

echo '<pre>';
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $photo)) {
    echo "File is valid, and was successfully uploaded.\n";
} else {
    echo "Possible file upload attack!\n";
}

echo 'Here is some more debugging info:';
print_r($_FILES);

print "</pre>";
*/
//foreach($_POST as $keyx => $value) echo "<p align='center'>$keyx = $value<br>"; 



echo "<h2>Your Input:</h2>";




echo "<br>";
echo "<img src=\"./New/$file_name\"  alt=\"Avatar\" width=\"300\">";

echo "<br><br><br><br>";

echo "
<table width='450' align='left' style='background-color: #FAF0E6'  cellpadding='5'>
        <tr><td width='35%'>First Name:</td>
        <td >$first_name</td>
        <tr><td >Middle Name:</td>
        <td >$middle_name</td>
        <tr><td >Last Name:</td>
        <td >$last_name</td>
        <tr><td >Email:</td>
        <td >$email</td>
        <tr><td >Gender:</td>
        <td >$gender</td>
        <tr><td >Education:</td>
        <td >$education</td>
        <tr><td >Programming Skills:</td>
        <td style='display:block'>";
        foreach($_POST['programming_skills'] as $selected) {
            echo "<p>".$selected ."</p>";
            } echo "</td>
        <tr><td>Research Interest:</td><td>
        $research_interest</td></tr>
        
</table>";


?> 

</body>
</html>

