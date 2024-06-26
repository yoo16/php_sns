<div class="mx-auto bg-white">
    <div class="relative mb-1">
        <img src="images/banner.jpg" alt="Banner" class="w-full h-52 object-cover">
        <img src="<?= User::profileImageURLById($auth_user['id']) ?>" alt="Profile Picture" class="absolute bottom-0 left-20 transform -translate-x-1/2 w-32 h-32 rounded-full border-4 border-white">

        <div class="flex justify-end my-4">
            <a href="user/edit.php" class="border border-gray-300 text-gray-800 py-2 px-4 rounded-lg">Edit Profile</a>
        </div>
    </div>

    <div class="p-6">
        <h2 class="text-2xl font-bold mb-2"><?= $auth_user['name'] ?></h2>
        <p class="text-gray-600 mb-4">@<?= $auth_user['account_name'] ?></p>
        <div class="flex items-center space-x-4 mb-4">
            <div class="flex items-center space-x-2">
                <img src="images/svg/calendar.svg" class="w-5 h-5">
                <span class="text-gray-600">Joined <?= date('Y.m.d', strtotime($auth_user['created_at'])) ?></span>
            </div>
        </div>
        <p class="text-gray-600 text-sm">
            <?= nl2br($auth_user['profile']) ?>
        </p>
    </div>

    <? if ($tweets) : ?>
        <div class="mt-5">
            <!-- Tweetの繰り返し表示 -->
            <?php foreach ($tweets as $tweet) : ?>
                <?php include(VIEW_DIR . 'components/tweet.php') ?>
            <?php endforeach ?>
        </div>
    <? endif ?>
</div>