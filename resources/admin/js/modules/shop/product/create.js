import Post from "#/common/fetch/post.js";
import * as handler from "#/common/handlerErrors.js";
import * as toastr from "#/common/toastr.js";
import * as helper from "./helpers.js";

function create(modal) {
    try {
        helper.choicesInit();

        let editor = CKEDITOR.replace('content');
        editor.config.height = '400px';
        let editor2 = CKEDITOR.replace('description');

        let form = modal.get().querySelector('form');

        helper.previewUploadImg(form, '#image', '#image_preview');
        helper.previewMultyUploadImg(form);

        form.addEventListener('submit', (e) => {
            e.preventDefault();

            const response = new Post (form.getAttribute('action'));
            response.body ({
                form: form,
                data: {
                    // _method: 'patch',
                    content: editor.getData(),
                    description: editor2.getData()
                }
            });
            response.success = function () {
                const tr = document.createElement('tr');
                tr.setAttribute('id', 'row_' + response.data.id);
                tr.innerHTML = response.data.success;
                document.querySelector('tbody').prepend(tr);

                modal.hide();
                toastr.success('Новый товар успешно добавлен!!');
            }
            response.error = function () {
                handler.errorsHandler(response.data.errors, form);
            }
            response.send();

        });
    }
    catch (e) {}
}

export default create;
