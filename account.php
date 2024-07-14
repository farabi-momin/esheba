<?php
    session_start();
    if(isset($_SESSION['name'])){?>
        
    <!DOCTYPE html>
        <head></head>

        <body>
            <h1> Welcome to your account <?php echo $_SESSION['name']; ?> <h1><br><br>
            <h3> Tickets </h3>
            <?php
                $userID = $_SESSION['id'];
                $sql = "select * from ticket where user_id = $userID";
                $result = mysqli_query($connection, $sql);

                
                if($result->num_rows()>0){
                    while($data = $result->fetch_assoc()){ ?>
                        <table>
                            <tr>
                                <th>Journey Date</th> <th>Train Name</th> <th>From</th> <th>To</th> <th>Departure Time</th> <th>Coach Type</th> <th>Seat No</th>
                            </tr>
                            <tr>
                                <td>  </td>
                            </tr>
                        </table>
                <?php     }
                }
                ?>
        </body>
    </html>
         <?php
    } else {
        ?>
    <h2> Log in First </h2>    


    <?php
}
?>