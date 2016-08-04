<?php
        function get_students($link, $class = -1) {
            if ($class == -1)
                $query = "SELECT * FROM students ORDER BY name";
            else
                $query = "SELECT * FROM students WHERE class=".$class." ORDER BY name";
            $result = mysqli_query($link, $query);
            if (!$result) 
                die(mysqli_error($link));
            $n = mysqli_num_rows($result);
            $students = array();
            for ($i = 0; $i<$n; $i++) {
                $row = mysqli_fetch_assoc($result);
                $students[] = $row;
            }
            return $students;
        }
        
        function check_password($link, $id, $password){
            $password = addslashes($password);
            $key = PASS_KEY;
            $query = mysqli_query($link, "SELECT * FROM students WHERE id = '$id' AND password = AES_ENCRYPT('$password', '$key')");
            $numrows=mysqli_num_rows($query);
            if($numrows!=0)
            {
                return true;
            }
            else {
                return false;
            }
        }
        
        function get_marks($link, $id){
            $query = mysqli_query($link, "SELECT * FROM marks WHERE student = '$id' ORDER BY date DESC");
            if (!$query) 
                die(mysqli_error($link));
            $n = mysqli_num_rows($query);
            $marks = array();
            for ($i = 0; $i<$n; $i++) {
                $row = mysqli_fetch_assoc($query);
                $marks[] = $row;
            }
            return $marks;
        }
        
        function get_average($link, $id, $from, $to){
             $query = mysqli_query($link, "SELECT AVG(mark) FROM marks WHERE student=".$_GET['id']." AND 'date' BETWEEN $from AND $to");
            if ($query) {
                $row = mysqli_fetch_array($query);
                if($row[0] ==  NULL)
                    $row[0] = 'Не удалось получить средний бал!';
                return $row[0];
            } else {
                echo "Failed to get data information!";
                return 'Не удалось получить средний бал!';
            }
        }
?>