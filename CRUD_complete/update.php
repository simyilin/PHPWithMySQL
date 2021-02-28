<?php
    // Start the session
    session_start();
?>

<html>
    <head>
        <title>CRUD - Edit</title>
        <!-- Bootstrap stylesheet -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <h2 class="p-3">Edit record</h2>
            <form method="POST" action="update_process.php">
                <!-- Appropriate form fields -->
                <label for="title">Title:</label><br>
                <input type="text" id="title" name="title"><br>
                <label for="artist">Artist:</label><br>
                <input type="text" id="artist" name="artist"><br><br>
                <input class="btn btn-primary" type="submit" value="Submit">
                <!-- Hidden field to select correct entry -->
                <?php
                    echo '<input type="hidden" value="' . $_GET['id'] . '" name="id">'
                ?>
                <p><a href="read.php">View All Records</a></p>
                <?php
                    // SESSION error message
                    if (isset($_SESSION['updateError'])) {
                        echo "<p style='color: red'>".$_SESSION['updateError']."</p>";
                        // Reset so that error message disappears on refresh
                        $_SESSION['updateError'] = "";
                    }
                ?>
            </form>
        </div>
    </body>
</html>
