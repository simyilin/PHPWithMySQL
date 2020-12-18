<?php
    // Start the session
    session_start();
?>

<html>
    <head>
        <title>CRUD - Edit</title>
    </head>
    <body>
        <form method="POST" action="update_process.php">
            <p>
                <?php
                    if (isset($_SESSION['error'])) {
                        echo $_SESSION['error'];
                        $_SESSION['error'] = "";
                    } 
                ?>
            </p>
            <!-- TODO: Appropriate form fields -->
            <!-- TODO: Hidden field to select correct entry -->
            <a href="read.php">View account list</a>
        </form>
    </body>
</html>

