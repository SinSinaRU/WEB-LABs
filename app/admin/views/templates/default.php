<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> <?php echo $title; ?> </title>
    <link rel="stylesheet" type="text/css" href="/public/assets/css/main-styles.css"/>
    <script src="public/assets/js/scripts.js"></script>
    <script type="text/javascript" src="../../../../public/assets/js/cookie.js"></script>
</head>
<body>
<div>
    <header id="rectangle">
        <h class="headText">Лабораторная работа №10 «Исследование механизма сессий в PHP» Режим администратора</h>
    </header>
    <?php if ($_SESSION['isAdmin'] == 1):?>
    <nav class="menu">
        <ul>
            <br>
            <li>
                <a class="menuText" href="/admin" onclick>Меню администратора </a>
            </li>
            <br>
            <li>
                <a class="menuText" href="/admin/guest-book/load" onclick>Загрузка книги посетителей</a>
            </li>
            <br>
            <li>
                <a class="menuText" href="/admin/blog/edit" onclick>Редактор блога</a>
            </li>
            <br>
            <li>
                <a class="menuText" href="/admin/statistic" onclick>Статистика посещений</a>
            </li>
            <br>
            <li>
                <a class="menuText" href="/admin/logout" onclick>Выход</a>
            </li>
        </ul>
    </nav>
    <?php endif;?>
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