<script>
        let generatedCaptcha = '';

        function generateCaptcha() {
            const canvas = document.getElementById('captchaCanvas');
            const ctx = canvas.getContext('2d');
            const characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            let captcha = '';
            
            // Clear canvas
            ctx.clearRect(0, 0, canvas.width, canvas.height);

            // Generate random verification code
            for (let i = 0; i < 6; i++) {
                captcha += characters.charAt(Math.floor(Math.random() * characters.length));
            }
            generatedCaptcha = captcha;

            // Draw verification code to canvas
            ctx.font = '24px Arial';
            ctx.textAlign = 'center';
            ctx.textBaseline = 'middle';
            ctx.fillStyle = '#333';
            ctx.fillText(captcha, canvas.width / 2, canvas.height / 2);
        }

        function validateCaptcha() {
            const userCaptcha = document.getElementById('user-captcha').value;
            if (userCaptcha === generatedCaptcha) {
                document.getElementById('result').textContent = '驗證碼正確';
                document.getElementById('result').style.color = 'green';
            } else {
                document.getElementById('result').textContent = '驗證碼錯誤，請再試一次';
                document.getElementById('result').style.color = 'red';
            }
            return false; // Prevent form submission
        }

        // Generate initial verification code
        generateCaptcha();
    </script>

<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 60%;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
            text-align: center;
        }
        .form-group {
            margin: 15px 0;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }
        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="password"] {
            width: calc(100% - 22px);
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .form-group input[type="button"],
        .form-group input[type="reset"] {
            width: 100px;
            padding: 10px;
            border: none;
            border-radius: 4px;
            color: #fff;
            cursor: pointer;
            font-size: 16px;
            margin: 5px;
        }
        .form-group input[type="submit"] {
            background-color: #006633;
        }
        .form-group input[type="submit"]:hover {
            background-color: #004d00;
        }
        .form-group input[type="reset"] {
            background-color: #cc0000;
        }
        .form-group input[type="reset"]:hover {
            background-color: #990000;
        }
    </style>