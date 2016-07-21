<?php include("includes/header.html");?>
<?php include("includes/nav.html");?>
        <article>
            <section>
                <h2>Добро пожаловать, <span><?php echo $_SESSION['session_username'];?>! </span></h2>
                <a class=btn href="index.php?action=logout"> Выход из аккаунта </a>
                <a class=btn href="index.php?teacher=marks"> Выставить оценки </a>
            </section>
        </article>
<?php include("includes/footer.html");?>