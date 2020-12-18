<?php
    // Start the session
    session_start();
?>

<?php
    // TODO: Data validation - Set session error message if needed

    // TODO: Redirect back to create.php or read.php

    // TODO: Add entry using SQL query CREATE
    function addEntry(/* Add parameters */) {
        // Connecting to MYSQL
        $con = mysqli_connect("localhost", "root", "");

        // Check status
        if (!$con) {
            die("ERROR - UNABLE TO CONNECT TO MYSQL DATABASE");
        }

        // Select database
        mysqli_select_db($con, "db-name");

        // TODO: Check if entry already exists [SELECT]
        $query = "";
        $data = mysqli_query($con, $query);

        if (!($data) || mysqli_num_rows($data) > 0) {
            // Has error in query or already exists
            // TODO: Response?
        }

        // Else INSERT DATA
        // INSERT INTO {tableName} VALUES(“{val1}”, “{val2}”, “{val3}”, “{val4}” )
        $query = "";
        $data = mysqli_query($con, $query);

        // Close connection
        mysqli_close($con);
    }
?>