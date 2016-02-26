<!DOCTYPE html>
	<html lang="en">
	<?php include("includes/head.html")?>
    <body>
        <?php include("includes/header.html")?>
        <?php include("includes/nav.html")?>
        <article>
            <sextion>
                <h2>Вход</h2>
                <form method="post" action="index.php?article=intropage">
                    <label>Имя пользователя<br>
                        <input type="text" name="username"size="20" value="">
                    </label>
                    <br>
                    <label>Пароль<br>
                        <input type="password" name="password"size="20" value="">
                    </label> 
                    <br>
                    <label>
	                   <input type="submit" class="btn" name="login" value="Log In">
                    </label>
                    <br>
	                Еще не зарегистрированы?<a href="index.php?article=register">Регистрация</a>!
                </form>
            </section>
        </aricle>
        <?php include("includes/footer.html")?>
    </body>
</html>