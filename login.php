<?php
    session_start();
    include("connection.php");

    if(isset($_POST['submit'])){
        $user_email = $_POST['email'];
        $password = $_POST['password'];



        $sql = "select * from user where user_email = '$user_email' and user_password = '$password'";
        $result = mysqli_query($connection , $sql);
        $arr = $result->fetch_array(MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        $_SESSION['name'] = $arr["user_name"];
        $_SESSION['id'] = $arr["user_id"];
        $_SESSION['email'] = $arr["user_email"];

        if($count == 1){
            header("Location:index.php");
        } else {
            echo '<script> window.location.href = "login.html"; 
                    alert("Invalid email or password") </script>';
        }
    }
?>