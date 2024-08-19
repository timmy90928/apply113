<?php 
use App\Models\Post;
$model = new Post();
$ID_number = 'Q123456789';
?>

<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>報名系統 - 首頁</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <?= $this->include('login/offcanvas') ?>
    <link rel="stylesheet" href="/include/sign_up_system_mainpage.css">
</head>
<body>
    <div class="container">
        <h1>報名系統首頁</h1>

        <div class="status-table">
            <h2>報名狀態與資料表</h2>
            <p id="registration-progress">正在檢查報名狀態...</p>
        </div>

        <div class="wishlist-section">
            <h2>填寫志願學校</h2>
            <p id="wishlist-status">正在檢查填寫狀態...</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var isBasicInfoFilled = "<?php echo $model->isNameEmptyForIdNumber($ID_number);?>";

            var registrationProgressElement = document.getElementById('registration-progress');
            if (isBasicInfoFilled) {
                registrationProgressElement.innerHTML = '您的報名進度：已填寫基本資料，請選擇填寫志願順序。';
                var dataLink = document.createElement('a');
                dataLink.href = "<?php echo '/home/show/'.$ID_number;?>"; 
                dataLink.textContent = '查看資料表';
                registrationProgressElement.appendChild(document.createElement('br'));
                registrationProgressElement.appendChild(dataLink);
                checkWishlistStatus();
            } else {
                registrationProgressElement.innerHTML = '您的報名進度：尚未填寫基本資料。請先<a href="/home/sign_up_information">填寫基本資料</a>。';
                var wishlistStatusElement = document.getElementById('wishlist-status');
                wishlistStatusElement.innerHTML = '請先完成資料表填寫。';
            }
        });

        function checkWishlistStatus() {
            var isWishlistFilled = false;

            var wishlistStatusElement = document.getElementById('wishlist-status');
            if (isWishlistFilled) {
                wishlistStatusElement.innerHTML = '您已填寫志願學校。請 <a href="/home/wishlist">點擊此處查看</a>。';
            } else {
                wishlistStatusElement.innerHTML = '您尚未填寫志願學校。請 <a href="/home/sign_up_school">點擊此處填寫</a>。';
            }
        }
    </script>
</body>
</html>
