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
                        <a class="nav-link" href="#" onclick="showContent('使用者姓名')">使用者姓名</a>
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
                        <a class="nav-link" href="/home/personal_page/UTEwMzQ1Njc4OQ" onclick="showContent('回到個人主頁')">回到個人主頁</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/" onclick="showContent('登出')">登出</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
