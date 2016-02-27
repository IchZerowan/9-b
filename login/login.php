<?php
    Include("connection.php");  
	session_start();
	?>

	<?php require_once("../models/database.php"); ?> 
	<?php
	
	if(isset($_SESSION["session_username"])){
	header("Location: intropage.php");
	}

	if(isset($_POST["login"])){

	if(!empty($_POST['username']) && !empty($_POST['password'])) {
	$username=htmlspecialchars($_POST['username']);
	$password=htmlspecialchars($_POST['password']);
	$query =mysql_query("SELECT * FROM usertbl WHEREusername='".$username."' AND password='".$password."'");
	$numrows=mysql_num_rows($query);
	if($numrows!=0)
 {
while($row=mysql_fetch_assoc($query))
 {
	$dbusername=$row['username'];
  $dbpassword=$row['password'];
 }
  if($username == $dbusername && $password == $dbpassword)
 {
	 $_SESSION['session_username']=$username;
   header("Location: intropage.php");
	}
	} else {
	echo  "Invalid username or password!";
 }
	} else {
    $message = "All fields are required!";
	}
	}
?>
<!DOCTYPE html>
	<html lang="en">
    <?php include("includes/head.html")?>
    <body>
        <?php include("includes/nav.html")?>
        <article>
            <sextion>
                <h2>Вход</h2>
                <form method="post" action="intropage.php">
                    <label>Имя пользователя<br>
                        <input type="text" name="username"size="20" value="">
                    </label>
                    <br>
                    <label>Пароль<br>
                        <input type="password" name="password"size="20" value="">
                    </label> 
                    <br>
                    <label>
	                   <input type="submit" class="btn" name="login"">
                    </label>
                    <br>
	                Еще не зарегистрированы?<a href="register.php">Регистрация</a>!
                </form>
            </section>
        </aricle>
        <?php include("../includes/footer.html")?>
    </body>
</html>