<?php include("includes/header.html");?>
<?php include("includes/nav.html");?>
        <article>
            <section>
                <div>
                <h2 class="err">ВНИМАНИЕ!</h2>
                <h3 class="err"><?=htmlspecialchars($message);?></h3>
                <h3>Приносим извинения за неудобства</h3>
                <a class="btn", href="javascript:history.go(-1);">Вернуться</a>
                </div>
            </section>
        </article>
<?php include("includes/footer.html");