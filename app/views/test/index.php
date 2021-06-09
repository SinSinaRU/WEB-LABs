<div id="rectangle2"></div>
<div class="text-test">
    <div class="Contact">
        <form name="test" onsubmit="return check_submit()" method="post">
            <p>
                <b>Ваше ФИО:</b>
                <br>
                <label>
                    <input name ="inputFIO" type="text" size="40" value=""  required>
                </label>
            </p>
            <p>
                <b>Ваша группа:</b>
                <br>
                <label>
                    <select name="group" required style="width: 317px;">
                        <option value=""></option>
                        <optgroup label="1 Курс">
                            <option value="1">ПИ/б-20-1</option>
                            <option value="2">ИС/б-20-1</option>
                            <option value="3">ИС/б-20-2</option>
                            <option value="4">ИС/б-20-3</option>
                        </optgroup>
                        <optgroup label="2 Курс">
                            <option value="5">ПИ/б-19-1</option>
                            <option value="6">ИС/б-19-1</option>
                            <option value="7">ИС/б-19-2</option>
                            <option value="8">ИС/б-19-3</option>
                        </optgroup>
                        <optgroup label="3 Курс">
                            <option value="9">ПИ/б-18-1</option>
                            <option value="10">ИС/б-18-1</option>
                            <option value="11">ИС/б-18-2</option>
                            <option value="12">ИС/б-18-3</option>
                        </optgroup>
                        <optgroup label="4 Курс">
                            <option value="13">ПИ/б-17-1</option>
                            <option value="14">ИС/б-17-1</option>
                            <option value="15">ИС/б-17-2</option>
                            <option value="16">ИС/б-17-3</option>
                        </optgroup>
                    </select>
                </label>
            </p>
            <br>
            <p>
                <b>1.Что такое дисперсия света?</b>
                <br>
                <input type="textarea" name="quest1"  value="" required>
            </p>
            <p>
                <b>2. Какой-то вопрос</b>
                <br>
            </p>
            <p>
                <input type="checkbox" name="quest2.1"> Что-то
                <input type="checkbox" name="quest2.2"> Что-то
                <input type="checkbox" name="quest2.3"> Что-то

            </p>
            <p>
                <b>3. Какой-то вопрос</b>
                <br>
                <select name="quest3" required style="width: 317px;">
                    <option value=""></option>
                    <optgroup label="Что-то">
                        <option value="1">что-то</option>
                        <option value="2">что-то</option>
                    </optgroup>
                    <optgroup label="Что-то">
                        <option value="3">что-то</option>
                        <option value="4">что-то</option>
                    </optgroup>
                </select>
            </p>
            <p>
                <input type="submit" value="Отправить">
                <input type="reset" value="Очистить">
            </p>

        </form>
    </div>
</div>