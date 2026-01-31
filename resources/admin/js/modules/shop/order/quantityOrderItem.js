import * as responce from "#/common/resources.js";
import * as toastr from "#/common/toastr.js";

function quantityOrderItem(input) {
    try {
        const formData = new FormData();
        formData.set('_method', 'patch');
        formData.set('quantity', input.value);
        formData.set('item_id', input.dataset.item_id);

        responce.post(input.dataset.url, formData)
            .then(data => {
                if(data.success) {
                    document.querySelector('#order-table').innerHTML = data.success.order_table;
                    toastr.success('Заказ успешно обновлен');

                } else if(data.errors){
                    toastr.errors(data.errors);
                }else{
                    toastr.errors('Что-то пошло не так. Перегрузите страницу и попробуйте снова.');
                }
            }).catch((xhr) => {
                toastr.errors(xhr.responseText);
                console.log(xhr);
            });

    } catch (e) {}
}

export default quantityOrderItem;
