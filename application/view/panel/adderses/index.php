<!DOCTYPE html>
<html lang="fa">
<head>
  <meta charset="UTF-8">
  <title>لیست شهرهای استان</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet">

  <style>
    body {
      font-family: "Vazirmatn", sans-serif;
      background: #f4f6f9;
      direction: rtl;
      padding: 50px;
    }

    .container {
      max-width: 800px;
      margin: auto;
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 6px 12px rgba(0,0,0,0.1);
      padding: 30px 40px;
    }

    h2 {
      text-align: center;
      color: #333;
    }

    label {
      font-weight: bold;
      color: #444;
      margin-bottom: 8px;
      display: block;
    }

    select {
      width: 100%;
      padding: 10px 12px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 8px;
      margin-bottom: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    table thead {
      background: #3f51b5;
      color: white;
    }

    table th, table td {
      padding: 12px;
      border: 1px solid #ddd;
      text-align: center;
    }

    .no-data {
      text-align: center;
      color: #777;
      margin-top: 20px;
    }
  </style>
</head>
<body>
<a href="<?php $this->url('/adders_panel_admin/index') ?>" class="btn btn-success btn-lg">
   ویرایش 
  </a>
  <a href="<?php $this->url('/Panel_admin/index') ?>" class="btn btn-success btn-lg">
   بازگشت به پنل  
  </a>

  <div class="container">
    <h2>مشاهده شهرهای هر استان</h2>

    <?php
    // فرضی: لیست استان‌ها و شهرها
    // $provinces = [
    //   ['id' => 1, 'name' => 'تهران'],
    //   ['id' => 2, 'name' => 'اصفهان'],
    // ];

    // $cities = [
    //   ['id' => 1, 'province_id' => 1, 'name' => 'تهران', 'postal_price' => 1000000, 'updated_at' => '2024-12-01 10:00:00'],
    //   ['id' => 2, 'province_id' => 1, 'name' => 'ری', 'postal_price' => 800000, 'updated_at' => '2024-11-30 14:20:00'],
    //   ['id' => 3, 'province_id' => 2, 'name' => 'اصفهان', 'postal_price' => 950000, 'updated_at' => '2024-12-01 09:15:00'],
    //   ['id' => 4, 'province_id' => 2, 'name' => 'کاشان', 'postal_price' => 750000, 'updated_at' => '2024-11-28 17:45:00'],
    // ];

    $cityMap = [];
    foreach ($cities as $city) {
      $cityMap[$city['province_id']][] = $city;
    }
    ?>

    <label for="provinceSelect">انتخاب استان:</label>
    <select id="provinceSelect">
      <option value="">-- انتخاب استان --</option>
      <?php foreach ($provinces as $province): ?>
        <option value="<?= $province['id'] ?>"><?= $province['name'] ?></option>
      <?php endforeach; ?>
    </select>

    <div id="cityTableContainer"></div>
  </div>

  <script>
    const provinces = <?= json_encode($provinces, JSON_UNESCAPED_UNICODE) ?>;
    const cityData = <?= json_encode($cityMap, JSON_UNESCAPED_UNICODE) ?>;
    const provinceSelect = document.getElementById('provinceSelect');
    const cityTableContainer = document.getElementById('cityTableContainer');

    provinceSelect.addEventListener('change', () => {
      const provinceId = provinceSelect.value;
      cityTableContainer.innerHTML = '';

      if (!provinceId || !cityData[provinceId]) {
        cityTableContainer.innerHTML = '<p class="no-data">شهری برای این استان یافت نشد.</p>';
        return;
      }

      let tableHtml = `
        <table>
          <thead>
            <tr>
              <th>ردیف</th>
              <th>نام شهر</th>
              <th>قیمت پستی (تومان)</th>
              <th>تاریخ بروزرسانی</th>
            </tr>
          </thead>
          <tbody>
      `;

      cityData[provinceId].forEach((city, index) => {
        tableHtml += `
          <tr>
            <td>${index + 1}</td>
            <td>${city.name}</td>
            <td>${Number(city.postal_price).toLocaleString()}</td>
            <td>${city.updated_at}</td>
          </tr>
        `;
      });

      tableHtml += `</tbody></table>`;
      cityTableContainer.innerHTML = tableHtml;
    });
  </script>

</body>
</html>
