<div id="rectangle2"></div>
<div class="text-test">
    <?php use app\models\Blog;

    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else $page = 1;
    if ($page > 1)
        $perv_page = $page - 1;
    if ($page < $last_page)
        $next_page = $page + 1;
    $blogRecord = Blog::find($pages[$page]);
    if (!empty($blogRecord)): ?>
        <table id="table-blog" align="center">
            <tr id="table-header">
                <th>Тема сообщения</th>
                <th>Изображение</th>
                <th>Текст сообщения</th>
                <th>Дата добавления</th>
            </tr>
            <tr>
                <td>
                    <?= $blogRecord->msg_theme ?>
                </td>
                <td>
                    <img style="max-width: 150px" src="/public/uploads/img/<?= $blogRecord->img ?>" alt="">
                </td>
                <td>
                    <?= $blogRecord->msg ?>
                </td>
                <td>
                    <?= $blogRecord->created_at ?>
                </td>
            </tr>
        </table>
        <?php if ($page > 1): ?>
            <a href="/blog?page=<?= $perv_page ?>"><< Предыдущая </a>
        <?php else: ?>
            <span><< Предыдущая </span>
        <?php endif; ?>
        <?php if ($page < $last_page): ?>
            <a href="/blog?page=<?= $next_page ?>">Cледующая >></a>
        <?php else: ?>
            <span>Следующая >></span>
        <?php endif;
    endif; ?>
    <br>
    <a href="/blog?page=1">1</a>
    <a href="/blog?page=2">2</a>
    <span>...<?= $page ?>...</span>
    <a href="/blog?page=<?= $last_page - 1 ?>"><?= $last_page - 1 ?> </a>
    <a href="/blog?page=<?= $last_page ?>"><?= $last_page ?></a>
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