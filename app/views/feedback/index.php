<link rel="stylesheet" type="text/css" href="public/assets/css/calendar.css">
<script src="public/assets/js/Calendar.js"></script>
<div id="rectangle2"></div>
<div class="text-test">
    <div class="Contact">
        <h1>Обратная связь</h1>
        <form name="formContact" action="/feedback" method="post">
            <p>
                <b>Ваше ФИО:</b>
                <br>
                <input name="inputFIO" type="text" size="50"
                       value="<?php if (!empty($_POST["inputFIO"])) echo $_POST["inputFIO"]; ?>"">
            <p id="FIO"></p>
            <p class="error">Заполните ФИО!</p>
            <p>
                <b>Ваш пол:</b>
                <input type="radio" name="gender" value="male" checked> Мужской
                <input type="radio" name="gender" value="female"> Женский
            </p>
            <p><b>Выберите Вашу дату рождения</b></p>
            <div>
                <label">
                <input type="text" name="birthday"
                       value="<?php if (!empty($_POST["birthday"])) echo $_POST["birthday"]; ?>">
                </label>
                <div class="calendar centered">
                    <div class="exit">
                        X
                    </div>
                    <div class="main_part">
                    </div>
                </div>
                <script>
                    showCalendar();
                </script>
            </div>
            <br>
            <p>
                <b>Ваш номер телефона:</b>
                <br>
                <input name="phone" type="text" class="phonemask" size="15" maxlength="12"
                       value="<?php if (!empty($_POST["phone"])) echo $_POST["phone"]; else echo "+7" ?>">
            <p id="phone"></p>
            </p>
            <p>
                <b>Ваш Email:</b>
                <br>
                <input name="mail" type="email" size="40"
                       value="<?php if (!empty($_POST["mail"])) echo $_POST["mail"]; ?>">
            <p id="mail"></p>
            </p>
            <p>
                <b>Текст сообщения</b>
                <Br>
                <textarea name="comment" cols="40" rows="5"
                          value=""><?php if (!empty($_POST["comment"])) echo trim($_POST["comment"]); ?></textarea>
            <p id="comment"></p>
            </p>
            <p>
                <input type="submit" id="submit" value="Отправить">
                <input type="reset" value="Очистить">
            </p>
        </form>
        <div class="notification" id="notification">
            <?php
            if (isset($Errors)) {
                if (count($Errors) === 0) {
                    echo '<a class="notification__item notification__item_green">Данные успешно отправлены</a>';
                } else foreach ($Errors as $error) {
                    echo $error;
                }
            }
             ?>
        </div>
    </div>
</div>
