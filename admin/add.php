<?php
    include("check.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" href="../style.css">
        <link href="../favicon.ico" rel="shortcut icon" type="image/x-icon" />
        <title>9-Б класс СЗСШ№1</title>
    </head>
    <body>
        <header>
            <h1>Добавление статьи на страницу</h1>
                <ul id="navbarH">
                    <li><a href="../index.php?article=main">Главная</a></li>
                    <li><a href="../index.php?article=album">Альбом</a></li>
                    <li><a href="../index.php?article=news">Новости</a></li>
                    <li><a href="../index.php?article=chat">Чат</a></li>
                    <li><a href="../login/login.php">LogIn</a></li>
                    <li><a href="../admin/">Admin</a></li>
                </ul>
        </header>
        <form method="post", action="index.php?action=add">
            <label>На страницу<br>
                <select name="page">
                    <option>main</option>
                    <option>news</option>
                </select>
            </label><br>
            <label>Заголовок<br>
                <input type="text" name="title" value="" autofocus required>
            </label><br>
            <label>Содержимое<br>
                 <textarea class="textarea" name="content" required></textarea>
            </label><br>
            <label>
                 <input type="submit" value="Сохранить" class="btn" required>
            </label>
        </form>
    </body>
</html>