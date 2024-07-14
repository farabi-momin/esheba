<?php
    session_start();
    include("connection.php"); ?>

<!DOCTYPE html>
    <head><link rel="stylesheet" href="style.css"> </head>
    <body>
    <ul>
        <li style="float:right"><a href="index.php">Home</a></li>
        <li style="float:right"><a href="login.html">Log in</a></li>
        <li style="float:right"><a href="logout.php">Log Out</a></li>
        <li style="float:right"><a href="register.html">Register</a></li>
        <li style="float:right"><a class="active" href="#about">About</a></li>
    </ul>
        <?php
            if(isset($_POST['submit'])){
                $seat_id = $_POST['seat_selected'];
                $train_id = $_POST['train_id'];
                $_SESSION['seat_selected'] = $seat_id;

                $sql1 = "update seat set avaiability = 'no' where seat_id = $seat_id";
                $result1 = mysqli_query($connection, $sql1);

                $sql2 = "SELECT * FROM train t, seat s, coach c where t.train_id = s.train_id and c.train_id = t.train_id and s.coach_id = c.coach_id and s.seat_id = $seat_id";
                $result2 = mysqli_query($connection, $sql2);
                $data = $result2->fetch_array(MYSQLI_ASSOC);
            }
        ?>

        <h1> Your Ticket Infromation </h1>
        <div class = "ticket_info">
        <table>
            <tr>
                <td> Passenger Name  </td> <td> <?php echo $_SESSION['name'] ?> </td>
            </tr>
            <tr>
                <td> Train  </td> <td> <?php echo $data['train_name'] ?> </td>
            </tr>
            <tr>
                <td> Departure Station  </td> <td> <?php echo $data['start_station'] ?> </td>
            </tr>
            <tr>
                <td> Destination Station  </td> <td> <?php echo $data['des_station'] ?> </td>
            </tr>
            <tr>
                <td> Date of Journey  </td> <td> <?php echo $data['date_of_journey'] ?> </td>
            </tr>
            <tr>
                <td> Departure Time  </td> <td> <?php echo $data['dep_time'] ?> </td>
            </tr>
            <tr>
                <td> Coach Type  </td> <td> <?php echo $data['coach_type'] ?> </td>
            </tr>
            <tr>
                <td> Seat no  </td> <td> <?php echo $data['coach_name']. " ". $data['seat_no'] ?> </td>
            </tr>
        </table>
        <form class="transaction" method = "POST" action = "transaction.php">
                <input type = "hidden" name = "train_id" value = "<? echo $data['train_id']?>">
                <input type = "hidden" name = "train_name" value = "<?php echo $data['train_name']?>">
                <input type = "hidden" name = "start_station" value = "<?php echo $data['start_station'] ?>">
                <input type = "hidden" name = "des_station" value = "<?php echo $data['des_station'] ?>">
                <input type = "hidden" name = "dep_time" value = "<?php echo $data['dep_time'] ?>">
                <input type = "hidden" name = "seat_id" value = "<?php echo $data['seat_id'] ?>">
                <input type = "hidden" name = "seat_no" value = "<?php echo $data['seat_no'] ?>">
                <input type = "hidden" name = "date_of_journey" value = "<?php echo $data['date_of_journey'] ?>">
                <input type = "hidden" name = "coach_id" value = "<?php echo $data['coach_id'] ?>">
                <input type = "hidden" name = "coach_name" value = "<?php echo $data['coach_name'] ?>">
                <input type = "hidden" name = "coach_type" value = "<?php echo $data['coach_type'] ?>">
                <input type = "submit" name = "submit"  value = "Confirm Ticket" id = "submit-btn">
        </form>
        </div>

        <?php
            $ticketID = rand();
            $seatID=$data['seat_id'];
            $coachID=$data['coach_id'];
            $trainID=$data['train_id'];
            $userID=$_SESSION['id'];
            $fromStation=$data['start_station'];
            $toStation=$data['des_station'];
            $dateOfJourney=$data['date_of_journey'];
            $sql3 = "insert into ticket (ticket_id, seat_id, coach_id, train_id, user_id, from_station, to_station, date_of_journey) values ($ticketID, $seatID, $coachID, $trainID, $userID, '$fromStation', '$toStation', '$dateOfJourney' )";
            $result3 = mysqli_query($connection, $sql3);
            $_SESSION['ticketID'] = $ticketID;        ?>
    </body>
</html>    