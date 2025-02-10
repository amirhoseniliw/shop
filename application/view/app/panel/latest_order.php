<?php $this->include('app.layouts.header' , ['user' => $user] ); 
 $this->include('app.layouts.sidbor', ['user' => $user] );
 
 ?>


            <div class="col-lg-9">
                <div class="panel-latest-order mt-4">

                    <div class="section-title">
                        <div class="section-title-title">
                            <h3 class="title-font h3 main-color-three-color">آخرین<span class="main-color-one-color"> سفارشات </span>
                            </h3>
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
                                <?php
                                $int = 0 ;
                                 foreach($orders as $order) {
                                    $int++ ;?>
                            <tr>
                                <td class="font-14"><?= $int ?> </td>
                                <td class="font-16"><?= $order['order_id'] ?></td>
                                <td class="font-16"><?php echo $this->jalaliData($order['updated_at']) ?></td>
                                <td class="font-16"><?= $order['total_price'] ?> تومان</td>
                                <td class="font-16"> <?php if($order['status'] == 'pending') {?>
                            <span class="badge bg-warning">در انتظار </span>
                            <?php } elseif ($order['status'] == 'completed') {  ?>
                            <span class="badge bg-success">کامل شد </span> <?php } else { ?>
                            <span class="badge bg-danger">لغو شد</span> <?php }?></td>
                                <td class="font-14">
                                    <a href="<?php $this->url('/Userpanel/order_detail/' . $order['order_id']) ?>" class="btn border-0 main-color-one-bg waves-effect waves-light"><i class="bi bi-chevron-left"></i></a>
                                </td>
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

<!-- /content -->


<!-- start footer -->


<?php $this->include('app.layouts.footer'); ?>
