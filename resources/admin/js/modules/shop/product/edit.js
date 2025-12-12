import * as responce from "@/modules/components/resources.js";
import * as handler from "@/modules/components/handlerErrors.js";
import * as toastr from "@/modules/components/toastr.js";
import * as helper from "./helpers.js";
import removeGalleryImages from "./removeGalleryImages.js";

function edit(modal) {
    try {
        helper.choicesInit();

        let editor = CKEDITOR.replace('content');
        editor.config.height = '400px';
        let editor2 = CKEDITOR.replace('description');

        let form = modal.querySelector('form');
        const url = form.getAttribute('action');
        const id = form.getAttribute('data-product-id');

        helper.previewUploadImg(form, '#image', '#image_preview');
        helper.previewMultyUploadImg(form);

        removeGalleryImages(form);

        form.addEventListener('submit', (e) => {
            e.preventDefault();

            const formData = new FormData(form);
            formData.set('content', editor.getData());
            formData.set('description', editor2.getData());

            responce.post(url, formData)
                .then(data => {
                    if(data.success) {
                        document.querySelector('#row_' + id).innerHTML = data.success;
                        modal.style.display = 'none';
                        toastr.success('Обновления успешно сохранены!');

                    } else if(data.errors){
                        toastr.errors(data.errors);
                        handler.errorsHandler(data.errors, form);

                    }else{
                        toastr.errors('Что-то пошло не так. Перегрузите страницу и попробуйте снова.');
                        console.log(data);
                    }

                }).catch((xhr) => {
                    toastr.errors(xhr.responseText);
                    console.log(xhr);
            });
        });
    }
    catch (e) {}
}

export default edit;
