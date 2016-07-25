<?php
    
    function account_info(){
        if(!isset($_SESSION["session_username"])):
            header("location:index.php?action=login");
        else:
            if($_SESSION["session_username"] == "Admin")
                include("views/admin.php");
            else
                include("views/account.php");
        endif; 
    }
    
    
    
    function login(){
        if(isset($_SESSION["session_username"])){
            header("Location: index.php?article=account");
        }

        if(isset($_POST["login"])){

            if(!empty($_POST['username']) && !empty($_POST['password'])) {
                $username=htmlspecialchars($_POST['username']);
                $password=htmlspecialchars($_POST['password']);
                $key = PASS_KEY;
                $query =mysql_query("SELECT * FROM usertbl WHERE username='$username' AND password = AES_ENCRYPT('$password', '$key')");
                $numrows=mysql_num_rows($query);
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
        
        include("views/login.php");
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
                $full_name = htmlspecialchars($_POST['full_name']);
                $email     = htmlspecialchars($_POST['email']);
                $username  = htmlspecialchars($_POST['username']);
                $password  = htmlspecialchars($_POST['password']);
                $query     = mysql_query("SELECT * FROM usertbl WHERE username='$username'") or die(mysql_error());
                $numrows   = mysql_num_rows($query);
                if ($numrows == 0) {
                    $key = PASS_KEY;
                    $sql    = "INSERT INTO usertbl (full_name, email, username,password) VALUES('$full_name', '$email', '$username', AES_ENCRYPT('$password', '$key'))";
                    $result = mysql_query($sql);
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
        
        include("views/register.php");
    }
?>