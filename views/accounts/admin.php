<?php include("includes/header.html");?>
<?php include("includes/nav.html");?>
        <main>
            <article>
                <h2>Добро пожаловать, <span><?php echo $_SESSION['session_username'];?>! </span></h2>
                <a class=btn href="index.php?action=logout"> Выход из аккаунта </a>
                <a class=btn href="index.php?admin=new_article"> Добавить статью </a>
                <a class=btn href="index.php?admin=status"> Статистика </a>
            </article>
        </main>
<?php include("includes/footer.html");?>