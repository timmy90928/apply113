<?php 
$WEB_NAME = '管理者頁面';
include '../app/views/header.php';
?>
<link rel="stylesheet" href="/include/styled_table.css">
<link rel="stylesheet" href="/include/common_style.css">

<div class="container">
<h1 class="title"> 所有使用者 </h1>
<table class="styled-table">
    <thead>
        <tr>
            <th>流水號</th>
            <th>身分證號碼</th>
            <th>姓名</th>
            <th>信箱</th>
        </tr>
    </thead>
    <tbody>
        <?php use function PHPUnit\Framework\stringContains;
        if(!empty($posts)){
            foreach($posts as $posts_item){
                // Get value from database.
                $id     = (string) $posts_item['ID'];
                $url    = (string) '<a href="/home/show/'.$posts_item['ID_number'].'">'.$posts_item['ID_number'].'</a>';
                $name   = (string) $posts_item['name'];
                $email  = (string) $posts_item['email'];

                // Display.
                echo '<tr>';
                echo "<td>$id</td>";
                echo "<td>$url</td>";
                echo "<td>$name</td>";
                echo "<td>$email</td>";
                echo '</tr>';
            
            }
        }?>
    </tbody>
</table>
</div>