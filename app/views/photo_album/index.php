<div id="rectangle3">
    <script type="text/javascript" src="public/assets/js/Photo.js"></script>
    <?php foreach (array_combine($img,$img_title) as $image=>$title): ?>
        <img src="public/assets/img/<?php echo $image ?>.jpg" alt="<?php echo $title ?>"
             onClick="return openMyPhoto(this)" class="image">
    <?php endforeach; ?>
</div>