<?php
    session_start();
    require_once "mysql.php";

    $email = htmlentities($_POST["email"]);
    $password = md5($_POST["password"]);

    $user_query = mysqli_query($connect, "SELECT * FROM users WHERE email = '$email' AND password = '$password'");
    if(mysqli_num_rows($user_query) > 0){
        $user = mysqli_fetch_assoc($user_query);

        $_SESSION["id"] = $user["id"];

        header("Location: ../index.php");
        exit;
    }
    else{
        $_SESSION["msg"] = "Неверная почта или пароль!";
        header("Location: ../login.php");
        exit;
    }
?>