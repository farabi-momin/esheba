<?php
    include("connection.php");
    session_start();
    echo "<link rel='stylesheet' href='style.css' />";
 
?>

<!DOCTYPE html>
    <head>    
    </head>

    <body>
    <ul>
        <li style="float:right"><a href="index.php">Home</a></li>
        <li style="float:right"><a href="login.html">Log in</a></li>
        <li style="float:right"><a href="logout.php">Log Out</a></li>
        <li style="float:right"><a href="register.html">Register</a></li>
        <li style="float:right"><a class="active" href="#about">About</a></li>
    </ul>
    <?php
           $name = $_SESSION['name'];
           $sql = "select station_id, station_name from station";
           $result = mysqli_query($connection, $sql);
           $result1 = mysqli_query($connection, $sql);
           
        ?>
        <h2>Welcome to Esheba</h2><br>

        <div id = "search_box">
        <form action="trains.php" method="post">
        <div>
            <label> From Station </label><br>
            <select name="fromStation" id="fromStation" class="fromStation">
            <?php if($result->num_rows >0){
                while($optionData1=$result->fetch_assoc()){
                    $option1 = $optionData1["station_name"];
                    $station_id1 = $optionData1["station_id"]; ?>

                    <option value = "<?php echo $option1 ?>"><?php echo $option1 ?></option>
            <?php    }
           } ?>
            </select>
        </div>
        <div>    
            <label> To Station </label><br>
            <select name="toStation" id="toStation" class="toStation">
            <?php if($result1->num_rows >0){
                while($optionData2=$result1->fetch_assoc()){
                    $option2 = $optionData2["station_name"];
                    $station_id2 = $optionData2["station_id"]; ?>

                    <option value = "<?php echo $option2 ?>"><?php echo $option2 ?></option> 
            <?php    }
           } ?>
            </select>
            <input type = "date" name = "date_of_journey"> 
            </select>    
        </div>    
        <input type = "submit" id = "submit-btn" value = "search" name = "submit">
        </form>
            
        </div>
        
    </body>
</html>