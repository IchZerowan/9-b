<?php 
    session_start();
    if (!(($_SESSION["session_username"] !== null) AND ($_SESSION["session_username"] == "Admin"))){
        ?><script>alert("Вы не Admin!");</script><?php
        header("Location: ../");
    }
    if(isset($_POST['title'])){
        require_once("../models/database.php");
        require_once("../models/articles.php");
        $link = db_connect();
        add_content($link, $_POST['page'], $_POST['title'], $_POST['content']);
    }
    include("add.html");
?>