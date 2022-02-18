const form = document.querySelector("form");
const emailInput = form.querySelector('input[name="email"]');
const passwordInput = form.querySelector('input[name="password"]');
const confirmedPasswordInput = form.querySelector('input[name="confirmedPassword"]');

function isEmail(email) {
    return /\S+@\S+\.\S+/.test(email);
}

function arePasswordsSame(password, confirmedPassword) {
    return password === confirmedPassword;
}

function is8Chars(password){
    return password.length>7;
}

function isSpecialChar(password){
    let format = /[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;
    return format.test(password)
}

function markValidation(element, condition, message) {
    let remove = 0, add=0;
    if(!condition && !element.classList.contains('no-valid')) add=1;
    if(condition && element.classList.contains('no-valid')) remove=1;
    if(add){
        element.insertAdjacentHTML('beforebegin', message);
    }
    if (remove) {
        element.classList.remove('no-valid');
        element.previousSibling.remove();
    }
    if(!condition) element.classList.add('no-valid');
}

function validateEmail() {
    setTimeout(function () {
            markValidation(emailInput, isEmail(emailInput.value), "Nieprawidłowy format email!");
        },
        1000
    );
}

function validatePassword() {
    setTimeout(function() {
            markValidation(passwordInput, is8Chars(passwordInput.value), "Hasło musi mieć min. 8 znaków i znak specjalny!");
        },
        1000
    );
    setTimeout(function() {
            markValidation(passwordInput, isSpecialChar(passwordInput.value), "Hasło musi mieć min. 8 znaków i znak specjalny!");
        },
        1000
    );

}

function validateConfirmedPassword() {
    setTimeout(function () {
            const condition = arePasswordsSame(
                confirmedPasswordInput.previousElementSibling.value,
                confirmedPasswordInput.value
            );
            markValidation(confirmedPasswordInput, condition, "Hasła nie zgadzają się!");
        },
        1000
    );
}

emailInput.addEventListener('keyup', validateEmail);
passwordInput.addEventListener('keyup', validatePassword);
confirmedPasswordInput.addEventListener('keyup', validateConfirmedPassword);