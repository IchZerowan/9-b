<?php

ini_set("display_errors", true);
error_reporting(E_ALL);

require_once("models/database.php"); 
require_once("models/articles.php");
require_once("models/accounts.php");
require_once("models/journal.php");
require_once("models/teacher.php");
require_once("models/functions.php");

session_start();

if(isset($_GET['action'])){
    switch ($_GET['action']) {
        case 'add_message':
            if(!empty($_POST) && isset($_SESSION['session_username'])) {
                $link = db_connect();
                message_add($link, $_SESSION['session_username'], $_POST['message']);
            }
            elseif (!isset($_SESSION['session_username'])) {
                apologize("Войдите или зарегестрируйтесь, чтобы отправлять сообщения");
            }
            apologize("Неверный запрос!");
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
            header('HTTP/1.1 404 Not Found');
            header('Status: 404 Not Found');
            apologize("Страница не найдена!");
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
            header('HTTP/1.1 404 Not Found');
            header('Status: 404 Not Found');
            apologize("Страница не найдена!"); 
            break;
    }
}

elseif (isset($_GET['admin'])) {
    if (!(isset($_SESSION["session_username"]) AND ($_SESSION["session_username"] == "Admin"))){
        apologize("Доступ запрещен!");
    }
    
    switch ($_GET['admin']) {
        case 'new_article':
            include("views/admin/new_article.php");
            break;
        
        case 'status':
            include("views/admin/status.php");
            break;
            
        default:
            header('HTTP/1.1 404 Not Found');
            header('Status: 404 Not Found');
            apologize("Страница не найдена!");
            break;
    }
} 

elseif (isset($_GET['journal'])) {
    switch ($_GET['journal']) {
        case 'student':
            if (isset($_GET['id'])){
                include("views/journal/password.php");
            } else {
                apologize("Неверный запрос!"); 
            }
            break;
        
        case 'check_password':
            if (isset($_POST['password']) && isset($_GET['id'])){
                $link = db_connect();
                if(check_password($link, $_GET['id'], $_POST['password'])){
                    $_SESSION['student_id'] = $_GET['id'];
                    header("Location: index.php?journal=marks&id=".$_GET['id']);
                } else{
                    apologize("Неверный пароль!");
                }
            } else {
                apologize("Неверный запрос!");
            }
            break;
            
        case 'marks':
            if(isset($_SESSION['student_id']) && isset($_GET['id'])){
                if($_SESSION['student_id'] == $_GET['id'])
                    include("views/journal/marks.php");
                else 
                    apologize("Доступ запрещен!");
            } else 
                apologize("Неверный запрос!");
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
                    apologize("Доступ запрещен!");
            } else 
                apologize("Неверный запрос!");
            break;
        
        default:
            header('HTTP/1.1 404 Not Found');
            header('Status: 404 Not Found');
            apologize("Страница не найдена!");
            break;
    }
}

elseif (isset($_GET['teacher'])) {
    if (!(($_SESSION["session_username"] !== null) AND ($_SESSION["session_username"] == "burmenko"))){
        apologize("Доступ запрещен!");
    }
    switch ($_GET['teacher']) {
        case 'marks':
            include("views/teacher/students.php");
            break;
        
        case 'add':
            if(isset($_GET['id'])){
                add_mark($_GET['id']);
            } else{
                apologize("Неверный запрос!");
            }
            break;
            
        case 'success':
            header("Location: index.php?teacher=marks");
            break;
        
        default:
            header('HTTP/1.1 404 Not Found');
            header('Status: 404 Not Found');
            apologize("Страница не найдена!");
            break;
    }
}

else {
    header('HTTP/1.1 404 Not Found');
    header('Status: 404 Not Found');
    apologize("Страница не найдена!");  
}

?>
