<?php include("includes/header.html")?>
<?php include("includes/nav.html")?>
        <main>
            <article>
                <h2>Проверка пароля</h2>
                <form method="post" action=<?="index.php?journal=check_password&id=".$_GET['id']?>>
                    <label>Пароль<br>
                        <input type="password" name="password"size="20" value="">
                    </label> 
                    <br>
                    <label>
	                   <input type="submit" class="btn" name="login" value="Проверить">
                    </label>
                    <br>
                </form>
            </article>
        </main>
<?php include("includes/footer.html")?>