<?php include("includes/header.html")?>
<?php include("includes/nav.html")?>
        <main>
            <article>
                <h2>Добавление оценки</h2>
                <form method="post", action=<?="index.php?teacher=add&id=".$id?>>
                    <label>Оценка<br>
                        <input type="number" name="mark" value="" autofocus required>
                    </label><br>
                    <label>За что<br>
                        <input type="text" name="why" value="" autofocus required>
                    </label><br>
                    <label>Дата<br>
                        <input type="date" name="date" required>
                    </label><br>
                    <label>
                        <input name="addmark" type="submit" value="Сохранить" class="btn" required>
                    </label>
                </form>
<?php
    $link = db_connect();
    $marks = get_marks($link, $id); 
    foreach($marks as $a): 
?>
                <div class="article">
                    <p>
                        <i><?=$a['date']?></i>:  
                        <b><?=$a['mark']?></b>
                        - <?=$a['why']?>
                    </p>
                </div>
<?php endforeach ?>
            </article>
        </main>
<?php include("includes/footer.html")?>