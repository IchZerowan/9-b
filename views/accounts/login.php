<?php include("includes/header.html")?>
<?php include("includes/nav.html")?>
        <main>
            <article>
                <h2>Вход</h2>
                <form method="post" action="index.php?action=login">
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
	                Еще не зарегистрированы?<a href="index.php?action=register">Регистрация</a>!
                </article>
            </main>
        </aricle>
<?php include("includes/footer.html")?>