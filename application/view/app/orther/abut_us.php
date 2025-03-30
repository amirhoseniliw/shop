<?php $this->include('app.layouts.header' , compact('categories')); ?>

<!doctype html>  
<html lang="fa" dir="rtl">  

<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>درباره ما و ارتباط با ما - لوازم التحریر خیام</title>  

    <!-- لینک به Google Fonts -->  
    <link href="https://fonts.googleapis.com/css2?family=Iranian+Sans&display=swap" rel="stylesheet">  

    <style>  
        body {  
            font-family: 'Iranian Sans', sans-serif;  
            margin: 0;  
            padding: 0;  
            background-color: #f1f5f9;  
            overflow-x: hidden;  
        }  

        .header-image {  
            width: 100%;  
            height: 100vh; /* تصویر در تمام ارتفاع صفحه */  
            background-image: url('<?php echo $this->asset('/img_site/icon/img_of_abut_us.jpg') ?>'); /* آدرس تصویر بزرگ */  
            background-size: contain;  
            background-repeat: no-repeat;
            background-position: center;  
            position: relative;  
            filter: brightness(0.6); /* کاهش روشنایی تصویر */  
            display: flex;  
            align-items: center;  
            justify-content: center;  
            transition: filter 0.3s;  
        }  

        .header-image h1 {  
            color: white;  
            font-size: 48px;  
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.7);  
            margin: 0;  
            z-index: 10; /* نمایش عنوان بالای تصویر */  
        }  

        .container {  
            width: 90%;  
            max-width: 1200px;  
            margin: 0px auto 20px; /* تنظیم منفی برای جابجایی محتوایی بالا */  
            padding: 20px;  
            background-color: white;  
            border-radius: 15px;  
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);  
            opacity: 0; /* پنهان کردن محتوای اولیه */  
            transform: translateY(30px); /* جابجایی محتوای اولیه */  
            transition: opacity 0.5s ease, transform 0.5s ease; /* انیمیشن برای ظاهر شدن */  
        }  

        .container.scrolled {  
            opacity: 1; /* نمایانگر محتوای بعد از اسکرول */  
            transform: translateY(0); /* بازگرداندن به حالت اصلی */  
        }  

        h2 {  
            text-align: center;  
            color: #4A90E2;  
            margin-bottom: 20px;  
        }  

        p {  
            line-height: 1.8;  
            margin: 0;  
            padding: 0 15px;  
            font-size: 18px;  
            color: #555;  
        }  

        .contact-info {  
            padding: 20px;  
            border-top: 2px solid #4A90E2;  
            margin-top: 20px;  
        }  

        .contact-detail {  
            margin-bottom: 15px;  
            font-size: 18px;  
            color: #333;  
            transition: transform 0.2s, color 0.2s;  
        }  

        .contact-detail a {  
            color: #4A90E2;  
            text-decoration: none;  
            transition: color 0.2s;  
        }  

        .contact-detail:hover {  
            transform: scale(1.05);  
            color: #357ABD;  
        }  

        .button {  
            display: inline-block;  
            padding: 10px 20px;  
            margin: 20px 0;  
            background-color: #4A90E2;  
            color: white;  
            text-decoration: none;  
            border-radius: 5px;  
            transition: background-color 0.3s, transform 0.2s;  
        }  

        .button:hover {  
            background-color: #357ABD;  
            transform: translateY(-2px);  
        }  

        footer {  
            text-align: center;  
            margin-top: 20px;  
            font-size: 14px;  
            color: #888;  
        }  
    </style>  
</head>  

<body>  

    <div class="header-image">  
        <h1>فروشگاه لوازم التحریر خیام</h1>  
    </div>  

    <div class="container" id="about-section">  
        <h2>درباره ما</h2>  
        <p>  
            فروشگاه لوازم التحریر خیام با هدف ارائه بهترین و باکیفیت‌ترین لوازم تحریر تأسیس شده است. ما به عنوان یک مرکز معتبر در زمینه فروش نوشت‌افزار، تلاش می‌کنیم تا نیازهای مشتریان خود را برآورده سازیم.  
            از مداد و دفتر گرفته تا لوازم هنری و چسب، همه چیز را برای شما فراهم کرده‌ایم. هدف ما افزایش رضایتمندی و راحتی شما در خرید لوازم التحریر است.  
        </p>  
        
        <div class="contact-info">  
            <h2>اطلاعات تماس</h2>  
            <div class="contact-detail">آدرس:  ایران -  اذربایجان شرقی - مرند </div>  
            <div class="contact-detail">ایمیل: <a href="mailto:tahrirkhayam@gmail.com">tahrirkhayam@gmail.com</a></div>  
            <div class="contact-detail">شماره تلفن: <a href="tel:0989918694588"></a>09918694588</div>  
            <div class="contact-detail">آدرس وب‌سایت: <a href="https://tahrirkhayam.ir">tahrirkhayam.ir</a></div>  
        </div>  

        <a class="button" href="mailto:tahrirkhayam@gmail.com">پیام به ما ارسال کنید</a>  
    </div>  



    <script>  
        // فعال‌سازی انیمیشن هنگام اسکرول  
        window.addEventListener('scroll', function() {  
            const container = document.getElementById('about-section');  
            const position = container.getBoundingClientRect().top;  

            // وضعیت نمایانگر  
            const windowHeight = window.innerHeight;  

            if (position < windowHeight) {  
                container.classList.add('scrolled');  
            }  
        });  
    </script>  
</body>  
</html>  

<?php $this->include('app.layouts.footer'); ?>