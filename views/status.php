<?php include("includes/header.html")?>
<?php include("includes/nav.html")?>
        <article>
            <section>
                <h2>Статистика</h2>
                <?php 
                    include("models/status.php");
                    $link = db_connect();
                ?>
                <b>На сайте зарегестрировано <i><?=get_usr_count($link)?></i> учеников</b>
            </section>
        </article>
<?php include("includes/footer.html")?>