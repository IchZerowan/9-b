<?php
    Include("models/connection.php");
	
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
?>