<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> <?php echo $title; ?> </title>
    <script type="text/javascript" src="/public/assets/js/jquery-3.4.1.js"></script>
    <link rel="stylesheet" type="text/css" href="/public/assets/css/main-styles.css"/>
    <script src="/public/assets/js/scripts.js"></script>
    <script type="text/javascript" src="/public/assets/js/cookie.js"></script>
</head>
<body>
<div>
    <header id="rectangle">
        <h class="headText">Лабораторная работа №10 «Исследование механизма сессий в
            PHP».<?php if(!empty($_SESSION['user'])) if ($_SESSION['user-fio'] != ''): ?> Пользователь:<?= $_SESSION['user-fio'] ?><?php endif; ?></h>
    </header>

    <nav class="menu">
        <ul>
            <br>
            <li>
                <a class="menuText" href='/'>Главная</a>
            </li>
            <br>
            <li>
                <a class="menuText" href="/about-me" onclick>Обо мне</a>
            </li>
            <br>
            <li>
                <a class="menuText" href="/#" onclick="showTab()">Мои интересы</a>
                <ul class="dropdown-content" id="mydropdown">
                    <li>
                        <a class="menuText" href="/my-interests#aboutRyanGosling" onclick>О Райане Гослинге</a>
                    </li>
                    <li>
                        <a class="menuText" href="/my-interests#aboutMusic" onclick>О музыке</a>
                    </li>
                    <li>
                        <a class="menuText" href="/my-interests#aboutCompGames" onclick>О компьютерных играх</a>
                    </li>
                </ul>
            </li>
            <br>
            <li>
                <a class="menuText" href="/study-plan" onclick>Учёба</a>
            </li>
            <br>
            <li>
                <a class="menuText" href="/photo-album" onclick>Фотоальбом</a>
            </li>
            <br>
            <li>
                <a class="menuText" href="/feedback" onclick>Контакт</a>
            </li>
            <br>
            <li>
                <a class="menuText" href="/test" onclick>Тест по дисциплине</a>
            </li>
            <br>
            <br>
            <li>
                <a class="menuText" href="/cookie-history" onclick>История</a>
            </li>
            <br>
            <li>
                <a class="menuText" href="/guest-book" onclick>Книга посетителей</a>
            </li>
            <br>
            <li>
                <a class="menuText" href="/guest-book/load" onclick>Загрузка книги посетителей</a>
            </li>
            <br>
            <li>
                <a class="menuText" href="/blog/edit" onclick>Редактор блога</a>
            </li>
            <br>
            <li>
                <a class="menuText" href="/blog" onclick>Мой блог</a>
            </li>
            <br>
            <li>
                <a class="menuText" href="/blog/load" onclick>Загрузка данных блога</a>
            </li>
            <br>

            <li>
                <?php if(!empty($_SESSION['user']) and $_SESSION['user'] != ''): ?>
                    <a class="menuText" href="/users/logout" onclick>Выход</a>
            </li>
                <?php else: ?>
                    <a class="menuText" href="/users" onclick>Вход</a>
            </li>
                <br>
            <li>
                <a class="menuText" href="/users/register" onclick>Регистрация</a>
            </li>
                <?php endif; ?>


        </ul>
    </nav>
</div>
<?php echo $content; ?>
<footer id="rectangle4">
    <h class="footText">&copy; Данилов Даниил a.k.a. Russian Ryan Gosling @ 2020</h>
    <h id="Date" class="footTextRight">
        <script>
            currentDate();
        </script>
    </h>
</footer>
</body>

</html>