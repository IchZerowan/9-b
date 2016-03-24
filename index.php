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
