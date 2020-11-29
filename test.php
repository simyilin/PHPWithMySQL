<html>
<head>
    <title>PHP with MySQL</title>
</head>
<body>
    <?php
        // CONNECTING TO MYSQL: mysqli_connect("localhost", "{username}", "{password}")
        // {username} and {password} might have to be replaced accordingly
        $con = mysqli_connect("localhost", "root", "");

        // CHECK STATUTS: If connection unsuccessful, throw error and refuse to proceed 
        if (!$con) {
            die("ERROR - UNABLE TO CONNECT TO MYSQL DATABASE");
        }

        // SELECT DATABASE: 'music' database is selected
        mysqli_select_db($con, "music");

        // SELECT DATA: SELECT * returns all rows of data from table 'album'
        $data = mysqli_query($con, "SELECT * FROM album");

        // PRINT: Print data in the column 'title' from each row
        while ($row = mysqli_fetch_array($data)) {
            echo $row['title'] . '<br/>';
        }

        // CLOSE CONNECTION
        mysqli_close($con);
    ?>
</body>
</html>
