<!DOCTYPE html>
<html>
    <?php include("includes/head.html")?>
    <body>
        <?php include("includes/header.html")?>
        <?php include("includes/nav.html")?>
        <article>
            <section>
                <h2>Чат</h2>
                <br>
                <form method="post", action="index.php?action=add">
                    <label>Сообщение<br>
                        <textarea name="message" class="textarea"required></textarea>
                    </label>
                    <br>
                    <label>
                        <input type="submit" value="Отправить" class="btn" required>
                    </label>
                </form>
                <?php
                    $link = db_connect();
                    $article = get_messages($link); 
                    ?> 
                <?php foreach($article as $a): ?>
                    <div class="article">
                        <hr>
                        <h4><?=$a['login']?></h3>
                        <p><?=$a['message']?></p>
                    </div>
                <?php endforeach ?>
            </section>
        </article>
        <?php include("includes/footer.html")?>
    </body>
</html>