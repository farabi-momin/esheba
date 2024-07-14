<?php
    include("connection.php");
    session_start();

    if(isset($_POST['submit'])){
        $user_name = $_POST['name'];
        $user_email = $_POST['email'];
        $password = $_POST['password'];
        $user_id = rand();



        $sql = "insert into user(user_id, user_name, user_password, user_email) value($user_id, '$user_name', '$password', '$user_email')";
        $result = mysqli_query($connection , $sql);

        if($result){
            header("Location:login.html");
        } else {
            echo '<script> window.location.href = "register.html"; 
                    alert("Failed to create account") </script>';
        }
    }
?>