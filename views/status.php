<?php
    require_once("models/database.php");
    require_once("models/articles.php");
    $link = db_connect();
    $usr_count = get_usr_count($link);
?>

<?php include("includes/header.html")?>
<?php include("includes/nav.html")?>
        <article>
            <section>
                <h2>Статистика</h2>
                <b>На сайте зарегестрировано <i><?=$usr_count?></i> учеников</b>
            </section>
        </article>
<?php include("includes/footer.html")?>