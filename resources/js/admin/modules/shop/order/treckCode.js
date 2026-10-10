import Post from "#/common/fetch/post.js";
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

            const response = new Post (element.dataset.url);
            response.body ({
                data: {
                    _method: 'patch',
                    track_code: newValue
                }
            });
            response.success = function () {
                element.innerHTML = newValue;
                toastr.success('Трек код сохранен');
            }
            response.error =
            response.failing =
            response.catching = function () {
                element.innerHTML = oldValue;
            }
            response.send();

        });

        // в случае нажатия клавиши Enter делаем то же самое, что и при уходе фокуса
        textarea.addEventListener("keydown", function (event) {
            if (event.code == "Enter") textarea.blur();
        });
    } catch (e) {}
}

export default treckCode;
