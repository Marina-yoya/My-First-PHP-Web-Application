const form = document.getElementById("form");
const registerBtn = document.querySelector("button[type='submit']");
registerBtn.addEventListener("click", validateForm);

function validateForm(e) {

    let username = document.querySelector("[name='username']").value;
    let email = document.querySelector("[name='email']").value;
    let phone = document.querySelector("[name='phone']").value;
    let password = document.querySelector("[name='password']").value;

    const usernameError = document.getElementById("username-error");
    const emailError = document.getElementById("email-error");
    const phoneError = document.getElementById("phone-error");
    const passwordError = document.getElementById("password-error");

    usernameError.textContent = username === "" ? "Username must be filled out" : "";
    emailError.textContent = email === "" ? "Email must be filled out" : "";
    phoneError.textContent = phone === "" ? "Phone must be filled out" : "";
    passwordError.textContent = password === "" ? "Password must be filled out" : "";

    if (username === "" || email === "" || phone === "" || password === "") {
        e.preventDefault();
    } else {

        form.submit();
    }
}



