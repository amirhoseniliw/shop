

<?php $this->include('app.layouts.header' , compact('categories')); ?>


<div class="content mt-3">
    <div class="container-fluid">

        <div class="payment_navigtions">
            <div class="checkout-headers">
                <nav class="navbar navbar-expand">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                        <a href="<?php $this->url('/cart/index') ?>" class="nav-link">
                                <span>1</span>
                                <p>سبد خرید</p>
                            </a>
                        </li>
                        <li class="nav-item active">
                        <a href="<?php $this->url('/cart/checkout') ?>" class="nav-link">
                                <span>2</span>
                                <p>صورتحساب</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <span>3</span>
                                <p>جزییات پرداخت</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

    </div>

    <div class="container-fluid">
        <div class="cart-product">
            <div class="row gy-4">
                <div class="col-xl-9">

                    <div class="content-box">
                        <div class="container-fluid">
                            <div class="row align-items-center">
                                <div class="col-sm-9">
                                    <h5><i class="bi bi-clock me-3"></i> تامین و ارسال سفارش: <span class="fw-lighter">1 روز کاری دیگر</span> </h5>
                                </div>
                                <div class="col-sm-3">
                                    <div class="text-sm-end">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none">
                                            <g clip-path="url(#clip0)">
                                                <path d="M13.7373 36.7596L16.2828 35.296L16.2829 35.2962C16.747 35.0503 17.3432 35.0852 17.9936 35.4608C19.4733 36.3152 20.6729 38.6073 20.6729 40.5804C20.6729 41.6651 20.3099 42.4266 19.7375 42.7514L19.7379 42.7523L17.2938 44.1592L13.7373 36.7596Z" fill="url(#paint0_linear)"></path>
                                                <path d="M4.63647 31.5139L7.18198 30.0503L7.18208 30.0505C7.64614 29.8046 8.24233 29.8397 8.89272 30.2152C10.3725 31.0696 11.5721 33.3617 11.5721 35.3347C11.5721 36.4195 11.209 37.1809 10.6367 37.5057L10.6371 37.5066L8.19302 38.9135L4.63647 31.5139Z" fill="url(#paint1_linear)"></path>
                                                <path d="M34.2558 33.3043V20.7279L28.6733 22.3374L2.95605 19.3699V31.9463C2.95605 32.3318 3.14678 32.7172 3.52822 32.9375L18.5237 41.6286C19.2844 42.0677 20.2216 42.0677 20.9823 41.6286L33.6835 34.2956C34.065 34.0753 34.2558 33.6898 34.2558 33.3043Z" fill="url(#paint2_linear)"></path>
                                                <path d="M33.6835 30.9809L20.9823 38.314C20.2217 38.7531 19.2845 38.7531 18.5237 38.314L3.52822 29.623C3.14668 29.4027 2.95596 29.0173 2.95605 28.6318V31.9465C2.95605 32.3319 3.14678 32.7174 3.52822 32.9376L18.5237 41.6286C19.2844 42.0679 20.2216 42.0679 20.9823 41.6286L33.6835 34.2955C34.065 34.0753 34.2558 33.6898 34.2557 33.3043V29.9896C34.2558 30.3752 34.065 30.7606 33.6835 30.9809Z" fill="#43386B"></path>
                                                <path d="M33.6835 19.737L33.1125 19.4073L28.7321 21.9385L27.4368 21.1907L26.465 15.5694L18.688 11.0459C17.9273 10.6068 16.9901 10.6068 16.2294 11.0459L3.52822 18.3789C2.76533 18.8194 2.76533 19.9206 3.52822 20.3611L18.5237 29.0521C19.2844 29.4913 20.2216 29.4913 20.9823 29.0521L33.6835 21.719C34.4465 21.2786 34.4465 20.1774 33.6835 19.737Z" fill="url(#paint3_linear)"></path>
                                                <path d="M3.74219 33.6616C3.74219 31.6885 4.9418 30.7816 6.42158 31.636C7.90137 32.4904 9.10098 34.7825 9.10098 36.7555C9.10098 38.7286 7.90137 39.6355 6.42158 38.7811C4.9418 37.9268 3.74219 35.6347 3.74219 33.6616Z" fill="url(#paint4_linear)"></path>
                                                <path d="M7.44048 37.5564C8.17668 37.2427 8.32401 35.9336 7.76956 34.6323C7.21511 33.331 6.16882 32.5304 5.43262 32.8441C4.69642 33.1578 4.54908 34.467 5.10354 35.7682C5.65799 37.0695 6.70427 37.8701 7.44048 37.5564Z" fill="#E9E5F6"></path>
                                                <path d="M5.57178 34.7179C5.57178 34.092 5.95225 33.8044 6.42168 34.0754C6.89102 34.3464 7.27158 35.0734 7.27158 35.6993C7.27158 36.3252 6.89111 36.6128 6.42168 36.3418C5.95225 36.0708 5.57178 35.3437 5.57178 34.7179Z" fill="#7662BD"></path>
                                                <path d="M12.8428 38.9072C12.8428 36.9341 14.0424 36.0272 15.5222 36.8816C17.002 37.736 18.2016 40.0281 18.2016 42.0011C18.2016 43.9742 17.002 44.8811 15.5222 44.0267C14.0424 43.1723 12.8428 40.8802 12.8428 38.9072Z" fill="url(#paint5_linear)"></path>
                                                <path d="M13.854 39.4911C13.854 38.2627 14.6009 37.698 15.5223 38.23C16.4437 38.7619 17.1905 40.189 17.1905 41.4175C17.1905 42.646 16.4437 43.2105 15.5223 42.6786C14.6009 42.1467 13.854 40.7196 13.854 39.4911Z" fill="#E9E5F6"></path>
                                                <path d="M14.6724 39.9635C14.6724 39.3376 15.0528 39.05 15.5223 39.321C15.9917 39.592 16.3722 40.319 16.3722 40.9449C16.3722 41.5708 15.9917 41.8584 15.5223 41.5874C15.0528 41.3164 14.6724 40.5894 14.6724 39.9635Z" fill="#7662BD"></path>
                                                <path d="M26.4622 15.5675L18.688 11.0457C17.9273 10.6065 16.9901 10.6065 16.2294 11.0457L3.52822 18.3788C2.76533 18.8192 2.76533 19.9205 3.52822 20.3609L10.822 24.6053L26.4622 15.5675Z" fill="#FFA538"></path>
                                                <path d="M27.4369 21.1907L11.7944 30.2299L17.4725 33.5082V28.4452L18.5238 29.0522C19.2845 29.4914 20.2217 29.4914 20.9824 29.0522L31.0179 23.2583L27.4369 21.1907Z" fill="#7662BD"></path>
                                                <path d="M11.7943 30.2296L27.4368 21.1905L26.4645 15.5662L10.822 24.6053L11.7943 30.2296Z" fill="#43386B"></path>
                                                <path d="M33.6835 19.7367L33.1125 19.407L17.4724 28.4448L18.5238 29.0518C19.2844 29.491 20.2216 29.491 20.9824 29.0518L33.6835 21.7187C34.4465 21.2783 34.4465 20.1771 33.6835 19.7367Z" fill="#FFA538"></path>
                                                <path d="M19.6924 29.5783C19.1247 29.5783 18.6224 29.1702 18.5227 28.5916L15.7824 12.7001L11.4797 10.2159L10.5646 21.749C10.5127 22.4033 9.93932 22.8917 9.28591 22.8397C8.63161 22.7879 8.14333 22.2153 8.19518 21.561L9.25915 8.15153C9.29137 7.74498 9.52985 7.38336 9.89089 7.19362C10.2518 7.00387 10.6848 7.01246 11.0382 7.21627L17.4533 10.92C17.7589 11.0964 17.9703 11.3996 18.0302 11.7473L20.8652 28.1877C20.9767 28.8344 20.5428 29.4492 19.896 29.5608C19.8275 29.5726 19.7595 29.5783 19.6924 29.5783Z" fill="#594A8E"></path>
                                                <path d="M31.9346 22.5214C31.3668 22.5214 30.8646 22.1133 30.7649 21.5347L28.0246 5.64317L23.7218 3.15899L22.8068 14.6922C22.7549 15.3465 22.1816 15.8352 21.5281 15.7829C20.8738 15.731 20.3855 15.1585 20.4374 14.5042L21.5013 1.09464C21.5336 0.688096 21.772 0.326475 22.1331 0.136729C22.494 -0.0529197 22.9271 -0.0445213 23.2803 0.159385L29.6955 3.86319C30.0011 4.03966 30.2124 4.34278 30.2724 4.69054L33.1074 21.1309C33.2189 21.7776 32.785 22.3925 32.1381 22.504C32.0697 22.5156 32.0017 22.5214 31.9346 22.5214Z" fill="#594A8E"></path>
                                                <path d="M29.6953 3.86301L23.2803 0.159204C22.9128 -0.0529052 22.4601 -0.0531005 22.0925 0.158814L9.85029 7.21584C9.48232 7.42795 9.25547 7.82034 9.25537 8.24514C9.25527 8.66985 9.48174 9.06243 9.84961 9.27483L16.2647 12.9785C16.4486 13.0847 16.6537 13.1377 16.859 13.1377C17.0639 13.1377 17.2688 13.0848 17.4525 12.9789L29.6947 5.922C30.0627 5.70989 30.2895 5.3175 30.2896 4.8927C30.2897 4.46799 30.0632 4.07541 29.6953 3.86301ZM20.6233 8.40754L16.5933 6.07258L19.2467 4.54299L23.2768 6.87805L20.6233 8.40754ZM16.8594 10.5773L12.8222 8.24631L14.2166 7.4425L18.2467 9.77747L16.8594 10.5773ZM25.6534 5.50793L21.6233 3.17288L22.6856 2.56057L26.7229 4.89153L25.6534 5.50793Z" fill="#7662BD"></path>
                                                <path d="M21.4688 19.028C21.0575 19.028 20.6576 18.8142 20.4376 18.4322C20.1103 17.8634 20.306 17.1367 20.8749 16.8094L32.2924 10.2389C32.8612 9.91161 33.5878 10.1072 33.9153 10.6762C34.2427 11.2451 34.047 11.9717 33.478 12.299L22.0606 18.8695C21.8737 18.9768 21.6698 19.028 21.4688 19.028Z" fill="#7662BD"></path>
                                                <path d="M28.7358 49.0887C28.5341 49.0887 28.3298 49.0374 28.1426 48.9293L20.8733 44.7324C20.5056 44.5201 20.2791 44.1277 20.2791 43.7031V13.0291C20.2791 12.3727 20.8111 11.8406 21.4675 11.8406C22.1239 11.8406 22.656 12.3726 22.656 13.0291V43.0169L29.3311 46.8709C29.8996 47.1991 30.0943 47.9259 29.7662 48.4943C29.546 48.8755 29.1465 49.0887 28.7358 49.0887Z" fill="#7662BD"></path>
                                                <path d="M40.1533 42.5183C39.9516 42.5183 39.7473 42.4669 39.5601 42.3589L32.2908 38.1619C31.923 37.9496 31.6965 37.5572 31.6965 37.1326V6.4585C31.6965 5.80215 32.2286 5.27002 32.885 5.27002C33.5414 5.27002 34.0735 5.80205 34.0735 6.4585V36.4465L40.7486 40.3004C41.317 40.6286 41.5118 41.3555 41.1836 41.9239C40.9635 42.3051 40.564 42.5183 40.1533 42.5183Z" fill="#7662BD"></path>
                                                <path d="M21.4688 25.9601C21.0581 25.9601 20.6587 25.7469 20.4384 25.3657C20.1103 24.7972 20.305 24.0704 20.8735 23.7421L32.291 17.1502C32.8594 16.8224 33.5862 17.0167 33.9144 17.5853C34.2425 18.1538 34.0478 18.8806 33.4794 19.2088L22.0619 25.8007C21.8748 25.9087 21.6704 25.9601 21.4688 25.9601Z" fill="#7662BD"></path>
                                                <path d="M47.0438 41.9811V26.3931L22.0247 27.4659V43.0539C22.0247 43.411 22.2013 43.7683 22.5548 43.9724L32.466 49.6945C33.1708 50.1015 34.0393 50.1015 34.7442 49.6945L46.5136 42.8995C46.8671 42.6954 47.0438 42.3382 47.0438 41.9811Z" fill="url(#paint6_linear)"></path>
                                                <path d="M22.5549 26.5475L34.3243 19.7525C35.0292 19.3455 35.8976 19.3455 36.6025 19.7525L46.5137 25.4746C47.2206 25.8828 47.2206 26.9032 46.5137 27.3114L34.7442 34.1064C34.0393 34.5133 33.1709 34.5133 32.466 34.1064L22.5549 28.3842C21.8479 27.976 21.8479 26.9556 22.5549 26.5475Z" fill="url(#paint7_linear)"></path>
                                                <path d="M26.3708 24.3441L39.0118 31.6424L42.365 29.7064L29.7241 22.4082L26.3708 24.3441Z" fill="#DEA861"></path>
                                                <path d="M28.3751 23.186L41.016 30.4842L40.3592 30.8635L27.7183 23.5652L28.3751 23.186Z" fill="#CC8241"></path>
                                                <path d="M39.012 31.6422V34.4115L42.3652 32.4755V29.7063L39.012 31.6422Z" fill="#CC8241"></path>
                                            </g>
                                            <defs>
                                                <linearGradient id="paint0_linear" x1="17.4615" y1="38.9176" x2="16.3598" y2="37.0094" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#43386B"></stop>
                                                    <stop offset="1" stop-color="#7662BD"></stop>
                                                </linearGradient>
                                                <linearGradient id="paint1_linear" x1="8.36079" y1="33.672" x2="7.25903" y2="31.7638" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#43386B"></stop>
                                                    <stop offset="1" stop-color="#7662BD"></stop>
                                                </linearGradient>
                                                <linearGradient id="paint2_linear" x1="23.4444" y1="30.664" x2="16.2825" y2="30.664" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#E37A34"></stop>
                                                    <stop offset="1" stop-color="#FFC538"></stop>
                                                </linearGradient>
                                                <linearGradient id="paint3_linear" x1="9.46904" y1="14.7739" x2="26.3525" y2="24.5215" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#DEA861"></stop>
                                                    <stop offset="1" stop-color="#EBCBA0"></stop>
                                                </linearGradient>
                                                <linearGradient id="paint4_linear" x1="6.42168" y1="40.202" x2="6.42168" y2="30.5342" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#43386B"></stop>
                                                    <stop offset="1" stop-color="#7662BD"></stop>
                                                </linearGradient>
                                                <linearGradient id="paint5_linear" x1="15.5223" y1="45.4476" x2="15.5223" y2="35.7798" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#43386B"></stop>
                                                    <stop offset="1" stop-color="#7662BD"></stop>
                                                </linearGradient>
                                                <linearGradient id="paint6_linear" x1="31.6053" y1="38.1964" x2="35.0422" y2="38.1964" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#CC8241"></stop>
                                                    <stop offset="1" stop-color="#DEA861"></stop>
                                                </linearGradient>
                                                <linearGradient id="paint7_linear" x1="27.5689" y1="22.9079" x2="40.4397" y2="30.3389" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#DEA861"></stop>
                                                    <stop offset="1" stop-color="#EBCBA0"></stop>
                                                </linearGradient>
                                                <clipPath id="clip0">
                                                    <rect width="50" height="50" fill="white"></rect>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content-box">
                        <div class="container-fluid">

                            <div class="row align-items-center">
                                <div class="col-sm-9">
                                    <h5>انتخاب آدرس:</h5>
                                </div>
                                <div class="col-sm-3">
                                    <div class="text-sm-end">
                                       <h5> <a href="<?php $this->url('/Userpanel/address') ?>" class="text-info"> + ثبت آدرس جدید</a></h5>
                                    </div>
                                </div>
                            </div>
                              <?php
                           
                              foreach($adders as $adder) {?>
                            <label for="address-one" class="d-block">
                                <div class="detail-order mt-4">
                                    <div class="d-flex align-items-center">
                                        <div class="me-4 border-end border-2 pe-3 border-dark">
                                            <input type="radio" name="address" id="address-one" class="form-check-input" checked>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <div class="detail-order-item d-flex align-items-center">
                                                <h6><i class="bi bi-pin-map-fill me-1"></i> آدرس تحویل: <?= $adder['AddressText'] ?></h6>
                                                <span class="ms-2 text-muted"><?= $adder['Title'] ?></span>
                                            </div>
                                            <div class="d-flex align-items-center mt-4">
                                                <div class="detail-order-item d-flex me-3 align-items-center">
                                                    <h6><i class="bi bi-person-fill me-1"></i>تحویل گیرنده:</h6>
                                                    <span class="ms-2 text-muted"><?= $user['username'] ?></span>
                                                </div>
                                                <div class="detail-order-item d-flex align-items-center">
                                                    <h6><i class="bi bi-telephone-fill me-1"></i>شماره تماس:</h6>
                                                    <span class="ms-2 text-muted"><?= $user['phone_number'] ?></span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </label>
                           <?php } ?> 


                        </div>
                    </div>
                    <div class="content-box">
                        <div class="container-fluid">

                            <h5>
                                انتخاب شیوه ارسال
                            </h5>

                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="detail-order mt-4">
                                        <div class="d-flex align-items-center">
                                            <div class="me-4 border-end border-2 pe-3 border-dark">
                                                <input type="radio" name="shipping" class="form-check-input" checked>
                                            </div>
                                            <div class="d-flex">
                                                <div class="detail-order-item d-flex align-items-center">
                                                    <img src="assets/img/shipping-post-iran.svg" alt="">
                                                    <h6 class="ms-3">پست پیشتاز</h6>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-danger">
                                        مشتری گرامی، بازه زمانی ارسال سفارشات به شرح ذیل می باشد:
                                    </p>
                                    <p class="mt-2 fw-bold">
                                        1- سفارش شما طی 24 ساعت آینده پردازش و تحویل سامانه پست جمهوری اسلامی ایران می‌شود و بین 3 تا 5 روز کاری بعد تحویل شما می‌شود.
                                    </p>
                                    <p class="text-muted-two">
                                        2- هزینه ارسال بر اساس مسافت و وزن بسته محاسبه و برای شما قابل رویت می‌باشد.

                                        3- شما با اسفاده از «کد رهگیری مرسوله» که پس از بسته‌بندی سفارش از طریق پیامک دریافت می‌کنید این امکان را دارید در سایت سامانه رهگیری مرسولات پستی می‌توانید آخرین وضعیت سفارش خود را پیگیری کنی
                                    </p>
                                </div>
                            </div>


                        </div>
                    </div>


                    <div class="row g-3">
                        <div class="col-sm-3">
                            <div class="pro-box-item p-3 img-thumbnail shadow-box text-center">
                                <a href="">
                                    <img src="assets/img/product/product-5.webp" alt="">
                                    <div class="pro-box-var mt-4 justify-content-center">
                                        <div class="pro-box-var-item">
                                            1
                                        </div>
                                        <div class="pro-box-var-item px-1">
                                            <div class="pro-box-var-item-color" style="background-color:#ccc2a4;"></div>
                                            سفید
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="pro-box-item p-3 img-thumbnail shadow-box text-center">
                                <a href="">
                                    <img src="assets/img/product/product-3.webp" alt="">
                                    <div class="pro-box-var mt-4 justify-content-center">
                                        <div class="pro-box-var-item">
                                            1
                                        </div>
                                        <div class="pro-box-var-item px-1">
                                            <div class="pro-box-var-item-color" style="background-color:#c00;"></div>
                                            سفید
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="pro-box-item p-3 img-thumbnail shadow-box text-center">
                                <a href="">
                                    <img src="assets/img/product/product-2.webp" alt="">
                                    <div class="pro-box-var mt-4 justify-content-center">
                                        <div class="pro-box-var-item">
                                            1
                                        </div>
                                        <div class="pro-box-var-item px-1">
                                            <div class="pro-box-var-item-color" style="background-color:#e2ac0b;"></div>
                                            سفید
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="pro-box-item p-3 img-thumbnail shadow-box text-center">
                                <a href="">
                                    <img src="assets/img/product/product-1.webp" alt="">
                                    <div class="pro-box-var mt-4 justify-content-center">
                                        <div class="pro-box-var-item">
                                            1
                                        </div>
                                        <div class="pro-box-var-item px-1">
                                            <div class="pro-box-var-item-color" style="background-color:#7e0bd2;"></div>
                                            سفید
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="content-box position-sticky top-0">
                        <div class="container-fluid">
                            <div class="item">
                                <div class="factor">
                                    <div class="d-flex factor-item mb-3 align-items-center justify-content-between">
                                        <h5 class="mb-0 h6">قیمت کالا ها</h5>
                                        <p class="mb-0 font-17">1,228,000 تومان</p>
                                    </div>

                                    <div class="d-flex factor-item mb-3 align-items-center justify-content-between">
                                        <h5 class="mb-0 h6">تخفیف کالا ها</h5>
                                        <p class="mb-0 font-18">1,296,000 تومان</p>
                                    </div>

                                    <div class="d-flex factor-item flex-column mb-3 align-items-start justify-content-between">
                                        <h5 class="mb-0 h6">حمل و نقل</h5>
                                        <form action="">
                                            <div class="form-check mt-3">
                                                <input type="radio" checked class="form-check-input" name="post"
                                                       id="post-1">
                                                <label for="post-1" class="form-check-label">
                                                    پیک موتوری اختصاصی (کمتر از 5 ساعت): 80,000 تومان
                                                </label>
                                            </div>
                                            <div class="form-check mt-3">
                                                <input type="radio" class="form-check-input" name="post"
                                                       id="post-2">
                                                <label for="post-2" class="form-check-label">
                                                    پیک عمومی استادینو (2 تا 3 روز کاری): 50,000 تومان

                                                </label>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="d-flex factor-item mb-3 align-items-center justify-content-between">
                                        <h5 class="mb-0 h6">مجموع</h5>
                                        <p class="mb-0 font-18">1,308,000 تومان</p>
                                    </div>

                                    <div class="action mt-3 d-flex align-items-center justify-content-center">
                                        <button
                                                class="btn main-color-one-bg w-100">تسویه
                                            حساب</button>
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

<?php $this->include('app.layouts.footer'); ?>

