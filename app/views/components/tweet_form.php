<!-- Tweet投稿フォーム -->
<form action="tweet/add.php" method="post">
    <div class="flex ml-3">
        <div class="min-w-max">
            <img src="<?= User::profileImageURLById($auth_user['id']) ?>" class="rounded-full h-10 w-10">
        </div>
        <textarea oninput="autoResize(this)" required name="message" class="w-full pt-2 pl-3 text-lg h-24 focus:outline-none" placeholder="いまどうしてる？"></textarea>
    </div>

    <div class="mt-3 mb-3 text-center">
        <button class="bg-blue-500 text-white font-bold py-2 px-4 rounded-full w-1/2">ポストする</button>
    </div>
</form>