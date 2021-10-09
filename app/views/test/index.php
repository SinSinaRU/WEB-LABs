<div id="rectangle2"></div>
<div class="text-test">
    <div class="Contact">
        <form name="test" action="/test" method="post">
            <p>
                <b>Ваше ФИО:</b>
                <br>
                <label>
                    <input name ="inputFIO" type="text" size="40" value=""  >
                </label>
            </p>
            <p>
                <b>Ваша группа:</b>
                <br>
                <label>
                    <select name="group"  style="width: 317px;">
                        <option value=""></option>
                        <optgroup label="1 Курс">
                            <option value="ПИ/б-20-1">ПИ/б-20-1</option>
                            <option value="ИС/б-20-1">ИС/б-20-1</option>
                            <option value="ИС/б-20-2">ИС/б-20-2</option>
                            <option value="ИС/б-20-3">ИС/б-20-3</option>
                        </optgroup>
                        <optgroup label="2 Курс">
                            <option value="ПИ/б-19-1">ПИ/б-19-1</option>
                            <option value="ИС/б-19-1">ИС/б-19-1</option>
                            <option value="ИС/б-19-2">ИС/б-19-2</option>
                            <option value="ИС/б-19-3">ИС/б-19-3</option>
                        </optgroup>
                        <optgroup label="3 Курс">
                            <option value="ПИ/б-18-1">ПИ/б-18-1</option>
                            <option value="ИС/б-18-1">ИС/б-18-1</option>
                            <option value="ИС/б-18-2">ИС/б-18-2</option>
                            <option value="ИС/б-18-3">ИС/б-18-3</option>
                        </optgroup>
                        <optgroup label="4 Курс">
                            <option value="ПИ/б-17-1">ПИ/б-17-1</option>
                            <option value="ИС/б-17-1">ИС/б-17-1</option>
                            <option value="ИС/б-17-2">ИС/б-17-2</option>
                            <option value="ИС/б-17-3">ИС/б-17-3</option>
                        </optgroup>
                    </select>
                </label>
            </p>
            <br>
            <p>
                <b>1.Что такое дисперсия света? (правильный ответ: ответ)</b>
                <br>
                <input type="textarea" name="quest1"  value="" >
            </p>
            <p>
                <b>2. Какой-то вопрос</b>
                <br>
            </p>
            <p>
                <input type="hidden" name="quest2" value="0">
                <input type="checkbox" name="quest2[]" value="false"> Что-то
                <input type="checkbox" name="quest2[]" value="true1"> Правильный ответ
                <input type="checkbox" name="quest2[]" value="true2"> Правильный ответ

            </p>
            <p>
                <b>3. Какой-то вопрос</b>
                <br>
                <select name="quest3"  style="width: 317px;">
                    <option value=""></option>
                    <optgroup label="Что-то">
                        <option value="1">что-то</option>
                        <option value="2">что-то</option>
                        <option value="true">Правильный ответ</option>
                        <option value="4">что-то</option>
                    </optgroup>
                </select>
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
                    echo '<a class="notification__item notification__item_good">Данные успешно отправлены</a>';
                } else foreach ($Errors as $error) {
                    echo $error;
                }
            }
            ?>
        </div>
    </div>
</div>