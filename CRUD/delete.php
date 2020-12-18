<?php
    // Start the session
    session_start();
?>

<?php
    // Connecting to MySQL
    $con = mysqli_connect("localhost", "root", "");

    // Check status
    if (!$con) {
        die("ERROR - UNABLE TO CONNECT TO MYSQL DATABASE");
    }

    // Select database
    mysqli_select_db($con, "db-name");

    // TODO: Delete query
    // DELETE FROM {tableName} WHERE {condition}
    $query = "";

    mysqli_query($con, $query);

    // Close connection
    mysqli_close($con);

    // TODO: Redirect back to read.php
?>