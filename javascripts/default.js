const API_KEY = 'xxxx';

checkRegisterInputs = () => {
    const accountNameInput = document.getElementById('account_name');
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');
    const nameInput = document.getElementById('name');
    const submitButton = document.getElementById('submit_button');

    const accountName = accountNameInput.value.trim();
    const email = emailInput.value.trim();
    const password = passwordInput.value.trim();
    const name = nameInput.value.trim();

    submitButton.disabled = (accountName == '' || email == '' || password == '' || name == '');
}

login = () => {
    document.getElementById('modal-loading').classList.remove('hidden');
}

checkLoginInputs = () => {
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');
    const submitButton = document.getElementById('submit_button');

    const email = emailInput.value.trim();
    const password = passwordInput.value.trim();
    submitButton.disabled = (email == '' || password == '');
}

autoResize = (textarea) => {
    textarea.style.height = 'auto';
    textarea.style.height = textarea.scrollHeight + 'px';
}

selectProfileImage = (event) => {
    const previewImage = document.getElementById('preview-image');

    const file = event.files[0];
    previewImage.src = URL.createObjectURL(file);
    document.getElementById('upload-button').classList.remove('hidden');
}

getLocation = () => {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            (position) => {
                var latitude = position.coords.latitude;
                var longitude = position.coords.longitude;

                var url = `https://maps.googleapis.com/maps/api/geocode/json?latlng=${latitude},${longitude}&key=${API_KEY}`
                fetch(url)
                    .then(response => response.json())
                    .then(data => {
                        const city = data.results[0].address_components.find(component => component.types.includes('locality')).long_name;
                        console.log(`The city is ${city}`);
                    })
                    .catch(error => console.error(error));
            },
            (error) => {
                console.error("位置情報の取得に失敗しました: ", error);
            }
        );
    }
}