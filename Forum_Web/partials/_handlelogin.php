<?php

$showError = "false";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include './_dbconnect.php';
    $email = $_POST['loginemail']; 
    $pass = $_POST['loginpassword'];


    $sql = "SELECT * FROM `users` WHERE user_email='$email'";
    $result = mysqli_query($conn, $sql);
    // echo var_dump($result);
    $numRows = mysqli_num_rows($result);
    if($numRows==1){
        $row = mysqli_fetch_assoc($result);
        if(password_verify($pass, $row['user_pass'])){
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $email;
            $_SESSION['sno'] = $row['sno'];
            // echo "logged in";
            header("Location: /phpt/PHP_Projects/Forum_Web/index.php?loginsuccess=true");
            exit();
        }else{
            $showError = "Password do not match";
        }

    }else{
        $showError = "No User found with this email";
    }
    header("Location: /phpt/PHP_Projects/Forum_Web/index.php?loginsuccess=false&error=$showError");
}

?>