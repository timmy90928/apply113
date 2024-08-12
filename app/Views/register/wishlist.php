<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>志願清單</title>
    <link rel="stylesheet" href="/include/wishlist.css">
</head>
<body>
    <div class="container">
        <h1>已填寫的志願</h1>
        <table>
            <tr>
                <th>志願序</th>
                <th>學校</th>
                <th>科系</th>
                <th>填寫時間</th>
            </tr>
            <?php if (!empty($wishlist)): ?>
                <?php foreach ($wishlist as $index => $item): ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= $item['school'] ?></td>
                        <td><?= $item['department'] ?></td>
                        <td><?= $item['created_at'] ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">尚未填寫任何志願</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>
</body>
</html>