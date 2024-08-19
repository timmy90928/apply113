<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>報名系統</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <?= $this->include('login/offcanvas') ?>
    <link rel="stylesheet" href="/include/sign_up_school.css">
</head>
<body>
    <div class="container">
        <h1>報名系統</h1>
        <form action="/home/wishlist" method="POST">
            <div class="form-group">
                <label for="school">欲報名之學校：</label>
                <select id="school" name="school" required>
                    <option value="" disabled selected>請選擇學校</option>
                    <option value="CCU">中正大學</option>
                    <option value="NCU">中央大學</option>
                    <option value="NSYSU">中山大學</option>
                    <option value="NCHU">中興大學</option>
                    <option value="NTU">台灣大學</option>
                    <option value="NTHU">清華大學</option>
                    <option value="NCTU">交通大學</option>
                    <option value="NCYU">嘉義大學</option>
                    <option value="NCKU">成功大學</option>
                    <option value="CYCU">中原大學</option>
                    <option value="YZU">元智大學</option>
                    <option value="TKU">淡江大學</option>
                    <option value="FCU">逢甲大學</option>
                </select>
            </div>
            <div class="form-group">
                <label for="department">欲報名之科系：</label>
                <select id="department" name="department" required>
                    <option value="" disabled selected>請選擇科系</option>
                    <option value="EE">電機系</option>
                    <option value="CS">資工系</option>
                    <option value="Med">醫學系</option>
                    <option value="ME">機械系</option>
                    <option value="IM">資管系</option>
                    <option value="CIE">土木系</option>
                    <option value="department7">地理系</option>
                    <option value="PS">政治系</option>
                    <option value="MATH">數學系</option>
                    <option value="LS">生命科學系</option>
                    <option value="DoP">光電系</option>
                    <option value="Hist">歷史系</option>
                </select>
            </div>
            <button type="button" id="add_wishlist">新增志願</button>
            <div id="wishlist_container">
            </div>
            <input type="hidden" id="wishlist_data" name="wishlist_data">
            <button type="submit">提交報名</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script>
document.addEventListener('DOMContentLoaded', function() {
    var wishlistCount = 0;

    document.getElementById('add_wishlist').addEventListener('click', function() {
        wishlistCount++;

        var school = document.getElementById('school').options[document.getElementById('school').selectedIndex].text;
        var department = document.getElementById('department').options[document.getElementById('department').selectedIndex].text;
        var wishlistItem = document.createElement('div');
        wishlistItem.classList.add('wishlist-item');
        wishlistItem.innerHTML = '<span class="wishlist-label">志願' + wishlistCount + '</span>' +
                                '<span class="school">' + school + '</span>' +
                                '<span class="department">' + department + '</span>';
        document.getElementById('wishlist_container').appendChild(wishlistItem);
        var currentData = document.getElementById('wishlist_data').value;
        var newData = wishlistCount + ',' + school + ',' + department;
        document.getElementById('wishlist_data').value = currentData ? currentData + ';' + newData : newData;
    });
});
</script>
</body>
</html>
