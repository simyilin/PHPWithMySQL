<?php
    // Start the session
    session_start();
?>

<?php

    // Data validation (sessions)
    // The user did not enter anything in the form fields

    // Check if the form fields values exist
    if (!isset($_POST['title']) || !isset($_POST['artist'])) {
        // redirect
        $_SESSION['createError'] = "Please use form to add rows!";
        header('location: create.php');
    }

    // If title is not set, error: Title field is empty
    else if (empty($_POST['title'])) {
        $_SESSION['createError'] = "Title field is empty";
        header('location: create.php');
    }

    // Error: Artist field is empty
    else if (empty($_POST['artist'])) {
        $_SESSION['createError'] = "Artist field is empty";
        header('location: create.php');
    }

    // Rest of our stuff here
    else {
        addEntry($_POST['title'], $_POST['artist']);
        header('location: read.php');
    }


    // Add entry using SQL query CREATE
    function addEntry($title, $artist) {
        // Connecting to MYSQL
        $con = mysqli_connect("localhost", "root", "");

        // Check status
        if (!$con) {
            die("ERROR - UNABLE TO CONNECT TO MYSQL DATABASE");
        }

        // Select database
        mysqli_select_db($con, "music");

        //  Check if entry already exists [SELECT]
        $query = "SELECT * FROM album WHERE title='$title' AND artist='$artist'";
        $data = mysqli_query($con, $query);

        // New?
        if (!($data) || mysqli_num_rows($data) > 0) {
            // Has error in query or already exists
            $_SESSION['createError'] = "Entry already exists!";
            header('location: create.php');
        }

        else {
            // Else INSERT DATA
            // INSERT INTO {tableName}(col1, col3) VALUES(“{val1}”, “{val2}”, “{val3}”, “{val4}” )
            $query = "INSERT INTO album(title, artist) VALUES('$title', '$artist')";
            $data = mysqli_query($con, $query);
        }

        // Close connection
        mysqli_close($con);
    }

?>