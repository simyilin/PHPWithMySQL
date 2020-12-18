<html>
    <head>
        <title>CRUD - Read</title>
    </head>
    <body>
        <!-- TODO: Add appropriate title -->
        <h2></h2>
        <?php
            // Connecting to MYSQL
            $con = mysqli_connect("localhost", "root", "");

            // Check status
            if (!$con) {
                die("ERROR - UNABLE TO CONNECT TO MYSQL DATABASE");
            }

            // Select database
            mysqli_select_db($con, "db-name");

            // TODO: Select data
            // SELECT {col1}, {col2} FROM {tableName} WHERE {condition} 
            $query = "";
            $data = mysqli_query($con, $query);

            // TODO: Display data
            // mysqli_fetch_array()
            }

            // Close connection
            mysqli_close($con);
        ?>
        <br/>
        <a href="create.php">Add New</a>
    </body>
</html>