<?php $this->include('app.layouts.footer'); ?>
<?php $this->include('app.layouts.header' , compact('categories')); ?>
<?php $this->dd() ?>
<?php $this->url() ?>
<?php $this->asset() ?>
<?php $this->include('app.layouts.header'); ?>
<?php $this->include('app.layouts.header' ,['user' => $user, 'categories' => $categories]); 
