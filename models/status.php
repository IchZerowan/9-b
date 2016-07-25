<?php
    function get_usr_count($link) {
        $query = "SELECT COUNT(*) FROM usertbl;";
        $result = mysqli_query($link, $query);
        if (!$result) 
            die(mysqli_error($link));
        $row = mysqli_fetch_array($result);
        return $row['COUNT(*)'];
    }
?>
