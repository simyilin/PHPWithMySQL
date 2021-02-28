<?php
    // Start the session
    session_start();
?>

<html>
    <head>
        <title>CRUD - Read</title>
        <!-- Bootstrap stylesheet -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <!-- Add appropriate title -->
            <h2 class="p-3">Albums</h2>
            <?php
                // Clear session
                $_SESSION['error'] = "";

                // Connecting to MYSQL
                $con = mysqli_connect("localhost", "user", "password");

                // Check status
                if (!$con) {
                    die("ERROR - UNABLE TO CONNECT TO MYSQL DATABASE");
                }

                // Select database
                mysqli_select_db($con, "music");

                // SELECT {col1}, {col2} FROM {tableName} WHERE {condition} 
                $query = "SELECT * FROM album";
                $data = mysqli_query($con, $query);

                // $row = mysqli_fetch_array($data)
                echo '<table class="table">';
                echo '<tr><th>Title</th><th>Artist</th>';
                echo '<th>Update</th><th>Delete</th></tr>';
                while ($row = mysqli_fetch_array($data)) {
                    echo '<tr>';
                    echo '<td>' . $row['title'] . '</td>';
                    echo '<td>' . $row['artist'] . '</td>';
                    echo '<td><a href="update.php?id=' . $row['id'] . 
                            '">Update</a></td>';
                    echo '<td><a href="delete.php?id=' . $row['id'] . 
                    '">Delete</a></td>';
                    echo '</tr>';
                }
                echo '</table>';

                // Close connection
                mysqli_close($con);
            ?>
            <br/>
            <a href="create.php">Add New</a>
        </div>
    </body>
</html>