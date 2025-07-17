
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>مدیریت کدهای تخفیف</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container my-5">
    <h3 class="mb-4 text-center">مدیریت کدهای تخفیف</h3>

    <div class="d-flex justify-content-end mb-3">
        <a href="<?php $this->url('/Code_panel_admin/create') ?>" class="btn btn-success">
            <i class="bi bi-plus-lg"></i> افزودن کد جدید
        </a>
    </div>

    <div class="table-responsive shadow bg-white rounded p-3">
        <table class="table table-striped align-middle text-center">
            <thead class="table-primary">
                <tr>
                    <th>id</th>
                    <th>کد</th>
                    <th>توضیحات </th>
                    <th>نوع</th>
                    <th>مقدار</th>
                    <th>کاربر</th>
                    <th>استفاده / مجاز</th>
                    <th>تاریخ انقضا</th>
                    <th>تاریخ ساخت </th>
                    <th>تاریخ بروزرسانی  </th>
                    <th>وضعیت</th>
                    <th>عملیات</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($codes as $code){ ?>

                <!-- هر ردیف از کد تخفیف -->
                <tr <?= $code['is_active'] == 1 && $code['used_count'] < $code['usage_limit'] ? 'style="border: 2px solid green;"' : 'style="border: 2px solid red;"' ?>>
                    <td><?= $code['id'] ?></td>
                    <td><?= $code['code'] ?></td>
                    <td><?= $code['description'] ?></td>
<td><?= $code['discount_type'] == 'percent' ? 'درصدی' : 'پولی' ?></td>
                    <td><?= $code['discount_type'] == 'percent' ? $code['discount_value'] . '%' : number_format($code['discount_value']) . 'تومان '  ?></td>
                    <td><?= $code['user_id'] !== null ? $code['user_id'] . ' # ' . $code['username_user']: 'all user' ?></td>
                    <td><?= $code['usage_limit'] .'/' . $code['used_count'] ?></td>
                    <td><?php echo $this->jalaliData($code['expire_date']) ?></td>
                    <td><?php echo $this->jalaliData($code['created_at']) ?></td>
                    <td><?php echo $this->jalaliData($code['updated_at']) ?></td>
                    <td>
                        
                    <?php if ($code['is_active'] == 1 && $code['used_count'] < $code['usage_limit']) {
                        $is_active = 1 ;
                        ?>
                        
                     <span class="badge bg-success">فعال</span>
                    <?php } else{?>
                    <span class="badge bg-danger">غیر فعال</span>
                <?php }?>
                </td>
                    <td> 
                        <a href="<?php $this->url('/Code_panel_admin/update_status/' . $code['id'])  ?>" class="btn btn-sm btn-outline-warning" title="تغغیر وضعیت ">
                            <i class="bi bi bi-arrow-repeat"></i>
                        </a>
                        <a href="<?php $this->url('/Code_panel_admin/edit/' . $code['id'])  ?>" class="btn btn-sm btn-outline-primary me-1" title="ویرایش">
                            <i class="bi bi-pencil-fill"></i>
                        </a>
                        
                        <a href="<?php $this->url('/Code_panel_admin/delete/' . $code['id'])  ?>" class="btn btn-sm btn-outline-danger" title="حذف">
                            <i class="bi bi-trash-fill"></i>
                        </a>
                    </td>
                </tr>
                <?php } ?>
               
            </tbody>
        </table>
    </div>
</div>

<div class="text-start mt-4">
    <a href="<?php $this->url('/Panel_admin') ?>" class="btn btn-outline-secondary">بازگشت به پنل</a>
</div>

</body>
</html>