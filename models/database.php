<?php
    require("constants.php");

    $con = mysql_connect(DB_SERVER,DB_USER, DB_PASS) or die(mysql_error());
	mysql_select_db(DB_NAME) or die("Cannot select DB");
    
    function db_connect() {
        $link = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME) or die("Error :".mysqli_error($link));
        if (!mysqli_set_charset($link, "utf8")) {
            printf("Error: ".mysqli_error($link));
        }
        return $link;
    }
?>