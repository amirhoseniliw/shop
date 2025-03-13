<?php $this->include('app.layouts.header'); ?>






<div class="content mt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">



                <div class="position-sticky top-0 mb-5 d-lg-block d-none">
                    <div class="category-meta">
                        <div class="category-meta-title d-flex align-items-center">
                            <h5>لوازم‌ تحریر</h5>
                            <h5 class="ms-2"><?= $count_posts['total_products'] ?></h5>
                        </div>
                    </div>
                    <div class="category-bread mt-2">
                        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php $this->url('/home') ?>">خانه</a></li>
                                <li class="breadcrumb-item active" aria-current="page">لوازم تحریر</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="item-boxs">

                        <div class="item-box shadow-box">
                            <div class="title">
                                <div class="form-check form-switch  form-sw-custom">
                                    <div class="d-flex align-items-center justify-content-end flex-row-reverse">
                                        <label class="form-check-label d-block mb-0 lh-base fs-6"
                                            for="flexSwitchCheckDefault">نمایش کالاهای موجود</label>
                                        <input class="form-check-input d-block" type="checkbox" role="switch"
                                            id="flexSwitchCheckDefault" checked>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

            <div class="col-lg-9">

                <div class="category-sort mb-3">
                    <div class="content-box">
                        <div class="container-fluid">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="box_filter d-lg-block d-none">
                                    <ul class="list-inline text-start mb-0">
                                        <li class="list-inline-item title-font ms-0">مرتب سازی بر اساس :</li>
                                        <li class="list-inline-item"><a
                                                class="<?php if($type_post == 'expensive' ) echo "active_custom" ;?>"
                                                href="<?php $this->url('/product/index/' . 'expensive'); ?>">گران
                                                ترین</a></li>
                                        <li class="list-inline-item"><a
                                                class="<?php if($type_post == 'cheap' ) echo "active_custom" ;?>"
                                                href="<?php $this->url('/product/index/' . 'cheap'); ?>">ارزان ترین</a>
                                        </li>
                                        <li class="list-inline-item"><a
                                                class="<?php if($type_post == 'Bestseller' ) echo "active_custom" ;?>"
                                                href="<?php $this->url('/product/index/' . 'Bestseller'); ?>">پروفروش
                                                ترین</a>
                                        </li>
                                        <li class="list-inline-item"><a
                                                class="<?php if($type_post == 'selected' ) echo "active_custom" ;?>"
                                                href="<?php $this->url('/product/index/' . 'selected'); ?>">انتخاب شده
                                            </a></li>
                                        <li class="list-inline-item"><a
                                                class="<?php if($type_post == 'view' ) echo "active_custom" ;?>"
                                                href="<?php $this->url('/product/index/' . 'view'); ?>">محبوب ترین</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="box_filter_counter fs-6"><i class="bi bi-card-list me-2"></i>
                                    <?php echo  count($posts); ?> کالا</div>
                            </div>
                            <div class="d-lg-none d-block">
                                <form action="<?php $this->url('/product/index') ?>" method="get" id="sortForm">
                                    <h5 class="mb-3">مرتب سازی بر اساس</h5>
                                    <select name="type_posts" id="sortingOptions" class="form-select"
                                        onchange="document.getElementById('sortForm').submit();">
                                        <option value="expensive"
                                            <?php if($type_post == 'expensive' ) echo "selected" ?>>گران ترین</option>
                                        <option value="cheap" <?php if($type_post == 'cheap' ) echo "selected" ?>>
                                            ارزان ترین</option>
                                        <option value="Bestseller"
                                            <?php if($type_post == 'Bestseller' ) echo "selected" ?>>پرفروش ترین
                                        </option>
                                        <option value="selected" <?php if($type_post == 'selected' ) echo "selected" ?>>
                                            انتخاب شده </option>
                                        <option value="view" <?php if($type_post == 'view' ) echo "selected" ?>>محبوب
                                            ترین</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="category-pro">
                    <div class="row g-3">
                        <?php if($posts == null) {?>
                        <h1 style="color : red ;             text-align: center;">هیچ محصولی برای فیلتر ها شما وجود
                            ندارد !</h1>
                        <a href="<?php echo $this->url('/product/index/cheap '); ?>">مشاهده همه محصولات </a>

                        <?php } ?>
                        <?php foreach($posts as $post ){ ?>
                        <div class="col-md-6 col-xl-4 col-xxl-3">
                            <div class="product-box">
                                <a href="<?php $this->url('/product/find/'. $post['product_id']) ?>">
                                    <div class="product-image">
                                        <?php   $imageUrlsArrays = explode(',', $post['photo_file_names']);
                            $alt_text = explode(',', $post['alt_texts']);?>
                                        <img src="<?php $this->asset($imageUrlsArrays[0]) ?>" loading="lazy"
                                            alt="<?= $alt_text[0] ?>" class="img-fluid one-image">
                                        <?php if(isset($imageUrlsArrays[1])){ ?>
                                        <img src="<?php $this->asset($imageUrlsArrays[1]) ?>" loading="lazy"
                                            alt="<?= $alt_text[0] ?>" class="img-fluid two-image">
                                        <?php } ?>
                                    </div>
                                    <div class="product-title">
                                        <div class="title">
                                            <p class="text-overflow-1 title-font"><?= $post['name'] ?></p>
                                        </div>
                                        <span><?= $post['category'] ?></span>
                                    </div>
                                    <div class="product-action">
                                        <div class="link">
                                            <button class="btn border-0 rounded-3 main-color-one-bg" href="">
                                                <i class="bi bi-basket text-white"></i>
                                            </button>
                                        </div>
                                        <div class="price">

                                            <p class="new-price"><?php echo $this->formatPrice( $post['price']) ?> <span
                                                    class="font-12">تومان</span></p>
                                        </div>
                                    </div>
                                </a>
                                <div class="product-foot mt-2 border-top border-1 pt-1">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <nav class="navbar navbar-expand">
                                            <ul class="navbar-nav align-items-center">
                                                <li class="nav-item"><a
                                                        href="<?php $this->url('/product/find/'. $post['product_id']) ?>"
                                                        class="nav-item product-box-hover-item product-box-hover-item-btn"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        data-bs-title="مشاهده سریع"><i class="bi bi-product"></i></a>
                                                </li>
                                                <li class="nav-item"><a
                                                        href="<?php $this->url('/product/find/'. $post['product_id']) ?>"
                                                        class="nav-item product-box-hover-item product-box-hover-item-btn mx-3"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        data-bs-title="افزودن به سبد خرید"><i
                                                            class="bi bi-basket"></i></a></li>
                                                <li class="nav-item"><a
                                                        href="<?php $this->url('/product/add_fivert/'. $post['product_id']) ?>"
                                                        class="nav-item product-box-hover-item product-box-hover-item-btn"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        data-bs-title="افزودن به علاقه ها"><i
                                                            class="bi bi-heart"></i></a></li>
                                            </ul>
                                        </nav>
                                        <span>بازدید محصول &nbsp;&nbsp; <u><?= $post['view'] ?></u> </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }?>



                    </div>
                </div>
            </div>

            <!-- /content -->


            <!-- start footer -->
            <?php $this->include('app.layouts.footer'); ?>


            <!-- ==== range slider -->
            <script src="assets/js/plugin/bootstrap-slider/bootstrap-slider.min.js"></script>
            <script>
            $(document).ready(function() {
                ////slider range
                $(".catRange").slider({
                    id: "slider5b",
                    min: 1500000,
                    max: 3000000,
                    range: true,
                    step: 10000,
                    value: [1500000, 3000000],
                    rtl: 'false',
                    formatter: function formatter(val) {
                        if (Array.isArray(val)) {
                            return val[0] + " تومان " + "  تا   " + val[1] + " تومان ";
                        } else {
                            return val;
                        }
                    },
                });
            });
            </script>
            <!-- ==== end range slider -->


            </body>

            </html>