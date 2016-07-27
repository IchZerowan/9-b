<?php include("includes/header.html")?>
<?php include("includes/nav.html")?>
        <article>
            <section>
                <h2>Добавление статьи</h2>
                <form method="post", action="index.php?action=add_article">
                    <label>На страницу<br>
                        <select name="page">
                            <option>main</option>
                            <option>news</option>
                        </select>
                    </label><br>
                    <label>Заголовок<br>
                        <input type="text" name="title" value="" autofocus required>
                    </label><br>
                    <label>Содержимое<br>
                        <textarea class="textarea" name="content" required></textarea>
                    </label><br>
                    <label>
                        <input type="submit" value="Сохранить" class="btn" required>
                    </label>
                </form>
            </section>
        </article>
<?php include("includes/footer.html")?>