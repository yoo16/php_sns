<div class="flex my-5">
    <img src="<?= User::profileImageURLById($auth_user['id']) ?>" class="rounded-full h-10 w-10 mr-3">
    <div class="hidden sm:inline">
        <p class="font-bold"><?= $auth_user['name'] ?></p>
        <p class="text-gray-500">@<?= $auth_user['account_name'] ?></p>
    </div>
</div>