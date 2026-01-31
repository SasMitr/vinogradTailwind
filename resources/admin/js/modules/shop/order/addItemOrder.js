import * as responce from "#/common/resources.js";
import * as toastr from "#/common/toastr.js";

function addItemOrder(e) {
    try {
        if (e.target.closest('.add-item-order')) {
            e.preventDefault();

            let url = e.target.closest('form').getAttribute('action');
            let input = e.target.closest('.add-item-order').previousElementSibling;

            let formData = new FormData();
            formData.set('_method', 'patch');
            formData.set('modification_id', input.dataset.modification_id);
            formData.set('quantity', input.value);

            responce.post(url, formData)
                .then(data => {
                    if(data.success) {

                        let modBloc = e.target.closest('.modifications-bloc');
                        modBloc.innerHTML = data.success.modifications_bloc;

                        document.querySelector('#order-table').innerHTML = data.success.order_table;

                        toastr.success('Позиция добавлена в заказ');

                    } else if(data.errors){
                        toastr.errors(data.errors);
                    }else{
                        toastr.errors('Что-то пошло не так. Перегрузите страницу и попробуйте снова.');
                    }
                }).catch((xhr) => {
                toastr.errors(xhr.responseText);
                console.log(xhr.responseText);
            });
        }
    } catch (e) {}
}

export default addItemOrder;
