<?php

use app\models\Users;

?>
<div id="rectangle2"></div>
<div class="text-test" text-align="centered">
    <form action="" name="register" method="post" class="contact-form" >
        <div>
            <p>ФИО</p>
            <input type="text" id="inputFIO" name="inputFIO" value="<?= $_POST["inputFIO"] ?? "" ?>">
        </div>

        <div>
            <p>Email</p>
            <input type="email" id="email" name="email" value="<?= $_POST["email"] ?? "" ?>">
        </div>
        <div>
            <p>Логин</p>
            <input type="text" id="login" name="login" onblur="fetchRequest()" value="<?= $_POST["login"] ?? "" ?>">
        </div>

        <div>
            <p>Пароль</p>
            <input type="password" id="password" name="password" value="">
        </div>
        <button type="submit" class="main-btn">Зарегистрироваться</button>
    </form>
    <div class="notification">
            <div class="notification__item" id="login_used"> Пользователь с таким логином сущевстует </div>
        <?php
        if (!empty($_POST) && isset($Errors)):
            foreach ($Errors as $Error):
                ?>
                <div class="notification__item">
                    <?= $Error; ?>
                </div>
            <?php
            endforeach;
            if (count($Errors) == 0):
                ?>
                <div class="notification__item notification__item_good">
                    Регистрация прошла успешно
                </div>
            <?php endif;endif; ?>
    </div>
</div>


