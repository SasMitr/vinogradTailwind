import * as responce from "#/common/resources.js";
import * as toastr from "#/common/toastr.js";
import * as UI from "#/common/UI.js";

function treckCode(element) {
    try {
        let oldValue = element.innerHTML.trim();

        let textarea = UI.textarea();
        textarea.value = oldValue;

        element.innerHTML = '';
        element.appendChild(textarea);
        textarea.focus();

        textarea.addEventListener("blur", function () {
            let newValue = textarea.value.trim();
            textarea.remove();

            if (oldValue === newValue) {
                element.innerHTML = oldValue;
                return;
            }

            element.innerHTML = UI.spinner();

            let formData = new FormData();
            formData.set('_method', 'patch');
            formData.set('track_code', newValue);

            responce.post(element.dataset.url, formData)
                .then(data => {
                    if (data.success) {
                        element.innerHTML = newValue;
                        toastr.success('Трек код сохранен');
                    } else if (data.errors) {
                        element.innerHTML = oldValue;
                        toastr.errors(data.errors);
                    } else {
                        element.innerHTML = oldValue;
                        toastr.errors('Неизвестная ошибка. Повторите попытку, пожалуйста!');
                    }
                }).catch((xhr) => {
                element.innerHTML = oldValue;
                toastr.errors(xhr.responseText);
                console.log(xhr.responseText);
            });
        });

        // в случае нажатия клавиши Enter делаем то же самое, что и при уходе фокуса
        textarea.addEventListener("keydown", function (event) {
            if (event.code == "Enter") textarea.blur();
        });
    } catch (e) {}
}

export default treckCode;
