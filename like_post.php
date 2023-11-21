
<?php
// get data from POST request
$com_id = $_POST['com_id'];
$action = $_POST['action'];

// update database
include('Supabase_connect.php');
if ($action == 'like') {
    $query6 = 'UPDATE "club_comment" SET "Likes" = Likes+1  WHERE "com_id" = \'' . $com_id . '\';';
} elseif ($action == 'dislike') {
    $query6 = 'UPDATE "club_comment" SET "Dislikes" = \'Dislikes+1\'  WHERE "com_id" = \'' . $com_id . '\';';
}
$result6 = pg_query($conn, $query6);

// send response to client
if ($result6) {
    echo "Success";
} else {
    echo "Error";
}
?>