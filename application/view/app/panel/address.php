<?php $this->include('app.layouts.header' , ['user' => $user] );   
 $this->include('app.layouts.sidbor', ['user' => $user] ); ?>  

<div class="col-lg-9">  
    <div class="section-title">  
        <div class="section-title-title">  
            <h3 class="title-font h3 main-color-three-color">آدرس های<span class="main-color-one-color"> ثبت شده </span>  
            </h3>  
        </div>  
        <!-- دکمه ایجاد آدرس جدید -->  
        <div>  
        <a href="<?php $this->url('/Userpanel/create_address') ?>" class="btn btn-primary btn-sm" style="border-radius: 5px; margin-top: 20px;">ایجاد آدرس جدید</a>  
        </div>  
    </div>  
    <div class="content-box slider-parent rounded-4">  
        <div class="container-fluid">   
            <div class="row"> <?php foreach($adders as $adder) {?> 
                <div class="col-md-4">  
                    <div class="bg-white card addresses-item mb-4 shadow-sm">
                            
                        <div class="gold-members p-4">  
                           
                            <div class="media">  
                                
                                <div class="media-body">  
                                    <h6 class="mb-1"><?= $adder['AddressText'] ?></h6>  
                                    <span><?php echo $this->jalaliData($adder['UpdatedAt']) ?></span>  
                                    <p class="text-overflow-2 address-line">  
                                    <?= $adder['Title'] ?>  
                                    </p>  
                                    <p class="mb-0 text-black font-weight-bold">  
                                        <a class="text-danger" data-toggle="modal"   
                                            href="<?php $this->url('/UserPanel/delete_adders/'. $adder['AddressID'] ) ?>"><i class="bi bi-trash"></i> </a>  
                                            
                                    </p>  
                                </div>  
                                
                            </div>  
                        </div>  
                         
                    </div>  
                </div> 

            </div>  <?php }?> 
        </div>   
    </div>  
</div>  

<?php $this->include('app.layouts.footer'); ?>