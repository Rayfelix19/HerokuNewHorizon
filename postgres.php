

<?php
    // Connection parameters
    $host = "db.albvpiascovyowczwqez.supabase.co";
    $port = "5432";
    $dbname = "postgres";
    $user = "postgres";
    $password = "Krrishman0#";

    // Establish connection
    $conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

    // Check connection
    if (!$conn) {
        echo "failllled";
        echo "PostgreSQL Connection Failure: " . pg_last_error();
        die("Connection failed: " . pg_last_error());
    }
    $user_name = "haqusa";
    // Run a query
    $query = 'SELECT * FROM "User" where "User_Name" = \'' . $user_name . '\'';
    $result = pg_query($conn, $query);

    // Check query result
    if (!$result) {
        echo "faikeddddddddd";
        echo "Query Error [$query] " . pg_last_error($conn);
        die("Query failed: " . pg_last_error($conn));
    }

    // Fetch and display results
    while ($row = pg_fetch_assoc($result)) {
            $User_id = $row['User_id'];
            $F_Name = $row['F_Name'];
            $L_Name = $row['L_Name'];
            $user_name = $row['User_Name'];
            $Pass_Code = $row['Pass_Code'];
            $Role = $row['Role'];
            $Year = $row['6'];
            $Major = $row[7];
            $Email = $row['Email'];
            $Phone = $row['Phone'];
            $Date = $row['created_at'];

 echo "User_id:  $User_id       <br>";
 echo "F_Name:   $F_Name      <br>";
 echo "L_Name:   $L_Name      <br>";
 echo "user_name :    $user_name     <br>";
 echo "Pass_Code:    $Pass_Code     <br>";
 echo "Role:    $Role     <br>";
 echo "Year:     $Year    <br>";
 echo "Major:    $Major       <br>";
 echo "Email:     $Email       <br>";
 echo "Phone:     $Phone      <br>";
 echo "Date      $Date      <br>";

/*
        echo "ID: " . $row['User_id'] . "<br>";
        echo "ID: ". $row['0'] ." <br>";
        echo "ID: ".  $row[1] ."<br>";
        echo "Name:" .  $row['F_Name'] . "<br>";
        echo "Email:" .  $row['Role'] . "<br>";
        echo "Name:" .  $row['F_Name'] . "<br>";
        echo "Email:" .  $row['Role'] . "<br>";
        echo "Name:" .  $row['F_Name'] . "<br>";
        echo "Email:" .  $row['Role'] . "<br>";
      */  // ... (fetch and display other columns)
    }

    // Close connection
    pg_close($conn);
?>
