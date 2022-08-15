<?php
    session_start();

    if($_SESSION["id"])
        header("Location: index.php");
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css"/>
    <title>Авторизация</title>
</head>
<body>
    <form action="/scripts/signin.php" method="POST"> 
        <h2>Авторизация</h2>
        <lable>Почта</lable>
        <input type="email" name="email" placeholder="Введите почту"/>
        <lable>Пароль</lable>
        <input type="password" name="password" placeholder="Введите пароль"/>
        <button type="submit">Войти</button>
        <p>У вас нет аккаунта? <a href="register.php">Зарегистрироваться</a></p>
        <?php
            if ($_SESSION['msg']) {
                echo '<p class="msg"> ' . $_SESSION['msg'] . ' </p>';
            }
            unset($_SESSION['msg']);
        ?>
    </form>
</body>
</html>