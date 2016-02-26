<?php
require_once("database.php"); 
require_once("models/articles.php");

if(isset($_GET['action'])){
    if($_GET['action'] == 'add') {
        if(!empty($_POST)) {
            $link = db_connect();
            message_add($link, $_POST['login'], $_POST['message']);
        }
        include("views/chat.php");
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
} else 
    include("views/main.php");
?>
