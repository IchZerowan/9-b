<?php include("includes/header.html")?>
<?php include("includes/nav.html")?>
        <article>
            <section>
                <h2>Регистрация</h2>
                <form action="index.php?action=register" id="registerform" method="post"name="registerform">
                    <p><b>Используйте латиницу!</b></p>
                    <p>
                        <label for="user_login">Полное имя<br>
                        <input class="input" id="full_name" name="full_name"size="32"  type="text" value=""></label>
                    </p>
                    <p>
                        <label for="user_pass">E-mail<br>
                        <input class="input" id="email" name="email" size="32"type="email" value=""></label>
                    </p>
                    <p>
                        <label for="user_pass">Имя пользователя<br>
                        <input class="input" id="username" name="username"size="20" type="text" value=""></label>
                    </p>
                    <p>
                        <label for="user_pass">Пароль<br>
                        <input class="input" id="password" name="password"size="32"   type="password" value=""></label>
                    </p>
                    <p><input class="btn" id="register" name= "register" type="submit" value="Зарегистрироваться"></p>
                    <p>Уже зарегистрированы? <a href= "index.php?action=login">Введите имя пользователя</a>!</p>
                </form>
            </section>
        </article>
<?php include("includes/footer.html")?>
