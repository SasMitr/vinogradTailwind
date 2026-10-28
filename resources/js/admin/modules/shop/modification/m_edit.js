import Post from "#/common/fetch/post.js";
import * as handler from "#/common/handlerErrors.js";
import * as toastr from "#/common/toastr.js";

function m_create(modal) {
    try {
        let form = modal.get().querySelector('form');
        const id = form.getAttribute('data-id');

        form.addEventListener('submit', (e) => {
            e.preventDefault();

            const response = new Post (form.getAttribute('action'));
            response.body ({
                form: form,
                data: {
                    id: id
                }
            });
            response.success = function () {
                document.querySelector('#row_' + id).innerHTML = response.data.success;
                modal.hide();
                toastr.success('Обновления успешно сохранены!');
            }
            response.error = function () {
                handler.errorsHandler(response.data.errors, form);
            }
            response.send();

        });
    } catch (e) {}
}

export default m_create;
