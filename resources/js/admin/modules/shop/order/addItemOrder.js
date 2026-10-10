import Post from "#/common/fetch/post.js";
import * as toastr from "#/common/toastr.js";

export default function addItemOrder(e) {
    try {
        if (e.target.closest('.add-item-order')) {
            e.preventDefault();

            const url = e.target.closest('form').getAttribute('action');
            const input = e.target.closest('.add-item-order').previousElementSibling;

            const response = new Post (url);
            response.body ({
                data: {
                    _method: 'patch',
                    modification_id: input.dataset.modification_id,
                    quantity: input.value
                }
            });
            response.success = function () {

                const modBloc = e.target.closest('.modifications-bloc');
                modBloc.innerHTML = response.data.success.modifications_bloc;

                document.querySelector('#order-table').innerHTML = response.data.success.order_table;
                toastr.success('Позиция добавлена в заказ');
            }
            response.send();
        }
    } catch (e) {}
}
