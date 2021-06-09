<script src="public/assets/js/hobbies.js"></script>
<div>
    <div id="rectangle2"></div>
    <div class="text">
        Здесь расположены мои интересы:
        <script>
            <?php foreach ($hrefs as $href => $title):?>
            hobbies_list('<a class="textHyperSource" href="<?php echo $href?>" onclick><?php echo $title?></a>');
            <?php endforeach;?>
        </script>
        <?php foreach ($interests as $anchor => $interest):?>
           <p id="<?php echo $anchor?>">
               <?php echo $interest?>
               </a>
        <?php endforeach;?>
    </div>
</div>