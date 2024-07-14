<?php
    session_start();
    include("connection.php"); ?>

<!DOCTYPE html>
    <head> <link rel="stylesheet" href="style.css"> </head>

    <body>
    <ul>
        <li style="float:right"><a href="index.php">Home</a></li>
        <li style="float:right"><a href="login.html">Log in</a></li>
        <li style="float:right"><a href="logout.php">Log Out</a></li>
        <li style="float:right"><a href="register.html">Register</a></li>
        <li style="float:right"><a class="active" href="#about">About</a></li>
    </ul>

    <?php if(isset($_POST['submit'])){
        $from_station = $_POST['fromStation'];
        $to_station = $_POST['toStation'];
        $DOJ = $_POST['date_of_journey'];


        $sql = " select count(avaiability), t.max_capacity, t.train_name, t.train_id, s.coach_id, s.date_of_journey from train t natural join seat s where t.start_station = '$from_station' and t.des_station = '$to_station' and t.train_id = s.train_id and s.avaiability = 'no' and s.date_of_journey = '$DOJ' group by s.train_id;";
        $result = mysqli_query($connection, $sql);

        if($result->num_rows > 0){
            while($trainList=$result->fetch_assoc()){ ?>
            <table><tr><th>Train Name</th> <th>Available Ticket</th> <th>Date of Journey</th> </tr>
                <tr> <td> <?php echo $trainList['train_name']; ?> </td> 
                    <td> <?php $availableSeat = $trainList['max_capacity'] - $trainList['count(avaiability)']; echo $availableSeat ?></td>
                    <td> <?php echo $trainList['date_of_journey'] ?> </td>
                    <td> <form action = "buyTicket.php" method = "POST">
                            <input type = "hidden" name = "train_id" value = "<?php echo $trainList['train_id']; ?>">
                            <input type = "hidden" name = "DOJ" value = "<?php echo $trainList['date_of_journey']; ?>">
                            <input type = "submit" value = "Buy Ticket" name = "submit">
                        </form>
                    </td>    
                </tr>
           <?php }
        }


    } ?>
    </body>

</html>