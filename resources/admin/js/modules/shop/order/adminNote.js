import * as responce from "#/common/resources.js";
import * as toastr from "#/common/toastr.js";
import * as UI from "#/common/UI.js";

function adminNote(item) {
    try {
        let oldValue = item.innerHTML.trim();

        let textarea = UI.textarea();
        textarea.value = oldValue;

        item.innerHTML = '';
        item.appendChild(textarea);
        textarea.focus();

        textarea.addEventListener("blur", function () {
            let newValue = textarea.value.trim();
            textarea.remove();

            if (oldValue === newValue) {
                item.innerHTML = oldValue;
                return;
            }

            item.innerHTML = UI.spinner();

            let formData = new FormData();
            formData.set('_method', 'patch');
            formData.set('admin_note', newValue);

            responce.post(item.dataset.url, formData)
                .then(data => {
                    if (data.success) {
                        item.innerHTML = newValue;
                        toastr.success('Примечание сохранено');
                    } else if (data.errors) {
                        item.innerHTML = oldValue;
                        toastr.errors(data.errors);
                    } else {
                        item.innerHTML = oldValue;
                        toastr.errors('Неизвестная ошибка. Повторите попытку, пожалуйста!');
                    }
                }).catch((xhr) => {
                    item.innerHTML = oldValue;
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

export default adminNote;
