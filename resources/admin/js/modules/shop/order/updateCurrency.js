import * as responce from "#/common/resources.js";
import * as toastr from "#/common/toastr.js";

function updateCurrency(element) {
    try {
        let formData = new FormData();
        formData.set('_method', 'patch');
        formData.set('currency', element.dataset.currency);

        responce.post(element.getAttribute('href'), formData)
            .then(data => {
                if (data.success) {
                    toastr.success('Обновлена валюта заказа.');
                    setTimeout(function () {
                        location.reload();
                    }, 1000);
                } else if (data.errors) {
                    toastr.errors(data.errors);
                } else {
                    toastr.errors('Неизвестная ошибка. Повторите попытку, пожалуйста!');
                }
            }).catch((xhr) => {
                toastr.errors(xhr.responseText);
                console.log(xhr.responseText);
            });
    }catch (e) {}
}

export default updateCurrency;
