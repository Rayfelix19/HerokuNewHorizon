
<?php

//include('Home.php');
include('postgres.php');
include('Supabase_connect.php');



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $file = $_FILES['image'];
    $file_name = $file['name'];
    $file_tmp = $file['tmp_name'];
  
    // Upload file to Supabase storage bucket
    $supabase_url = 'https://albvpiascovyowczwqez.supabase.co';
    $supabase_bucket_name = 'pic';
    $supabase_api_key = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImFsYnZwaWFzY292eW93Y3p3cWV6Iiwicm9sZSI6ImFub24iLCJpYXQiOjE2NzcwNDk1MzcsImV4cCI6MTk5MjYyNTUzN30.GPMlnXEDxeIjFcPw9IrJTkxzSc8QhC4kbwWXJpeaPPQ';
    
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $supabase_url . '/storage/v1/object/public/' . $supabase_bucket_name . '/' . $file_name);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, file_get_contents($file_tmp));
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
      'Content-Type: application/octet-stream',
      'Authorization: Bearer ' . $supabase_api_key
    ));
    $response = curl_exec($curl);
    echo "$response";
    $cc=curl_error($curl);
    echo "$cc";

    if (curl_errno($curl)) {
        //$cc=curl_error($curl);
      echo "Error uploading file:  ffff ree " . curl_error($curl);
      exit;
    }
    
    curl_close($curl);
    
    $response_json = json_decode($response);
    
    if ($response_json && isset($response_json->data->url)) {
      $file_url = $response_json->data->url;
      echo 'File uploaded successfully. File URL: ' . $file_url;


  }
}


  ?>
  
  <!DOCTYPE html>
  <html>
  <head>
    <title>Image Upload</title>
  </head>
  <body>
    <h1>Image Upload</h1>
    <form action="" method="post" enctype="multipart/form-data">
      <input type="file" name="image">
      <input type="submit" value="Upload">
    </form>
  </body>
  </html>