<?php $this->include('app.layouts.header' , ['user' => $user] ); 
 $this->include('app.layouts.sidbor', ['user' => $user] ); ?>

            <div class="col-lg-9">
                <div class="position-sticky top-0">
                    <div class="panel-latest-order">

                        <div class="row gy-3">
                          
                            <div class="col-12">
                                <div class="slider-parent rounded-3 py-4">
                                    <div class="container-fluid">
                                        <!-- Messages-->
                                        <?php foreach($messages as $message ) {?>
                                        <div class="comment <?php if($message['sender_id'] == $_SESSION['id_user']) echo "active" ?>">
                                            <div class="comment-author-ava"><img src="<?php $this->asset($message['img_prof']) ?>" alt="Avatar"></div>
                                            <div class="comment-body" style="width: 50%;  <?php if($message['sender_id'] !== $_SESSION['id_user']) echo "margin-right: 50%;" ?>">
                                              <u>  <p style="text-align: center;"><?= $message['title'] ?></p></u>
                                                <p class="comment-text">
                                                <?= $message['message'] ?>
                                                </p>
                                                <div class="comment-footer"><span class="comment-meta"><?= $message['username'] ?></span>
                                                    <div class="comment-date float-end"><span class="comment-meta"><?php  echo $this->jalaliData($message['created_at']) ?></span></div>

                                                </div>
                                            </div>
                                        </div>
<?php }?>

                                     
                                     <?php if($chath['status'] != 'open') {?>

                                        <div class="my-4">
                                            <div class="alert alert-danger text-center">
                                                تیکت بسته شده است و امکان ارسال پاسخ جدید وجود ندارد
                                            </div>
                                        </div>

                                          <?php } else {?>
                                        <!-- Reply Form-->
                                        <h5 class="mb-3">ارسال پیام</h5>
                                        <form method="post">
                                            <div class="form-group">
                                                <input type="text" class="input_titel "  name="titel" >
                                                <textarea class="form-control form-control-rounded" id="review_text" rows="8" placeholder="پیام خود را وارد کنید..." required=""></textarea>
                                            </div>
                                           
                                            </div>
                                            <div class="text-right">
                                                <button class="btn py-3 px-5 main-color-one-bg" type="submit">ارسال پیام</button>
                                            </div>
                                        </form>
                                        <?php }?>
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
