<?php
    function get_main($link) {
        $query = "SELECT * FROM main ORDER BY id DESC";
        $result = mysqli_query($link, $query);
        if (!$result) 
            die(mysqli_error($link));
        $n = mysqli_num_rows($result);
        $articles = array();
        for ($i = 0; $i<$n; $i++) {
            $row = mysqli_fetch_assoc($result);
            $articles[] = $row;
        }
        return $articles;
    }
    
    function get_photos($link) {
        $query = "SELECT * FROM album ORDER BY id DESC";
        $result = mysqli_query($link, $query);
        if (!$result) 
            die(mysqli_error($link));
        $n = mysqli_num_rows($result);
        $articles = array();
        for ($i = 0; $i<$n; $i++) {
            $row = mysqli_fetch_assoc($result);
            $articles[] = $row;
        }
        return $articles;
    }
    
    function get_news($link) {
        $query = "SELECT * FROM news ORDER BY id DESC";
        $result = mysqli_query($link, $query);
        if (!$result) 
            die(mysqli_error($link));
        $n = mysqli_num_rows($result);
        $articles = array();
        for ($i = 0; $i<$n; $i++) {
            $row = mysqli_fetch_assoc($result);
            $articles[] = $row;
        }
        return $articles;
    }
    
    function get_messages($link) {
        $query = "SELECT * FROM messages ORDER BY id DESC";
        $result = mysqli_query($link, $query);
        if (!$result) 
            die(mysqli_error($link));
        $n = mysqli_num_rows($result);
        $articles = array();
        for ($i = 0; $i<$n; $i++) {
            $row = mysqli_fetch_assoc($result);
            $articles[] = $row;
        }
        return $articles;
    }
    
    function message_add($link, $login, $message) {
        $login = trim($login);
        $message = trim($message);
        if ($login == "")
            return false;
        $t = "INSERT INTO messages (login, message) VALUES ('%s', '%s')";
        $query = sprintf($t, mysqli_real_escape_string($link, $login), mysqli_real_escape_string($link, $message));
        $result = mysqli_query($link, $query);
        if (!$result) 
            die(mysqli_error($link));
        return true;
    }
    
    function add_content($link, $page, $title, $content) {
        $title = trim($title);
        $content = trim($content);
        if ($title == "")
            return false;
        $t = "INSERT INTO ".$page." (title, content) VALUES ('%s', '%s')";
        $query = sprintf($t, mysqli_real_escape_string($link, $title), mysqli_real_escape_string($link, $content));
        $result = mysqli_query($link, $query);
        if (!$result) 
            die(mysqli_error($link));
        return true;
    }
    
    function get_reg($link) {
        $query = "SELECT COUNT(*) FROM usertbl;";
        $result = mysqli_query($link, $query) || die(mysql_error());
        $row = mysql_fetch_array($result);
        return $row['0'];
    }
?>