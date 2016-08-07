<?php include("includes/header.html");?>
<?php include("includes/nav.html");?>
        <main>
            <article>
                <h2>Добро пожаловать, <span><?php echo $_SESSION['session_username'];?>! </span></h2>
                <a class=btn href="index.php?action=logout"> Выход из аккаунта </a>
                <a class=btn href="index.php?teacher=marks"> Выставить оценки </a>
            </article>
        </main>
<?php include("includes/footer.html");?>