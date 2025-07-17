<?php $this->include('app.layouts.header', ['user' => $user, 'categories' => $categories]);  
      $this->include('app.layouts.sidbor', ['user' => $user]); ?>

<div class="col-lg-9">
    <div class="section-title">
        <div class="section-title-title">
            <h3 class="title-font h3 main-color-three-color">آخرین <span class="main-color-one-color">چت ها</span></h3>
        </div>
        <a href="<?php $this->url('/UserPanel/create_Chath') ?>" class="btn btn-primary btn-sm" style="border-radius: 5px; margin-top: 20px;">ایجاد چت جدید</a>
    </div>

    <div class="chat-list">
        <?php foreach($chaths as $chath): ?>
        <div class="chat-card">
            <div class="chat-row"><strong>شناسه:</strong> <?= $chath['chat_id'] ?></div>
            <div class="chat-row"><strong>عنوان:</strong> <?= $chath['titel'] ?></div>
            <div class="chat-row">
                <strong>وضعیت:</strong>
                <?php if($chath['status'] == 'open'): ?>
                    <span class="badge open">باز است</span>
                <?php else: ?>
                    <span class="badge closed">بسته است</span>
                <?php endif; ?>
            </div>
            <div class="chat-row"><strong>تاریخ بروزرسانی:</strong> <?= $this->jalaliData($chath['created_at']) ?></div>
            <div class="chat-row">
                <a href="<?php $this->url('/UserPanel/ticket_single_show/' .  $chath['chat_id']) ?>" class="btn main-color-three-bg btn-sm">ایجاد پیام و نمایش</a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<style>
.chat-list {
    display: flex;
    flex-direction: column;
    gap: 15px;
    padding: 10px;
}
.chat-card {
    background-color: #fff;
    padding: 15px;
    border-radius: 8px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    font-size: 16px;
}
.chat-row {
    margin-bottom: 8px;
    display: flex;
    flex-wrap: wrap;
    gap: 5px;
}
.badge.open {
    background-color: #28a745;
    color: white;
    padding: 3px 10px;
    border-radius: 5px;
    font-size: 14px;
}
.badge.closed {
    background-color: #dc3545;
    color: white;
    padding: 3px 10px;
    border-radius: 5px;
    font-size: 14px;
}
@media (max-width: 768px) {
    .chat-card {
        font-size: 14px;
        padding: 10px;
    }
    .chat-row {
        flex-direction: column;
    }
}
</style>

<?php $this->include('app.layouts.footer'); ?>
