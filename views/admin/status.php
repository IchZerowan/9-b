<?php include("includes/header.html")?>
<?php include("includes/nav.html")?>
        <article>
            <section>
                <h2>Статистика</h2>
<?php 
    include("models/status.php");
    $link = db_connect();
?>
                <p>На сайте зарегестрировано <i><?=get_count($link, 'usertbl')?></i> учеников;</p>
                <p>Выложено <i><?=get_count($link, 'main') + get_count($link, 'news')?></i> статей;</p>
                <p>Отправлено <i><?=get_count($link, 'messages')?></i> сообщений;</p>
                <p>Выложено <i><?=get_count($link, 'album')?></i> фотографий</p>
            </section>
        </article>
<?php include("includes/footer.html")?>