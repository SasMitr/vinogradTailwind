import * as responce from "#/common/resources.js";
import * as toastr from "#/common/toastr.js";
import * as handler from "#/common/handlerErrors.js";

function deliveryUpdate(modal) {
    try {
        let form = modal.querySelector('form');
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            const url = form.getAttribute('action');
            const formData = new FormData(form);
            responce.post(url, formData)
                .then(data => {
                    if(data.success) {
                        // console.log(data.orderCost);
                        document.querySelector('#delivery-data').innerHTML = data.success;
                        document.querySelector('#order-total-cost').innerHTML = data.orderCost;

                        modal.style.display = 'none';
                        toastr.success('Контактные данные обновлены');

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
    } catch (e) {}
}

export default deliveryUpdate;
