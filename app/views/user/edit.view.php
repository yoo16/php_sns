<div class="mx-auto bg-white">
    <div class="w-full mt-3 p-5">
        <h2 class="text-2xl mb-3 font-normal font-bold text-center">Edit Profile</h2>

        <div class="flex justify-center items-center">
            <div class="bg-white p-8 rounded-lg">
                <h3 class="text-xl mb-4">Profile Image</h3>
                <form action="user/upload_profile_image.php" method="post" enctype="multipart/form-data" class="flex flex-col items-center">
                    <label for="image-input" class="cursor-pointer">
                        <img id="preview-image" src="<?= User::profileImageURLById($auth_user['id']) ?>" alt="Profile Picture" class="w-36 h-36 object-cover rounded-full mb-4">
                    </label>
                    <input onchange="selectProfileImage(this)" type="file" id="image-input" name="image" class="hidden" accept="image/*" required>
                    <button id="upload-button" class="w-full
                        mb-2 py-2 px-4 bg-sky-500 
                        hover:bg-sky-700 
                        text-white 
                        rounded-lg
                        hidden">
                        Upload
                    </button>
                </form>
            </div>
        </div>

        <form action="user/update.php" method="post">
            <h3 class="text-xl mb-4">User Profile</h3>
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