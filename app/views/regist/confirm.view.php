<main id="register" class="flex justify-center">
    <div class="w-1/2 mt-3 p-5">
        <h2 class="text-2xl mb-3 font-normal text-center">Sign Up</h2>
        <div class="bg-white border rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-4">
                <p class="text-center text-gray-700 text-md">この内容で登録しますか？</p>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-md font-bold mb-2" for="account_name">
                    アカウント名
                </label>
                <p class="appearance-none w-full py-2 px-0 text-gray-700" id="account_name">
                    <?= $posts['account_name'] ?>
                </p>
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-md font-bold mb-2" for="email">
                    Email
                </label>
                <p class="appearance-none w-full py-2 px-0 text-gray-700" id="email">
                    <?= $posts['email'] ?>
                </p>
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-md font-bold mb-2" for="name">
                    名前
                </label>
                <p class="appearance-none w-full py-2 px-0 text-gray-700" id="name">
                    <?= $posts['name'] ?>
                </p>
            </div>

            <form action="regist/add.php" method="post">
                <div class="flex">
                    <button id="submit_button" class="w-full
                        mx-1 mb-4 py-2 px-4
                        text-white 
                        bg-sky-500 
                        hover:bg-sky-700 
                        rounded-lg">
                        登録
                    </button>
                    <a href="regist/input.php" class="w-full
                        mx-1 mb-4 py-2 px-4
                        text-gray-500 
                        text-center
                        bg-gray-100
                        hover:bg-gray-200 
                        rounded">
                        修正
                    </a>
                </div>
            </form>

        </div>
    </div>
</main>