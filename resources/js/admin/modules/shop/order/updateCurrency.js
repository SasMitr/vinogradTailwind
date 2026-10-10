import Post from "#/common/fetch/post.js";
import * as toastr from "#/common/toastr.js";

function updateCurrency(element) {
    try {

        const response = new Post (element.getAttribute('href'));
        response.body ({
            data: {
                _method: 'patch',
                currency: element.dataset.currency
            }
        });
        response.success = function () {
            toastr.success('Обновлена валюта заказа.');
            setTimeout(function () {
                location.reload();
            }, 1000);
        }
        response.send();

    }catch (e) {}
}

export default updateCurrency;
