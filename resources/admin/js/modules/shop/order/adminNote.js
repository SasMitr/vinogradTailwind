import Post from "#/common/fetch/post.js";
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

            const response = new Post (item.dataset.url);
            response.body ({
                data: {
                    _method: 'patch',
                    admin_note: newValue
                }
            });
            response.success = function () {
                item.innerHTML = newValue;
                toastr.success('Примечание сохранено');
            }
            response.error =
            response.failing =
            response.catching = function () {
                item.innerHTML = oldValue;
            }
            response.send();
        });

        // в случае нажатия клавиши Enter делаем то же самое, что и при уходе фокуса
        textarea.addEventListener("keydown", function (event) {
            if (event.code == "Enter") textarea.blur();
        });

    } catch (e) {}
}

export default adminNote;
