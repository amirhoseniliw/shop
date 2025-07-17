                                                 <!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="<?php echo $this->asset('/img_site/icon/icon.png') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تغییر رمز عبور</title>
    <style>
        /* استایل کلی صفحه */
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f9fc;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 0 10px; /* فضای اضافی برای صفحه‌های کوچکتر */
            box-sizing: border-box;
        }

        .container {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 400px; /* فرم در صفحه‌های کوچکتر جمع می‌شود */
            box-sizing: border-box;
            animation: fadeIn 0.6s ease-in-out;
        }

        h1 {
            text-align: center;
            font-size: 1.8rem;
            color: #333;
            margin-bottom: 20px;
        }

        .input-group {
            margin-bottom: 20px;
            position: relative;
        }

        label {
            font-size: 0.95rem;
            color: #555;
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 12px 40px 12px 12px; /* فضای کافی برای آیکون سمت راست */
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            box-sizing: border-box;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        input:focus {
            border-color: #5D9CEC;
            box-shadow: 0 0 5px rgba(93, 156, 236, 0.5);
        }

        .toggle-password {
            position: absolute;
            top: 65%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
            width: 35px; /* اندازه آیکون */
            height: 30px;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #5D9CEC;
            border: none;
            border-radius: 8px;
            color: white;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }

        button:hover {
            background-color: #4a8cc2;
            transform: translateY(-2px);
        }

        .toast {
            position: fixed;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #333;
            color: white;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.5s, visibility 0.5s;
            z-index: 1000;
        }

        .toast.show {
            opacity: 1;
            visibility: visible;
        }

        .toast.error {
            background-color: #e74c3c;
        }

        .toast.success {
            background-color: #2ecc71;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>تغییر رمز عبور</h1>
        <form id="passwordForm" method="post" action="<?php $this->url('/Auth/update_password/' . $mobail) ?>">
            <!-- فیلد رمز جدید -->
            <div class="input-group">
                <label for="newPassword">رمز جدید:</label>
                <input type="password" id="newPassword" name="password" required>
                <img 
                    src="<?php echo $this->asset('/img_site/icon/eys.png') ?>" 
                    alt="نمایش رمز" 
                    class="toggle-password" 
                    onclick="togglePasswordVisibility('newPassword', this)"
                >
            </div>
            
            <!-- فیلد تکرار رمز -->
            <div class="input-group">
                <label for="confirmPassword">تکرار رمز جدید:</label>
                <input type="password" id="confirmPassword" required>
                <img 
                    src="<?php echo $this->asset('/img_site/icon/eys.png') ?>" 
                    alt="نمایش رمز" 
                    class="toggle-password" 
                    onclick="togglePasswordVisibility('confirmPassword', this)"
                >
            </div>
            
            <!-- دکمه ارسال -->
            <button type="submit" id="submitBtn">ارسال</button>
        </form>
    </div>

    <!-- Toast Notification -->
    <div class="toast" id="toast"></div>

    <script>
        function togglePasswordVisibility(id, element) {
            const input = document.getElementById(id);
            if (input.type === "password") {
                input.type = "text";
                element.src = "<?php echo $this->asset('/img_site/icon/eys.png') ?>"; // آیکون نمایش
            } else {
                input.type = "password";
                element.src = "<?php echo $this->asset('/img_site/icon/close_eys.png') ?>"; // آیکون مخفی کردن
            }
        }

        function showToast(message, type = "error") {
            const toast = document.getElementById("toast");
            toast.textContent = message;
            toast.className = `toast ${type} show`;
            setTimeout(() => {
                toast.className = "toast";
            }, 3000);
        }

        document.getElementById("passwordForm").addEventListener("submit", function(event) {
            event.preventDefault();
            const newPassword = document.getElementById("newPassword").value;
            const confirmPassword = document.getElementById("confirmPassword").value;
            const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$/;

            if (!passwordRegex.test(newPassword)) {
                showToast("رمز عبور باید حداقل 8 کاراکتر باشد و شامل عدد، حرف بزرگ و کوچک باشد.", "error");
                return;
            }
            if (newPassword !== confirmPassword) {
                showToast("رمزها با هم مطابقت ندارند.", "error");
                return;
            }

            showToast("رمز عبور با موفقیت تغییر یافت!", "success");
            setTimeout(() => this.submit(), 1500);
        });
    </script>
</body>
</html>
