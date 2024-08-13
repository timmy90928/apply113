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
            </tr>
            <?php
            if (!empty($_POST['wishlist_data'])) {
                $wishlistItems = explode(';', $_POST['wishlist_data']);
                foreach ($wishlistItems as $item) {
                    list($order, $school, $department) = explode(',', $item);
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($order) . "</td>";
                    echo "<td>" . htmlspecialchars($school) . "</td>";
                    echo "<td>" . htmlspecialchars($department) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>尚未填寫任何志願</td></tr>";
            }
            echo '<tr><td colspan="3"><button onclick="window.location.href=\'/home/sign_up_system_mainpage\'">返回報名系統</button></td></tr>';
            ?>
        </table>
    </div>
</body>
</html>
