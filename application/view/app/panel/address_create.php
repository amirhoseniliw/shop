<?php $this->include('app.layouts.header' ,['user' => $user, 'categories' => $categories]); 
$this->include('app.layouts.sidbor', ['user' => $user] ); ?>  

<div class="col-lg-9">
    <div class="section-title">
        <div class="section-title-title">
            <h3 class="title-font h3 main-color-three-color">ثبت<span class="main-color-one-color"> آدرس </span></h3>
        </div>
    </div>
    <div class="content-box slider-parent rounded-4">
        <div class="container-fluid">
            <!-- پیام هشدار قبل از ثبت -->
            <div id="confirmationMessage" class="alert alert-info d-none mb-3 text-center"></div>
            <form id="addressForm" action="<?php $this->url('/UserPanel/stor_addres')?>" method="post" onsubmit="return confirmBeforeSubmit();">
                <div class="row g-4">

                    <!-- عنوان -->
                    <div class="col-12">
                        <div class="comment-item mb-3 position-relative">
                            <input name="AddressText" type="text" class="form-control" id="AddressText" placeholder="عنوان آدرس را وارد کنید ..." required>
                            <label for="AddressText" class="form-label label-float fw-bold">عنوان <span class="text-danger">*</span></label>
                        </div>
                    </div>

                    <!-- استان -->
                    <div class="col-md-6">
                        <div class="comment-item mb-3 position-relative">
                            <label class="label-float fw-bold" for="provinceSelect">استان <span class="text-danger">*</span></label>
                            <select name="province_id" id="provinceSelect" class="form-select" required>
                                <option value="">در حال بارگذاری...</option>
                            </select>
                        </div>
                    </div>

                    <!-- شهر -->
                    <div class="col-md-6">
                        <div class="comment-item mb-3 position-relative">
                            <label class="label-float fw-bold" for="citySelect">شهر <span class="text-danger">*</span></label>
                            <select name="city_id" id="citySelect" class="form-select" disabled required>
                                <option value="">ابتدا استان را انتخاب کنید</option>
                            </select>
                        </div>
                    </div>

                    <!-- کد پستی -->
 <div class="col-12">
        <div class="comment-item mb-3 position-relative">
            <input 
                name="PostalCode" 
                type="text" 
                class="form-control" 
                id="PostalCode" 
                placeholder="کد پستی را وارد کنید" 
                required 
                maxlength="10" 
                inputmode="numeric"
            >
            <label for="PostalCode" class="form-label label-float fw-bold">
                کد پستی <span class="text-danger">*</span>
            </label>
            <div id="postalCodeError" class="text-danger mt-1" style="display:none;"></div>
        </div>
    </div>

 

<script>
document.getElementById('addressForm').addEventListener('submit', function(e) {
    const postalInput = document.getElementById('PostalCode');
    const errorDiv = document.getElementById('postalCodeError');
    const postalCode = postalInput.value.trim();

    // بررسی: فقط 10 رقم عددی
    if (!/^\d{10}$/.test(postalCode)) {
        e.preventDefault(); // جلوگیری از ارسال فرم
        errorDiv.textContent = 'کد پستی باید دقیقاً ۱۰ رقم عددی باشد.';
        errorDiv.style.display = 'block';
        postalInput.classList.add('is-invalid');
    } else {
        errorDiv.style.display = 'none';
        postalInput.classList.remove('is-invalid');
    }
});
</script>


                    <!-- آدرس کامل -->
                    <div class="col-12">
                        <div class="comment-item mb-3 position-relative">
                            <textarea class="form-control py-3" id="fullAddress" rows="5" name="Title" placeholder="آدرس کامل و دقیق شامل استان و شهر ..." required></textarea>
                            <label for="fullAddress" class="form-label label-float fw-bold">آدرس کامل و دقیق <span class="text-danger">*</span></label>
                        </div>
                    </div>

                    <!-- دکمه ثبت -->
                    <div class="col-12 d-flex justify-content-center gap-3 mt-4">
                        <button type="submit" class="btn main-color-one-bg px-3 py-2">ثبت آدرس</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

<script>
    window.onload = function() {
    loadProvinces();
};

async function loadProvinces() {
    const provinceSelect = document.getElementById('provinceSelect');
    const citySelect = document.getElementById('citySelect');
    provinceSelect.innerHTML = '<option value="">در حال بارگذاری...</option>';
    citySelect.innerHTML = '<option value="">ابتدا استان را انتخاب کنید</option>';
    citySelect.disabled = true;

    try {
        const response = await fetch('https://iranplacesapi.liara.run/api/provinces');
        const provinces = await response.json();

        // حذف گزینه قبلی
        provinceSelect.innerHTML = '<option value="">انتخاب استان</option>';

        provinces.forEach(province => {
            const option = document.createElement('option');
            option.value = province.id;

            // فعال بودن فقط استان «آذربایجان شرقی»
            if (province.name === 'آذربایجان شرقی') {
                option.disabled = false;
                option.textContent = province.name; // فعال
            } else {
                option.disabled = true;
                option.textContent = province.name + ' - به زودی'; // غیر فعال و کنار متن
            }

            provinceSelect.appendChild(option);
        });
    } catch (error) {
        console.error('خطا در بارگذاری استان‌ها:', error);
        provinceSelect.innerHTML = '<option value="">خطا در بارگذاری استان‌ها</option>';
    }
}
// بارگذاری استان‌ها هنگام لود صفحه
// window.onload = function() {
//     loadProvinces();
// };

// // تابع برای بارگذاری استان‌ها از API
// async function loadProvinces() {
//     const provinceSelect = document.getElementById('provinceSelect');
//     const citySelect = document.getElementById('citySelect');
//     provinceSelect.innerHTML = '<option value="">در حال بارگذاری...</option>';
//     citySelect.innerHTML = '<option value="">ابتدا استان را انتخاب کنید</option>';
//     citySelect.disabled = true;

//     try {
//         const response = await fetch('https://iranplacesapi.liara.run/api/provinces');
//         const provinces = await response.json();

//         // پاک کردن گزینه‌های قبلی و افزودن گزینه پیش‌فرض
//         provinceSelect.innerHTML = '<option value="">انتخاب استان</option>';

//         provinces.forEach(province => {
//             const option = document.createElement('option');
//             option.value = province.id;
//             option.textContent = province.name;
//             provinceSelect.appendChild(option);
//         });
//     } catch (error) {
//         console.error('خطا در بارگذاری استان‌ها:', error);
//         provinceSelect.innerHTML = '<option value="">خطا در بارگذاری استان‌ها</option>';
//     }
// }

// وقتی کاربر استان را انتخاب کرد، شهرها را بارگذاری کن
document.getElementById('provinceSelect').addEventListener('change', function() {
    const selectedProvinceId = this.value;
    loadCities(selectedProvinceId);
});

// تابع برای بارگذاری شهرها بر اساس استان
async function loadCities(provinceId) {
    const citySelect = document.getElementById('citySelect');
    if (!provinceId) {
        citySelect.innerHTML = '<option value="">ابتدا استان را انتخاب کنید</option>';
        citySelect.disabled = true;
        return;
    }
    citySelect.innerHTML = '<option value="">در حال بارگذاری...</option>';
    citySelect.disabled = true;

    try {
        const response = await fetch(`https://iranplacesapi.liara.run/api/provinces/id/${provinceId}/cities`);
        const cities = await response.json();

        citySelect.innerHTML = '<option value="">انتخاب شهر</option>';

        cities.forEach(city => {
            const option = document.createElement('option');
            option.value = city.id;
            option.textContent = city.name;
            citySelect.appendChild(option);
        });
        citySelect.disabled = false;
    } catch (error) {
        console.error('خطا در بارگذاری شهرها:', error);
        citySelect.innerHTML = '<option value="">خطا در بارگذاری شهرها</option>';
    }
}

// تابع برای نشان دادن پیام تأیید قبل از ارسال فرم
function confirmBeforeSubmit() {
    const msgDiv = document.getElementById('confirmationMessage');
    msgDiv.classList.remove('d-none', 'alert-info', 'alert-warning');
    msgDiv.classList.add('alert-warning');
    msgDiv.textContent = 'آیا مطمئن هستید که اطلاعات وارد شده صحیح است؟';

    return confirm('آیا می‌خواهید فرم را ارسال کنید؟ در صورت نداشتن مشکل، OK کنید.');
}

// تابع برای ویرایش اطلاعات
function editData() {
    alert('می‌توانید اطلاعات را ویرایش کنید و دوباره ثبت کنید.');
    // تمرکز روی اولین فیلد
    document.getElementById('AddressText').focus();
}  
   </script>
<?php $this->include('app.layouts.footer'); ?>