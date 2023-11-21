


<?php

/*
	echo"<p style=' width:100%; padding: 30px;'></p>";

    include('session.php');
	include('menubar.php');
	


// Get the comment ID from the form data
$com_id = $_POST['com_id'];

// Update the likes count in the database
$query = "UPDATE comment SET Likes = 'Likes' + 1 WHERE com_id = $com_id";
$result = mysqli_query($mysqli, $query);
if ($result) {
    // Comment inserted successfully
    echo "success";
} else {
    // Failed to insert comment
    echo "error";
}
*/
include('Supabase_connect.php');

    $com_id = $_POST['com_id'];

    // Update the likes count in the database
    $query6 = 'UPDATE "club_comment" SET "Likes" = "Likes" + 1  WHERE "com_id" = \'' . $com_id . '\';';
    $result6 = pg_query($conn, $query6);

    
    if ($result6) {
        echo "<script>console.log('Success');</script>";
    }
    else {
        echo "<script>console.log('Error [" . $query6 . "] " . pg_last_error($conn) . "');</script>";
    }
?>


