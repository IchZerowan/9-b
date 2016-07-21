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
            $key = PASS_KEY;
            $query = mysql_query("SELECT * FROM students WHERE id = '$id' AND password = AES_ENCRYPT('$password', '$key')");
            $numrows=mysql_num_rows($query);
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
?>