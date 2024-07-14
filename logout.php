<?php
    session_start();
    include("connection.php");?>

<!DOCTYPE html>
    <head> </head>
    <body>
        <?php    
        session_unset();
        header("Location:index.php");
        ?>
    </body>
</html>
