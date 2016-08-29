<?php
    
    function account_info(){
        if(!isset($_SESSION["session_username"])){
            header("location:index.php?action=login");
        }
        else
        {
            if($_SESSION["session_username"] == "Admin")
                include("views/accounts/admin.php");
            elseif($_SESSION["session_username"] == "burmenko")
                include("views/accounts/burmenko.php");
            else
                include("views/accounts/account.php");
        }
    }
    
    
    
    function login(){
        if(isset($_SESSION["session_username"])){
            header("Location: index.php?article=account");
        }

        if(isset($_POST["login"])){

            if(!empty($_POST['username']) && !empty($_POST['password'])) {
                $username=addslashes($_POST['username']);
                $password=addslashes($_POST['password']);
                $key = PASS_KEY;
                $link = db_connect();
                $query = mysqli_query($link, "SELECT * FROM usertbl WHERE username='$username' AND password = AES_ENCRYPT('$password', '$key')");
                $numrows=mysqli_num_rows($query);
                if($numrows!=0)
                {
                    $_SESSION['session_username']=$username;
                    header("Location: index.php?article=account");
                } else {
                    apologize("Неверное имя пользователя или пароль");
                }
            } else {
                apologize("Все поля должны быть заполнены!");
            }
        }
        
        include("views/accounts/login.php");
    }
    
    
    
    function logout(){
        session_start();
        unset($_SESSION['session_username']);
        session_destroy();
        header("location:index.php?action=login");
    }
    
    
    
    function register(){
        if (isset($_POST["register"])) {
            if (!empty($_POST['full_name']) && !empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['confirm'])) {
                $full_name = addslashes($_POST['full_name']);
                $email     = addslashes($_POST['email']);
                $username  = addslashes($_POST['username']);
                $password  = addslashes($_POST['password']);
                $confirm = addslashes($_POST['confirm']);
                if($password != $confirm)
                    apologize("Пароли не совпадают!");
                $link = db_connect();
                $query     = mysqli_query($link, "SELECT * FROM usertbl WHERE username='$username'") or die(mysql_error());
                $numrows   = mysqli_num_rows($query);
                if ($numrows == 0) {
                    $key = PASS_KEY;
                    $sql    = "INSERT INTO usertbl (full_name, email, username,password) VALUES('$full_name', '$email', '$username', AES_ENCRYPT('$password', '$key'))";
                    $link = db_connect();
                    $result = mysqli_query($link, $sql);
                    if ($result) {
                        /*require_once('includes/class.phpmailer.php');
                        $mail = new phpMailer();
                        $mail->AddReplyTo("Ih01@i.ua","9-b.orgfree.com");
                        $mail->SetFrom("Ih01@i.ua","9-b.orgfree.com");
                        $mail->AddAddress($email, $username);
                        $mail->Subject = "Добро пожаловать на сайт 10-Б";
                        $body = file_get_contents('includes/email.html');
                        $mail->MsgHTML($body);
                        $mail->Send();*/
                        header("Location: index.php?article=account");
                    } else {
                        apologize("Невозможно создать аккаунт! Повторите попытку позже или обратитесь к администратору");
                    }
                } else {
                    apologize("Имя пользователя уже занято!");
                }
            } else {
                apologize("Все поля должны быть заполнены!");
            }
        }
        
        include("views/accounts/register.php");
    }
?>