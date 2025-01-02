// Encrypt password using AES-256-CBC
document.querySelector('form').addEventListener('submit', function (event) {
    event.preventDefault(); // Prevent form from submitting

    const passwordField = document.querySelector('#floating_password');

    const key = CryptoJS.enc.Utf8.parse('hdgh6372dhbshdg637wyqb27t28syb2q'); // Should be same as backend- 32 digit
    const iv = CryptoJS.enc.Utf8.parse('8g2wg2mnw01b6w7w'); // Should be same as backend -16 digit

    const encryptedPassword = CryptoJS.AES.encrypt(passwordField.value, key, {
        iv: iv,
        mode: CryptoJS.mode.CBC,
        padding: CryptoJS.pad.Pkcs7
    }).toString();

    // Replace the password field value with the encrypted password
    passwordField.value = encryptedPassword;

    // Submit the form
    this.submit();
});
