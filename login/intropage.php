<?php
    session_start();
    if(!isset($_SESSION["session_username"])):
    header("location:index.php?article=login");
    else:
?>
<?php include("includes/head.html")?>
    <body>
        <?php include("includes/header.html")?>
        <?php include("includes/nav.html")?>
            <article>
                <section>
                    <h2>Добро пожаловать, <span><?php echo $_SESSION['session_username'];?>! </span></h2>
                    <p><a href="index.php?article=logout">Выйти</a> из системы</p>
                </section>
            </article>
        <?php include("includes/footer.html")?>
    </body>         
<?php include("includes/footer.php"); ?>
<?php endif; ?>