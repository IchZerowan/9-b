<!DOCTYPE html>
<html>
    <?php include("includes/head.html")?>
    <body>
        <?php include("includes/header.html")?>
        <?php include("includes/nav.html")?>
        <article>
            <section>
                <h2>Новости</h2>
                <br>  
                <?php
                $link = db_connect();
                $article = get_news($link); 
                ?>    
                <?php foreach($article as $a): ?>
                    <div class="article">
                        <h3><?=$a['title']?></h3>
                        <p><?=$a['content']?></p>
                    </div>
                <?php endforeach ?>
            </section>
        </article>
        <?php include("includes/footer.html")?>
    </body>
</html>