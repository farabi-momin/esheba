<?php
    session_start();
    include("connection.php"); ?>

<!DOCTYPE html>
    <head><link rel="stylesheet" href="style.css"></head>
    <body>
    <ul>
        <li style="float:right"><a href="index.php">Home</a></li>
        <li style="float:right"><a href="login.html">Log in</a></li>
        <li style="float:right"><a href="logout.php">Log Out</a></li>
        <li style="float:right"><a href="register.html">Register</a></li>
        <li style="float:right"><a class="active" href="#about">About</a></li>
    </ul>
        <?php
        $userID = $_SESSION['id'];
        $selectedSeat = $_SESSION['seat_selected'];
        $ticket_id = $_SESSION['ticketID'];
        $transactionID = rand();
        if(isset($_POST['submit'])){
            $seatID = $_POST['seat_id'];

            $sql1 = "insert into transaction(transaction_id, transaction_status, user_id, ticket_id) values($transactionID, 'successfull', $userID, $ticket_id)";
            $result1 = mysqli_query($connection, $sql1); ?>
            <h3> Payment successful!</h3>
            
    <?php    } else {
            $sql1 = "insert into transaction(transaction_status, user_id, ticket_id) values($transactionID,'failed', $userID, $ticket_id)";
            $result1 = mysqli_query($connection, $sql1); ?>
            <h3> Payment successful!</h3>
            
            <?php

            $sql2 = "delete from ticket where seat_id = $selectedSeat";
            $result2 = mysqli_query($connection, $sql2);

            $sql3 = "update seat set avaiability = 'yes' where seat_id = $selectedSeat ";
            $result3 = mysqli_query($connection, $sql3);
        }
        ?>
    </body>
</html>