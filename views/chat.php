<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
        <title>9-Б класс СЗСШ№1</title>
    </head>
    <body>
        <heder>
            <h1>9-Б класс СЗСШ№1</h1>
            <ul id="navbarH">
                <li><a href="index.php?article=main">Главная</a></li>
                <li><a href="index.php?article=album">Альбом</a></li>
                <li><a href="index.php?article=news">Новости</a></li>
                <li><a href="index.php?article=chat">Чат</a></li>
            </ul>
        </heder>
        <nav>
            <ul id="navbarV">
                <li><a href="index.php?article=main">Главная</a></li>
                <li><a href="index.php?article=album">Альбом</a></li>
                <li><a href="index.php?article=news">Новости</a></li>
                <li><a href="index.php?article=chat">Чат</a></li>
            </ul>
        </nav>
        <article>
            <section>
                <h2>Чат</h2>
                <br>
                <form method="post", action="index.php?action=add">
                    <label>Логин<br>
                        <input type="text" name="login" value="" autofocus required>
                    </label>
                    <br>
                    <label>Сообщение<br>
                        <textarea name="message" required></textarea>
                    </label>
                    <br>
                    <label>
                        <input type="submit" value="Отправить" class="btn" required>
                    </label>
                </form>
                <?php
                    $link = db_connect();
                    $article = get_messages($link); 
                    ?> 
                <?php foreach($article as $a): ?>
                    <div class="article">
                        <hr>
                        <h4><?=$a['login']?></h3>
                        <p><?=$a['message']?></p>
                    </div>
                <?php endforeach ?>
            </section>
        </article>
        <footer>
            <hr>
            <i>Copyright &copy; 2016</i>
            <br>
            <b>By IMC</b>
        </footer>
    </body>
</html>