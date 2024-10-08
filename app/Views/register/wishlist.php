<?php 
use App\Models\Post;
$model = new Post();
$ID_number = $record['ID_number'];
$user = $record['name'].'('.$ID_number.')';
include '../app/views/login/offcanvas.php';
?>
<title>志願清單</title>
<link rel="stylesheet" href="/include/styled_table.css">
<link rel="stylesheet" href="/include/common_style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container" style="margin: 100px auto">
    <h1 class="title"> 已填寫的志願 </h1>
    <table class="styled-table">
        <thead>
            <tr>
                <th>志願序</th>
                <th>學校</th>
                <th>科系</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($record['choices'])) {
                $wishlistItems = explode(';', $record['choices']);
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
        <button class="btn btn-primary" onclick="window.location.href='/home/sign_up_system_mainpage/<?php echo $record['ID_number'];?>'">返回報名系統</button>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</html>
