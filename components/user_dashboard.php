<?php

use App\Models\User;
?>

<div class="relative mb-1">
    <img src="images/banner.jpg" alt="Banner" class="w-full h-52 object-cover">
    <img src="<?= User::profileImage($user_data) ?>" alt="Profile Picture" class="absolute bottom-0 left-20 transform -translate-x-1/2 w-32 h-32 rounded-full border-4 border-white object-cover">

    <!-- プロフィール編集リンク表示 -->
    <?php if ($auth_user['id'] == $user_data['id']): ?>
        <div class="flex justify-end my-4">
            <a href="user/edit.php" class="border border-gray-300 text-gray-800 font-bold py-2 px-4 rounded-lg">プロフィールを編集</a>
        </div>
    <?php endif ?>
</div>

<div class="px-6">
    <h2 class="text-2xl font-bold mb-2">
        <?= $user_data['display_name'] ?>
    </h2>
    <div class="text-gray-600 mb-4">
        <span>@<?= $user_data['account_name'] ?></span>
        <span class="text-gray-600 ml-2">
            📅
            Joined
            <?= date('Y.m.d', strtotime($user_data['created_at'])) ?>
        </span>
    </div>
    <div class="text-gray-600 text-sm">
        <?= nl2br($user_data['profile'] ?? "") ?>
    </div>
</div>

<div class="border-t border-gray-300 mt-4">
    <? if ($tweets) : ?>
        <?php foreach ($tweets as $value): ?>
            <div class="row">
                <?php include COMPONENT_DIR . 'tweet.php' ?>
            </div>
        <?php endforeach ?>
    <? endif ?>
</div>