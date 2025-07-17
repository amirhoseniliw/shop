<?php $discount = $codes; ?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>ویرایش کد تخفیف</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap RTL -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">

    <!-- Persian Datepicker -->
    
    <link rel="stylesheet" href="https://unpkg.com/persian-datepicker@latest/dist/css/persian-datepicker.min.css">

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- persian-date رسمی نسخه سازگار -->
  <script src="https://unpkg.com/persian-date@latest/dist/persian-date.min.js"></script>

  <!-- persian-datepicker -->
  <script src="https://unpkg.com/persian-datepicker@latest/dist/js/persian-datepicker.min.js"></script>

</head>
<body class="bg-light">

<div class="container my-5">
    <h4 class="mb-4 text-center">ویرایش کد تخفیف</h4>

    <form action="<?php $this->url('/Code_panel_admin/update/' . $discount['id']) ?>" method="POST" class="bg-white shadow rounded p-4">
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">کد تخفیف</label>
                <input type="text" name="code" class="form-control" required 
                       value="<?= htmlspecialchars($discount['code']) ?>">
            </div>
  <div class="col-md-6">
                <label class="form-label">کد توضیحات</label>
                <input type="text" name="description" class="form-control" required 
                       value="<?= htmlspecialchars($discount['description']) ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label">نوع تخفیف</label>
                <select name="discount_type" class="form-select" required>
                    <option value="percent" <?= $discount['discount_type'] == 'percent' ? 'selected' : '' ?>>درصدی</option>
                    <option value="fixed" <?= $discount['discount_type'] == 'fixed' ? 'selected' : '' ?>>مبلغ ثابت</option>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">مقدار تخفیف</label>
                <input type="number" name="discount_value" class="form-control" required 
                       value="<?= htmlspecialchars($discount['discount_value']) ?>">
            </div>

            <div class="col-md-6">
                <label class="form-label">تعداد دفعات مجاز استفاده</label>
                <input type="number" name="usage_limit" class="form-control"
                       value="<?= htmlspecialchars($discount['usage_limit']) ?>">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">تاریخ انقضا</label>

 <label for="shamsi">تاریخ (شمسی):</label>
  <input type="text" id="shamsi" class="form-control" readonly placeholder="یک تاریخ انتخاب کن">
  <input type="hidden" name="expire_date" id="miladi" value="<?= htmlspecialchars($discount['expire_date']) ?>" readonly>
            </div>

            <div class="col-md-6">
                <label class="form-label">اختصاص به کاربر خاص (اختیاری)</label>
                <input type="number" name="user_id" class="form-control"
                       value="<?= htmlspecialchars($discount['user_id']) ?>">
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">وضعیت</label>
            <select name="is_active" class="form-select">
                <option value="1" <?= $discount['is_active'] == 1 ? 'selected' : '' ?>>فعال</option>
                <option value="0" <?= $discount['is_active'] == 0 ? 'selected' : '' ?>>غیرفعال</option>
            </select>
        </div>

        <div class="text-end mt-3">
            <a href="<?php $this->url('/Code_panel_admin') ?>" class="btn btn-outline-secondary me-2">بازگشت</a>
            <button type="submit" class="btn btn-primary">ذخیره تغییرات</button>
        </div>
    </form>
</div>

<script>
function fixPersianDigits(str) {
    const persianNumbers = ['۰','۱','۲','۳','۴','۵','۶','۷','۸','۹'];
    const arabicNumbers  = ['٠','١','٢','٣','٤','٥','٦','٧','٨','٩'];
    const englishNumbers = ['0','1','2','3','4','5','6','7','8','9'];

    return str.replace(/[۰-۹٠-٩]/g, function(w) {
        let i = persianNumbers.indexOf(w);
        if (i > -1) return englishNumbers[i];
        i = arabicNumbers.indexOf(w);
        if (i > -1) return englishNumbers[i];
        return w;
    });
}

$(function () {
    $('#shamsi').persianDatepicker({
        format: 'YYYY/MM/DD',
        initialValue: false,
        autoClose: true,
        altField: '#miladi',
        altFormat: 'YYYY-MM-DD',
        altFieldFormatter: function(unix) {
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            const timeStr = `${hours}:${minutes}:${seconds}`;

            let gDate = new persianDate(unix)
                .toCalendar('gregorian')
                .format('YYYY-MM-DD');

            return fixPersianDigits(`${gDate} ${timeStr}`);
        }
    });
});
</script>



</body>
</html>

 

  
