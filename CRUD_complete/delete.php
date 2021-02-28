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
    mysqli_select_db($con, "music");

    // DELETE FROM {tableName} WHERE {condition}
    $query = "DELETE FROM album WHERE id=".$_GET['id'];

    mysqli_query($con, $query);

    // Close connection
    mysqli_close($con);

    // Redirect back to read.php
    header('location: read.php');
?>