<div class="mx-auto bg-white">
    <div class="relative mb-1">
        <img src="images/banner.jpg" alt="Banner" class="w-full h-52 object-cover">
        <img src="images/me.png" alt="Profile Picture" class="absolute bottom-0 left-20 transform -translate-x-1/2 w-32 h-32 rounded-full border-4 border-white">

        <div class="flex justify-end my-4">
            <a href="user/edit.php" class="border border-gray-300 text-gray-500 py-2 px-4 rounded-lg">Edit Profile</a>
        </div>
    </div>

    <div class="w-full mt-3 p-5">
        <h2 class="text-2xl mb-3 font-normal text-center">Edit Profile</h2>
        <form action="user/update.php" method="post">
            <div class="relative mb-4">
                <input class="block
                        px-2.5 pb-2.5 pt-6 mb-3
                        w-full rounded-lg
                        text-sm 
                        text-gray-900 
                        ring-1 ring-gray-300 
                        focus:outline-none 
                        focus:ring-1 
                        focus:ring-blue-600 
                        peer" type="text" name="account_name" id="account_name" value="<?= @$auth_user['account_name'] ?>" placeholder=" " disabled>
                <label for="account_name" class="absolute 
                        text-sm text-gray-400 
                        duration-300 
                        transform -translate-y-4 scale-75 
                        top-4 
                        origin-[0] start-2.5 
                        peer-focus:px-0
                        peer-focus:text-blue-600 
                        peer-focus:dark:text-blue-500 
                        peer-placeholder-shown:scale-100 
                        peer-placeholder-shown:translate-y-0 
                        peer-focus:scale-75 
                        peer-focus:-translate-y-4">
                    アカウント名
                </label>
                <p class="text-sm text-red-600"><?= @$errors['email'] ?></p>
            </div>
            <div class="relative mb-4">
                <input class="block
                        px-2.5 pb-2.5 pt-6 mb-3
                        w-full rounded-lg
                        text-sm 
                        text-gray-900 
                        ring-1 ring-gray-300 
                        focus:outline-none 
                        focus:ring-1 
                        focus:ring-blue-600 
                        peer" oninput="checkRegisterInputs()" type="email" name="email" id="email" value="<?= @$auth_user['email'] ?>" placeholder=" " disabled>
                <label for="email" class="absolute 
                        text-sm text-gray-400 
                        duration-300 
                        transform -translate-y-4 scale-75 
                        top-4 
                        origin-[0] start-2.5 
                        peer-focus:px-0
                        peer-focus:text-blue-600 
                        peer-focus:dark:text-blue-500 
                        peer-placeholder-shown:scale-100 
                        peer-placeholder-shown:translate-y-0 
                        peer-focus:scale-75 
                        peer-focus:-translate-y-4">
                    Email
                </label>
                <p class="text-sm text-red-600"><?= @$errors['email'] ?></p>
            </div>

            <div class="relative mb-4">
                <input class="block
                        px-2.5 pb-2.5 pt-6 mb-3
                        w-full rounded-lg
                        text-sm 
                        text-gray-900 
                        ring-1 ring-gray-300 
                        focus:outline-none 
                        focus:ring-1 
                        focus:ring-blue-600 
                        peer" oninput="checkRegisterInputs()" type="text" name="name" id="name" value="<?= @$auth_user['name'] ?>" placeholder=" " required>
                <label for="name" class="absolute 
                        text-sm text-gray-400 
                        duration-300 
                        transform -translate-y-4 scale-75 
                        top-4 
                        origin-[0] start-2.5 
                        peer-focus:px-0
                        peer-focus:text-blue-600 
                        peer-focus:dark:text-blue-500 
                        peer-placeholder-shown:scale-100 
                        peer-placeholder-shown:translate-y-0 
                        peer-focus:scale-75 
                        peer-focus:-translate-y-4">
                    名前
                </label>
                <p class="text-sm text-red-600"><?= @$errors['name'] ?></p>
            </div>


            <div class="relative mb-4">
                <textarea id="profile" oninput="autoResize(this)" name="profile" class="block
                        px-2.5 pb-2.5 pt-6 mb-3
                        w-full rounded-lg
                        text-sm 
                        text-gray-900 
                        ring-1 ring-gray-300 
                        focus:outline-none 
                        focus:ring-1 
                        focus:ring-blue-600 
                        peer" placeholder=" "><?= @$auth_user['profile'] ?></textarea>
                <label for="profile" class="absolute 
                        text-sm text-gray-400 
                        duration-300 
                        transform -translate-y-4 scale-75 
                        top-4 
                        origin-[0] start-2.5 
                        peer-focus:px-0
                        peer-focus:text-blue-600 
                        peer-focus:dark:text-blue-500 
                        peer-placeholder-shown:scale-100 
                        peer-placeholder-shown:translate-y-0 
                        peer-focus:scale-75 
                        peer-focus:-translate-y-4">
                    自己紹介
                </label>
            </div>

            <div>
                <button id="submit_button" class="w-full
                        mb-2 py-2 px-4 bg-sky-500 
                        hover:bg-sky-700 
                        text-white 
                        rounded-lg">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    autoResize(document.getElementById('profile'))
</script>