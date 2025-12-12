import * as responce from "@/modules/components/resources.js";
import * as handler from "@/modules/components/handlerErrors.js";
import * as toastr from "@/modules/components/toastr.js";
import * as helper from "./helpers.js";

function create(modal) {
    try {
        helper.choicesInit();

        let editor = CKEDITOR.replace('content');
        editor.config.height = '400px';
        let editor2 = CKEDITOR.replace('description');

        let form = modal.querySelector('form');

        helper.previewUploadImg(form, '#image', '#image_preview');
        helper.previewMultyUploadImg(form);

        form.addEventListener('submit', (e) => {
            e.preventDefault();
            const url = form.getAttribute('action');

            const formData = new FormData(form);
            formData.set('content', editor.getData());
            formData.set('description', editor2.getData());

            responce.post(url, formData)
                .then(data => {
                    if(data.success) {

                        let tr = document.createElement('tr');
                        tr.setAttribute('id', 'row_' + data.id);
                        tr.innerHTML = data.success;
                        document.querySelector('tbody').prepend(tr);

                        modal.style.display = 'none';
                        toastr.success('Новый товар успешно добавлен!!');

                    } else if(data.errors){

                        handler.errorsHandler(data.errors, form);
                        toastr.errors(data.errors);

                    }else{
                        console.log(data);
                        toastr.errors('Что-то пошло не так. Перегрузите страницу и попробуйте снова.');
                    }
                }).catch((xhr) => {
                    toastr.errors(xhr.responseText);
                    console.log(xhr.responseText);
                });

        });
    }
    catch (e) {}
}

export default create;
