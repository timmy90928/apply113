<?php 
$WEB_NAME = '用戶數據';
include '../app/views/header.php';
?>
<link rel="stylesheet" href="/include/styled_table.css">
<link rel="stylesheet" href="/include/common_style.css">
<body>
<div class="container">
<h1 class="title">用戶詳細數據</h1>
    <?php
    $posts = $posts[0];
    if (!empty($posts)) {
        echo '<table class="styled-table">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Key</th>';
        echo '<th>Value</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        foreach ($posts as $key => $value) {
            echo '<tr>';
            echo "<td>$key</td>";
            echo "<td>$value</td>";
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
    }?>
</div>
</body>
</html>