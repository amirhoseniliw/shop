<?php $this->include('app.layouts.header' , ['user' => $user] ); 
 $this->include('app.layouts.sidbor', ['user' => $user] ); ?>

            <div class="col-lg-9">
                <div class="section-title">
                    <div class="section-title-title">
                        <h3 class="title-font h3 main-color-three-color">آخرین<span class="main-color-one-color"> تیکت ها </span>
                        </h3>
                    </div>
                </div>
                <div class="table-custom slider-parent p-0">
                    <div class="table-responsive shadow-box roundedTable p-0">
                        <table class="table main-table rounded-0">
                            <thead>
                            <tr>
                                <th class="align-middle text-center"><h6 class="fw-bold font-18  text-muted">شناسه</h6></th>
                                <th class="align-middle text-center"><h6 class="fw-bold font-18  text-muted">عنوان</h6></th>
                                <th class="align-middle text-center"><h6 class="fw-bold font-18  text-muted">وضعیت</h6></th>
                                <th class="align-middle text-center"><h6 class="fw-bold font-18  text-muted">تاریخ بروز رسانی</h6></th>
                                <th class="align-middle text-center"><h6 class="fw-bold font-18  text-muted">نمایش</h6></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="align-middle text-center"><p class="mt-2 font-16">545315</p></td>
                                <td class="align-middle text-center"><p class="mt-2 font-16"> ارسال نشدن فلان سفارش برای من </p></td>
                                <td class="align-middle text-center"><span class="badge bg-secondary ms-2">در انتظار پاسخ</span></td>
                                <td class="align-middle text-center"><p class="mt-2 font-16">25 اذر 1402 ساعت 20:30</p></td>
                                <td class="align-middle text-center"><a href="" class="btn main-color-three-bg shadow-none btn-sm"> <i class="bi bi-eye me-1"></i> نمایش</a></td>
                            </tr>
                            <tr>
                                <td class="align-middle text-center"><p class="mt-2 font-16">545315</p></td>
                                <td class="align-middle text-center"><p class="mt-2 font-16"> ارسال نشدن فلان سفارش برای من </p></td>
                                <td class="align-middle text-center"><span class="badge bg-success  ms-2">پاسخ داده شده</span></td>
                                <td class="align-middle text-center"><p class="mt-2 font-16">25 اذر 1402 ساعت 20:30</p></td>
                                <td class="align-middle text-center"><a href="" class="btn main-color-three-bg shadow-none btn-sm"> <i class="bi bi-eye me-1"></i> نمایش</a></td>
                            </tr>
                            <tr>
                                <td class="align-middle text-center"><p class="mt-2 font-16">545315</p></td>
                                <td class="align-middle text-center"><p class="mt-2 font-16"> ارسال نشدن فلان سفارش برای من </p></td>
                                <td class="align-middle text-center"><span class="badge bg-danger ms-2">بسته شده</span></td>
                                <td class="align-middle text-center"><p class="mt-2 font-16">25 اذر 1402 ساعت 20:30</p></td>
                                <td class="align-middle text-center"><a href="" class="btn main-color-three-bg shadow-none btn-sm"> <i class="bi bi-eye me-1"></i> نمایش</a></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="my-paginate mt-5">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link rounded-3" href="#"><i class="bi bi-chevron-right"></i></a>
                            </li>
                            <li class="page-item active"><a class="page-link rounded-3" href="#">1</a></li>
                            <li class="page-item"><a class="page-link rounded-3" href="#">2</a></li>
                            <li class="page-item"><a class="page-link rounded-3" href="#">3</a></li>
                            <li class="page-item"><a class="page-link rounded-3" href="#">...</a></li>
                            <li class="page-item"><a class="page-link rounded-3" href="#">14</a></li>
                            <li class="page-item"><a class="page-link rounded-3" href="#">15</a></li>
                            <li class="page-item"><a class="page-link rounded-3" href="#">16</a></li>
                            <li class="page-item">
                                <a class="page-link rounded-3" href="#"><i class="bi bi-chevron-left"></i></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->include('app.layouts.footer'); ?>

