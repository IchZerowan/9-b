<?php include("includes/header.html")?>
<?php include("includes/nav.html")?>
        <main>
            <article>
            <h2>Альбом</h2>   
<?php
    $link = db_connect();
    $article = get_photos($link);
    foreach($article as $a):
?>
                <div class="photo">
                    <a href='<?="album/".$a['name']?>'><img src=<?="album/".$a['name']?>></a>
                    <br>
                    <p><?=$a['name']?></p>
                </div>
<?php endforeach ?>
            </article>
        </main>
<?php include("includes/footer.html")?>