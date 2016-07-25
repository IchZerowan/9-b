<?php
require_once("models/database.php"); 
require_once("models/articles.php");
require_once("models/accounts.php");

session_start();

if(isset($_GET['action'])){
    switch ($_GET['action']) {
        case 'add_message':
            if(!empty($_POST) && isset($_SESSION['session_username'])) {
                $link = db_connect();
                message_add($link, $_SESSION['session_username'], $_POST['message']);
            }
            elseif (!isset($_SESSION['session_username'])) {
                header("Location: index.php?action=login");
            }
            header("Location: index.php?article=chat");
            break;
        
        case 'add_article':
            $link = db_connect();
            add_content($link, $_POST['page'], $_POST['title'], $_POST['content']);
            header("Location: index.php?article=".$_POST['page']);
            break;
        
        case 'register':
            register();
            break;
        
        case 'login':
            login();
            break;
        
        case 'logout':
            logout();
            break;
    }
}

elseif(isset($_GET['article'])){
    
    switch ($_GET['article']) {
        case 'main':
            include("views/main.php");
            break;
        
        case 'album':
            include("views/album.php");
            break;
            
        case 'news':
            include("views/news.php");
            break;
            
        case 'chat':
            include("views/chat.php");
            break;
            
        case 'account':
            account_info();
            break;
    }
}

elseif (isset($_GET['admin'])) {
    if (!(($_SESSION["session_username"] !== null) AND ($_SESSION["session_username"] == "Admin"))){
        header("Location: index.php?article=main");
    }
    
    switch ($_GET['admin']) {
        case 'new_article':
            include("views/new_article.php");
            break;
        
        case 'status':
            include("views/status.php");
            break;
    }
} 

else {
    header("Location: index.php?article=main");    
}

?>
