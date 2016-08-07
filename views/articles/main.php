<?php include("includes/header.html")?>
<?php include("includes/nav.html")?>
        <main>
            <article>
                <h2>Главная</h2>
<?php
    $link = db_connect();
    $article = get_main($link); 
    foreach($article as $a): 
?>
                <div>
                    <hr>
                    <h3><?=$a['title']?></h3>
                    <p><?=$a['content']?></p>
                </div>
<?php endforeach ?>
            </article>
        </main>
<?php include("includes/footer.html")?>