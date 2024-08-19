<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>志願清單</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <?= $this->include('login/offcanvas') ?>
    <link rel="stylesheet" href="/include/wishlist.css">
</head>
<body>
    <div class="container">
        <h1>已填寫的志願</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>志願序</th>
                    <th>學校</th>
                    <th>科系</th>
                </tr>
            </thead>
            <tbody>
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
                ?>
            </tbody>
        </table>
        <div class="text-center mt-3">
            <button class="btn btn-primary" onclick="window.location.href='/home/sign_up_system_mainpage'">返回報名系統</button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
