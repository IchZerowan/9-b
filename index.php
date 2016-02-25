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
                <li><a href="?">Главная</a></li>
                <li><a href="?article=album">Альбом</a></li>
                <li><a href="?article=news">Новости</a></li>
                <li><a href="?article=chat">Чат</a></li>
            </ul>
        </heder>
        <nav>
            <ul id="navbarV">
                <li><a href="?">Главная</a></li>
                <li><a href="?article=album">Альбом</a></li>
                <li><a href="?article=news">Новости</a></li>
                <li><a href="?article=chat">Чат</a></li>
            </ul>
        </nav>
        <article>
            <?php
            if(!in_array('article', $_GET))
                include("views/main.php");
            else {
                $article = $_GET['article'];
                if($article == 'album')
                    include("views/album.php");
                elseif($article == 'news')
                    include("views/news.php");
                elseif($article == 'chat')
                    include("views/chat.php");
                }
            ?>
        </article>
        <footer>
            <i>Copyright &copy; 2016</i>
            <br>
            <b>By IMC</b>
        </footer>
    </body>
</html>