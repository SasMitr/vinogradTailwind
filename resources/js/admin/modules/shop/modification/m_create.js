import Post from "#/common/fetch/post.js";
import * as handler from "#/common/handlerErrors.js";
import * as toastr from "#/common/toastr.js";

function m_create(modal) {
    try {
        modal.width = '700px';

        let form = modal.get().querySelector('form');
        form.addEventListener('submit', (e) => {
            e.preventDefault();

            const response = new Post (form.getAttribute('action'));
            response.body ({
                form: form
            });
            response.success = function () {
                let tr = document.createElement('tr');
                tr.setAttribute('id', 'row_' + response.data.id);
                tr.innerHTML = response.data.success;
                document.querySelector('tbody').prepend(tr);

                modal.hide();
                toastr.success('Новая модификация добавлена!!');
            }
            response.error = function () {
                handler.errorsHandler(response.data.errors, form);
            }
            response.send();

        });

    } catch (e) {}
}

export default m_create;
