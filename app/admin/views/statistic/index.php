<div id="rectangle2"></div>
<div class="text-test">
    <?php if (!empty($blogRecords)): ?>
        <table id="table-blog" align="center">
            <tr id="table-header">
                <th>Время посещений</th>
                <th>IP-адрес компьютера посетителя</th>
                <th>Имя хоста компьютера посетителя</th>
                <th>Название браузера, который использовал посетитель</th>
                <th>Web-страница посещения</th>
            </tr>
            <?php foreach ($blogRecords as $blogRecord): ?>
                <tr>
                    <td>
                        <?= $blogRecord->date ?>
                    </td>
                    <td>
                        <?= $blogRecord->ip_address ?>
                    </td>
                    <td>
                        <?= $blogRecord->host_name ?>
                    </td>
                    <td>
                        <?= $blogRecord->browser_name ?>
                    </td>
                    <td>
                        <?= $blogRecord->web_page ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
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