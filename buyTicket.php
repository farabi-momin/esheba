<?php
    session_start();
    include("connection.php"); ?>
<!DOCTYPE html>
    <head>> <link rel="stylesheet" href="style.css"> </head>
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
                $train_id = $_POST['train_id'];
                $DOJ = $_POST['DOJ'];
                echo $DOJ;

                $sql = "select * from coach c natural join seat s where s.train_id = '$train_id' and s.date_of_journey = '$DOJ' and s.avaiability = 'yes'";
                $result = mysqli_query($connection, $sql);

                if($result->num_rows > 0){ ?>
                    <form action = "ticket.php" method = "POST"><div class="seatList"><table>
                            <tr>
                                <th>Seat Number</th><th>Coach Type</th><th>Coach Name</th>
                            </tr>
                    <?php while($seatList = $result->fetch_assoc()){ ?>
                            <tr>
                                <td><?php echo $seatList['seat_no'] ?></td>
                                <td><?php echo $seatList['coach_type'] ?></td>
                                <td><?php echo $seatList['coach_name'] ?></td>
                                <td><input type="radio" name="seat_selected" value="<?php echo $seatList['seat_id'] ?>">
                                    <input type="hidden" name="train_id" value="<?php echo $seatList['train_id'] ?>"></td>
                            </tr>
                <?php  } ?> </table></div>
                            <input type="submit" name="submit" value="Purchase" id="purchase-btn">
                    </form>
                <?php
                }
            } ?>


    </body>
</html>    