<?php
    require("constants.php");
    
    function db_connect() {
        $link = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME) or die("Error :".mysqli_error($link));
        if (!mysqli_set_charset($link, "utf8")) {
            printf("Error: ".mysqli_error($link));
        }
        return $link;
    }
?>