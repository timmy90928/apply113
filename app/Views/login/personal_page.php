<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>個人主頁</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .content-area {
            margin-top: 100px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-light bg-light fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">個人主頁</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">個人主頁選單</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <p><?php echo $name.'('.$id.')'; ?></p>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="showContent('查看個人資料')">查看個人資料</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="showContent('修改個人資料')">修改個人資料</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="showContent('修改密碼')">修改密碼</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/home/sign_up_system_mainpage" onclick="showContent('報名系統')">報名系統</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="showContent('查看報名狀態')">查看報名狀態</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/" onclick="showContent('登出')">登出</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<div class="container content-area">
    <div id="content" class="p-3">
        <p>請從右側選單選擇一個選項。</p>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function showContent(content) {
        document.getElementById('content').innerHTML = '<h4>' + content + '</h4><p>這是 ' + content + ' 的內容。</p>';
    }
</script>
</body>
</html>
