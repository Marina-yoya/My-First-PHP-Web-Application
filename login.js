const form = document.getElementById("form");
const loginBtn = document.querySelector("button[type='submit']");
loginBtn.addEventListener("click", validateForm);

function validateForm(e) {

    e.preventDefault();
    let email = document.querySelector("[name='email']").value;
    let password = document.querySelector("[name='password']").value;
    const emailError = document.getElementById("email-error");
    const passwordError = document.getElementById("password-error");
    emailError.textContent = email === "" ? "Email must be filled out" : "";
    passwordError.textContent = password === "" ? "Password must be filled out" : "";

    if (email === "" || password === "") {
        e.preventDefault();
    } else {
         
        form.submit();
    }

    
}

