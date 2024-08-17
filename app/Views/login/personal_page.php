<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>個人主頁</title>
    <link rel="stylesheet" href="/include/personal_page.css">
</head>
<body>
    <div class="container">
        <div class="block name">
            <p><?php echo $name.'('.$id.')'?></p>
        </div>
        <div class="block menu">
            <a href="#">修改密碼</a><br>
            <a href="#">修改個人資料</a><br>
            <a href=<?php echo '/Home/verify/forget_password?USER='.$id ?>>修改密碼</a><br>
            <a href="/">登出</a>
        </div>
        <div class="block main-options">
            <a href="/home/sign_up_system_mainpage">報名系統</a><br>
            <a href="/home/wishlist">報名狀態</a>
        </div>
    </div>
</body>
</html>