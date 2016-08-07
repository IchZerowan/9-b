<?php include("includes/header.html")?>
<?php include("includes/nav.html")?>
        <main>
            <article>
                <h2>Чат</h2>
                <form method="post", action="index.php?action=add_message">
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
    foreach($article as $a): 
?>
                <div class="article">
                    <hr>
                    <h4><?=$a['login']?></h3>
                    <p><?=$a['message']?></p>
                </div>
<?php endforeach ?>
            <article>
        <main>
<?php include("includes/footer.html")?>