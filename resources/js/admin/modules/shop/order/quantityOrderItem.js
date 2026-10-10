import Post from "#/common/fetch/post.js";
import * as toastr from "#/common/toastr.js";

export default function quantityOrderItem(input) {
    try {

        const response = new Post (input.dataset.url);
        response.body ({
            data: {
                _method: 'patch',
                quantity: input.value,
                item_id: input.dataset.item_id
            }
        });
        response.success = function () {
            document.querySelector('#order-table').innerHTML = response.data.success.order_table;
            toastr.success('Заказ успешно обновлен');
        }
        response.send();

    } catch (e) {}
}
