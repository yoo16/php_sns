<div class="flex p-4 border-b border-gray-200">
    <!-- プロフィール画像 -->
    <div class="flex-shrink-0">
        <img src="images/me.png" alt="User Icon" class="rounded-full w-12 h-12">
    </div>
    <!-- ツイート本文 -->
    <div class="ml-4 flex-1">
        <!-- ユーザ情報 -->
        <div class="flex items-center">
            <span class="font-bold text-gray-900"><?= $value['display_name'] ?></span>
            <span class="ml-2 text-gray-500">@<?= $value['account_name'] ?></span>
            <span class="ml-2 text-gray-500 text-sm"><?= $value['created_at'] ?></span>
        </div>

        <!-- メッセージ -->
        <div class="mt-2 mb-2 text-gray-800">
            <?= nl2br($value['message']) ?>
        </div>

        <!-- アップロード画像 -->
        <?php if (File::isExistsLocal($value['image_path'])): ?>
            <div class="mt-2">
                <img src="<?= $value['image_path'] ?>" class="rounded-lg max-w-lg">
            </div>
        <?php endif; ?>

        <!-- ナビゲーション（アクション系アイコン） -->
        <?php include COMPONENT_DIR . 'tweet_nav.php' ?>
    </div>
</div>