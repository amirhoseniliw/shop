<?php $this->include('app.layouts.header', ['user' => $user, 'categories' => $categories]);
$this->include('app.layouts.sidbor', ['user' => $user]); ?>

<div class="col-lg-9">
    <div class="section-title">
        <div class="section-title-title">
            <h3 class="title-font h3 main-color-three-color">آدرس های<span class="main-color-one-color"> ثبت شده </span>
            </h3>
        </div>
        <!-- دکمه ایجاد آدرس جدید -->
        <div>
            <a href="<?php $this->url('/UserPanel/create_address') ?>" class="btn btn-primary btn-sm" style="border-radius: 5px; margin-top: 20px;">ایجاد آدرس جدید</a>
        </div>
    </div>
    <div class="content-box slider-parent rounded-4">
        <div class="container-fluid">
            <div class="row">
                <?php foreach ($adders as $adder) { ?>
                    <div class="col-md-4">
                        <div class="bg-white card addresses-item mb-4 shadow-sm">
                            <div class="gold-members p-4">
                                <div class="media">
                                    <div class="media-body">
                                        <h6 class="mb-1"><?= htmlspecialchars($adder['AddressText']) ?></h6>
                                        <span class="text-muted small"><?= $this->jalaliData($adder['CreatedAt']) ?></span>

                                        <p class="text-overflow-2 address-line mb-1">
                                            <?= htmlspecialchars($adder['Title']) ?>
                                        </p>

                                        <p class="mb-1">
                                            <strong>استان:</strong> <?= htmlspecialchars($adder['province_name']) ?><br>
                                            <strong>شهر:</strong> <?= htmlspecialchars($adder['city_name']) ?></br>
                                            <strong>کد پستی:</strong> <?= htmlspecialchars($adder['PostalCode']) ?>
                                        </p>

                                        <p class="mb-0">
                                            <a class="text-danger" data-toggle="modal"
                                                href="<?php $this->url('/UserPanel/delete_adders/' . $adder['address_id']) ?>">
                                                <i class="bi bi-trash"></i> حذف
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>


            </div>
        </div>
    </div>

    <?php $this->include('app.layouts.footer'); ?>