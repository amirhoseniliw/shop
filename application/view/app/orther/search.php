<?php $this->include('app.layouts.header'); ?>


<div class="content mt-3">
    <div class="container-fluid">

        <div class="d-flex align-items-center mb-4 alert alert-light shadow-box rounded-4">
            <span class="h3 main-color-one-color me-3"><?php echo  count($posts); ?></span>
            <h1 class="h3">
                نتیجه برای <?php if($name_status == "ALL_POSTS") { echo"همه محصولات " ;} else echo  $name ?> !
            </h1>
           
        </div>

        <div class="row">
            <div class="col-lg-3">

                <!-- start filter in mobile -->
                <div class="custom-filter d-lg-none d-block">
                    <button
                        class="btn btn-filter-float border-0 main-color-one-bg shadow-box px-3 rounded-3 position-fixed"
                        style="z-index: 999;bottom:80px;" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                        <i class="bi bi-funnel font-20 fw-bold text-white"></i>
                        <span class="d-block font-14 text-white">فیلتر</span>
                    </button>

                    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasRight"
                        aria-labelledby="offcanvasRightLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasRightLabel1">فیلتر ها</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <div class="position-sticky top-0 mb-5">
                                <div class="category-meta">
                                    <div class="category-meta-title d-flex align-items-center">
                                        <h5>لوازم‌ تحریر</h5>
                                        <h5 class="ms-2">(<?= $count_posts['total_products'] ?> محصول)</h5>
                                    </div>
                                </div>
                                <div class="category-bread mt-2">
                                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#">خانه</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">لوازم تحریر</li>
                                        </ol>
                                    </nav>
                                </div>
                                <div class="item-boxs">

                                    <div class="item-box shadow-box">
                                        <div class="title">
                                            <div class="form-check form-switch  form-sw-custom">
                                                <div
                                                    class="d-flex align-items-center justify-content-end flex-row-reverse">
                                                    <label class="form-check-label d-block mb-0 lh-base fs-6"
                                                        for="flexSwitchCheckDefault1">نمایش کالاهای موجود</label>
                                                    <input class="form-check-input d-block" type="checkbox"
                                                        role="switch" id="flexSwitchCheckDefault1" checked>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-box shadow-box">
                                        <div class="accordion accordion-flush" id="accordionFlushExample1">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed f-800" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#flush-collapseOne1"
                                                        aria-expanded="false" aria-controls="flush-collapseOne1">
                                                        جستجو
                                                    </button>
                                                </h2>
                                                <div id="flush-collapseOne1" class="accordion-collapse collapse"
                                                    data-bs-parent="#accordionFlushExample1">
                                                    <div class="accordion-body">
                                                        <div class="search-form">
                                                            <form action="<?php $this->url('/search') ?>" method="post">
                                                                <div class="search-filed">
                                                                    <input type="text"
                                                                        placeholder="محصول خود را جستجو کنید"
                                                                        name="text_search"
                                                                        class="form-control search-input">
                                                                    <button type="submit" class="top-header-search-btn">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="14" height="14" viewBox="0 0 14 14"
                                                                            fill="none">
                                                                            <path
                                                                                d="M12.9742 12.1508L12.9742 12.1508L11.2255 10.4458C12.1333 9.42855 12.6838 8.09702 12.6838 6.63956C12.6838 3.43893 10.0316 0.85 6.76692 0.85C3.50227 0.85 0.85 3.43893 0.85 6.63956C0.85 9.84018 3.50227 12.4291 6.76692 12.4291C8.11591 12.4291 9.36008 11.9872 10.3557 11.243L12.1375 12.9806L12.1372 12.9809L12.1456 12.9879L12.1955 13.0299L12.1952 13.0302L12.2042 13.0367C12.4363 13.2047 12.7646 13.1861 12.9753 12.9795C13.2087 12.7507 13.2081 12.3789 12.9742 12.1508ZM2.03826 6.63956C2.03826 4.09064 4.15218 2.01864 6.76692 2.01864C9.38167 2.01864 11.4956 4.09064 11.4956 6.63956C11.4956 9.18848 9.38167 11.2605 6.76692 11.2605C4.15218 11.2605 2.03826 9.18848 2.03826 6.63956Z"
                                                                                fill="#0E1935" stroke="#0E1935"
                                                                                stroke-width="0.3"></path>
                                                                        </svg>
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                         
                                            <div class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed f-800" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#flush-collapseThree1"
                                                        aria-expanded="false" aria-controls="flush-collapseThree1">
                                                        دسته بندی
                                                    </button>
                                                </h2>
                                                <div id="flush-collapseThree1" class="accordion-collapse collapse"
                                                    data-bs-parent="#accordionFlushExample">
                                                    <div class="accordion-body">
                                                        
                                                        <form action="">
                                                <?php
                                                foreach ($categories as $category ){
                                                 ?>
                                                <div
                                                    class="d-flex align-items-center justify-content-between flex-wrap mb-3">
                                                    <div class="form-check">
                                                        <label for="colorCheck111"
                                                            class="form-check-label"><?= $category['name'] ?> <img
                                                                src="<?php echo $this->asset($category['img_url']) ?>"
                                                                alt="" class="bi bi-phone ms-1" width="20"></img>
                                                        </label>
                                                        <input type="radio" name="id_category"
                                                            value="<?= $category['category_id'] ?>" id="colorCheck111"
                                                            class="form-check-input" >
                                                    </div>
                                                    <div>
                                                        <span
                                                            class="fw-bold font-14">(<?= $category['product_count'] ?>)</span>
                                                    </div>
                                                </div>
                                                <?php  } ?>
                                                            
                                                            <div class="text-center mb-3 mt-2">
                                                                <input type="submit"
                                                                    class="btn main-color-green text-white rounded-pill px-5 py-2"
                                                                    value="اعمال فیلتر">
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end filter mobile -->

                <div class="position-sticky top-0 mb-5 d-lg-block d-none">
                    <div class="category-meta">
                        <div class="category-meta-title d-flex align-items-center">
                            <h5>لوازم‌ تحریر</h5>
                            <h5 class="ms-2">(<?= $count_posts['total_products'] ?> محصول)</h5>
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
                        <div class="item-box shadow-box">
                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed f-800" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                            aria-expanded="false" aria-controls="flush-collapseOne">
                                            جستجو
                                        </button>
                                    </h2>
                                    <div id="flush-collapseOne" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <div class="search-form">
                                                <form action="<?php $this->url('/search/index' . 'cheap' ) ?>"
                                                    method="post">
                                                    <div class="search-filed">
                                                        <input type="text" placeholder="محصول خود را جستجو کنید"
                                                            name="text_search" class="form-control search-input">
                                                        <button type="submit" class="top-header-search-btn">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                height="14" viewBox="0 0 14 14" fill="none">
                                                                <path
                                                                    d="M12.9742 12.1508L12.9742 12.1508L11.2255 10.4458C12.1333 9.42855 12.6838 8.09702 12.6838 6.63956C12.6838 3.43893 10.0316 0.85 6.76692 0.85C3.50227 0.85 0.85 3.43893 0.85 6.63956C0.85 9.84018 3.50227 12.4291 6.76692 12.4291C8.11591 12.4291 9.36008 11.9872 10.3557 11.243L12.1375 12.9806L12.1372 12.9809L12.1456 12.9879L12.1955 13.0299L12.1952 13.0302L12.2042 13.0367C12.4363 13.2047 12.7646 13.1861 12.9753 12.9795C13.2087 12.7507 13.2081 12.3789 12.9742 12.1508ZM2.03826 6.63956C2.03826 4.09064 4.15218 2.01864 6.76692 2.01864C9.38167 2.01864 11.4956 4.09064 11.4956 6.63956C11.4956 9.18848 9.38167 11.2605 6.76692 11.2605C4.15218 11.2605 2.03826 9.18848 2.03826 6.63956Z"
                                                                    fill="#0E1935" stroke="#0E1935" stroke-width="0.3">
                                                                </path>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed f-800" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseThree"
                                            aria-expanded="false" aria-controls="flush-collapseThree">
                                            دسته بندی
                                        </button>
                                    </h2>
                                    <div id="flush-collapseThree" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <form action="">
                                                <?php
                                                foreach ($categories as $category ){
                                                 ?>
                                                <div
                                                    class="d-flex align-items-center justify-content-between flex-wrap mb-3">
                                                    <div class="form-check">
                                                        <label for="colorCheck111"
                                                            class="form-check-label"><?= $category['name'] ?> <img
                                                                src="<?php echo $this->asset($category['img_url']) ?>"
                                                                alt="" class="bi bi-phone ms-1" width="20"></img>
                                                        </label>
                                                        <input type="radio" name="id_category"
                                                            value="<?= $category['category_id'] ?>" id="colorCheck111"
                                                            class="form-check-input" <?php if($id_category ==  $category['category_id']) echo 'checked' ; ?> >
                                                    </div>
                                                    <div>
                                                        <span
                                                            class="fw-bold font-14">(<?= $category['product_count'] ?>)</span>
                                                    </div>
                                                </div>
                                                <?php  } ?>

                                                <div class="text-center mb-3 mt-2">
                                                    <input type="submit"
                                                        class="btn main-color-green text-white rounded-pill px-5 py-2"
                                                        value="اعمال فیلتر">
                                                </div>
                                            </form>
                                        </div>
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
                                                href="<?php $this->url('/search/index/' . 'expensive'); ?>">گران
                                                ترین</a></li>
                                        <li class="list-inline-item"><a
                                                class="<?php if($type_post == 'cheap' ) echo "active_custom" ;?>"
                                                href="<?php $this->url('/search/index/' . 'cheap'); ?>">ارزان ترین</a>
                                        </li>
                                        <li class="list-inline-item"><a
                                                class="<?php if($type_post == 'Bestseller' ) echo "active_custom" ;?>"
                                                href="<?php $this->url('/search/index/' . 'Bestseller'); ?>">پروفروش
                                                ترین</a>
                                        </li>
                                        <li class="list-inline-item"><a
                                                class="<?php if($type_post == 'selected' ) echo "active_custom" ;?>"
                                                href="<?php $this->url('/search/index/' . 'selected'); ?>">انتخاب شده
                                            </a></li>
                                        <li class="list-inline-item"><a
                                                class="<?php if($type_post == 'view' ) echo "active_custom" ;?>"
                                                href="<?php $this->url('/search/index/' . 'view'); ?>">محبوب ترین</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="box_filter_counter fs-6"><i class="bi bi-card-list me-2"></i> <?php echo  count($posts); ?> کالا</div>
                            </div>
                            <div class="d-lg-none d-block">
                                <form action="<?php $this->url('search/') ?>" method="get" id="sortForm">
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
                            <h1 style="color : red ;             text-align: center;">هیچ محصولی برای فیلتر ها شما وجود ندارد !</h1>
                            <a href="<?php echo $this->url('/search/index/all '); ?>">مشاهده همه محصولات </a>

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
                                                        data-bs-title="مشاهده سریع"><i class="bi bi-search"></i></a>
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

                        <?php } ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- /content -->


<!-- start footer -->

<?php $this->include('app.layouts.footer'); ?>

<script src="assets/js/plugin/bootstrap-slider/bootstrap-slider.min.js"></script>

<!-- ==== end range slider -->


</body>

</html>