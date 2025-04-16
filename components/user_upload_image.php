<?php

use App\Models\User;
?>
<div class="flex justify-center items-center">
    <div class="bg-white p-8 rounded-lg">
        <form action="user/upload_profile_image.php" method="post" enctype="multipart/form-data" class="flex flex-col items-center">
            <label for="image-input" class="cursor-pointer">
                <img id="preview-image" src="<?= User::profileImage($auth_user) ?>" alt="Profile Picture" class="w-36 h-36 object-cover rounded-full mb-4">
            </label>
            <input onchange="selectProfileImage(this)" type="file" id="image-input" name="file" class="hidden" accept="image/*" required>
            <button id="upload-button"
                class="w-full mb-2 py-2 px-4 bg-sky-500 hover:bg-sky-700 text-white rounded-lg hidden">
                Upload
            </button>
        </form>
    </div>
</div>