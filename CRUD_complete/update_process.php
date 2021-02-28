<?php
    // Start the session
    session_start();
?>

<?php
    // Current url must include correct id
    $url = "update.php?id=" . $_POST['id'];

    // Data validation
    // Check if the form fields values exist
    if (!isset($_POST['title']) || !isset($_POST['artist'])) {
        // redirect
        $_SESSION['updateError'] = "Please use form to edit rows!";
        header('location: '.$url);
    }

    // If title is not set, error: Title field is empty
    else if (empty($_POST['title'])) {
        $_SESSION['updateError'] = "Title field is empty";
        header('location: '.$url);
    }

    // Error: Artist field is empty
    else if (empty($_POST['artist'])) {
        $_SESSION['updateError'] = "Artist field is empty";
        header('location: '.$url);
    }

    // Rest of our stuff here
    else {
        editEntry($_POST['title'], $_POST['artist'], $_POST['id'], $url);
    }

    function editEntry($title, $artist, $id, $url) {
        // Connecting to MySQL
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
            $_SESSION['updateError'] = "Entry already exists!";

            // Close connection
            mysqli_close($con);
            header('location: '.$url);
        }

        // else UPDATE
        // UPDATE {tableName} SET {col1} = {val1}, {col2} = {val2} WHERE {condition}
        else {
            $query = "UPDATE album SET title='$title', artist='$artist' WHERE id='$id'";
            $data = mysqli_query($con, $query);

            // Close connection
            mysqli_close($con);
            header('location: read.php');
        }
    }
?>