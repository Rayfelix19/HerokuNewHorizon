
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
      echo "PostgreSQL Connection Failure: " . pg_last_error();
      //exit;
       // die("Connection failed: " . pg_last_error());
    }

 /*   // Run a query
    $query = 'SELECT * FROM "User" where "User_Name" = \'$user_name\'';
    $result = pg_query($conn, $query);

    // Check query result
    if (!$result) {
      echo "faikeddddddddd";
      echo "Query Error [$query] " . pg_last_error($conn);
       // die("Query failed: " . pg_last_error($conn));
    }

    // Fetch and display results
    while ($row = pg_fetch_assoc($result)) {
        echo "ID: " . $row['User_id'] . "<br>";
        echo "ID:  $row[0]  <br>";
        echo "ID:   $row[1] ";
        echo "Name: " . $row['F_Name'] . "<br>";
        echo "Email: " . $row['Role'] . "<br>";
        // ... (fetch and display other columns)
    }

    // Close connection
    pg_close($conn);
    */
?>