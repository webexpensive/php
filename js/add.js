let elementArticle = document.getElementById('formElemArticle');

if (typeof(elementArticle) != 'undefined' && elementArticle != null) {

    formElemArticle.onsubmit = async (e) => {
        e.preventDefault();

        let response = await fetch('/articles/add/', {
            method: 'POST',
            body: new FormData(formElemArticle)
        });

        let result = await response.json();

        let div = document.getElementById('FormAlertArticle');
        while (div.firstChild) {
            div.removeChild(div.firstChild);
        }

        if (result.error != 0) {
            FormAlertArticle.insertAdjacentHTML('afterbegin', '<div class="alert alert-danger" role="alert">' + result.error + '</div>');
        } else {
            FormAlertArticle.insertAdjacentHTML('afterbegin', '<div class="alert alert-success" role="alert">Статья успешно добавлена</div>');
            elementArticle.reset();
        }

    };

}

let elementArticleEdit = document.getElementById('formElemArticleEdit');

if (typeof(elementArticleEdit) != 'undefined' && elementArticleEdit != null) {

    formElemArticleEdit.onsubmit = async (e) => {
        e.preventDefault();

        let response = await fetch('', {
            method: 'POST',
            body: new FormData(formElemArticleEdit)
        });

        let result = await response.json();

        let div = document.getElementById('FormAlertArticleEdit');
        while (div.firstChild) {
            div.removeChild(div.firstChild);
        }

        if (result.error != 0) {
            FFormAlertArticleEdit.insertAdjacentHTML('afterbegin', '<div class="alert alert-danger" role="alert">' + result.error + '</div>');
        } else {
            FormAlertArticleEdit.insertAdjacentHTML('afterbegin', '<div class="alert alert-success" role="alert">Изменения сохранены</div>');
        }

    };

}
