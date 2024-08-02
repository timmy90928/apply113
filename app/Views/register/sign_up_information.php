<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>報名系統</title>
    <link rel="stylesheet" href="/css/sign_up_information.css">
</head>
<body>
    <div class="container">
        <h1>報名系統</h1>
        <form action="submit.php" method="POST">
            <table class="resume-table">
                <tr>
                    <td class="resume-label">姓名：</td>
                    <td><input type="text" id="name" name="name" required></td>
                </tr>
                <tr>
                    <td class="resume-label">性別：</td>
                    <td>
                        <label><input type="radio" id="gender_male" name="gender" value="male" required> 男性</label>
                        <label><input type="radio" id="gender_female" name="gender" value="female" required> 女性</label>
                    </td>
                </tr>
                <tr>
                    <td class="resume-label">身份證字號：</td>
                    <td><input type="text" id="id_number" name="id_number" required></td>
                </tr>
                <tr>
                    <td class="resume-label">地址：</td>
                    <td><input type="text" id="address" name="address" required></td>
                </tr>
                <tr>
                    <td class="resume-label">電話：</td>
                    <td><input type="tel" id="phone" name="phone" required></td>
                </tr>
                <tr>
                    <td class="resume-label">電子信箱：</td>
                    <td><input type="email" id="email" name="email" required></td>
                </tr>
                <tr>
                    <td class="resume-label">現在就讀學校：</td>
                    <td>
                        <select id="school" name="school" required>
                            <option value="" disabled selected>請選擇學校</option>
                            <option value="school1">中正大學</option>
                            <option value="school2">中央大學</option>
                            <option value="school3">中山大學</option>
                            <option value="school3">中興大學</option>
                            <option value="school3">台灣大學</option>
                            <option value="school3">清華大學</option>
                            <option value="school3">交通大學</option>
                            <option value="school3">嘉義大學</option>
                            <option value="school3">宜蘭大學</option>
                            <option value="school3">中原大學</option>
                            <option value="school3">元智大學</option>
                            <option value="school3">淡江大學</option>
                            <option value="school3">逢甲大學</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="resume-label">現在就讀科系：</td>
                    <td>
                        <select id="department" name="department" required>
                            <option value="" disabled selected>請選擇科系</option>
                            <option value="department1">電機系</option>
                            <option value="department2">資工系</option>
                            <option value="department3">醫學系</option>
                            <option value="department3">機械系</option>
                            <option value="department3">資管系</option>
                            <option value="department3">土木系</option>
                            <option value="department3">地理系</option>
                            <option value="department3">政治系</option>
                            <option value="department3">數學系</option>
                            <option value="department3">生命科學系</option>
                            <option value="department3">光電系</option>
                            <option value="department3">歷史系</option>
                            <!-- Add more options as needed -->
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="submit-row">
                        <button type="submit">提交報名並進入下一頁</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
