<!DOCTYPE html>
<html lang="fa">
<head>
  <meta charset="UTF-8">
  <title>مدیریت قیمت پستی شهرها</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet">

  <style>
    body {
      font-family: "Vazirmatn", sans-serif;
      background-color: #f4f6f9;
      margin: 0;
      padding: 0;
      direction: rtl;
    }

    .container {
      max-width: 600px;
      margin: 60px auto;
      background-color: #fff;
      border-radius: 16px;
      box-shadow: 0 8px 16px rgba(0,0,0,0.1);
      padding: 30px 40px;
    }

    h2 {
      margin-top: 0;
      color: #333;
      font-size: 24px;
      text-align: center;
      margin-bottom: 30px;
    }

    label {
      display: block;
      margin-bottom: 6px;
      color: #555;
      font-weight: bold;
    }

    select, input {
      width: 100%;
      padding: 10px 12px;
      font-size: 16px;
      border: 1px solid #ddd;
      border-radius: 8px;
      margin-bottom: 20px;
      transition: border-color 0.3s;
    }

    select:focus, input:focus {
      border-color: #3f51b5;
      outline: none;
    }

    button {
      width: 100%;
      padding: 12px;
      background-color: #3f51b5;
      color: #fff;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    button:disabled {
      background-color: #bbb;
      cursor: not-allowed;
    }

    .alert {
      background-color: #d4edda;
      color: #155724;
      padding: 12px;
      margin-bottom: 20px;
      border: 1px solid #c3e6cb;
      border-radius: 8px;
    }
  </style>
</head>
<body>
<a href="<?php $this->url('/adders_panel_admin/show_all') ?>" class="btn btn-success btn-lg">
     نمایش همه 
  </a>
  <a href="<?php $this->url('/Panel_admin/index') ?>" class="btn btn-success btn-lg">
   بازگشت به پنل  
  </a>
  <div class="container">
    <h2>ویرایش قیمت پستی شهر</h2>

    <?php
    // $provinces = [
    //   ['id' => 1, 'name' => 'تهران'],
    //   ['id' => 2, 'name' => 'اصفهان'],
    // ];

    // $cities = [
    //   ['id' => 1, 'province_id' => 1, 'name' => 'تهران', 'postal_price' => 1000000],
    //   ['id' => 2, 'province_id' => 1, 'name' => 'ری', 'postal_price' => 800000],
    //   ['id' => 3, 'province_id' => 2, 'name' => 'اصفهان', 'postal_price' => 900000],
    //   ['id' => 4, 'province_id' => 2, 'name' => 'کاشان', 'postal_price' => 700000],
    // ];

    $cityMap = [];
    foreach ($cities as $city) {
      $cityMap[$city['province_id']][] = $city;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $cityId = $_POST['city_id'];
      $newPrice = $_POST['postal_price'];
      echo "<div class='alert'>قیمت جدید شهر با شناسه <strong>$cityId</strong> به <strong>" . number_format($newPrice) . " تومان</strong> تغییر یافت.</div>";
    }
    ?>

    <form method="POST" action="<?php $this->url('/adders_panel_admin/update/' ) ?>">
      <label for="provinceSelect">انتخاب استان:</label>
      <select id="provinceSelect" required>
        <option value="">-- انتخاب استان --</option>
        <?php foreach ($provinces as $province): ?>
          <option value="<?= $province['id'] ?>"><?= $province['name'] ?></option>
        <?php endforeach; ?>
      </select>

      <label for="citySelect">انتخاب شهر:</label>
      <select id="citySelect" name="city_id" required disabled>
        <option value="">-- انتخاب شهر --</option>
      </select>

      <label for="priceInput">قیمت پستی (تومان):</label>
      <input type="number" name="postal_price" id="priceInput" required disabled>

      <button type="submit" id="saveBtn" disabled>ذخیره قیمت</button>
    </form>
  </div>

  <script>
    const cityData = <?= json_encode($cityMap, JSON_UNESCAPED_UNICODE) ?>;
    const provinceSelect = document.getElementById('provinceSelect');
    const citySelect = document.getElementById('citySelect');
    const priceInput = document.getElementById('priceInput');
    const saveBtn = document.getElementById('saveBtn');

    provinceSelect.addEventListener('change', () => {
      const provinceId = provinceSelect.value;
      citySelect.innerHTML = '<option value="">-- انتخاب شهر --</option>';
      citySelect.disabled = true;
      priceInput.disabled = true;
      saveBtn.disabled = true;
      priceInput.value = '';

      if (provinceId && cityData[provinceId]) {
        cityData[provinceId].forEach(city => {
          const option = document.createElement('option');
          option.value = city.id;
          option.textContent = city.name;
          option.dataset.price = city.postal_price;
          citySelect.appendChild(option);
        });
        citySelect.disabled = false;
      }
    });

    citySelect.addEventListener('change', () => {
      const selectedOption = citySelect.options[citySelect.selectedIndex];
      const price = selectedOption.dataset.price || '';
      priceInput.value = price;
      priceInput.disabled = !price;
      saveBtn.disabled = !price;
    });
  </script>

</body>
</html>
