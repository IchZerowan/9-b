<?php
    Include("models/connection.php");
    if(!isset($_SESSION["session_username"])):
        header("location:index.php?action=login");
    else:
        include("views/account.php");
    endif; 
?>