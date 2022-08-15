<?php
    session_start();

    if(!$_SESSION["id"])
        header("Location: login.php");
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css"/>
    <title>Главная страница</title>
</head>
<body>
    <div>
        <?php
            require_once "scripts/mysql.php";
            $query = mysqli_query($connect, "SELECT * FROM users WHERE id = " . $_SESSION["id"]);
            $query = mysqli_fetch_assoc($query);

            echo '<p class="name">' . 'Здравствуйте, ' . $query["name"] . '!</p>';
        ?>
        <a href="/scripts/logout.php">Выйти</a>
    </div>
</body>
</html>