
<h4 class="article-head">Review plaatsen</h4>
<article class="article-four">
    <form method="post" action="#" class="reviewPost">
        <label><b>Titel</b></label>
        <input type="text" name="title" class="input-one">
        <br>
        <br>
        <label><b>Uw ervaring</b></label>
        <textarea name="description" class="input-one"></textarea>
        <br>
        <br>
        <br>
        <label><b>Hoeveel sterren</b></label>
        <input type="number" name="rating" class="input-one" min="1" max="5">
        <br><br>

        </select>
        <br>
        <br>
        <input type="submit" name="send" value="Verzenden">
    </form>
</article>
    <?php
    include_once ('review.php');
?>

