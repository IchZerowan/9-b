<?php
        function get_students($link, $class = -1) {
            if ($class == -1)
                $query = "SELECT * FROM students ORDER BY id";
            else
                $query = "SELECT * FROM students WHERE class=".$class." ORDER BY id";
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
            $marks = get_marks($link, $id);
            $sum = 0;
            $count = 0;
            foreach ($marks as $mark) {
                if($mark['date'] >= $from && $mark['date'] <= $to)
                {
                    $sum += $mark['mark'];
                    $count++;
                }
            }
            if($count == 0)
                return "Нету оценок в указанный период";
            else
                return $sum / $count;
        }
?>