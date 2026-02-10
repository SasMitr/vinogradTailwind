import Post from "#/common/fetch/post.js";
import * as toastr from "#/common/toastr.js";
import * as handler from "#/common/handlerErrors.js";

export default function dateBuild(element) {

    const form = element.closest('form');

    const response = new Post (element.dataset.url);
    response.body ({
        form: form
    });
    response.success = function () {
        document.querySelector('.order-correspondence').innerHTML = response.data.success;
        toastr.success('Сообщение успешно отправлено.');
    }
    response.error = function () {
        handler.errorsHandler(response.data.errors, form);
    }
    response.send();

}
