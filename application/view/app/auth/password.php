<!DOCTYPE html>  
<html lang="fa">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>تغییر رمز عبور</title>  
    <style>  
        body {  
            font-family: Arial, sans-serif;  
            background-color: #f0f0f0;  
            display: flex;  
            justify-content: center;  
            align-items: center;  
            height: 100vh;  
            margin: 0;  
        }  

        .container {  
            background: white;  
            padding: 20px;  
            border-radius: 10px;  
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);  
            width: 300px;  
            animation: fadeIn 0.5s ease;  
        }  

        h1 {  
            text-align: center;  
            color: #333;  
        }  

        .input-group {  
            margin-bottom: 15px;  
        }  

        label {  
            display: block;  
            margin-bottom: 5px;  
        }  

        input {  
            width: 100%;  
            padding: 10px;  
            border: 1px solid #ccc;  
            border-radius: 5px;  
            transition: border-color 0.3s;  
        }  

        input:focus {  
            border-color: #5D9CEC;  
        }  

        button {  
            width: 100%;  
            padding: 10px;  
            background-color: #5D9CEC;  
            border: none;  
            border-radius: 5px;  
            color: white;  
            font-size: 16px;  
            cursor: pointer;  
            transition: background-color 0.3s;  
        }  

        button:hover {  
            background-color: #4a8cc2;  
        }  

        .error {  
            color: red;  
            font-size: 12px;  
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
        <form id="passwordForm">  
            <div class="input-group">  
                <label for="newPassword">رمز جدید:</label>  
                <input type="password" id="newPassword" required>  
            </div>  
            <div class="input-group">  
                <label for="confirmPassword">تکرار رمز جدید:</label>  
                <input type="password" id="confirmPassword" required>  
                <span class="error" id="error"></span>  
            </div>  
            <button type="submit" id="submitBtn">ارسال</button>  
        </form>  
    </div>  
    <script>  
        document.getElementById("passwordForm").addEventListener("submit", function(event) {  
            event.preventDefault();  
            
            const newPassword = document.getElementById("newPassword").value;  
            const confirmPassword = document.getElementById("confirmPassword").value;  
            const errorElement = document.getElementById("error");  

            if (newPassword === confirmPassword) {  
                // در اینجا می‌توانید کد ارسال رمز را اضافه کنید  
                alert("رمز عبور با موفقیت تغییر یافت!");  
                errorElement.textContent = '';  
            } else {  
                errorElement.textContent = 'رمزهای عبور برابر نیستند.';  
            }  
        });  
    </script>  
</body>  
</html>