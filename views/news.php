<?php include("includes/head.html")?>
<?php include("includes/header.html")?>
<?php include("includes/nav.html")?>
        <article>
            <section>
                <h2>Домашние задания</h2>
<?php
    $link = db_connect();
    $article = get_news($link); 
    foreach($article as $a): 
?>
                <div class="article">
                    <hr>
                    <h3><?=$a['title']?></h3>
                    <p><?=$a['content']?></p>
                </div>
<?php endforeach ?>
            </section>
        </article>
<?php include("includes/footer.html")?>