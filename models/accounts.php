<?php
    
    function account_info(){
        if(!isset($_SESSION["session_username"])):
            header("location:index.php?action=login");
        else:
            if($_SESSION["session_username"] == "Admin")
                include("views/accounts/admin.php");
            elseif($_SESSION["session_username"] == "burmenko")
                include("views/accounts/burmenko.php");
            else
                include("views/accounts/account.php");
        endif; 
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
                    echo  "Invalid username or password!";
                }
            } else {
                $message = "All fields are required!";
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
            if (!empty($_POST['full_name']) && !empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password'])) {
                $full_name = addslashes($_POST['full_name']);
                $email     = addslashes($_POST['email']);
                $username  = addslashes($_POST['username']);
                $password  = addslashes($_POST['password']);
                $link = db_connect();
                $query     = mysqli_query($link, "SELECT * FROM usertbl WHERE username='$username'") or die(mysql_error());
                $numrows   = mysqli_num_rows($query);
                if ($numrows == 0) {
                    $key = PASS_KEY;
                    $sql    = "INSERT INTO usertbl (full_name, email, username,password) VALUES('$full_name', '$email', '$username', AES_ENCRYPT('$password', '$key'))";
                    $link = db_connect();
                    $result = mysqli_query($link, $sql);
                    if ($result) {
                        $message = "Account Successfully Created";
                        header("Location: index.php?article=account");
                    } else {
                        $message = "Failed to insert data information!";
                    }
                } else {
                    $message = "That username already exists! Please try another one!";
                }
            } else {
                $message = "All fields are required!";
            }
        }
        if (!empty($message)) {
            echo "<p class=\"error\">" . "MESSAGE: ". $message . "</p>";
        } 
        
        include("views/accounts/register.php");
    }
?>