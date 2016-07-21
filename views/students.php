<?php include("includes/header.html")?>
<?php include("includes/nav.html")?>
        <article>
            <section>
                <h2>Журнал - редактирование</h2>
<?php
    $link = db_connect();
    $students = get_students($link);
    foreach($students as $a): 
?>
                <p><a href=<?="index.php?teacher=add&id=".$a['id']?>><?=$a['name']?></a></p>
<?php endforeach ?>
            </section>
        </article>
<?php include("includes/footer.html")?>