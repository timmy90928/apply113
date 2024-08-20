<?php 
// use App\Models\Post;
// $model = new Post();
// $ID_number = $record['ID_number'];
// $user = $record['name'].'('.$ID_number.')';
// include '../app/views/login/offcanvas.php';
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<style>
    .nav-item {
        display: flex;
        justify-content: center; /* 水平居中 */
        margin-bottom: 20px;
    }

    .user-name {
        font-weight: bold; /* 粗體字 */
        color: #007bff; /* 藍色文字 */
        font-size: 1.1em; /* 增大字體 */
        background-color: #e9ecef; /* 背景顏色 */
        padding: 0.5em 1em; /* 內邊距 */
        border-radius: 0.5em; /* 圓角邊框 */
        border: 1px solid #007bff; /* 藍色邊框 */
        text-align: center; /* 文字居中 */
        
    }
    .nav-link:hover{
        background-color: #e9ecef; /* 懸停時背景顏色 */
        color: #fff;               /* 懸停時文字顏色 */
        /* cursor: pointer;            */
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // ID number.
        var ID_number = document.getElementById('ID_number');
        ID_number.value = "<?php echo $record['ID_number']?>";
    })
    function ToForgetPassword() {
        var userValue = document.getElementById('ID_number').value;
        window.location.href = '/Home/verify/forget_password?USER=' + encodeURIComponent(userValue);
    }
    function ToSignupInfo() {
        var userValue = document.getElementById('ID_number').value;
        window.location.href = '/home/sign_up_information/'+ encodeURIComponent(userValue);
    }
    function ToApplySystem() {
        var userValue = document.getElementById('ID_number').value;
        window.location.href = '/home/sign_up_system_mainpage/' + encodeURIComponent(userValue);
    }
    function Logout() {
        window.location.href = '/';
    }
</script>
<input type="hidden" id="ID_number" name="ID_number">
<nav class="navbar navbar-light bg-light fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">報名系統</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">報名系統選單</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link"> 
                            <span class="user-name"><?php echo htmlspecialchars($user); ?></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" onclick="ToForgetPassword()">修改密碼</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" onclick="ToApplySystem()">報名系統</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" onclick="ToSignupInfo()">基本資料</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" onclick="Logout()">登出</button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
