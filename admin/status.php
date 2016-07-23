<?php
    require_once("../models/database.php");
    require_once("../models/articles.php");

    $link = db_connect();
    $count = get_reg($link);
?>
<b><?=$count?></b>