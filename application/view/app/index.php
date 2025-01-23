<?php $this->include('app.layouts.header'); ?>

<!-- end mega menu -->

<!-- slider -->

<div class="main-slider py-20">
    <div class="container-fluid">
        <div class="row gy-4">
            <div class="col-lg-9">
                <div class="home-slider shadow-box">

                    <div class="slider__layer slider__layer--top"
                        style="background-color: #000000; right: -13px; top: 20px; bottom: 20px;"></div>
                    <div class="slider__layer slider__layer--bottom"
                        style="background-color: #000; right: -25px; top: 40px; bottom: 40px;"></div>

                    <div class="swiper homeSlider" id="">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">

                                <img alt="error404" class="img-fluid"
                                    src="<?php echo $this->asset('/img_site/banerr/0101.jpg') ?>">

                            </div>
                            <div class="swiper-slide">

                                <img alt="error404" class="img-fluid"
                                    src="<?php echo $this->asset('/img_site/banerr/02.jpg') ?>">

                            </div>
                            <div class="swiper-slide">

                                <img alt="error404" class="img-fluid"
                                    src="<?php echo $this->asset('/img_site/banerr/03.jpg') ?>">

                            </div>
                            <div class="swiper-slide">

                                <img alt="error404" class="img-fluid"
                                    src="<?php echo $this->asset('/img_site/banerr/04.jpg') ?>">

                            </div>

                        </div>
                        <div class="swiper-button-next d-lg-flex d-none"></div>
                        <div class="swiper-button-prev d-lg-flex d-none"></div>
                        <div class="swiper-pagination-bg">
                            <div>
                                <svg fill="none" height="75" viewBox="0 0 231 75" width="231"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path clip-rule="evenodd"
                                        d="M0 0C31.5006 0.949537 50.52 17.872 56.1955 26.4544L55.986 25.8011L82.4924 58.631C99.3032 79.4521 131.038 79.4521 147.849 58.6309L174.356 25.8011L174.146 26.4544C179.822 17.872 198.844 0.949537 230.349 0H0Z"
                                        fill="#FCFCFC" fill-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">

                <div class="swiper suggetMoment">
                    <div class="swiper-wrapper position-relative">
                        <?php if ($Bestseller_posts !== " ") {
                            foreach ($Bestseller_posts as $Bestseller_post) { ?>

                                <div class="swiper-slide">
                                    <div class="product-box">
                                        <div class="product-timer">
                                            <div class="timer-label">
                                                <span>40%</span>
                                            </div>
                                            <div class="timer">
                                                <div class='countdown' data-date="2027-01-01" data-time="18:30">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-image">
                                            <img alt="errors" class="img-fluid"
                                                src="<?php echo $this->asset($Bestseller_post['image_url']); ?>">
                                        </div>
                                        <div class="product-title">
                                            <div class="title">
                                                <p class=" title-font"><?= $Bestseller_post['name'] ?></p>
                                            </div>
                                            <div class="product-rating">
                                                <div class="number"><span class="text-muted font-12">(15+) 4.8</span></div>
                                                <div class="icon"><i class="bi bi-star-fill"></i></div>
                                            </div>
                                        </div>
                                        <div class="product-action">
                                            <div class="link">
                                                <a class="btn border-0 rounded-3 main-color-one-bg" href="">
                                                    <i class="bi bi-basket text-white"></i>
                                                </a>
                                            </div>
                                            <div class="price">
                                                <p class="old-price">6,500,000 </p>
                                                <p class="new-price">3,175,000 <span class="font-12">تومان</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div> <?php     # code...
                                    }
                                } ?>
                        <!-- <div class="swiper-slide">
                            <div class="product-box">
                                <div class="product-timer">
                                    <div class="timer-label">
                                        <span>40%</span>
                                    </div>
                                    <div class="timer">
                                        <div class='countdown' data-date="2027-01-01" data-time="18:30">
                                        </div>
                                    </div>
                                </div>
                                <div class="product-image">
                                    <img alt="" class="img-fluid" 
                                         src="assets/img/product/product-2.webp">
                                </div>
                                <div class="product-title">
                                    <div class="title">
                                        <p class=" title-font">دفتر سیمی 85 برگ همیشه طرح انار کد 6338</p>
                                    </div>
                                    <div class="product-rating">
                                        <div class="number"><span class="text-muted font-12">(15+) 4.8</span></div>
                                        <div class="icon"><i class="bi bi-star-fill"></i></div>
                                    </div>
                                </div>
                                <div class="product-action">
                                    <div class="link">
                                        <a class="btn border-0 rounded-3 main-color-one-bg" href="">
                                            <i class="bi bi-basket text-white"></i>
                                        </a>
                                    </div>
                                    <div class="price">
                                        <p class="old-price">6,500,000 </p>
                                        <p class="new-price">3,175,000 <span class="font-12">تومان</span></p>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="swiper-slide">
                            <div class="product-box">
                                <div class="product-timer">
                                    <div class="timer-label">
                                        <span>40%</span>
                                    </div>
                                    <div class="timer">
                                        <div class='countdown' data-date="2027-01-01" data-time="18:30">
                                        </div>
                                    </div>
                                </div>
                                <div class="product-image">
                                    <img alt="" class="img-fluid" 
                                         src="assets/img/product/product-3.webp">
                                </div>
                                <div class="product-title">
                                    <div class="title">
                                        <p class=" title-font">دفتر سیمی 85 برگ همیشه طرح انار کد 6338</p>
                                    </div>
                                    <div class="product-rating">
                                        <div class="number"><span class="text-muted font-12">(15+) 4.8</span></div>
                                        <div class="icon"><i class="bi bi-star-fill"></i></div>
                                    </div>
                                </div>
                                <div class="product-action">
                                    <div class="link">
                                        <a class="btn border-0 rounded-3 main-color-one-bg" href="">
                                            <i class="bi bi-basket text-white"></i>
                                        </a>
                                    </div>
                                    <div class="price">
                                        <p class="old-price">6,500,000 </p>
                                        <p class="new-price">3,175,000 <span class="font-12">تومان</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div> -->
                        <div class="d-flex justify-content-center">
                            <div class="swiper-progress-bar">
                                <span class="slide_progress-bar"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- /slider -->

    <!-- start shop feature -->

    <div class="shop-feature py-30">
        <div class="container-fluid">
            <div class="shop-feature-parent">
                <div
                    class="row justify-content-center g-2 row-cols-1 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 row-cols-xl-5">

                    <div class="col">
                        <div class="shop-feature-item shadow-top">
                            <img alt="error_404" src="<?php echo $this->asset('/img_site/icon/box.png') ?>">
                            <h5 class="mt-2">تحویل اکسپرس</h5>
                        </div>
                    </div>

                    <div class="col">
                        <div class="shop-feature-item shadow-bottom">
                            <img alt="error_404" src="<?php echo $this->asset('/img_site/icon/box.png') ?>">
                            <h5 class="mt-2"> پشتیبانی آنلاین</h5>
                        </div>
                    </div>

                    <div class="col">
                        <div class="shop-feature-item shadow-top">
                            <img alt="error_404" src="<?php echo $this->asset('/img_site/icon/money.png') ?>">
                            <h5 class="mt-2"> پرداخت انلاین</h5>
                        </div>
                    </div>

                    <div class="col">
                        <div class="shop-feature-item shadow-bottom">
                            <img alt="error_404" src="<?php echo $this->asset('/img_site/icon/safe.png') ?>">
                            <h5 class="mt-2"> ضمانت کالا</h5>
                        </div>
                    </div>

                    <div class="col">
                        <div class="shop-feature-item shadow-top">
                            <img src="<?php echo $this->asset('/img_site/icon/sevene.png') ?>" alt="error_404">
                            <h5 class="mt-2"> بهترین کیفیت </h5>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- /shop feature -->

    <!-- start slider category -->

    <div class="slider-category free-swiper py-30">
        <div class="container-fluid position-relative">

            <div class="section-title">
                <div class="row gy-3 align-items-center">
                    <div class="col-sm-8">
                        <div class="section-title-title">
                            <h2 class="title-font h1 main-color-three-color">دسته بندی <span
                                    class="main-color-one-color">محصولات</span>
                            </h2>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="section-title-link text-sm-end text-start">
                            <a class="btn btn-title  rounded-pill" href=""> مشاهده همه</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="swiper cat-slider">

                <div class="swiper-wrapper">
                    <?php foreach ($categories as $category) { ?>
                        <div class="swiper-slide">
                            <a href="">
                                <div class="slider-category-item">
                                    <div class="slider-category-item-title">
                                        <h6><?= $category['category_name'] ?></h6>
                                        <span><?= $category['post_count'] ?> محصول</span>
                                    </div>
                                    <div class="slider-category-item-image">
                                        <img src="<?php echo $this->asset($category['img_url']) ?>" alt="error">
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php } ?>

                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>

    <!-- /slider category -->

    <!-- start amazing slider -->

    <div class="amazing-slider py-6 0 my-30">
        <div class="container-fluid">
            <div class="amazing-slider-parent site-slider content-box slider-parent">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <div class="section-title">
                                <div class="d-flex align-items-center">
                                    <img src="assets/img/discount-bold-1.svg" alt="">
                                    <div class="nw-title ms-2">
                                        <h5 class="fw-lighter">پیشنهاد</h5>
                                        <h3 class="title-font main-color-one-color">شگفت <span
                                                class="main-color-three-color">انگیز</span></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="amzming-slider-image text-center">
                                <img src="assets/img/gift-ruysa-1.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-9">

                            <div class="container-fluid">
                                <div class="swiper amazing-slider-sw">

                                    <div class="swiper-wrapper"> <?php foreach ($Selected_posts as $Selected_post) { ?>
                                            <div class="swiper-slide">
                                                <div class="product-box">
                                                    <a href="">
                                                        <div class="product-image">
                                                            <img src="<?php $this->asset($Selected_post['image_url']) ?>"
                                                                alt="" class="img-fluid one-image">
                                                            <img src="<?php $this->asset($Selected_post['image_url']) ?>"
                                                                alt="" class="img-fluid two-image">
                                                        </div>
                                                        <div class="product-title">
                                                            <div class="title">
                                                                <p class=" title-font"><?= $Selected_post['name'] ?>
                                                                    <br><u>
                                                                        کده <?= $Selected_post['product_id'] ?> </u>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="product-action">
                                                            <div class="link">
                                                                <button class="btn border-0 rounded-3 main-color-one-bg"
                                                                    href="">
                                                                    <i class="bi bi-basket text-white"></i>
                                                                </button>
                                                            </div>
                                                            <div class="price">

                                                                <p class="new-price">
                                                                    <?php echo $this->formatPrice($Selected_post['price']) ?>
                                                                </p><span class="font-12">تومان</span>
                                                            </div>
                                                        </div>

                                                    </a>
                                                    <div class="product-foot mt-2 border-top border-1 pt-1">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <nav class="navbar navbar-expand">
                                                                <ul class="navbar-nav align-items-center">
                                                                    <li class="nav-item"><a href=""
                                                                            class="nav-item product-box-hover-item product-box-hover-item-btn"
                                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                                            data-bs-title="مشاهده سریع"><i
                                                                                class="bi bi-search"></i></a></li>
                                                                    <li class="nav-item"><a href=""
                                                                            class="nav-item product-box-hover-item product-box-hover-item-btn mx-3"
                                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                                            data-bs-title="افزودن به سبد خرید"><i
                                                                                class="bi bi-basket"></i></a></li>
                                                                    <li class="nav-item"><a href=""
                                                                            class="nav-item product-box-hover-item product-box-hover-item-btn"
                                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                                            data-bs-title="افزودن به علاقه ها"><i
                                                                                class="bi bi-heart"></i></a></li>
                                                                </ul>
                                                            </nav>

                                                        </div>
                                                    </div>
                                                    <div class="product-timer justify-content-center border-top pt-2 mb-0">

                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>

                                    </div>
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end amazing slider -->

    <!-- start product slider -->

    <div class="product-slider free-sw site-slider mt-5">
        <div class="container-fluid">

            <div class="section-title">
                <div class="row gy-3 align-items-center">
                    <div class="col-sm-8">
                        <div class="section-title-title">
                            <h2 class="title-font h1 main-color-three-color">محصولات<span class="main-color-one-color">
                                    پرفروش </span>
                            </h2>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="section-title-link text-sm-end text-start">
                            <a class="btn btn-title  rounded-pill" href=""> مشاهده همه</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="parent parent-two">
            <div class="container-fluid">
                <div class="swiper pro-slider">
                    <div class="swiper-wrapper">
                        <?php foreach ($Bestseller_posts_alls as $Bestseller_posts_all) { ?>
                            <div class="swiper-slide">
                                <div class="product-box">
                                    <a href="">
                                        <div class="product-image">
                                            <img src="<?php $this->asset($Bestseller_posts_all['image_url']) ?>" alt="محصول"
                                                class="img-fluid one-image">
                                            <img src="<?php $this->asset($Bestseller_posts_all['image_url']) ?>" alt="محصول"
                                                class="img-fluid two-image">
                                        </div>
                                        <div class="product-title">
                                            <div class="title">
                                                <p class="text-overflow-1 title-font"><?= $Bestseller_posts_all['name'] ?>
                                                    <br><u>
                                                        کده <?= $Bestseller_posts_all['product_id'] ?> </u>
                                                </p>
                                            </div>

                                        </div>
                                        <div class="product-action">
                                            <div class="link">
                                                <button class="btn border-0 rounded-3 main-color-one-bg" href="">
                                                    <i class="bi bi-basket text-white"></i>
                                                </button>
                                            </div>
                                            <div class="price">
                                                <p class="new-price">
                                                    <?php echo $this->formatPrice($Bestseller_posts_all['price']) ?>
                                                </p>
                                                <span class="font-12">تومان</span>
                                            </div>
                                        </div>

                                    </a>
                                    <div class="product-foot mt-2 border-top border-1 pt-1">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <nav class="navbar navbar-expand">
                                                <ul class="navbar-nav align-items-center">
                                                    <li class="nav-item"><a href=""
                                                            class="nav-item product-box-hover-item product-box-hover-item-btn"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="مشاهده سریع"><i class="bi bi-search"></i></a>
                                                    </li>
                                                    <li class="nav-item"><a href=""
                                                            class="nav-item product-box-hover-item product-box-hover-item-btn mx-3"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="افزودن به سبد خرید"><i
                                                                class="bi bi-basket"></i></a></li>
                                                    <li class="nav-item"><a href=""
                                                            class="nav-item product-box-hover-item product-box-hover-item-btn"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="افزودن به علاقه ها"><i
                                                                class="bi bi-heart"></i></a></li>
                                                </ul>
                                            </nav>
                                            <div class="product-rating">
                                                <div class="number"><span class="text-muted font-12">(15+) 4.8</span></div>
                                                <div class="icon"><i class="bi bi-star-fill"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- end product slider -->


    <!-- start advert -->

    <div class="advert advert-box">
        <div class="container-fluid">
            <div class="row g-3">

                <div class="col-lg-8">
                    <div class="row g-3">

                        <div class="col-lg-4">
                            <div class="advert-item advert-box-item">
                                <a href=""><img src="assets/img/advert-box-1.webp" class="rounded-4" alt=""></a>
                            </div>
                        </div>

                        <div class="col-lg-8">
                            <div class="advert-item advert-box-item">
                                <a href=""><img src="assets/img/advert-box-2.webp" class="rounded-4" alt=""></a>
                            </div>
                        </div>

                        <div class="col-lg-8">
                            <div class="advert-item advert-box-item">
                                <a href=""><img src="assets/img/advert-box-3.webp" class="rounded-4" alt=""></a>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="advert-item advert-box-item">
                                <a href=""><img src="assets/img/advert-box-4.webp" class="rounded-4" alt=""></a>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="advert-item advert-box-item-two">
                        <a href=""><img src="assets/img/advert-box-5.webp" class="rounded-4" alt=""></a>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <!-- /advert -->

    <!-- start product slider -->

    <div class="product-slider free-sw site-slider mt-5">
        <div class="container-fluid">

            <div class="section-title">
                <div class="row gy-3 align-items-center">
                    <div class="col-sm-8">
                        <div class="section-title-title">
                            <h2 class="title-font h1 main-color-three-color">محصولات<span class="main-color-one-color">
                                     </span>
                            </h2>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="section-title-link text-sm-end text-start">
                            <a class="btn btn-title  rounded-pill" href=""> مشاهده همه</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="parent">
            <div class="container-fluid">
                <div class="swiper pro-slider">
                    <div class="swiper-wrapper">
                        <?php foreach($all_posts as $all_post) {?>
                        <div class="swiper-slide">
                            <div class="product-box">
                                <a href="">
                                    <div class="product-image">
                                        <img src="<?php $this->asset($all_post['image_url']) ?>" alt="error" class="img-fluid one-image">
                                        <img src="<?php $this->asset($all_post['image_url']) ?>" alt="error" class="img-fluid two-image">
                                    </div>
                                    <div class="product-title">
                                        <div class="title">
                                           
                                                <p class="text-overflow-1 title-font"><?= $all_post['name'] ?>
                                                    <br><u>
                                                        کده <?= $all_post['product_id'] ?> </u>
                                                </p>
                                        </div>
                                    </div>
                                    <div class="product-action">
                                        <div class="link">
                                            <button class="btn border-0 rounded-3 main-color-one-bg" href="">
                                                <i class="bi bi-basket text-white"></i>
                                            </button>
                                        </div>
                                        <div class="price">
                                           
                                            <p class="new-price"><?php echo $this->formatPrice($all_post['price']) ?></p><span class="font-12">تومان</span>
                                        </div>
                                    </div>
                                </a>
                                <div class="product-foot mt-2 border-top border-1 pt-1">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <nav class="navbar navbar-expand">
                                            <ul class="navbar-nav align-items-center">
                                                <li class="nav-item"><a href=""
                                                        class="nav-item product-box-hover-item product-box-hover-item-btn"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        data-bs-title="مشاهده سریع"><i class="bi bi-search"></i></a>
                                                </li>
                                                <li class="nav-item"><a href=""
                                                        class="nav-item product-box-hover-item product-box-hover-item-btn mx-3"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        data-bs-title="افزودن به سبد خرید"><i
                                                            class="bi bi-basket"></i></a></li>
                                                <li class="nav-item"><a href=""
                                                        class="nav-item product-box-hover-item product-box-hover-item-btn"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        data-bs-title="افزودن به علاقه ها"><i
                                                            class="bi bi-heart"></i></a></li>
                                            </ul>
                                        </nav>
                                        <div class="product-rating">
                                            <div class="number"><span class="text-muted font-12">(15+) 4.8</span></div>
                                            <div class="icon"><i class="bi bi-star-fill"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }?>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- end product slider -->

    <!-- start advert -->

    <div class="advert py-20">
        <div class="container-fluid">
            <div class="row gy-4">
                <div class="col-12">
                    <div class="advert-item">
                        <a href=""><img src="assets/img/advert-7.webp" class="rounded-4 w-100" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $this->include('app.layouts.footer'); ?>