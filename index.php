<?php
require_once("models/database.php"); 
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
    elseif($article == 'login')
        include("login/login.php");
    elseif($article == 'register')
        include("login/register.php");
    elseif($article == 'logout')
        include("login/logout.php");
    elseif($article == 'intropage')
        include("login/intropage.php");
} else 
    include("views/main.php");
?>
