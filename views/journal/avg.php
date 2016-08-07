<?php include("includes/header.html");?>
<?php include("includes/nav.html");?>
        <main>
            <article>
                <h2>Выберите период</h2>
                <form method="post", action=<?="index.php?journal=average&id=".$_GET['id']?>>
                    <label>С<br>
                        <input type="date" name="from" required>
                    </label><br>
                    <label>По<br>
                        <input type="date" name="to" required>
                    </label><br>
                    <label>
                        <input name="avg" type="submit" value="Узнать" class="btn" required>
                    </label>
                </form>
            </article>
        </main>
<?php include("includes/footer.html");?>