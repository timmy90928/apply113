<?php 
use App\Models\Post;
$model = new Post();
$ID_number = $record['ID_number'];
$user = $record['name'].'('.$ID_number.')';
include '../app/views/login/offcanvas.php';
?>
<title>個人資料</title>
<link rel="stylesheet" href="/include/common_style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<style>
    .container {
        margin: 90px auto;
    }
    .gender-options {
        display: flex !important;
        flex-wrap: nowrap;
        align-items: center;
        gap: 10px;
    }

    .gender-options label {
        display: flex;
        align-items: center;
        margin-right: 15px;
    }

    .gender-options input[type="radio"] {
        margin-right: 5px;
    }
</style>

<body>
    <div class="container">
        <h1>個人資料填寫</h1>
        <div class="notice">
            ※ 身分證與姓名已不可修改，如需修改，請重新申請帳號。
        </div>
        <form action="/Home/verify/info" method="POST">
            <table class="form-table">
                <tr>
                    <td class="form-label">身份證字號：</td>
                    <td><input type="text" id="id_number" name="id_number" value="<?php echo $record['ID_number']; ?>" readonly></td>
                </tr>
                <tr>
                    <td class="form-label">姓名：</td>
                    <td><input type="text" id="name" name="name" value="<?php echo $record['name']; ?>" readonly></td>
                </tr>
                <tr>
                    <td class="form-label">電子信箱：</td>
                    <td><input type="email" id="email" name="email" value="<?php echo $record['email']; ?>" required></td>
                </tr>
                <tr>
                    <td class="form-label">性別：</td>
                    <td class="gender-options">
                        <label><input type="radio" id="gender_male" name="gender" value="male" required> 男</label>
                        <label><input type="radio" id="gender_female" name="gender" value="female" required> 女</label>
                    </td>
                </tr>
                
                <tr>
                    <td class="form-label">地址：</td>
                    <td><input type="text" id="address" name="address"  value="<?php echo $record['address']; ?>" required></td>
                </tr>
                <tr>
                    <td class="form-label">電話：</td>
                    <td><input type="tel" id="phone" name="phone"  value="<?php echo $record['phone_number']; ?>" required></td>
                </tr>
                
                <tr>
                    <td class="form-label">現在就讀學校：</td>
                    <td>
                        <select id="school" name="school" required>
                            <option value="" disabled>請選擇學校</option>
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
                    </td>
                </tr>
                <tr>
                    <td class="form-label">現在就讀科系：</td>
                    <td>
                        <select id="department" name="department" required>
                            <option value="" disabled>請選擇科系</option>
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
                            <!-- Add more options as needed -->
                        </select>
                    </td>
                </tr>
            </table>
            <div class='center'><button type="submit">更新</button></div>
        </form>
    </div>
</body>
</html>
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        // School
        var selectschool = document.getElementById('school');
        selectschool.value = "<?php echo $record['origin_school']; ?>";
        
        // Department.
        var selectdepartment = document.getElementById('department');
        selectdepartment.value = "<?php echo $record['subject']; ?>";

        // Gender.
        var defaultGender = '<?php echo $record['gender']; ?>'; 
        var maleRadio = document.getElementById('gender_male');
        var femaleRadio = document.getElementById('gender_female');

        if (defaultGender === 'male') {
            if (maleRadio) {
                maleRadio.checked = true;
            }else if (defaultGender === 'female') {
                if (femaleRadio) {
                    femaleRadio.checked = true;
                }
            }
        };
    })
        
</script>