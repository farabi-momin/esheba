<?php
    include("connection.php");

    if(isset($_POST['submit'])){
        $station1ID = $_POST['fromStation'];
        $station2ID = $_POST['toStation'];
        $trainName = $_POST['train_name'];
        $coachName = $_POST['coach_name'];
        $coachType = $_POST['coach_type'];
        $DOJ = $_POST['date_of_journey'];
        $depTime = $_POST['dep_time'];

        $trainID = rand();
        $coachID = rand();

        echo $coachID;

        $tsql = "INSERT INTO `train` (`train_id`, `train_name`, `max_capacity`, `start_station`, `des_station`, `dep_time`) VALUES ($trainID, '$trainName', 200, '$station1ID', '$station2ID', '$depTime')";
        $tresult = mysqli_query($connection, $tsql);

        $csql = "INSERT INTO `coach` (`coach_id`, `coach_name`, `coach_type`, `train_id`, `max_capacity`) VALUES ($coachID, '$coachName', '$coachType', '$trainID', 50)";
        $cresult = mysqli_query($connection, $csql);
        
        for($x = 1; $x <= 50; $x++){
            $seatID = rand();

            $ssql = "INSERT INTO `seat` (`seat_id`, `seat_no`, `coach_id`, `train_id`, `avaiability`, `date_of_journey`) VALUES ($seatID, $x, $coachID, $trainID, 'yes', '$DOJ')";
            $result = mysqli_query($connection, $ssql);
        }

        header("Location:addTrain.php");
    }
?>