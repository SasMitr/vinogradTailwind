import * as responce from "@/modules/components/resources.js";
import * as toastr from "@/modules/components/toastr.js";

function updateModificationForProduct(form) {

    const url = form.getAttribute('action');

    const formData = new FormData(form);
    responce.post(url, formData)
        .then(data => {
            if(data.success) {

                document.querySelector('#product_' + data.id).innerHTML = data.success;
                toastr.success('Модификация успешно обновлена');

            } else if(data.errors){
                toastr.errors(data.errors);
            }else{
                toastr.errors('Что-то пошло не так. Перегрузите страницу и попробуйте снова.');
            }
        }).catch((xhr) => {
            toastr.errors(xhr.responseText);
            console.log(xhr);
    });
}

export default updateModificationForProduct;
