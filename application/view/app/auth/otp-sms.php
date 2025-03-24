<?php $mass = $this->flash('not_find_user');
$captcha_number = rand(1000, 9999); // تولید یک عدد تصادفی بین 1000 و 9999  
$_SESSION['captcha'] = $captcha_number; // ذخیره عدد در SESSION 
?>
<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="<?php echo $this->asset('/img_site/icon/icon.png') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ورود و تایید حساب</title>
    <script src="https://www.google.com/recaptcha/api.js?render=your_site_key"></script> <!-- reCAPTCHA -->
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f9;
        margin: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .container {
        background-color: #fff;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 400px;
        text-align: center;
    }

    h2 {
        margin-bottom: 20px;
        font-size: 24px;
    }

    .input-field {
        width: 100%;
        padding: 12px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
        text-align: center;
    }

    .btn {
        width: 100%;
        padding: 14px;
        background-color: #4CAF50;
        color: #fff;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
    }

    .btn:hover {
        background-color: #45a049;
    }

    .btn:disabled {
        background-color: gray;
        cursor: not-allowed;
    }

    .btn_back {
        margin-top: 10px;
        width: 40%;
        padding: 14px;
        background-color: rgb(32, 12, 217);
        color: #fff;
        border: none;
        border-radius: 10px;
        font-size: 16px;
        cursor: pointer;
    }

    .btn_back:hover {
        background-color: rgb(137, 127, 220);
    }

    .span {
        color: red;
        font-size: 15px;
        float: right;
        margin-bottom: 10px;
    }

    #timer {
        margin-top: 10px;
        font-size: 16px;
        color: red;
    }

    #verification-section {
        display: none;
    }
    .code_captcha {
    font-size: 20px;
    font-weight: bold;
    text-align: center;
}

.input_code_captcha {
    width: 60%;
    height: 10%;
    border: none;
    border-bottom: 2px solid blue;
    outline: none;
    text-align: center;
    font-weight: bold;
    font-size: 20px;
    display: block;
    margin: auto;
    margin-bottom: 5PX;
}

    </style>
</head>

<body>

    <div class="container">
        <!-- فرم ورود شماره -->
        <div id="phone-section">
            <h2>وارد کردن شماره تلفن</h2>
            <form id="phone-form" method="post" action="<?php echo $this->url('/auth/send_mss'); ?>">
                <input type="tel" class="input-field" id="phone" name="phone" placeholder="شماره تلفن خود را وارد کنید"
                    required pattern="^[0-9]{11}$" maxlength="11">
                <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
                <?php if($mass != ''){ ?> <span class="span"><?= $mass ?></span><?php } ?>
                <br>
                <br>
                <!-- captcha_number -->
                <label style="font-size: 20px;" for="captcha">برای ورود به سایت عدد را وارد کنید
                </label>
                <div class="code_captcha"><?=$captcha_number?></div>

                <input type="text" id="captcha" name="captcha" class="input_code_captcha" required>
                <button type="submit" id="send-btn" class="btn">ارسال کد تایید</button>
                <div id="timer"></div>
            </form>
            <a href="<?php $this->url('/auth/login') ?>" style="text-decoration: none; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">برگشت به صفحه ورود </a>
        </div>

        <!-- فرم تایید کد -->


        <script>
        const sendButton = document.getElementById("send-btn");
        const timerElement = document.getElementById("timer");
        const phoneSection = document.getElementById("phone-section");
        const verificationSection = document.getElementById("verification-section");
        const editNumberButton = document.getElementById("edit-number-btn");

        function checkTimer() {
            let endTime = localStorage.getItem("sendCodeEndTime");
            let savedPhone = localStorage.getItem("savedPhone");

            if (endTime) {
                let now = Date.now();
                let timeLeft = Math.floor((endTime - now) / 1000);

                if (timeLeft > 0) {
                    disableButton(timeLeft);
                    if (savedPhone) {
                        document.getElementById("phone_hidden").value = savedPhone;
                        phoneSection.style.display = "none";
                        verificationSection.style.display = "block";
                    }
                }
            }
        }

        function disableButton(timeLeft) {
            sendButton.disabled = true;
            timerElement.style.display = "block";

            let interval = setInterval(() => {
                if (timeLeft <= 0) {
                    clearInterval(interval);
                    sendButton.disabled = false;
                    timerElement.style.display = "none";
                    localStorage.removeItem("sendCodeEndTime");
                } else {
                    timerElement.textContent = `لطفاً ${timeLeft} ثانیه صبر کنید...`;
                    timeLeft--;
                }
            }, 1000);
        }

        document.getElementById("phone-form").addEventListener("submit", (e) => {
            let phoneInput = document.getElementById("phone").value.trim();
            if (!/^[0-9]{11}$/.test(phoneInput)) {
                alert("لطفاً یک شماره تلفن معتبر وارد کنید.");
                e.preventDefault();
                return;
            }
            grecaptcha.ready(function() {
                grecaptcha.execute('your_site_key', {
                    action: 'submit'
                }).then(function(token) {
                    document.getElementById('g-recaptcha-response').value = token;
                    let now = Date.now();
                    let endTime = now + 120000;
                    localStorage.setItem("sendCodeEndTime", endTime);
                    localStorage.setItem("savedPhone", phoneInput);
                    disableButton(120);
                });
            });
        });

        document.getElementById("verification-form").addEventListener("submit", (e) => {
            let enteredCode = document.getElementById("verification-code").value.trim();
            if (enteredCode === "") {
                alert("کد تایید را وارد کنید.");
                e.preventDefault();
            }
        });

        editNumberButton.addEventListener("click", () => {
            localStorage.removeItem("savedPhone");
            phoneSection.style.display = "block";
            verificationSection.style.display = "none";
        });

        checkTimer();
        </script>

</body>

</html>