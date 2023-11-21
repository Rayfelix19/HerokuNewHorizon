

<?php

echo"<p style=' width:100%; padding: 30px;'></p>";

include('session.php');
include('check_logon.php');
include('menubar.php');
include('Supabase_connect.php');


?>


<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="edit_event.css">
    <link rel="stylesheet" href="NewEventHomePage.css">
	<link rel="stylesheet" href="footer.css">
</head>
<style>
    .color-box {
        width: 50px;
        height: 50px;
        display: inline-block;
        margin-right: 10px;
        border: 1px solid #000;
    }
    #main {
        padding-top: 10px;
        display: flex;
        flex-direction: row;
    }
    #main div{
        width: 100%;
    }
    #ma{
        display: flex;
        justify-content: center;
        width: 100%;
        background-color: #FAF0E6;
        padding: 10px;
        margin: 10px;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

</style>
<body>
<section>
<?php


$dd= date("Y-m-d");
$i=1;
$file_name =NULL;

$ck="<i class='fa fa-duotone fa-check' style='font-size:25px;color:green;'></i>";
$cr="<i class='fa fa-duotone fa-xmark' style='font-size:25px;color:red;'></i>";

/*
if (isset($_POST['location'])) {
    //echo "$ ";
    $location = urlencode($_POST['location']);
    $api_key = 'AIzaSyC-k2ly18smlEzk-JlhWtqOgNZQc0x5lZU';
    //echo $location;
    //AIzaSyC-k2ly18smlEzk-JlhWtqOgNZQc0x5lZU
    // Generate the map URL with the location and API key
    $mapsUrl = "https://www.google.com/maps?q=" . urlencode($location) . "&output=embed";
    $map_url = "https://maps.googleapis.com/maps/api/staticmap?center={$location}&zoom=14&size=400x300&markers=color:red%7C{$location}&key={$api_key}";
    /*<h2>Map for: <?php echo $_POST['location']; ?></h2>
    <img src="<?php echo $map_url; ?>" alt="Map"> */

 // }
 if(isset($_POST['tttime']))       $tttime = trim($_POST['tttime']);         //else $e_name = NULL;

if (isset($_POST['task']))			$task = $_POST['task'];						else $task = "test";
if (isset($_GET['r']))				{$event_id = $_GET['r'];}	

//if(isset($_POST['map_url']))        $map_url = $_POST['map_url'];
//if(isset($_POST['mapsUrl']))        $map_url = $_POST['mapsUrl'];
if(isset($_POST['event_id']))       $event_id = trim($_POST['event_id']);         //else $e_name = NULL;
if(isset($_POST['e_name']))         $e_name = trim($_POST['e_name']);         //else $e_name = NULL;
if(isset($_POST['e_tag']))          $e_tag = trim($_POST['e_tag']);           //else $e_tag = NULL;
if(isset($_POST['e_desc']))         $e_desc = trim($_POST['e_desc']);         //else $e_desc = NULL;
if(isset($_POST['e_pic']))          $e_pic = trim($_POST['e_pic']);           //else $e_pic = NULL;
if(isset($_POST['e_date']))         $e_date = trim($_POST['e_date']);         //else $e_date = NULL;
if(isset($_POST['e_time']))         $e_time = trim($_POST['e_time']);         //else $e_time = NULL;
if(isset($_POST['e_location']))     $e_location = trim($_POST['e_location']); //else $e_location = NULL;
if(isset($_POST['e_places']))       $e_places = trim($_POST['e_places']);     //else $e_places = NULL;
if(isset($_POST['e_price']))        $e_price = trim($_POST['e_price']);       //else $e_price = NULL;
if(isset($_POST['e_categoris']))    $e_categoris = trim($_POST['e_categoris']); //else $e_categoris = NULL;
if(isset($_POST['e_max_mem']))      $e_max_mem = trim($_POST['e_max_mem']);     //else $e_max_mem = 0;
if(isset($_POST['e_members']))      $e_members = trim($_POST['e_members']);     //else $e_members = 0;

if(isset($_POST['guest_name']))     $guest_name = trim($_POST['guest_name']);   //else $guest_name = NULL;
if(isset($_POST['guest_desc']))     $guest_desc = trim($_POST['guest_desc']);   //else $guest_desc = NULL;
if(isset($_POST['guest_pic']))      $guest_pic = trim($_POST['guest_pic']);     //else $guest_pic = NULL;

if(isset($_POST['place_Pic']))      $place_Pic = trim($_POST['place_Pic']);   //else $places_Pic = NULL;
if(isset($_POST['header_pic']))     $header_pic = trim($_POST['header_pic']);   //else $header_pic = NULL;
if(isset($_POST['icon_pic']))       $icon_pic = trim($_POST['icon_pic']);       //else $icon_pic = NULL;

if (isset($_POST['S_title']))       {$S_title = $_POST['S_title'];}             else {$S_title = array();}
if (isset($_POST['S_des']))         {$S_des = $_POST['S_des'];}                 else {$S_des = array();}
if (isset($_POST['E_slide_id']))    {$E_slide_id = $_POST['E_slide_id'];}       else {$E_slide_id = array();}
if (isset($_POST['S_pic']))         {$S_pic = $_POST['S_pic'];}                 else {$S_pic = array();}


if (isset($_POST['perk_desc']))         {$perk_desc = $_POST['perk_desc'];}     else {$perk_desc = array();}
if (isset($_POST['e_perk_id']))           {$e_perk_id = $_POST['e_perk_id'];}         else {$e_perk_id = array();}
/*
$start_time = $_POST['start_time'];
$end_time = $_POST['end_time'];
$time_range = $start_time . ' - ' . $end_time;

   <td class='label'>Event Time</td>
        <tr><td class='input'>
        <input type='time' name='name='start_time'' value='$start_time'> - 
        <input type='time' name='end_time' value='$end_time'></td>
    <tr>

*/
//foreach($_POST as $keyx => $value) echo "<p align='center'>$keyx = $value<br>"; 
function displayPostData($data, $prefix = '') {
    foreach ($data as $key => $value) {
        if (is_array($value)) { displayPostData($value, $prefix . $key . '[]');}
        else {echo "<p align='center'>$prefix$key = $value<br>";}
    }
}

displayPostData($_POST);


require_once 'drive/vendor/autoload.php';

use Google\Client;
use Google\Service\Drive;
use Google\Service\Drive\DriveFile;

if(isset($_FILES['image'])) {
//if(isset($_POST['submit'])){
  try {
      $valid_types = ['image/jpeg', 'image/jpg', 'image/gif', 'image/png', 'image/tif', 'image/tiff'];
      $file_type = $_FILES['image']['type'];
      if (!in_array($file_type, $valid_types)) {
          throw new Exception('Invalid file type. jpeg, JPG, GIF, PNG, or TIF files are allowed.');
      }
      
      $curl = curl_init();
      curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
      curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

      $client = new Client();
      putenv('GOOGLE_APPLICATION_CREDENTIALS=./drive/snappy-axle.json');
      $client->useApplicationDefaultCredentials();
      $client->addScope(Drive::DRIVE);
      $driveService = new Drive($client);
      $fileMetadata = new Drive\DriveFile(array(
          'name' => $_FILES['image']['name'],
          'parents' => ['1IiHE3gswsWePC-zuQR-Hw7xCN0NivJq8']
      ));
      $content = file_get_contents($_FILES['image']['tmp_name']);
      $file = $driveService->files->create($fileMetadata, array(
          'data' => $content,
          'mimeType' => $file_type,
          'uploadType' => 'multipart',
          'fields' => 'id'
      ));
      $filename = $file->id;
      $message = "File uploaded successfully. $filename";
  } catch(Exception $e) {
      $message = "Error Message im: ".$e->getMessage();
  } 
}


if(isset($_FILES['header'])) {
    try {
        $valid_types = ['image/jpeg', 'image/jpg', 'image/gif', 'image/png', 'image/tif', 'image/tiff'];
        $file_type = $_FILES['header']['type'];
        if (!in_array($file_type, $valid_types)) {
            throw new Exception('Invalid file type. jpeg, JPG, GIF, PNG, or TIF files are allowed.');
        }
        
        $client = new Client();
        putenv('GOOGLE_APPLICATION_CREDENTIALS=./drive/snappy-axle.json');
        $client->useApplicationDefaultCredentials();
        $client->addScope(Drive::DRIVE);
        $driveService = new Drive($client);
        $fileMetadata = new DriveFile(array(
            'name' => $_FILES['header']['name'],
            'parents' => ['1IiHE3gswsWePC-zuQR-Hw7xCN0NivJq8']
        ));
        $content = file_get_contents($_FILES['header']['tmp_name']);
        $file = $driveService->files->create($fileMetadata, array(
            'data' => $content,
            'mimeType' => $file_type,
            'uploadType' => 'multipart',
            'fields' => 'id'
        ));
        $header_pic = $file->id;
        $message = "File uploaded successfully. $header_pic";
    } catch(Exception $e) {
        $message = "Error Message h: ".$e->getMessage();
        echo"$message";
    }
}

if(isset($_FILES['icon'])) {
    try {
        $valid_types = ['image/jpeg', 'image/jpg', 'image/gif', 'image/png', 'image/tif', 'image/tiff'];
        $file_type = $_FILES['icon']['type'];
        if (!in_array($file_type, $valid_types)) {
            throw new Exception('Invalid file type. jpeg, JPG, GIF, PNG, or TIF files are allowed.');
        }
        
        $client = new Client();
        putenv('GOOGLE_APPLICATION_CREDENTIALS=./drive/snappy-axle.json');
        $client->useApplicationDefaultCredentials();
        $client->addScope(Drive::DRIVE);
        $driveService = new Drive($client);
        $fileMetadata = new DriveFile(array(
            'name' => $_FILES['icon']['name'],
            'parents' => ['1IiHE3gswsWePC-zuQR-Hw7xCN0NivJq8']
        ));
        $content = file_get_contents($_FILES['icon']['tmp_name']);
        $file = $driveService->files->create($fileMetadata, array(
            'data' => $content,
            'mimeType' => $file_type,
            'uploadType' => 'multipart',
            'fields' => 'id'
        ));
        $icon_pic = $file->id;
        $message = "File uploaded successfully. $icon_pic";
    } catch(Exception $e) {
        $message = "Error Message i: ".$e->getMessage();
        echo"$message";
    }
}


if(isset($_FILES['places'])) {
    try {
        $valid_types = ['image/jpeg', 'image/jpg', 'image/gif', 'image/png', 'image/tif', 'image/tiff'];
        $file_type = $_FILES['places']['type'];
        if (!in_array($file_type, $valid_types)) {
            throw new Exception('Invalid file type. jpeg, JPG, GIF, PNG, or TIF files are allowed.');
        }
        
        $client = new Client();
        putenv('GOOGLE_APPLICATION_CREDENTIALS=./drive/snappy-axle.json');
        $client->useApplicationDefaultCredentials();
        $client->addScope(Drive::DRIVE);
        $driveService = new Drive($client);
        $fileMetadata = new DriveFile(array(
            'name' => $_FILES['places']['name'],
            'parents' => ['1IiHE3gswsWePC-zuQR-Hw7xCN0NivJq8']
        ));
        $content = file_get_contents($_FILES['places']['tmp_name']);
        $file = $driveService->files->create($fileMetadata, array(
            'data' => $content,
            'mimeType' => $file_type,
            'uploadType' => 'multipart',
            'fields' => 'id'
        ));
        $place_pic = $file->id;
        $message = "File uploaded successfully. $place_pic";
    } catch(Exception $e) {
        $message = "Error Message p: ".$e->getMessage();
    }
}

if(isset($_FILES['guest'])) {
    try {
        $valid_types = ['image/jpeg', 'image/jpg', 'image/gif', 'image/png', 'image/tif', 'image/tiff'];
        $file_type = $_FILES['guest']['type'];
        if (!in_array($file_type, $valid_types)) {
            throw new Exception('Invalid file type. jpeg, JPG, GIF, PNG, or TIF files are allowed.');
        }
        
        $client = new Client();
        putenv('GOOGLE_APPLICATION_CREDENTIALS=./drive/snappy-axle.json');
        $client->useApplicationDefaultCredentials();
        $client->addScope(Drive::DRIVE);
        $driveService = new Drive($client);
        $fileMetadata = new DriveFile(array(
            'name' => $_FILES['guest']['name'],
            'parents' => ['1IiHE3gswsWePC-zuQR-Hw7xCN0NivJq8']
        ));
        $content = file_get_contents($_FILES['guest']['tmp_name']);
        $file = $driveService->files->create($fileMetadata, array(
            'data' => $content,
            'mimeType' => $file_type,
            'uploadType' => 'multipart',
            'fields' => 'id'
        ));
        $guest_pic = $file->id;
        $message = "File uploaded successfully. $guest_pic";
    } catch(Exception $e) {
        $message = "Error Message g: ".$e->getMessage();
    }
}
  /*          
            if(isset($_FILES['picture'])) {
            try {
            // $valid_types = ['image/jpeg', 'image/jpg', 'image/gif', 'image/png', 'image/tif', 'image/tiff'];
            // $file_type = $_FILES['image']['type'];
            // if (!in_array($file_type, $valid_types)) {
            //     throw new Exception('Invalid file type. jpeg, JPG, GIF, PNG, or TIF files are allowed.');
            // }
                
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        
                $client = new Google_Client();
                putenv('GOOGLE_APPLICATION_CREDENTIALS=./drive/snappy-axle.json');
                $client->useApplicationDefaultCredentials();

                $client->addScope(Drive::DRIVE);
                $driveService = new Drive($client);
                $S_pic = array();
                $uploaded_files = $_FILES['picture'];
                foreach ($uploaded_files['name'] as $key => $name) {
                    if ($uploaded_files['error'][$key] == 0) {
                        $fileMetadata = new Drive\DriveFile(array(
                            'name' => $name,
                            'parents' => ['1IiHE3gswsWePC-zuQR-Hw7xCN0NivJq8']
                        ));
                        $content = file_get_contents($uploaded_files['tmp_name'][$key]);
                        $file = $driveService->files->create($fileMetadata, array(
                            'data' => $content,
                            'mimeType' => $uploaded_files['type'][$key],
                            'uploadType' => 'multipart',
                            'fields' => 'id'
                        ));
                        $S_pic[] = $file->id;
                    }
                }
                $message = "Files uploaded successfully. ".implode(",", $S_pic);
            } catch(Exception $e) {
                $message = "Error Message p: ".$e->getMessage();
            } 
        }

*/




switch($task) {

case "test":
    include('Supabase_connect.php');

    $query = 'SELECT * FROM "event_page" WHERE "event_id" =\'' . $event_id . '\';';
    $result = pg_query($conn, $query);
    if (!$result) {echo "Query Error [$query] " . pg_last_error($conn);}

    $query2 = 'SELECT * FROM "event_perk" WHERE "event_id" =\'' . $event_id . '\';';
    $result2 = pg_query($conn, $query2);
    if (!$result2) {echo "Query Error [$query2] " . pg_last_error($conn);}


    $query3 = 'SELECT * FROM "event_slide" WHERE "event_id" =\'' . $event_id . '\';';
    $result3 = pg_query($conn, $query3);
    if (!$result3) {echo "Query Error [$query3] " . pg_last_error($conn);}

    $query4 = 'SELECT * FROM "event_guest" WHERE "event_id" =\'' . $event_id . '\';';
    $result4 = pg_query($conn, $query4);
    if (!$result4) {echo "Query Error [$query4] " . pg_last_error($conn);}

    while ($row = pg_fetch_assoc($result2)) {
        $e_perk_id[] = $row['e_perk_id'];
        $perk_desc[] = $row['e_p_desc'];
        $color[] = $row['color'];
    }

    while ($row = pg_fetch_assoc($result3)) {
        $E_slide_id[] = $row['E_slide_id'];
        $S_title[] = $row['E_S_title'];
        $S_des[] = $row['E_S_des'];
        $S_pic[] = $row['E_S_pic'];
    }
    while ($row = pg_fetch_assoc($result4)) {
        $e_guest_id = $row['e_guest_id'];
        $guest_name = $row['e_guest_name'];
        $guest_desc = $row['e_guest_desc'];
        $guest_pic = $row['e_guest_pic'];
        $color = $row['color'];
    }

    if (pg_num_rows($result) > 0) {
        $row = pg_fetch_assoc($result);
            $event_id = $row['event_id'];
            $e_name = $row['e_name'];
            $e_tag = $row['e_tag'];
            $e_desc = $row['e_desc'];
            $e_pic = $row['e_pic'];
            $e_date = $row['e_date'];
            $e_time = $row['e_time'];
            $e_location = $row['e_location'];
            $e_places = $row['e_places'];
            $place_pic = $row['place_pic'];
            $header_pic = $row['header_pic'];
            $icon_pic = $row['icon_pic'];
            $e_price = $row['e_price'];
            $e_categoris = $row['e_categoris'];
            $e_max_mem = $row['e_max_mem'];
            $e_members = $row['e_members'];
            $made_Date = $row['made_date'];
            $joined_users = $row['joined_users'];

    }
            break;
}





echo "<div class='event_make'>
        <div class='form-container'>
        <form action='edit_event.php' method='post' enctype='multipart/form-data'>
        <table class='form-table'>
    <input type='hidden' name='event_id' value='$event_id'>
    <tr>
        <td class='label'>Event Name</td>
        <tr><td class='input'><input type='text' name='e_name' value='$e_name' size='40'></td>
    <tr>
        <td class='label'>Organization Name</td>
        <tr><td class='input'><input type='text' name='e_tag' value='$e_tag' size='40'></td>
    <tr>
        <td class='label'>Event Date</td>
        <tr><td class='input'><input type='date' name='e_date' value='$e_date' size='40'></td>
    <tr>
        <td class='label'>Event Time</td>
        <tr><td class='input'><input type='text' name='e_time' value='$e_time' size='40' placeholder='12:00 PM - 2:00 PM'></td>
    <tr>
        <td class='label'>Event Location</td>
        <tr><td class='input'><input type='text' name='e_location' value='$e_location' placeholder='Enter a location'></td>
    <tr>
        <td class='label'>Event Place</td>
        <tr><td class='input'>
        <input type='text' name='e_places' value='$e_places' placeholder='Online or In-Person'></td>
    <tr>
        <td class='label'>Event Price</td>
        <tr><td class='input'>
        <input type='hidden' name='e_price' value='$e_price'>
        <input type='radio' name='e_price' value='$e_price'checked=$e_price>$e_price
        <input type='radio' name='e_price' value='Free'>Free
        <input type='radio' name='e_price'   value='$5'>$5
        <input type='radio' name='e_price'  value='$10'>$10
        <input type='radio' name='e_price'  value='$15'>$15
        <input type='radio' name='e_price'  value='$20'>$20
       </td>
    <tr>
        <td class='label'>Event Category </td>
        <tr><td class='input'>
        <input type='hidden' name='e_categoris' value='$e_categoris'>
        <input type='radio' name='e_categoris' value='$e_categoris' checked=$e_categoris>$e_categoris
        <input type='radio' name='e_categoris' value='Science'>Science
        <input type='radio' name='e_categoris' value='Health'>Health
        <input type='radio' name='e_categoris'  value='Entertainment'>Entertainment
        <input type='radio' name='e_categoris' value='Sports'>Sports
        <input type='radio' name='e_categoris' value='Studies'>Studies
        <input type='radio' name='e_categoris' value='Seminar'>Seminar
        <input type='radio' name='e_categoris' value='Celebration'>Celebration
        <input type='radio' name='e_categoris' value='Environment'>Environment
        <input type='radio' name='e_categoris' value='Technology'>Technology
        <input type='radio' name='e_categoris' value='Religion'>Religion
        </td>
    <tr>
        <td class='label'>Event Overview</td>
        <tr><td class='input'>
        <textarea name='e_desc' value='$e_desc' size='500' cols='10' rows='5'>$e_desc</textarea></td>
    <tr>
        <td class='label_mem'><span>Members</span> <span>Total Members</span> </td>
        <tr><td class='input_mem'><input type='number' name='e_members' value='$e_members' size='10'>
        <input type='number' name='e_max_mem' value='$e_max_mem' size='10'></td>
    <tr>
        <td class='label'>Upload Photo For Header</td>
        <tr><td class='input_up'>
        <input type='file' name='header' >
        <input type='hidden' name='header_pic' value='$header_pic'></td>
    <tr>
        <td class='label'>Upload Event Photo Icon</td>
        <tr><td class='input_up'>
        <input type='file' name='icon'>
        <input type='hidden' name='icon_pic' value='$icon_pic'></td>
    </table>
    </div>";

echo "<div>";
    
    $max_entries = 4;
    $i = 0;
   
        for ($i = 0; $i < $max_entries; $i++) {

        //$Per_desc = isset($perk_desc[$i]) ? $perk_desc[$i] : null;

    echo "  <div class='form-container'>
            <table class='form-table'>
    <input type='hidden' name='e_perk_id[]' value='$e_perk_id[$i]'>
        <tr>
            <td>Perk No " . ($i+1) . " <span style='float:right;'>$e_perk_id[$i]</span></td>
        <tr>
            <td class='label'>Perk Description</td>
            <tr><td class='input'><input type='text' name='perk_desc[]' value='$perk_desc[$i]' size='20' cols='10' rows='5'></td>        
        </tr></table></div>";
}
        
echo "</div><div>";
    
    $max_ent = 3;

    for ($j = 0; $j < $max_ent; $j++) {

    $_pic = isset($S_pic[$j]) ? $S_pic[$j] : null;
    //$_title = isset($S_title[$j]) ? $S_title[$j] : null;
    //$_des = isset($S_des[$j]) ? $S_des[$j] : null;
       

    echo "  <div class='form-container'>
            <table class='form-table'>
        <input type='hidden' name='E_slide_id[]' value='$E_slide_id[$j]'>
        <tr>
            <td>Event Pic No " . ($j + 1) . " <span style='float:right;'>$E_slide_id[$j]</span></td>
        <tr>
            <td class='label'>Event Pic Title</td>
            <tr><td class='input'><input type='text' name='S_title[]' value='$S_title[$j]'></td>
        <tr>
            <td class='label'>Event Pic Description</td>
            <tr><td class='input'><input type='text' name='S_des[]' value='$S_des[$j]'></td>
        <tr>
        <td class='label'>Event Pic</td>
        <tr><td class='input_up'>
        <input type='file' name='picture[]' >
        <input type='hidden' name='S_pic[]' value='$_pic'></td>
        </tr></table></div>";}

    echo "</div><div>";
    
        echo "  <div class='form-container'>
                <table class='form-table'>
            <tr>
                <td class='label'>Guest Speaker Image</td>
                <tr><td class='input_up'>
                <input type='file' name='guest' >
                <input type='hidden' name='guest_pic' value='$guest_pic'></td>
            <tr>
                <td class='label'>Guest Speaker</td>
                <tr><td class='input'><input type='text' name='guest_name' value='$guest_name'></td>
            <tr>
                <td class='label'>Guest Speaker Description</td>
                <tr><td class='input'>
                <textarea name='guest_desc' value='$guest_desc' size='200' cols='5' rows='2'>$guest_desc</textarea></td>       
            </tr></table></div>";
            
    echo "</div></div></div>
    <div class='submit_button'>
        <input type='submit' name='task' value='Finish' class='submit-button'>
        <input type='submit' name='task' value='preview' class='submit-button'>
        </div>
        </form>";










switch($task) {

    case "preview":
 
 echo"rww";
 $imageUrl = 'https://drive.google.com/uc?export=view&id=';
echo"
<input type='hidden' name='event_id' value='$event_id'>
<section>
<div class='eventHeaderContainer'>
<div class='eventImageHeaderContainer'>
  <img src='$imageUrl$header_pic' alt=''>
  <div class='eventImageDescription'>
      <h1>Job Fair</h1>
  </div>
</div>
</div>

<div class='eventDetailsContainer'>
<div class='eventDescriptionBlock1'>
  <div class='eventDescriptionBlock1Header'>
      <div class='eventIcon1'>
          <img src='$imageUrl$icon_pic' alt=''>
         
      </div>
      <div class='eventTitle'>
          <h1>$e_name</h1>
          <h1>$e_tag</h1>
      </div>
      <div class='eventDatePosted'>
          <h2>12:51 PM May, 2023 </h2>
          <h1>
              <i class='far fa-heart'></i> 
              
          </h1>
      </div>
      
  </div>

  <div class='eventDecriptionBlock1Images'>
<div class='slideshow-container'>";

      for ($i = 0; $i < count($E_slide_id); $i++) {


         echo"
         <div class='mySlides fade'>
         <div class='numbertext'> " . ($i+1) . "</div>
         <img src='$imageUrl$S_pic[$i]' style='width:100%'>
         <div class='text'>$S_title[$i]<br>$S_des[$i]</div>
         </div>
         ";}
         echo"	
         <div class='prev' onclick='plusSlides(-1)'>❮</div>
         <div class='next'  onclick='plusSlides(1)'>❯</div>
         <br>
         <div class='do' style='text-align:center'>
             <span class='dot' onclick='currentSlide(1)'></span> 
             <span class='dot' onclick='currentSlide(2)'></span> 
             <span class='dot' onclick='currentSlide(3)'></span> 
         </div>
         </div>
         <br>
         
         <script src='autoSlide.js'></script>
         <script src='clickSlide.js'></script>
         </section>
          "; 
      
  echo"</div>


  <div class='eventDecriptionBlock1MisDetails'>
      <div class='eventTime'>
          <p><span class='dateTime'>Date:</span> $e_date</p>
          <p><span class='dateTime'>Time:</span> $e_time</p>
      </div>
      <div class='eventMembers' style='text-align: center;'>
          <h1>Members</h1>
          <div>
              <button>$e_members/$e_max_mem</button>
          </div>
      </div>
      <div class='joinSection'> 
          <p>$e_price</p>
          <button class='joinButton'>Join</button>
      </div>
  </div>

  
</div>
<div class='eventDescriptionBlock2'>
  <h1>Location</h1>
  <!--<img style='margin-bottom:20px; 'src='$imageUrl$place_Pic' alt='dfsdfs'>
  <img src='$map_url' alt='Map'>
  <p><br> fsdf $map_url </p>-->
  <iframe width='100%' height='400' frameborder='0'
   style='border:0' src='$e_location' allowfullscreen></iframe>
  <h2>$e_places</h2>

  <div class='eventPerks'>
  <h1>Perks</h1>";
 for ($i = 0; $i < count($e_perk_id); $i++) {
      
     echo" <button>$perk_desc[$i]</button>";
 }
 echo"
  </div>
  <h1 style='margin-top: 40px; margin-bottom: 0px;'>Guest Speakers</h1>
  <div class='specialGuestsContainer'>
      <div class='guestIconContainter'>
          <img src='$imageUrl$guest_pic' alt=''>
          <div class='guestSpeakerDescription'>
              <h2>$guest_name</h2>
              <p>$guest_desc</p>
          </div>
      </div>

  </div>
</div>
</div>
<div class='bottomEventContainer'>
<div class='eventOverviewDescription'>
  <h1>Event Overview</h1>
  <p>$e_desc</p>
</div>
</div>

</section>";     break;


case "Finish":   
     echo"<div id='main'> <input type='hidden' name='event_id' value='$event_id'>";
    include('Supabase_connect.php');
   
    echo"<div id='ma'>";
    $query = 'UPDATE "event_page" SET "e_name" = \'' .$e_name. '\',"e_tag" = \'' .$e_tag. '\',
    "e_desc" = \'' .$e_desc. '\',"e_pic" = \'' .$e_pic. '\',
    "e_date" = \'' .$e_date. '\',"e_time" = \'' .$e_time. '\',"e_location" = \'' .$e_location. '\',
    "e_places" = \'' .$e_places. '\',"place_pic" = \'' .$place_pic. '\' ,"header_pic" = \'' .$header_pic. '\',
    "icon_pic" = \'' .$icon_pic. '\',"e_price" = \'' .$e_price. '\' ,"e_categoris" = \'' .$e_categoris. '\',
    "e_members" = \'' .$e_members. '\' ,"e_max_mem" = \'' .$e_max_mem. '\'
    WHERE "event_page"."event_id" = \'' . $event_id . '\';';
    $result = pg_query($conn, $query);
    if ($result) { echo" $ck Your Event updated $event_id.";}
    else { echo" $cr Unable to Make update.<br>" . pg_last_error($conn);}
    echo"</div><div>";

    for ($i = 0; $i < count($e_perk_id); $i++) {
        echo"<div id='ma'>";
        $query2 = 'UPDATE "event_perk" SET "e_p_desc" = \'' . $perk_desc[$i] . '\'
                    WHERE "event_perk"."event_id" = \'' . $event_id . '\' AND "e_perk_id" = \'' . $e_perk_id[$i] . '\';';
        $result2 = pg_query($conn, $query2);
        if ($result2) {echo "$ck Perk ID  $perk_id[$i] updated.";
        } else {echo " $cr Unable to update perk ID $perk_id[$i] .<br>" . pg_last_error($conn);}
        echo"</div>";
    }
    echo"</div><div>";
 

    for ($i = 0; $i < count($E_slide_id); $i++) {
        echo"<div id='ma'>";
        $query3 = 'UPDATE "event_slide" SET "E_S_title" = \'' . $S_title[$i] . '\', "E_S_des" = \'' . $S_des[$i] . '\'
                    WHERE "event_slide"."event_id" = \'' . $event_id . '\' AND "E_slide_id" = \'' . $E_slide_id[$i] . '\';';
        $result3 = pg_query($conn, $query3);
        if ($result3) {echo "$ck Slide ID $E_slide_id[$i] updated.";}
        else {echo " $cr Unable to update slide ID $E_slide_id[$i] .<br>" . pg_last_error($conn);}
        echo"</div>";
    }
    echo"</div><div>";

        echo"<div id='ma'>";
        $query4 = 'UPDATE "event_guest" SET "e_guest_name" = \'' . $guest_name . '\', "e_guest_desc" = \'' . $guest_desc . '\', "e_guest_pic" = \'' . $guest_pic . '\'
                    WHERE "event_guest"."event_id" = \'' . $event_id . '\' ;';
        $result4 = pg_query($conn, $query4);
        if ($result4) {echo "$ck Guest Member updated.";}
        else {echo " $cr Unable to update Guest Member .<br>zx" . pg_last_error($conn);}
        echo"</div>";

    echo"</div></div>";
    break;



}



?>