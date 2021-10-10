<div style="width: 100vw; height: 100vh;position: fixed;">
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
        <a href="/admin/logout">
            <button>Вернуться</button>
        </a>
        <div class="notification">
            <?php if (isset($_COOKIE["redirect"]) && $_COOKIE["redirect"] == 1): setcookie("redirect", 0, time() - 3600, "/"); ?>
                <div class="notification__item">
                    Вы не авторизованы
                </div>
            <?php endif; ?>

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
</div>

