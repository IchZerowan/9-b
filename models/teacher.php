<?php
    function add_mark($id){
        if (isset($_POST["addmark"])) {
            if (!empty($_POST['date']) && !empty($_POST['mark']) && !empty($_POST['why'])) {
                $date = $_POST['date'];
                $mark = $_POST['mark'];
                $why = $_POST['why'];
                $link = db_connect();
                $query = mysqli_query($link, "INSERT INTO marks (student, mark, date, why) VALUES ('$id', '$mark', '$date', '$why')");
                if ($query) {
                    header("Location: index.php?teacher=success");
                } else {
                    echo "Failed to insert data information!";
                }
            } else {
                include("views/add_mark.php");
            }
        }
        
        else {
            include("views/add_mark.php");
        }
    }
?>