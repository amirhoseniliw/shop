<div class="content">
    <div class="container-fluid">

        <div class="custom-filter d-lg-none d-block">
            <button class="btn btn-filter-float border-0 main-color-one-bg shadow-box px-4 rounded-3 position-fixed" style="z-index: 999;bottom:80px;" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                <i class="bi bi-list font-20 fw-bold text-white"></i>
                <span class="d-block font-14 text-white">منو</span>
            </button>

            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title">منو</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <div class="position-sticky top-0">
                        <div class="penel-nav-seller">
                            <div class="profile-box mb-3 d-flex flex-column justify-content-center align-items-center">
                                <div class="profile-box-image">
                                    <img src="<?php echo $user['img_prof'] != "" ? $this->asset($user['img_prof']) : $this->asset('\img_site\icon\user.jpg'); ?>" style="border-radius: 20px;" alt="">
                                </div>
                                <div class="profile-box-desc mt-2">
                                    <h6 class="text-center"><?= $user['username'] ?></h6>
                                    <p class=""><?= $user['phone_number'] ?></p>
                                </div>
                            </div>
                            <div class="panel-nav-nav">
                                <ul class="rm-item-menu navbar-nav">
                                    <li class="nav-item active"><a href="<?php $this->url('/Userpanel') ?>" class="nav-link"><i class="bi bi-house box-icon"></i><span>پروفایل <small class="badge rounded-pill bg-warning text-dark">5</small></span> </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php $this->url('/Userpanel/edit_profil') ?>" class="nav-link"><i class="bi bi-menu-app box-icon"></i><span>ویرایش اطلاعات</span></a>
                                      
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="">
                                        <i class="bi bi-cart-check box-icon"></i>سفارش های من </a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="">
                                        <i class="bi bi-pin-map box-icon"></i>آدرس های من</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="">
                                        <i class="bi bi-bell box-icon"></i>پیام ها و اطلاعیه ها</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="">
                                        <i class="bi bi-chat-dots box-icon"></i>نظرات من</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="">
                                        <i class="bi bi-question-circle box-icon"></i>درخواست پشتیبانی</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="">
                                        <i class="bi bi-heart box-icon"></i>محصولات مورد علاقه</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="">
                                        <i class="bi bi-gift box-icon"></i>کد های تخفیف من</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="">
                                        <i class="bi bi-arrow-right-square box-icon"></i>خروج از حساب کاربری</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row gy-4">
            <div class="col-lg-3 d-lg-block d-none">
                <div class="position-sticky top-0">
                    <div class="penel-nav-seller">
                        <div class="profile-box mb-3 d-flex flex-column justify-content-center align-items-center">
                            <div class="profile-box-image">
                                <img src="<?php echo $user['img_prof'] != "" ? $this->asset($user['img_prof']) : $this->asset('\img_site\icon\user.jpg'); ?>" alt="error img" style="border-radius: 20px;" width="80">
                            </div>
                            <div class="profile-box-desc mt-2">
                                <h6 class="text-center"><?= $user['username'] ?></h6>
                                <p class=""><?= $user['phone_number'] ?></p>
                            </div>
                        </div>
                        <div class="panel-nav-nav">
                            <ul class="rm-item-menu navbar-nav">
                                <li class="nav-item active"><a href="<?php $this->url('/Userpanel') ?>" class="nav-link"><i class="bi bi-house box-icon"></i><span>پروفایل <small class="badge rounded-pill bg-warning text-dark">5</small></span> </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php $this->url('/Userpanel/edit_profil') ?>" class="nav-link"><i class="bi bi-pencil box-icon"></i><span>ویرایش اطلاعات </span></a>
                                   
                                </li>
                                <li class="nav-item"><a class="nav-link" href="">
                                    <i class="bi bi-cart-check box-icon"></i>سفارش های من </a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="">
                                    <i class="bi bi-pin-map box-icon"></i>آدرس های من</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="">
                                    <i class="bi bi-bell box-icon"></i>پیام ها و اطلاعیه ها</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="">
                                    <i class="bi bi-chat-dots box-icon"></i>نظرات من</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="">
                                    <i class="bi bi-question-circle box-icon"></i>درخواست پشتیبانی</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="">
                                    <i class="bi bi-heart box-icon"></i>محصولات مورد علاقه</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="">
                                    <i class="bi bi-gift box-icon"></i>کد های تخفیف من</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="">
                                    <i class="bi bi-arrow-right-square box-icon"></i>خروج از حساب کاربری</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>