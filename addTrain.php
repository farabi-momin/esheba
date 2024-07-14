<?php
include("connection.php");

$sql1 = "select * from station where 1";
$result1 = mysqli_query($connection, $sql1);

$result2 = mysqli_query($connection, $sql1);
?>
<html>
    <head></head>

    <body>
    <form action="xyz.php" method="post">
        <div>
            <label> From Station </label><br>
            <select name="fromStation" id="fromStation" class="fromStation">
            <?php if($result1->num_rows >0){
                while($optionData1=$result1->fetch_assoc()){
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
            <?php if($result2->num_rows >0){
                while($optionData2=$result2->fetch_assoc()){
                    $option2 = $optionData2["station_name"];
                    $station_id2 = $optionData2["station_id"]; ?>

                    <option value = "<?php echo $option2 ?>"><?php echo $option2 ?></option> 
            <?php    }
           } ?>
            </select>
            <input type = "date" name = "date_of_journey"> 
            </select><br>
            <label> Train name </label>
            <input type = "text" name = "train_name" id = "train_name">
            <label> Coach Name </label>
            <input type = "text" name = "coach_name" id = "coach_name">
            <label> coach type </label>
            <input type = "text" name = "coach_type" id = "coach_type"> 
            <label> dep time </label>
            <input type = "text" name = "dep_time" id = "dep_time">   
        </div>    
        <input type = "submit" id = "submit-btn" value = "ADD" name = "submit">
        </form>
    </body>
</html>