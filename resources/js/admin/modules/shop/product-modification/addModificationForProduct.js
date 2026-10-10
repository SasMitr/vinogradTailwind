import Post from "#/common/fetch/post.js";
import * as toastr from "#/common/toastr.js";
import * as handler from "#/common/handlerErrors.js";

export default function addModificationForProduct(modal) {

    let form = modal.get().querySelector('form');
    form.addEventListener('submit', (e) => {
        e.preventDefault();

        const response = new Post (form.getAttribute('action'));
        response.body ({
            form: form
        });
        response.success = function () {
            document.querySelector('#product_' + response.data.id).innerHTML = response.data.success;
            modal.hide();
            toastr.success('Модификация успешно добавлена');
        }
        response.error = function () {
            handler.errorsHandler(response.data.errors, form);
        }
        response.send();

    });
}
