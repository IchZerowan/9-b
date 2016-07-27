<?php
if (isset($_POST["avg"])) {
    if (!empty($_POST['from']) && !empty($_POST['to'])) {
        $from = $_POST['from'];
        $to = $_POST['to'];
        $link = db_connect();
        $query = mysqli_query($link, "SELECT AVG(mark) FROM marks WHERE student=".$_GET['id']." AND 'date' BETWEEN $from AND $to");
        if ($query) {
            $row = mysqli_fetch_array($query);
            if($row[0] ==  NULL)
                $row[0] = 'Не удалось получить средний бал!';
            include("views/show_avg.php");
        } else {
            echo "Failed to get data information!";
        }
    } else {
        include("views/avg.php");
    }
} else {
    include("views/avg.php");
}
?>