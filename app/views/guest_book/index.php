<div id="rectangle2"></div>
<div class="text-test" text-align="centered" >
    <form class="contact-form" action="/guest-book" method="post">
        <div>
            <p>ФИО</p>
            <input type="text" id="fio" name="fio" value="<?php if (!empty($_POST["fio"])) echo $_POST["fio"]; ?>"
            />
        </div>

        <div>
            <p>Email</p>
            <input id="email" type="email" name="email" data-error-text="Заполните Email"
                   value="<?php if (!empty($_POST["email"])) echo $_POST["email"]; ?>"
            />
        </div>

        <div>
            <p>Текст отзыва</p>
            <textarea name="text" id="text"><?php if (!empty($_POST["text"])) echo $_POST["text"]; ?></textarea>
        </div>

        <button id="sendBtn" type="submit" name="button">
            Отправить
        </button>
        <button id="resetBtn" type="reset" name="button">
            Очистить
        </button>
    </form>
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
</div>
