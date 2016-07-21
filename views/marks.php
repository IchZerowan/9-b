<?php include("includes/header.html")?>
<?php include("includes/nav.html")?>
        <article>
            <section>
                <h2>Оценки ученика</h2>
<?php
    $link = db_connect();
    $marks = get_marks($link, $_GET['id']); 
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
            </section>
        </article>
<?php include("includes/footer.html")?>