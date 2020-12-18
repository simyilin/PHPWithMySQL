<?php
    // Start the session
    session_start();
?>

<?php
    // TODO: Data validation

    // TODO: Redirect back to edit.php or read.php

    function editEntry(/* Set needed parameters */) {
        // Connecting to MySQL
        $con = mysqli_connect("localhost", "root", "");

        // Check status 
        if (!$con) {
            die("ERROR - UNABLE TO CONNECT TO MYSQL DATABASE");
        }

        // Select database
        mysqli_select_db($con, "db-name");

        // TODO: SQL UPDATE
        // UPDATE {tableName} SET {col1} = {val1}, {col2} = {val2} WHERE {condition}
        $query = "";
        $data = mysqli_query($con, $query);

        // Close connection
        mysqli_close($con);
    }
?>