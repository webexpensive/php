let elementLogin = document.getElementById('formElemLogin');
let elementReg = document.getElementById('formElemReg');

if (typeof(elementLogin) != 'undefined' && elementLogin != null) {

    formElemLogin.onsubmit = async (e) => {
        e.preventDefault();

        let response = await fetch('/users/login/', {
            method: 'POST',
            body: new FormData(formElemLogin)
        });

        let result = await response.json();

        let div = document.getElementById('FormAlertLogin');
        while (div.firstChild) {
            div.removeChild(div.firstChild);
        }

        if (result.error != 0) {
            FormAlertLogin.insertAdjacentHTML('afterbegin', '<div class="alert alert-danger" role="alert">' + result.error + '</div>');
        } else {
            FormAlertLogin.insertAdjacentHTML('afterbegin', '<div class="alert alert-success" role="alert">Вы успешно авторизовались</div>');
            setTimeout("document.location.href='/'", 2000);
        }

    };

}

if (typeof(elementReg) != 'undefined' && elementReg != null) {

    formElemReg.onsubmit = async (e) => {
        e.preventDefault();

        let response = await fetch('/users/register/', {
            method: 'POST',
            body: new FormData(formElemReg)
        });

        let result = await response.json();

        let div = document.getElementById('FormAlertLogin');
        while (div.firstChild) {
            div.removeChild(div.firstChild);
        }

        if (result.error != 0) {
            FormAlertLogin.insertAdjacentHTML('afterbegin', '<div class="alert alert-danger" role="alert">' + result.error + '</div>');
        } else {
            FormAlertLogin.insertAdjacentHTML('afterbegin', '<div class="alert alert-success" role="alert">Вы успешно зарегистрированы</div>');
            setTimeout("document.location.href='/users/login/'", 2000);
        }

    };

}