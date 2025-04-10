<?php $this->include('app.layouts.header' , compact('categories')); ?>
<div class="bread-crumb py-4">
    <div class="container-fluid">
        <nav aria-label="breadcrumb" class="my-lg-0 my-2">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="#" class="font-14 text-muted-two">خانه</a></li>
                </li>
            </ol>
        </nav>
    </div>
</div>

<div class="product-meta pb-2">
    <div class="container-fluid position-relative">
        <div class="content-box">
            <div class="container-fluid">
                <div class="row gy-3">
                    <div class="col-lg-4">
                        <div class="pro_gallery">
                            <div class="pro-gallery-parent">
                                <div class="swiper product-gallery">
                                    <div class="swiper-wrapper" title="برای بزرگنمایی تصویر دابل کلیک کنید">

                                        <?php   $imageUrlsArrays = explode(',', $post['photo_file_names']);?>
                                        <?php   $alt_text = explode(',', $post['alt_texts']);?>
                                        <?php foreach($imageUrlsArrays as $imageUrlsArray) { ?>
                                        <div class="swiper-slide">
                                            <div class="swiper-zoom-container">
                                                <img class="" src="<?php echo $this->asset( $imageUrlsArray) ?>"
                                                    alt="<?= $alt_text[0] ?>" />
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                    <div class="swiper-button-next d-none d-lg-flex"></div>
                                    <div class="swiper-button-prev d-none d-lg-flex"></div>
                                    <div class="swiper-pagination d-none d-lg-block"></div>
                                </div>
                            </div>
                            <div thumbsSlider="" class="swiper product-gallery-thumb">
                                <div class="swiper-wrapper">
                                    <?php foreach($imageUrlsArrays as $imageUrlsArray) { ?>
                                    <div class="swiper-slide">
                                        <img alt="<?= $alt_text[0] ?>" class="img-fluid"
                                            src="<?php echo $this->asset( $imageUrlsArray) ?>" />
                                    </div>
                                    <?php  } ?>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="product-mete-title bottom-border">
                            <h3 class="title-font h4"><?= $post['name'] ?> </h3>
                        </div>
                        <div class="product-meta-overal my-3 bottom-border">
                            <div class="row gy-3 align-items-center">
                                <div class="col-md-4">
                                    <?php if($post['stock_qty'] <= 0) { ?>
                                    <div class="label-site rounded-pill"
                                        style="background-color: #dc3545; color: white;">
                                        <i class="bi bi-x-circle me-1"></i>
                                        <span style="color: white;"> ناموجود در انبار </span>
                                    </div>
                                    <?php } else { ?>

                                    <div class="label-site rounded-pill label-success">
                                        <i class="bi bi-check-circle me-1"></i>
                                        <span> موجود در انبار
                                        </span>
                                    </div>
                                    <?php  } ?>
                                </div>
                                <div class="col-md-4">
                                    <div class="d-flex align-items-center">
                                        <span class="text-muted-two me-2">دسته بندی</span>
                                        <div class="label-site rounded-pill">
                                            <?= $post['category'] ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <span class="text-muted-two me-2">کد محصول</span>
                                    <u> <span><?= $post['product_id'] ?></span></u>
                                </div>
                            </div>
                        </div>
                        <div class="product-meta-feature bottom-border">
                            <div class="row gy-3">
                                <div class="col-lg-8">
                                    <div class="product-meta-feature-items">
                                        <h5 class="title font-16 mb-2"> توضیحات کالا</h5>
                                        <span><?= $post['description'] ?></span>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="product-meta-rating text-lg-end text-start">
                                        <div class="label-site label-waring rounded-pill">
                                            <span
                                                class="product-meta-rating-comment-count me-1"><?= $post['view'] ?></span>
                                            <span class="product-meta-rating-comment-count-text me-3">بازدید </span>

                                            <span class="product-meta-rating-rating-count-text"><i
                                                    class="bi bi-star-fill"></i></span>
                                        </div>
                                    </div>
                                    <?php if($post['stock_qty'] >= 1) { ?>
                                    <div class="product-meta-rating mt-2 text-lg-end text-start">
                                        <div class="label-site label-success rounded-pill">
                                            آماده ارسال
                                            <i class="bi bi-truck ms-2"></i>
                                        </div>
                                    </div>
                                    <?php  } ?>
                                </div>
                            </div>
                        </div>
                        <div class="icon-product-box my-3">
                            <div class="icon-product-box-item" data-bs-toggle="modal" data-bs-target="#shareModal"
                                data-bs-placement="top" title="اشتراک گذاری">
                                <i class="bi bi-share"></i>
                            </div>
                            <?php 
                                                    if($favorites !== null ){
                                                    $found = false ;
                                                     foreach ($favorites as $favorite) {  
                                                       if (in_array($post['product_id'], $favorite)) { // استفاده از in_array برای پیدا کردن عدد  
                                                          $found = true; // عدد پیدا شد  
                                                              break; // خروج از حلقه  
                                                                }  
                                                     }  
                                                     } ?>
                           <a href="<?php $this->url('/product/add_favorites/'. $post['product_id']) ?>"> <div class="icon-product-box-item" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-title="افزودن به علاقه مندی">
                                <i class="bi bi-heart-fill" style="<?php if($found == true ) {echo " color: red ;";} ?>"></i>
                            </div></a>
                            <div class="icon-product-box-item" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-title="مقایسه محصول">
                                <i class="bi bi-arrow-left-right"></i>
                            </div>
                            <div class="icon-product-box-item" data-bs-toggle="modal" data-bs-target="#chartModal"
                                data-bs-placement="top" title="نمودار تغییر قیمت">
                                <i class="bi bi-bar-chart"></i>
                            </div>
                        </div>
                      <form action="<?php $this->url('/cart/add_card/' . $post['product_id']) ?>" method="post">
                        <div class="product-meta-color">
                            <h5 class="font-16">
                                انتخاب رنگ کالا
                            </h5>
                            <div class="product-meta-color-items">
                                <?php  
                            
                                
                                                  
                             
                               $i = 0;  
                               foreach($colors as $color) {  
                               $color_id = 'option' . $i; 
                                 ?>
                                <input type="radio" class="btn-check" name="colors" id="<?php echo $color_id; ?>"  
                                    autocomplete="off" value="<?php echo $color['color_id']; ?> "<?php if($color['hex_value'] == 'hue') { echo('checked');} ?>>
                                <label class="btn" for="<?php echo $color_id; ?>" title="<?= $color['titel_name'] ?>">
                                    <span
                                        style="background:<?php if($color['hex_value'] == 'hue') { echo('linear-gradient(to right, red, orange, yellow, green, blue, indigo, violet);');} else {echo $color['hex_value'] ;}?>;"></span>
                                    <?php echo $color['titel_name']; ?>
                                </label>
                                <?php  
                                $i++;  
                             
                                   } 
                               ?>
                            </div>
                        </div>
                        <div class="product-meta-count text-muted">
                            <span><?=    $post['stock_qty'] , "&nbsp&nbsp"?>   عدد در انبار</span>
                        </div>
                        <?php if(isset($_SESSION['user_id'])) { ?>
                        <div class="product-meta-action">
                            <div class="row align-items-center gy-3">
                                <div class="col-lg-6 w-100-in-400">
                                    <h6 class="fs-3 text-sm-start text-center new-price text-dark-emphasis text-start">
                                    <?php echo $this->formatPrice($post['price']) , "&nbsp" ?>   تومان</h6>
                                </div>
                                <div class="col-lg-6 w-100-in-400">
                                    <div class="d-flex justify-content-end flex-wrap">
                                      <button class="btn me-3 btn-add-to-basket border-0 main-color-one-bg"><i
                                                class="bi bi-basket text-white font-20 me-1"></i>  <input type="submit" style="all: unset;" value="خرید کالا ">               </button>
                                        <div class="product-counter-input">
                                            <div class="counter">
                                                <input type="text" name="count" class="counter" value="1">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><?php } else {?>
                       <a href="<?php $this->url('/auth/login') ?>" >    <div style="text-align: center;"><p style="color: #dc3545; ">برای اینکه ثبت سفارش کنید لطفا وارد شوید !</p></div></a> 
                            <?php }?>
</form>
                        <div class="shoping-feature border-top pt-3">
                            <nav class="navbar navbar-expand">
                                <ul class="navbar-nav justify-content-between w-100 ">
                                    <li class="nav-item">
                                        <div class="nav-link footer-service-item d-flex align-items-center">
                                            <div class="footer-service-item-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="23"
                                                    viewBox="0 0 20 23" fill="none">
                                                    <path
                                                        d="M17.5036 21.3064C17.2434 21.3064 16.9904 21.1715 16.851 20.93C16.6431 20.5699 16.7665 20.1095 17.1265 19.9016L18.5643 19.0715C18.9243 18.8637 19.3847 18.987 19.5926 19.3471C19.8005 19.7071 19.6771 20.1675 19.3171 20.3754L17.8793 21.2055C17.7607 21.2739 17.6313 21.3064 17.5036 21.3064Z"
                                                        fill="#838383"></path>
                                                    <path
                                                        d="M10.5782 17.792C10.5782 15.2157 9.01185 12.2228 7.07958 11.1072C6.10819 10.5464 5.28665 10.587 4.59549 11.0532L3.09766 11.918L7.82995 21.5116L9.45419 20.5686C10.1453 20.1154 10.5782 19.1462 10.5782 17.792Z"
                                                        fill="url(#paint10_linear10)"></path>
                                                    <path
                                                        d="M7.68227 21.5821C9.22621 20.9243 9.53518 18.1787 8.37236 15.4496C7.20955 12.7205 5.01528 11.0415 3.47134 11.6994C1.9274 12.3572 1.61843 15.1028 2.78125 17.8319C3.94406 20.561 6.13833 22.24 7.68227 21.5821Z"
                                                        fill="#E8E8E8"></path>
                                                    <path
                                                        d="M8.13803 18.853C8.13803 21.1597 6.73557 22.22 5.00554 21.2211C3.27551 20.2223 1.87305 17.5426 1.87305 15.236C1.87305 12.9293 3.27551 11.869 5.00554 12.8679C6.73557 13.8666 8.13803 16.5463 8.13803 18.853Z"
                                                        fill="url(#paint11_linear11)"></path>
                                                    <path
                                                        d="M6.03826 18.4886C6.03826 19.8611 5.20379 20.4919 4.1744 19.8977C3.14502 19.3034 2.31055 17.7089 2.31055 16.3364C2.31055 14.9639 3.14502 14.3331 4.1744 14.9274C5.20379 15.5217 6.03826 17.1161 6.03826 18.4886Z"
                                                        fill="url(#paint12_linear12)"></path>
                                                    <path
                                                        d="M19.9017 12.0266C19.9017 14.3333 18.4992 15.3936 16.7692 14.3947C15.0392 13.3959 13.6367 10.7162 13.6367 8.40954C13.6367 6.10285 15.0392 5.0426 16.7692 6.04144C18.4992 7.04023 19.9017 9.71987 19.9017 12.0266Z"
                                                        fill="url(#paint13_linear13)"></path>
                                                    <path
                                                        d="M19.7609 12.4832C19.7609 9.90684 18.1945 6.91396 16.2622 5.79837C15.2908 5.23757 14.4693 5.27818 13.7781 5.74438L12.2803 6.60917L17.0126 16.2028L18.4703 15.3564C18.5273 15.3273 18.5829 15.2951 18.6368 15.2597C19.328 14.8066 19.7609 13.8374 19.7609 12.4832Z"
                                                        fill="url(#paint14_linear14)"></path>
                                                    <path
                                                        d="M16.861 16.2699C18.4049 15.612 18.7139 12.8664 17.5511 10.1373C16.3883 7.40828 14.194 5.72924 12.6501 6.3871C11.1061 7.04495 10.7971 9.79059 11.96 12.5196C13.1228 15.2487 15.317 16.9277 16.861 16.2699Z"
                                                        fill="#E8E8E8"></path>
                                                    <path
                                                        d="M16.9297 12.594C16.9297 14.197 15.9551 14.9337 14.7529 14.2396C13.5508 13.5455 12.5762 11.6834 12.5762 10.0805C12.5762 8.4776 13.5508 7.74084 14.7529 8.43492C15.9551 9.12897 16.9297 10.9911 16.9297 12.594Z"
                                                        fill="url(#paint15_linear15)"></path>
                                                    <path
                                                        d="M15.6762 2.1616C15.7009 2.1651 15.7142 2.16703 15.7142 2.16703L15.4057 1.98892C15.4057 1.98892 15.4057 1.98887 15.4056 1.98887C15.4056 1.98887 15.4056 1.98883 15.4055 1.98883C15.4055 1.98883 12.5275 0.343339 12.4584 0.334175C11.4052 -0.156417 10.2013 -0.106958 9.17892 0.483316C6.28622 2.15342 4.48926 5.26588 4.48926 8.60604V11.1622C4.90815 11.1675 5.36874 11.3027 5.85228 11.5818C6.31062 11.8465 6.74788 12.2177 7.14904 12.663V12.6721L7.85162 12.2665V10.1116C7.85162 7.02165 9.51399 4.14234 12.19 2.59734C12.5974 2.36208 13.0409 2.2341 13.4876 2.21263C13.7071 2.62092 13.8265 3.08443 13.8265 3.57228V5.74996C14.2404 5.75908 14.6943 5.89407 15.1706 6.16903C15.6361 6.43785 16.08 6.81645 16.4863 7.2711V7.28121L17.1889 6.87556V5.07779C17.189 3.8963 16.629 2.82819 15.6762 2.1616Z"
                                                        fill="url(#paint16_linear16)"></path>
                                                    <path
                                                        d="M7.85204 12.2666V10.1117C7.85204 7.0217 9.51442 4.14239 12.1904 2.59739C13.0871 2.07967 14.1579 2.07962 15.0547 2.59739C15.9514 3.11512 16.4867 4.04244 16.4867 5.07789V7.2813L17.1893 6.87566V5.07789C17.1893 3.78841 16.5226 2.63369 15.4059 1.98893C14.2891 1.34416 12.9558 1.34421 11.8391 1.98893C8.94638 3.65903 7.14941 6.77149 7.14941 10.1117V12.6722L7.85204 12.2666Z"
                                                        fill="#E8E8E8"></path>
                                                    <path
                                                        d="M13.4926 22.9999C13.187 22.9999 12.8813 22.9212 12.6087 22.7639L9.2548 20.8275C9.0868 20.7305 9.02921 20.5156 9.12624 20.3476C9.22327 20.1795 9.43813 20.122 9.60609 20.219L12.96 22.1554C13.2886 22.3451 13.6968 22.345 14.0252 22.1554L17.0134 20.4302C17.1815 20.3332 17.3963 20.3908 17.4933 20.5588C17.5903 20.7268 17.5327 20.9416 17.3647 21.0387L14.3765 22.7639C14.1039 22.9212 13.7983 22.9999 13.4926 22.9999Z"
                                                        fill="#E8E8E8"></path>
                                                    <defs>
                                                        <linearGradient id="paint10_linear10" x1="8.29916" y1="17.0188"
                                                            x2="6.21303" y2="13.4055" gradientUnits="userSpaceOnUse">
                                                            <stop stop-color="#737373"></stop>
                                                            <stop offset="1" stop-color="#BFBFBF"></stop>
                                                        </linearGradient>
                                                        <linearGradient id="paint11_linear11" x1="5.00554" y1="21.0483"
                                                            x2="5.00554" y2="13.9217" gradientUnits="userSpaceOnUse">
                                                            <stop stop-color="#A3A3A3"></stop>
                                                            <stop offset="1" stop-color="#DFDFDF"></stop>
                                                        </linearGradient>
                                                        <linearGradient id="paint12_linear12" x1="4.1744" y1="19.8272"
                                                            x2="4.1744" y2="13.9048" gradientUnits="userSpaceOnUse">
                                                            <stop stop-color="#E2E2E2"></stop>
                                                            <stop offset="1" stop-color="#D5D5D5"></stop>
                                                        </linearGradient>
                                                        <linearGradient id="paint13_linear13" x1="16.7692" y1="14.2219"
                                                            x2="16.7692" y2="7.09531" gradientUnits="userSpaceOnUse">
                                                            <stop stop-color="#A3A3A3"></stop>
                                                            <stop offset="1" stop-color="#DFDFDF"></stop>
                                                        </linearGradient>
                                                        <linearGradient id="paint14_linear14" x1="17.4818" y1="11.71"
                                                            x2="15.3956" y2="8.09671" gradientUnits="userSpaceOnUse">
                                                            <stop stop-color="#676767"></stop>
                                                            <stop offset="1" stop-color="#BDBDBD"></stop>
                                                        </linearGradient>
                                                        <linearGradient id="paint15_linear15" x1="12.5762" y1="11.3372"
                                                            x2="16.9297" y2="11.3372" gradientUnits="userSpaceOnUse">
                                                            <stop stop-color="#707070"></stop>
                                                            <stop offset="1" stop-color="#C8C8C8"></stop>
                                                        </linearGradient>
                                                        <linearGradient id="paint16_linear16" x1="9.89951" y1="8.11577"
                                                            x2="11.7915" y2="4.83876" gradientUnits="userSpaceOnUse">
                                                            <stop stop-color="#6D6D6D"></stop>
                                                            <stop offset="1" stop-color="#BBBBBB"></stop>
                                                        </linearGradient>
                                                    </defs>
                                                </svg>
                                            </div>

                                            <div class="footer-service-item-desc ms-3">
                                                <p class="lh-sm font-12">پشتیبانی <strong>24 ساعته</strong></p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <div class="nav-link footer-service-item d-flex align-items-center">
                                            <div class="footer-service-item-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="31" height="22"
                                                    viewBox="0 0 31 22" fill="none">
                                                    <path
                                                        d="M28.3418 6.69991C28.1269 6.29866 27.5268 5.95982 27.0015 5.94314C26.7121 5.93395 26.5065 6.02474 26.4154 6.17485L26.4147 6.17447L25.9059 6.99429L25.9073 6.99494C25.824 7.11892 25.8217 7.28599 25.9219 7.47324C26.1368 7.87448 26.7369 8.21327 27.2622 8.23C27.5659 8.23968 27.7772 8.13922 27.8607 7.97554L28.343 7.19855L28.3427 7.19838C28.4399 7.07271 28.4476 6.89727 28.3418 6.69991Z"
                                                        fill="url(#paint20_linear20)"></path>
                                                    <path
                                                        d="M23.3546 15.8883V4.89734L5.71387 5.65383V16.6448C5.71381 16.8966 5.83845 17.1484 6.08771 17.2924L13.076 21.3271C13.573 21.614 14.1853 21.614 14.6823 21.3271L22.9808 16.5359C23.2301 16.392 23.3546 16.1402 23.3546 15.8883Z"
                                                        fill="url(#paint21_linear21)"></path>
                                                    <path
                                                        d="M6.08772 5.00632L14.3862 0.215209C14.8832 -0.0717363 15.4956 -0.0717363 15.9926 0.215209L22.9808 4.24989C23.4793 4.53771 23.4793 5.25718 22.9808 5.54494L14.6823 10.3361C14.1853 10.623 13.573 10.623 13.076 10.3361L6.08772 6.30138C5.58925 6.01356 5.58925 5.29409 6.08772 5.00632Z"
                                                        fill="url(#paint22_linear22)"></path>
                                                    <path
                                                        d="M8.77832 3.45282L17.6913 8.59869L20.0556 7.23369L11.1426 2.08777L8.77832 3.45282Z"
                                                        fill="#EAEAEA"></path>
                                                    <path
                                                        d="M10.1917 2.63623L19.1046 7.78216L18.6415 8.04953L9.72852 2.90365L10.1917 2.63623Z"
                                                        fill="#CDCDCD"></path>
                                                    <path
                                                        d="M17.6914 8.59876V10.5513L20.0557 9.18627V7.23376L17.6914 8.59876Z"
                                                        fill="#CDCDCD"></path>
                                                    <path
                                                        d="M1.52905 5.21064L6.94967 8.34024C7.22666 8.50015 7.39729 8.79568 7.39729 9.11549C7.39729 9.39401 7.09574 9.56808 6.85457 9.42885L1.43395 6.29925C1.15695 6.13934 0.986328 5.84381 0.986328 5.524C0.986328 5.24548 1.28782 5.07135 1.52905 5.21064Z"
                                                        fill="url(#paint23_linear23)"></path>
                                                    <path
                                                        d="M3.51055 8.66207L8.93112 11.7917C9.20811 11.9516 9.37873 12.2471 9.37873 12.5669C9.37873 12.8454 9.07724 13.0195 8.83601 12.8803L3.41539 9.75068C3.1384 9.59077 2.96777 9.29524 2.96777 8.97543C2.96783 8.69685 3.26932 8.52278 3.51055 8.66207Z"
                                                        fill="url(#paint24_linear24)"></path>
                                                    <path
                                                        d="M27.5855 7.64223L27.5857 7.64179L25.7453 6.58228L25.7452 6.58255C25.0188 6.1976 24.0855 6.25246 23.0674 6.84024C20.7509 8.17768 18.873 11.7657 18.873 14.8544C18.873 16.5525 19.4414 17.7446 20.3375 18.2529L20.3368 18.2542L22.0183 19.2251L22.0201 19.2214C22.7592 19.6633 23.7289 19.6314 24.7915 19.0178C27.108 17.6804 28.9859 14.0924 28.9859 11.0037C28.9859 9.34619 28.4447 8.17029 27.5855 7.64223Z"
                                                        fill="url(#paint25_linear25)"></path>
                                                    <path
                                                        d="M28.1509 14.8646C29.545 11.5928 29.1746 8.30121 27.3236 7.51254C25.4726 6.72387 22.842 8.73681 21.448 12.0086C20.0539 15.2803 20.4243 18.572 22.2753 19.3606C24.1263 20.1493 26.7569 18.1364 28.1509 14.8646Z"
                                                        fill="#D6D6D6"></path>
                                                    <path
                                                        d="M27.2189 14.4673C28.2252 12.1057 27.9578 9.72973 26.6218 9.16044C25.2857 8.59116 23.3868 10.0441 22.3806 12.4058C21.3743 14.7674 21.6417 17.1434 22.9778 17.7127C24.3138 18.2819 26.2127 16.829 27.2189 14.4673Z"
                                                        fill="#F2EFFA"></path>
                                                    <path
                                                        d="M27.3797 9.83479C26.8483 8.97822 25.8883 8.75565 24.792 9.38854V13.4254L27.3797 9.83479Z"
                                                        fill="#474747"></path>
                                                    <path
                                                        d="M25.3776 13.0868C25.3776 12.6551 25.1151 12.4567 24.7913 12.6436C24.4675 12.8305 24.2051 13.332 24.2051 13.7638C24.2051 14.1956 24.4676 14.394 24.7913 14.207C25.1151 14.0201 25.3776 13.5186 25.3776 13.0868Z"
                                                        fill="#949494"></path>
                                                    <path
                                                        d="M24.5635 14.129V10.4252C24.5635 10.299 24.6657 10.1968 24.7919 10.1968C24.9181 10.1968 25.0203 10.299 25.0203 10.4252V12.7217L26.2567 11.018C26.3308 10.916 26.4735 10.893 26.5756 10.9673C26.6777 11.0413 26.7004 11.1842 26.6264 11.2863L24.5635 14.129Z"
                                                        fill="#949494"></path>
                                                    <path
                                                        d="M24.928 6.77589V5.9425L23.3184 6.0509V6.92147L23.3195 6.92136C23.3155 7.03161 23.3791 7.13743 23.515 7.2159C23.8063 7.38407 24.315 7.36296 24.6514 7.16882C24.8458 7.0566 24.9393 6.91118 24.928 6.77589Z"
                                                        fill="#949494"></path>
                                                    <path
                                                        d="M25.3749 5.42953V4.37805L22.8701 4.54676V5.65616L22.8718 5.65599C22.8656 5.82755 22.9647 5.99227 23.1761 6.11433C23.6293 6.37601 24.4211 6.3432 24.9444 6.04105C25.2469 5.86638 25.3925 5.64002 25.3749 5.42953Z"
                                                        fill="url(#paint26_linear26)"></path>
                                                    <path
                                                        d="M24.2185 5.14878C24.9094 5.06459 25.4309 4.67944 25.3833 4.28853C25.3357 3.89762 24.7369 3.64898 24.046 3.73317C23.355 3.81737 22.8335 4.20252 22.8812 4.59342C22.9288 4.98433 23.5275 5.23298 24.2185 5.14878Z"
                                                        fill="#DADADA"></path>
                                                    <path
                                                        d="M21.8598 8.66205L21.1154 8.13098L19.9697 9.98959L20.7552 10.5499L20.756 10.5487C20.8743 10.6397 21.0409 10.6528 21.2342 10.5647C21.6484 10.376 22.025 9.7989 22.0754 9.2757C22.1045 8.97328 22.0178 8.7559 21.8598 8.66205Z"
                                                        fill="url(#paint27_linear27)"></path>
                                                    <path
                                                        d="M21.0664 9.35127C21.3556 8.81995 21.3464 8.25657 21.0459 8.09292C20.7453 7.92928 20.2671 8.22734 19.9779 8.75866C19.6886 9.28998 19.6978 9.85336 19.9984 10.017C20.2989 10.1807 20.7771 9.88259 21.0664 9.35127Z"
                                                        fill="#E7E7E7"></path>
                                                    <defs>
                                                        <linearGradient id="paint20_linear20" x1="25.8458" y1="7.08655"
                                                            x2="28.4184" y2="7.08655" gradientUnits="userSpaceOnUse">
                                                            <stop stop-color="#868686"></stop>
                                                            <stop offset="1" stop-color="#C5C5C5"></stop>
                                                        </linearGradient>
                                                        <linearGradient id="paint21_linear21" x1="12.4691" y1="13.2198"
                                                            x2="14.8925" y2="13.2198" gradientUnits="userSpaceOnUse">
                                                            <stop stop-color="#BABABA"></stop>
                                                            <stop offset="1" stop-color="#E7E7E7"></stop>
                                                        </linearGradient>
                                                        <linearGradient id="paint22_linear22" x1="9.62311" y1="2.44011"
                                                            x2="18.6982" y2="7.67962" gradientUnits="userSpaceOnUse">
                                                            <stop stop-color="#DFDFDF"></stop>
                                                            <stop offset="1" stop-color="#F6F6F6"></stop>
                                                        </linearGradient>
                                                        <linearGradient id="paint23_linear23" x1="7.88275" y1="9.59111"
                                                            x2="1.44281" y2="5.62806" gradientUnits="userSpaceOnUse">
                                                            <stop stop-color="#494949"></stop>
                                                            <stop offset="1" stop-color="#8E8E8E"></stop>
                                                        </linearGradient>
                                                        <linearGradient id="paint24_linear24" x1="9.86425" y1="13.0425"
                                                            x2="3.4243" y2="9.07945" gradientUnits="userSpaceOnUse">
                                                            <stop stop-color="#4D4D4D"></stop>
                                                            <stop offset="1" stop-color="#696969"></stop>
                                                        </linearGradient>
                                                        <linearGradient id="paint25_linear25" x1="24.214" y1="12.4362"
                                                            x2="25.9379" y2="9.45042" gradientUnits="userSpaceOnUse">
                                                            <stop stop-color="#676767"></stop>
                                                            <stop offset="1" stop-color="#BABABA"></stop>
                                                        </linearGradient>
                                                        <linearGradient id="paint26_linear26" x1="22.8701" y1="5.33454"
                                                            x2="25.6941" y2="5.33454" gradientUnits="userSpaceOnUse">
                                                            <stop stop-color="#3A3A3A"></stop>
                                                            <stop offset="1" stop-color="#D3D3D3"></stop>
                                                        </linearGradient>
                                                        <linearGradient id="paint27_linear27" x1="20.5316" y1="10.3938"
                                                            x2="21.9585" y2="8.39459" gradientUnits="userSpaceOnUse">
                                                            <stop stop-color="#757575"></stop>
                                                            <stop offset="1" stop-color="#A6A6A6"></stop>
                                                        </linearGradient>
                                                    </defs>
                                                </svg>
                                            </div>
                                            <div class="footer-service-item-desc ms-3">
                                                <p class="lh-sm font-12">فرصت 7 روزه <strong>بازگشت کالا</strong></p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <div class="nav-link footer-service-item d-flex align-items-center">
                                            <div class="footer-service-item-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="22"
                                                    viewBox="0 0 21 22" fill="none">
                                                    <path
                                                        d="M17.8576 15.8883V4.89734L0.216797 5.65383V16.6448C0.216742 16.8966 0.341375 17.1484 0.590641 17.2924L7.57888 21.3271C8.07588 21.614 8.68822 21.614 9.18522 21.3271L17.4837 16.5359C17.733 16.392 17.8576 16.1402 17.8576 15.8883Z"
                                                        fill="url(#paint30_linear30)"></path>
                                                    <path
                                                        d="M0.590654 5.00632L8.88916 0.215209C9.38616 -0.0717363 9.99849 -0.0717363 10.4955 0.215209L17.4837 4.24989C17.9822 4.53771 17.9822 5.25718 17.4837 5.54494L9.18523 10.3361C8.68823 10.623 8.0759 10.623 7.5789 10.3361L0.590654 6.30138C0.0921777 6.01356 0.0921777 5.29409 0.590654 5.00632Z"
                                                        fill="url(#paint31_linear31)"></path>
                                                    <path
                                                        d="M3.28125 3.45282L12.1942 8.59869L14.5585 7.23369L5.64556 2.08777L3.28125 3.45282Z"
                                                        fill="#EAEAEA"></path>
                                                    <path
                                                        d="M4.69459 2.63623L13.6076 7.78216L13.1444 8.04953L4.23145 2.90365L4.69459 2.63623Z"
                                                        fill="#CDCDCD"></path>
                                                    <path
                                                        d="M12.1943 8.59876V10.5513L14.5586 9.18627V7.23376L12.1943 8.59876Z"
                                                        fill="#CDCDCD"></path>
                                                    <path
                                                        d="M20.7674 8.36979C20.7289 8.34069 20.6879 8.31812 20.6456 8.30059L18.9661 7.34656C18.6948 7.14145 18.3042 7.22906 18.1465 7.53043L15.0148 13.5607L14.9815 13.5355C14.8818 13.4602 14.7726 13.4092 14.66 13.3784L14.6592 13.3768L13.1802 12.5123C13.0995 12.4513 13.0125 12.4064 12.9227 12.3748L12.9195 12.373L12.9199 12.3737C12.4907 12.2242 11.9941 12.4007 11.7702 12.8286C11.5555 13.2387 11.6688 13.7439 12.0381 14.0231L14.8877 16.1773L16.689 17.2005L20.9231 9.06417C21.048 8.82573 20.9821 8.53205 20.7674 8.36979Z"
                                                        fill="url(#paint32_linear32)"></path>
                                                    <path
                                                        d="M14.9814 13.5356C14.8817 13.4603 14.7725 13.4092 14.66 13.3785L14.6591 13.3768L13.1801 12.5124C13.0995 12.4514 13.0125 12.4065 12.9226 12.3749L12.9194 12.373L12.9199 12.3738C12.4907 12.2243 11.9941 12.4007 11.7702 12.8286C11.5555 13.2388 11.6688 13.744 12.0381 14.0231L14.8876 16.1774L16.6889 17.2006L14.9814 13.5356Z"
                                                        fill="url(#paint33_linear33)"></path>
                                                    <path
                                                        d="M16.6894 17.2005L13.8398 15.0462C13.4706 14.7671 13.3572 14.2619 13.5719 13.8518C13.8433 13.3334 14.5152 13.1827 14.9819 13.5355L16.6894 14.8264L19.9482 8.55363C20.1059 8.25226 20.4964 8.16464 20.7678 8.36975C20.9825 8.53201 21.0483 8.82569 20.9236 9.0641L16.6894 17.2005Z"
                                                        fill="#DBDBDB"></path>
                                                    <defs>
                                                        <linearGradient id="paint30_linear30" x1="6.97207" y1="13.2198"
                                                            x2="9.39538" y2="13.2198" gradientUnits="userSpaceOnUse">
                                                            <stop stop-color="#BABABA"></stop>
                                                            <stop offset="1" stop-color="#E7E7E7"></stop>
                                                        </linearGradient>
                                                        <linearGradient id="paint31_linear31" x1="4.12604" y1="2.44011"
                                                            x2="13.2011" y2="7.67962" gradientUnits="userSpaceOnUse">
                                                            <stop stop-color="#DFDFDF"></stop>
                                                            <stop offset="1" stop-color="#F6F6F6"></stop>
                                                        </linearGradient>
                                                        <linearGradient id="paint32_linear32" x1="18.1562" y1="8.21276"
                                                            x2="18.7009" y2="7.26925" gradientUnits="userSpaceOnUse">
                                                            <stop stop-color="#656565"></stop>
                                                            <stop offset="1" stop-color="#AAAAAA"></stop>
                                                        </linearGradient>
                                                        <linearGradient id="paint33_linear33" x1="14.3926" y1="14.7314"
                                                            x2="14.8306" y2="13.9728" gradientUnits="userSpaceOnUse">
                                                            <stop stop-color="#5B5B5B"></stop>
                                                            <stop offset="1" stop-color="#858585"></stop>
                                                        </linearGradient>
                                                    </defs>
                                                </svg>
                                            </div>
                                            <div class="footer-service-item-desc ms-3">
                                                <p class="lh-sm font-12">تضمین <strong> کیفیت کالا</strong></p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <div class="nav-link footer-service-item d-flex align-items-center">
                                            <div class="footer-service-item-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="22"
                                                    viewBox="0 0 24 22" fill="none">
                                                    <path
                                                        d="M17.6408 15.8883V4.89734L1.79893e-08 5.65383V16.6448C-5.46695e-05 16.8966 0.124578 17.1484 0.373844 17.2924L7.36209 21.3271C7.85909 21.614 8.47142 21.614 8.96842 21.3271L17.2669 16.5359C17.5162 16.392 17.6408 16.1402 17.6408 15.8883Z"
                                                        fill="url(#paint40_linear40)"></path>
                                                    <path
                                                        d="M0.373857 5.00632L8.67236 0.215209C9.16936 -0.0717363 9.78169 -0.0717363 10.2787 0.215209L17.2669 4.24989C17.7654 4.53771 17.7654 5.25718 17.2669 5.54494L8.96844 10.3361C8.47144 10.623 7.8591 10.623 7.3621 10.3361L0.373857 6.30138C-0.124619 6.01356 -0.124619 5.29409 0.373857 5.00632Z"
                                                        fill="url(#paint41_linear41)"></path>
                                                    <path
                                                        d="M3.06445 3.45282L11.9774 8.59869L14.3417 7.23369L5.42876 2.08777L3.06445 3.45282Z"
                                                        fill="#EAEAEA"></path>
                                                    <path
                                                        d="M4.4778 2.63623L13.3908 7.78216L12.9276 8.04953L4.01465 2.90365L4.4778 2.63623Z"
                                                        fill="#CDCDCD"></path>
                                                    <path
                                                        d="M11.9775 8.59876V10.5513L14.3418 9.18627V7.23376L11.9775 8.59876Z"
                                                        fill="#CDCDCD"></path>
                                                    <path
                                                        d="M20.2448 6.92255L20.245 6.92212L18.4741 5.90263L18.474 5.90289C17.7749 5.53246 16.877 5.58523 15.8973 6.15085C13.6683 7.43775 11.8613 10.8903 11.8613 13.8624C11.8613 15.4964 12.4082 16.6434 13.2704 17.1325L13.2698 17.1338L14.8879 18.068L14.8895 18.0645C15.6007 18.4896 16.5338 18.459 17.5563 17.8686C19.7853 16.5817 21.5923 13.1291 21.5923 10.1571C21.5923 8.56217 21.0715 7.43071 20.2448 6.92255Z"
                                                        fill="url(#paint42_linear42)"></path>
                                                    <path
                                                        d="M20.7868 13.8707C22.1282 10.7225 21.7718 7.55522 19.9908 6.79633C18.2097 6.03744 15.6784 7.97436 14.337 11.1226C12.9956 14.2708 13.352 17.4381 15.1331 18.197C16.9142 18.9558 19.4454 17.0189 20.7868 13.8707Z"
                                                        fill="#BBBBBB"></path>
                                                    <path
                                                        d="M20.0697 12.3061L19.0189 11.6901C18.8056 11.5565 18.5243 11.5571 18.2394 11.5961C18.3168 11.507 18.4153 11.4276 18.5297 11.3615C18.9069 11.1437 19.5182 11.0769 19.9994 11.1632L20.4481 9.64699L19.3847 9.02365C19.2742 8.99255 19.1527 8.97575 19.024 8.97148V8.55302L17.9607 7.92969L17.0958 8.42902V9.70359C16.2634 10.3663 15.7432 11.3342 15.7432 12.2966C15.7432 12.9471 15.963 13.2166 16.2693 13.3051L17.038 13.7489C17.2631 13.9964 17.623 13.9903 17.9857 13.9291C17.8866 14.0684 17.7446 14.1931 17.5705 14.2937C17.0958 14.5678 16.3869 14.5955 15.9188 14.3282L15.457 15.8347L16.5204 16.458C16.6909 16.5463 16.8856 16.5988 17.0958 16.6165V17.1515L18.1591 17.7749L19.0239 17.2755V15.949C19.8433 15.3285 20.4546 14.3513 20.4546 13.2848C20.4546 12.7306 20.3001 12.4432 20.0697 12.3061Z"
                                                        fill="url(#paint43_linear43)"></path>
                                                    <path
                                                        d="M19.0231 15.949V17.2755L18.1583 17.7749V16.4396C17.547 16.6798 16.9552 16.6834 16.5195 16.458L16.9813 14.9516C17.4494 15.2189 18.1583 15.1911 18.633 14.917C18.9842 14.7143 19.2053 14.4132 19.2053 14.0924C19.2053 13.0606 16.8057 15.0703 16.8057 12.92C16.8057 11.9576 17.3259 10.9897 18.1583 10.327V9.05244L19.0232 8.5531V9.81901C19.5564 9.58914 20.0636 9.53906 20.4473 9.64706L19.9986 11.1633C19.5174 11.077 18.9062 11.1438 18.5289 11.3615C18.2428 11.5267 18.0543 11.7743 18.0543 12.0518C18.0543 13.0575 20.4538 11.0999 20.4538 13.2849C20.4538 14.3513 19.8425 15.3285 19.0231 15.949Z"
                                                        fill="#FBFBFB"></path>
                                                    <path
                                                        d="M17.0947 9.70364L18.1581 10.327V9.05245L17.0947 8.42908V9.70364Z"
                                                        fill="#DCDCDC"></path>
                                                    <path
                                                        d="M16.9811 14.9516L15.9178 14.3282L15.4561 15.8347L16.5194 16.4581L16.9811 14.9516Z"
                                                        fill="#DCDCDC"></path>
                                                    <defs>
                                                        <linearGradient id="paint40_linear40" x1="6.75527" y1="13.2198"
                                                            x2="9.17859" y2="13.2198" gradientUnits="userSpaceOnUse">
                                                            <stop stop-color="#BABABA"></stop>
                                                            <stop offset="1" stop-color="#E7E7E7"></stop>
                                                        </linearGradient>
                                                        <linearGradient id="paint41_linear41" x1="3.90924" y1="2.44011"
                                                            x2="12.9843" y2="7.67962" gradientUnits="userSpaceOnUse">
                                                            <stop stop-color="#DFDFDF"></stop>
                                                            <stop offset="1" stop-color="#F6F6F6"></stop>
                                                        </linearGradient>
                                                        <linearGradient id="paint42_linear42" x1="17.0006" y1="11.5355"
                                                            x2="18.6594" y2="8.66245" gradientUnits="userSpaceOnUse">
                                                            <stop stop-color="#767676"></stop>
                                                            <stop offset="1" stop-color="#A5A5A5"></stop>
                                                        </linearGradient>
                                                        <linearGradient id="paint43_linear43" x1="18.5236" y1="12.049"
                                                            x2="19.0413" y2="11.1525" gradientUnits="userSpaceOnUse">
                                                            <stop stop-color="#A4A4A4"></stop>
                                                            <stop offset="1" stop-color="#E9E9E9"></stop>
                                                        </linearGradient>
                                                    </defs>
                                                </svg>
                                            </div>
                                            <div class="footer-service-item-desc ms-3">
                                                <p class="lh-sm font-12">پرداخت امن از <strong>درگاه بانکی</strong></p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="Dottedsquare-product d-lg-flex d-none"></div>
    </div>
</div>

<!-- end product meta -->

<!-- start product desc -->

<?php $this->include('app.layouts.footer'); ?>

<!-- chart -->
<script src="assets/js/plugin/chartjs/chart.js"></script>
<!-- ======== tagify -->
<script src="assets/js/plugin/tagify/jQuery.tagify.min.js"></script>
<script>
$(document).ready(function() {
    ///input tag
    $('.commentTags').tagify();
});
</script>

<!-- ======== end tagify -->

</body>

</html>