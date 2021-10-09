<div id="rectangle2"></div>
<div class="text-test">
    <form name="blog-edit" action="/blog/edit" method="post" enctype="multipart/form-data">
        <p>
            <b>Тема сообщения:</b>
            <br>
            <label>
                <input name="msg-theme" type="text" size="25" value="">
            </label>
        </p>
        <b>Загрузите изображение: (необязательно)</b>
        <br>
        <input type="file" id="img" name="img" accept="image/*">
        </p>
        <p>
            <b>Текст сообщения:</b>
            <br>
        </p>
        <p>
            <textarea name="msg""></textarea>
        </p>
        <p>
            <input type="submit" id="submit" value="Отправить">
            <input type="reset" value="Очистить">
        </p>
    </form>
    <?php if (!empty($blogRecords)): ?>
        <table id="table-blog" align="center">
            <tr id="table-header">
                <th>Тема сообщения</th>
                <th>Изображение</th>
                <th>Текст сообщения</th>
                <th>Дата добавления</th>
            </tr>
            <?php  foreach ($blogRecords as $blogRecord): ?>
                <tr>
                    <td>
                        <?= $blogRecord->msg_theme ?>
                    </td>
                    <td>
                        <img style="max-width: 150px" src="/public/uploads/img/<?= $blogRecord->img ?>" alt="">
                    </td>
                    <td>
                        <?= $blogRecord->msg ?>
                    </td>
                    <td>
                        <?= $blogRecord->created_at ?>
                    </td>
                </tr>
            <?php endforeach;?>
        </table>
    <?php endif; ?>
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