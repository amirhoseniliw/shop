
<?php $this->include('app.layouts.header' , ['user' => $user] ); 
 $this->include('app.layouts.sidbor', ['user' => $user] ); ?>


            <div class="col-lg-9">
                <div class="alert px-3 alert-light shadow-box py-4 rounded-4 alert-dismissible fade show" role="alert">
                    <div class="d-flex align-items-center">
                        <img src="assets/img/bell.png" class="bell-icon" alt="">
                        <h5 class="title-font"> عنوان اطلاعیه</h5>
                    </div>
                    <p class="mt-3 text-justify">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <div class="row gy-3">
                    <div class="col-lg-3 col-md-6">
                        <a href="">
                            <div class="meta-box">
                                <div class="meta-box-icon">
                                    <i class="bi bi-bag-check"></i>
                                </div>
                                <div class="meta-box-desc">
                                    <p>کلاس های شرکت کرده</p>
                                    <h5>15</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a href="">
                            <div class="meta-box">
                                <div class="meta-box-icon">
                                    <i class="bi bi-heart"></i>
                                </div>
                                <div class="meta-box-desc">
                                    <p>محصولات مورد علاقه</p>
                                    <h5>23</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a href="">
                            <div class="meta-box">
                                <div class="meta-box-icon">
                                    <i class="bi bi-send"></i>
                                </div>
                                <div class="meta-box-desc">
                                    <p>نظرات</p>
                                    <h5>17</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a href="">
                            <div class="meta-box">
                                <div class="meta-box-icon">
                                    <i class="bi bi-repeat"></i>
                                </div>
                                <div class="meta-box-desc">
                                    <p>سفارشات مرجوعی</p>
                                    <h5>5</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="panel-latest-order mt-4">

                    <div class="section-title">
                        <div class="row gy-3 align-items-center">
                            <div class="col-sm-8">
                                <div class="section-title-title">
                                    <h3 class="title-font h3 main-color-three-color">آخرین<span class="main-color-one-color"> سفارشات </span>
                                    </h3>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="section-title-link text-sm-end text-start">
                                    <a class="btn btn-title font-13 rounded-pill" href=""> مشاهده همه</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive shadow-box roundedTable p-0">
                        <table class="table  main-table rounded-0">
                            <thead class="text-center">
                            <tr>
                                <th class="title-font">#</th>
                                <th class="title-font">شماره سفارش</th>
                                <th class="title-font">تاریخ ثبت سفارش</th>
                                <th class="title-font">مبلغ پرداختی</th>
                                <th class="title-font">وضعیت سفارش</th>
                                <th class="title-font">جزییات</th>
                            </tr>
                            </thead>
                            <tbody class="text-center">
                            <tr>
                                <td class="font-14">1</td>
                                <td class="font-14">2354632</td>
                                <td class="font-14">سه شنبه 13 دی 1401</td>
                                <td class="font-14">580,000 تومان</td>
                                <td class="font-14"><a href="" class="title-font">سفارش مرجوع شده</a></td>
                                <td class="font-14">
                                    <a href="" class="btn border-0 main-color-one-bg waves-effect waves-light"><i class="bi bi-chevron-left"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="font-14">2</td>
                                <td class="font-14">2354632</td>
                                <td class="font-14">سه شنبه 13 دی 1401</td>
                                <td class="font-14">580,000 تومان</td>
                                <td class="font-14"><a href="" class="title-font">سفارش لغو شده</a></td>
                                <td class="font-14">
                                    <a href="" class="btn border-0 main-color-one-bg waves-effect waves-light"><i class="bi bi-chevron-left"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="font-14">1</td>
                                <td class="font-14">2354632</td>
                                <td class="font-14">سه شنبه 13 دی 1401</td>
                                <td class="font-14">580,000 تومان</td>
                                <td class="font-14"><a href="" class="title-font">سفارش تحویل داده شده</a></td>
                                <td class="font-14">
                                    <a href="" class="btn border-0 main-color-one-bg waves-effect waves-light"><i class="bi bi-chevron-left"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="font-14">2</td>
                                <td class="font-14">2354632</td>
                                <td class="font-14">سه شنبه 13 دی 1401</td>
                                <td class="font-14">580,000 تومان</td>
                                <td class="font-14"><a href="" class="title-font">سفارش در انتظار پرداخت</a></td>
                                <td class="font-14">
                                    <a href="" class="btn border-0 main-color-one-bg waves-effect waves-light"><i class="bi bi-chevron-left"></i></a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- /content -->


<!-- start footer -->

<?php $this->include('app.layouts.footer'); ?>
