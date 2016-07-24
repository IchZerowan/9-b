<?php
require_once("models/database.php"); 
require_once("models/articles.php");
session_start();

if(isset($_GET['action'])){
    if($_GET['action'] == 'add') {
        if(!empty($_POST) && isset($_SESSION['session_username'])) {
            $link = db_connect();
            message_add($link, $_SESSION['session_username'], $_POST['message']);
        }
        elseif (!isset($_SESSION['session_username'])) {
            header("Location: login/login.php");
        }
        include("views/chat.php");
    } elseif ($_GET['action'] == 'add_article') {
/*        if (!(($_SESSION["session_username"] !== null) AND ($_SESSION["session_username"] == "Admin"))){
            header("Location: index.php");
        }*/
        $link = db_connect();
        add_content($link, $_POST['page'], $_POST['title'], $_POST['content']);
        header("Location: index.php?article=".$_POST['page']);
    }
}

elseif(isset($_GET['article'])){
    $article = $_GET['article'];
    if($article == 'main')
        include("views/main.php");
    elseif($article == 'album')
        include("views/album.php");
    elseif($article == 'news')
        include("views/news.php");
    elseif($article == 'chat')
        include("views/chat.php");
}

elseif (isset($_GET['admin'])) {
    if (!(($_SESSION["session_username"] !== null) AND ($_SESSION["session_username"] == "Admin"))){
        header("Location: index.php?article=main");
    }
    if($_GET['admin'] == 'new_article')
        include("views/new_article.php");
    elseif ($_GET['admin'] == 'status') 
        include("views/status.php");
} 

else 
    header("Location: index.php?article=main");
?>
