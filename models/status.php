<?php
    function get_count($link, $table) {
        $query = "SELECT COUNT(*) FROM ".$table.";";
        $result = mysqli_query($link, $query);
        if (!$result) 
            die(mysqli_error($link));
        $row = mysqli_fetch_array($result);
        return $row['COUNT(*)'];
    }
?>
