import Post from "#/common/fetch/post.js";
import * as handler from "#/common/handlerErrors.js";
import * as toastr from "#/common/toastr.js";
import * as helper from "./helpers.js";
import removeGalleryImages from "./removeGalleryImages.js";

export default function edit(modal) {
    try {
        helper.choicesInit();

        let editor = CKEDITOR.replace('content');
        editor.config.height = '400px';
        let editor2 = CKEDITOR.replace('description');

        let form = modal.get().querySelector('form');
        const id = form.getAttribute('data-id');

        helper.previewUploadImg(form, '#image', '#image_preview');
        helper.previewMultyUploadImg(form);

        removeGalleryImages(form);

        form.addEventListener('submit', (e) => {
            e.preventDefault();

            const response = new Post (form.getAttribute('action'));
            response.body ({
                form: form,
                data: {
                    _method: 'patch',
                    content: editor.getData(),
                    description: editor2.getData()
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
    }
    catch (e) {}
}
