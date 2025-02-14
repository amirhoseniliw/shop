<?php $this->include('app.layouts.header' , ['user' => $user] ); 
 $this->include('app.layouts.sidbor', ['user' => $user] ); ?>

            <div class="col-lg-9">
                <div class="section-title">
                    <div class="section-title-title">
                        <h3 class="title-font h3 main-color-three-color">آخرین<span class="main-color-one-color"> تیکت ها </span>
                        </h3>

                    </div>
                    <a href="<?php $this->url('/Userpanel/create_address') ?>" class="btn btn-primary btn-sm" style="border-radius: 5px; margin-top: 20px;">ایجاد تیکت جدید</a>  
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
                                <?php foreach($chaths as $chath ) {?>
                            <tr>
                                <td class="align-middle text-center"><p class="mt-2 font-16"><?= $chath['chat_id'] ?></p></td>
                                <td class="align-middle text-center"><p class="mt-2 font-16"><?= $chath['titel'] ?></p></td>
                                <td class="align-middle text-center">
                                    <?php if($chath['status'] == 'open') {?> 
                                <span class="badge bg-success ms-2" style="font-size: 20px;"> باز است </span>
                            <?php } else{?>
                                <span class="badge bg-danger ms-2"> بسته است  </span>
                                <?php }?>
                            </td>
                                <td class="align-middle text-center"><p class="mt-2 font-16"><?php echo $this->jalaliData($chath['created_at'])  ?></p></td>
                                <td class="align-middle text-center"><a href="<?php $this->url('/userpanel/ticket_single_show/' .  $chath['chat_id']) ?>" class="btn main-color-three-bg shadow-none btn-sm"> <i class="bi bi-eye me-1"></i> نمایش</a></td>
                            </tr>
                          <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</div>
<?php $this->include('app.layouts.footer'); ?>

