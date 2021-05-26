<link rel="stylesheet" type="text/css" href="../../../public/assets/css/calendar.css">
<script src="../../../public/assets/js/Calendar.js"></script>
<div id="rectangle2"></div>
<div class="text-test">
    <div class="Contact">
        <h1>Обратная связь</h1>
        <form name="formContact" onclick="check_forms()" onsubmit="alert('Отправка произошла успешно'); return check_submit_cont()" method="post">
            <p>
                <b>Ваше ФИО:</b>
                <br>
                <input name="inputFIO" type="text" size="50" required onchange="focusOnFIO(this)">
            <p id="FIO"></p>
            </p>
            <p>
                <b>Ваш пол:</b>
                <input type="radio" name="gender" value="male" checked> Мужской
                <input type="radio" name="gender" value="female"> Женский
            </p>
            <p><b>Выберите Вашу дату рождения</b></p>
            <div>
                <input type="text" name="birth" required>
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
                <input name="phone" type="text" class="phonemask" size="15" required maxlength="12" onchange="focusOnPhone(this)">
            <p id="phone"></p>
            </p>
            <p>
                <b>Ваш Email:</b>
                <br>
                <input name="mail" type="email" size="40" required onchange="focusOnMail(this)">
            <p id="mail"></p>
            </p>
            <p>
                <b>Текст сообщения</b>
                <Br>
                <textarea name="comment" cols="40" rows="5" required onchange="focusOnComment(this)"></textarea>
            <p id="comment"></p>
            </p>
            <p>
                <input type="submit" id="sumbit" disabled value="Отправить">
                <input type="reset" onclick="reset_color()" value="Очистить">
            </p>
        </form>
    </div>
</div>
