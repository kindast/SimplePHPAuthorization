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
    <title>Регистрация</title>
</head>
<body>
<form action="/scripts/signup.php" method="POST"> 
        <h2>Регистрация</h2>
        <lable>Имя</lable>
        <input type="text" name="name" placeholder="Введите имя"/>
        <lable>Почта</lable>
        <input type="email" name="email" placeholder="Введите почту"/>
        <lable>Пароль</lable>
        <input type="password" name="password" placeholder="Введите пароль"/>
        <lable>Подтверждение пароля</lable>
        <input type="password" name="password_confirm" placeholder="Введите пароль ещё раз"/>
        <button type="submit">Зарегистрироваться</button>
        <p>У вас уже есть аккаунт? <a href="login.php">Войти</a></p>
        <?php
            if ($_SESSION['msg']) {
                echo '<p class="msg"> ' . $_SESSION['msg'] . ' </p>';
            }
            unset($_SESSION['msg']);
        ?>
    </form>
</body>
</html>