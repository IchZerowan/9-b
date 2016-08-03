<?php
ini_set("display_errors", true);
error_reporting(E_ALL);
require_once("models/database.php"); 
require_once("models/articles.php");
require_once("models/accounts.php");
require_once("models/journal.php");
require_once("models/teacher.php");

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
            
        default:
            header("Location: index.php?article=main");  
            break;
    }
}

elseif(isset($_GET['article'])){
    
    switch ($_GET['article']) {
        case 'main':
            include("views/articles/main.php");
            break;
        
        case 'album':
            include("views/articles/album.php");
            break;
            
        case 'news':
            include("views/articles/news.php");
            break;
            
        case 'chat':
            include("views/articles/chat.php");
            break;
            
        case 'account':
            account_info();
            break;
            
        case 'journal':
            include("views/journal/journal.php");
            break;
            
        default:
            header("Location: index.php?article=main");  
            break;
    }
}

elseif (isset($_GET['admin'])) {
    if (!(($_SESSION["session_username"] !== null) AND ($_SESSION["session_username"] == "Admin"))){
        header("Location: index.php?article=main");
    }
    
    switch ($_GET['admin']) {
        case 'new_article':
            include("views/admin/new_article.php");
            break;
        
        case 'status':
            include("views/admin/status.php");
            break;
            
        default:
            header("Location: index.php?article=main");  
            break;
    }
} 

elseif (isset($_GET['journal'])) {
    switch ($_GET['journal']) {
        case 'student':
            if (isset($_GET['id'])){
                include("views/journal/password.php");
            } else {
                header("Location: index.php?article=journal");  
            }
            break;
        
        case 'check_password':
            if (isset($_POST['password']) && isset($_GET['id'])){
                $link = db_connect();
                if(check_password($link, $_GET['id'], $_POST['password'])){
                    $_SESSION['student_id'] = $_GET['id'];
                    header("Location: index.php?journal=marks&id=".$_GET['id']);
                } else{
                    header("Location: index.php?article=journal&id=".$_GET['id']);  
                }
            } else {
                header("Location: index.php?article=journal");   
            }
            break;
            
        case 'marks':
            if(isset($_SESSION['student_id']) && isset($_GET['id'])){
                if($_SESSION['student_id'] == $_GET['id'])
                    include("views/journal/marks.php");
                else 
                    header("Location: index.php?article=journal");
            } else 
                header("Location: index.php?article=journal");
            break;
        
        case 'logout':
            unset($_SESSION['student_id']);
            header("Location: index.php?article=journal"); 
            break;
        
        case 'average':
            if(isset($_SESSION['student_id']) && isset($_GET['id'])){
                if($_SESSION['student_id'] == $_GET['id'])
                    include("models/avg.php");
                else 
                    header("Location: index.php?article=journal");
            } else 
                header("Location: index.php?article=journal");
            break;
        
        default:
            header("Location: index.php?article=journal");  
            break;
    }
}

elseif (isset($_GET['teacher'])) {
    if (!(($_SESSION["session_username"] !== null) AND ($_SESSION["session_username"] == "burmenko"))){
        header("Location: index.php?article=main");
    }
    switch ($_GET['teacher']) {
        case 'marks':
            include("views/teacher/students.php");
            break;
        
        case 'add':
            if(isset($_GET['id'])){
                add_mark($_GET['id']);
            } else{
                header("Location: index.php?article=account");
            }
            break;
            
        case 'success':
            header("Location: index.php?teacher=marks");
            break;
        
        default:
            header("Location: index.php?article=account");
            break;
    }
}

else {
    header("Location: index.php?article=main");    
}

?>
