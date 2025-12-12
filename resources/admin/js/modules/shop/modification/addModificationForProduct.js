import * as responce from "@/modules/components/resources.js";
import * as toastr from "@/modules/components/toastr.js";
import * as handler from "@/modules/components/handlerErrors.js";

function addModificationForProduct(modal) {
    let form = modal.querySelector('form');
    form.addEventListener('submit', (e) => {
        e.preventDefault();
        const url = form.getAttribute('action');
        const formData = new FormData(form);
        responce.post(url, formData)
            .then(data => {
                if(data.success) {

                    document.querySelector('#product_' + data.id).innerHTML = data.success;
                    modal.style.display = 'none';
                    toastr.success('Модификация успешно добавлена');

                } else if(data.errors){

                    toastr.errors(data.errors);
                    handler.errorsHandler(data.errors, form);

                }else{
                    toastr.errors('Что-то пошло не так. Перегрузите страницу и попробуйте снова.');
                }
            }).catch((xhr) => {
                toastr.errors(xhr.responseText);
                console.log(xhr);
            });
    });
}

export default addModificationForProduct;
