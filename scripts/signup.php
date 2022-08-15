<?php
    session_start();
    require_once "mysql.php";

    $name = htmlentities($_POST["name"]);
    $email = htmlentities($_POST["email"]);
    $password = htmlentities($_POST["password"]);
    $password_confirm = htmlentities($_POST["password_confirm"]);

    if(empty($name) || empty($email) || empty($password) || empty($password_confirm)) {
        $_SESSION["msg"] = "Введены не все данные!";
        header("Location: ../register.php");
        exit;
    }
    
    if($password != $password_confirm){
        $_SESSION["msg"] = "Пароли не совпадают!";
        header("Location: ../register.php");
        exit;
    }

    $email_query = mysqli_query($connect, "SELECT * FROM `users` WHERE email = '$email'");
    if(mysqli_num_rows($email_query) > 0){
        $_SESSION["msg"] = "Аккаунт на данную почту уже зарегистрирован!";
        header("Location: ../register.php");
        exit;
    }

    $hash = md5($password);
    mysqli_query($connect, "INSERT INTO `users`(`name`, `email`, `password`) VALUES ('$name','$email','$hash')");

    $_SESSION["msg"] = "Регистрация прошла успешно!";
        header("Location: ../login.php");
        exit;
?>