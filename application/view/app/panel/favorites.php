<?php $this->include('app.layouts.header' , ['user' => $user] );   
 $this->include('app.layouts.sidbor', ['user' => $user] ); ?>  

            <div class="col-lg-9">
                <div class="section-title">
                    <div class="section-title-title">
                        <h3 class="title-font h3 main-color-three-color">محصولات<span class="main-color-one-color"> موردعلاقه </span>
                        </h3>
                    </div>
                </div>
                <div class="content-box slider-parent rounded-4">
                    <div class="container-fluid">
                        <ul class="row gy-3 ps-0">
                            <?php foreach($favorite as $favorit ) {?>
                            <div class="col-sm-6">
                                <div class="cart-canvas border rounded-3 p-3">
                                    <div class="row align-items-center">
                                        <div class="col-4 ps-0">
                                            <img src="<?php echo $this->asset($favorit['image_url']) ?>" width="200" alt="">
                                        </div>
                                        <div class="col-8">
                                            <h3 class="text-overflow-2 font-16">
                                                <?= $favorit['name'] ?>
                                            </h3>
                                            <u>توضیحات </u>
                                            <p>  <?= $favorit['description'] ?></p>
                                            <div class="product-box-suggest-price my-2  d-flex align-items-center justify-content-between">
                                                <ins class="font-25 ms-0">   <?= $favorit['price'] ?>  <span>تومان</span></ins>
                                                 <span><?= $favorit['brand'] ?></span>
                                            </div>
                                            <div class="cart-canvas-foot d-flex align-items-center justify-content-between">
                                                <div class="cart-canvas-delete">
                                                    <a href="<?php $this->url('/userpanel/delete_favorites/' . $favorit['wishlist_id']) ?>" class="btn"><i class="bi bi-x"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </ul>
                      
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<?php $this->include('app.layouts.footer'); ?>
