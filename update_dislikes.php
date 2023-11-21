
<?php


include('Supabase_connect.php');

    $com_id = $_POST['com_id'];

    // Update the likes count in the database
    $query6 = 'UPDATE "club_comment" SET "Dislikes" = "Dislikes" + 1  WHERE "com_id" = \'' . $com_id . '\';';
    $result6 = pg_query($conn, $query6);

    if ($result6) {
        echo "<script>console.log('Success');</script>";
    }
    else {
        echo "<script>console.log('Error [" . $query6 . "] " . pg_last_error($conn) . "');</script>";
    }

    ?>