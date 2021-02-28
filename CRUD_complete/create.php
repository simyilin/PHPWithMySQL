<?php
    // Start the session
    session_start();
?>

<html>
    <head>
        <title>CRUD - Create</title>
        <!-- Bootstrap stylesheet -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>

    <body>
        <div class="container">
            <h2 class="p-3">Add new record</h2>
            <form method="POST" action="create_process.php">
                <label for="title">Title:</label><br>
                <input type="text" id="title" name="title"><br>
                <label for="artist">Artist:</label><br>
                <input type="text" id="artist" name="artist"><br><br>
                <input class="btn btn-primary" type="submit" value="Submit">
            </form>
            <p><a href="read.php">View All Records</a></p>
            <?php
                // SESSION error message
                if (isset($_SESSION['createError'])) {
                    echo "<p style='color: red'>".$_SESSION['createError']."</p>";
                    // Reset so that error message disappears on refresh
                    $_SESSION['createError'] = "";
                }
            ?>
        </div>
    </body>
</html>

