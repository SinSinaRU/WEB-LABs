<div id="rectangle2"></div>
<div class="text-test" text-align="centered">
    <form action="" method="post" class="contact-form">
        <div>
            <p>Логин</p>
            <input type="text" id="login" name="login" value="<?= $_POST["login"] ?? "" ?>">
        </div>

        <div>
            <p>Пароль</p>
            <input type="password" id="password" name="password" value="">
        </div>
        <button type="submit" class="main-btn">Войти</button>

    </form>
    <a href="/users/register">
        <button>Регистрация</button>
    </a>
    <div class="notification">
        <?php
        if (!empty($_POST) && isset($errors)):
            foreach ($errors as $error):
                ?>
                <div class="notification__item">
                    <?= $error; ?>
                </div>
            <?php
            endforeach;
            if (count($errors) == 0):
                ?>
                <div class="notification__item notification__item_good">
                    Вход успешно выполнен
                </div>
            <?php endif;endif; ?>
    </div>
</div>


