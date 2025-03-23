<?php $this->include('app.layouts.header' ,['user' => $user, 'categories' => $categories]); 
 $this->include('app.layouts.sidbor', ['user' => $user] ); ?>  

            <div class="col-lg-9">
                <div class="section-title">
                    <div class="section-title-title">
                        <h3 class="title-font h3 main-color-three-color">ثبت<span class="main-color-one-color"> آدرس </span>
                        </h3>
                    </div>
                </div>
                <div class="content-box slider-parent rounded-4">
                    <div class="container-fluid">
                        <form action="<?php $this->url('/Userpanel/stor_addres')?>" method="post">
                            <div class="row g-4">
                                <div class="col-12">
                                    <div class="comment-item mb-3">
                                        <input name="AddressText" type="text" class="form-control" id="floatingInputStreet1" placeholder="عنوان ادرس رو وارد کنید       ..." required>
                                        <label for="floatingInputStreet1" class="form-label label-float fw-bold">
                                            عنوان </label>
                                    </div>
                                </div>
                                <!-- <div class="col-md-6">
                                    <div class="comment-item" for="floatingInputOstan1">
                                        <label class="label-float fw-bold">استان <span class="text-danger">*</span></label>

                                        <select name="" id="floatingInputOstan1" class="form-select">
                                            <option value="">تهران</option>
                                            <option value="">اصفهان</option>
                                            <option value="">مشهد</option>
                                            <option value="">شیراز</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="comment-item">
                                        <label class="label-float fw-bold" for="floatingInputCity1">شهر <span class="text-danger">*</span></label>

                                        <select name="" id="floatingInputCity1" class="form-select">
                                            <option value="">کرج</option>
                                            <option value="">خرم آباد</option>
                                            <option value="">نور آباد</option>
                                            <option value="">الشتر</option>
                                        </select>

                                    </div> -->
                                </div>
                                <div class="col-12">
                                    <div class="comment-item mb-3">
                                        <textarea class="form-control py-3" id="floatingInputDesc" rows="5" name="Title" placeholder="ادرستان را به صورت دقیق وارد کنید شامل استان و شهر ...." required></textarea>
                                        <label for="floatingInputDesc" class="form-label label-float fw-bold">ادرس کامل و دقیق
                                            </label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn main-color-one-bg px-3 py-2">ثبت آدرس</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<?php $this->include('app.layouts.footer'); ?>
