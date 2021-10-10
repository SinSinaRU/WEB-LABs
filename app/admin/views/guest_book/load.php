<div id="rectangle2"></div>
<div class="text-test" text-align="centered">
    <form action="/admin/guest-book/load" method="post" enctype="multipart/form-data">
        <div>
            <p>ВЫБЕРИТЕ ФАЙЛ</p>
            <input type="file" id="file" name="file"/>
        </div>
        <button id="sendBtn" type="submit" name="button">
            Отправить
        </button>
        <button id="resetBtn" type="reset" name="button">
            Очистить
        </button>
    </form>
    <br>
    <?php if (!empty($msgs)): ?>

        <table>
            <tr>
                <th>ФИО</th>
                <th>Email</th>
                <th>Текст сообщения</th>
                <th>Дата добавления</th>
            </tr>
            <?php $i = 0;
            foreach ($msgs as $msg):
                $i++;
                if ($i > 1): ?>
                    <tr>
                        <?php
                        foreach ($msg as $msgData): ?>
                            <td>
                                <?= nl2br(htmlspecialchars($msgData)) ?>
                            </td>
                        <?php endforeach; ?>
                    </tr>
                <?php endif; endforeach; ?>
        </table>
    <?php endif; ?>

    <div class="notification" id="notification">
        <?php
        if (!empty($_POST) && isset($Errors)) {
            if (count($Errors) === 0) {
                echo '<a class="notification__item notification__item_good">Данные успешно отправлены</a>';
            } else foreach ($Errors as $error) {
                echo $error;
            }
        }
        ?>
    </div>
</div>
