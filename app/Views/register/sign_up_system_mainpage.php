<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>報名系統 - 首頁</title>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var isBasicInfoFilled = false; // 依資料庫做判定，目前先用false為例

            var registrationProgressElement = document.getElementById('registration-progress');
            if (isBasicInfoFilled) {
                registrationProgressElement.innerHTML = '您的報名進度：已填寫基本資料，請選擇填寫志願順序。';
                var dataLink = document.createElement('a');
                dataLink.href = '/Home/store';
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
            var isWishlistFilled = false; // 依資料庫做判定，目前先用false為例

            var wishlistStatusElement = document.getElementById('wishlist-status');
            if (isWishlistFilled) {
                wishlistStatusElement.innerHTML = '您已填寫志願學校。';
            } else {
                wishlistStatusElement.innerHTML = '您尚未填寫志願學校。請 <a href="/home/sign_up_school">點擊此處填寫</a>。';
            }
        }
    </script>
</body>
</html>
