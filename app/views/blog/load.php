<div id="rectangle2"></div>
<div class="text-test">
    <form name="blog" action="/blog/load" method="post" enctype="multipart/form-data">
        <b>Загрузите файл:</b>
        <br>
        <input type="file" id="csv" name="csv-file">
        <p>
            <input type="submit" id="submit" value="Отправить">
            <input type="reset" value="Очистить">
        </p>
    </form>
    <div class="notification" id="notification">
        <?php
        if (isset($Errors)) {
            if (count($Errors) === 0) {
                echo '<a class="notification__item notification__item_good">Данные успешно отправлены</a>';
            } else foreach ($Errors as $error) {
                echo $error;
            }
        }
        ?>
    </div>
</div>