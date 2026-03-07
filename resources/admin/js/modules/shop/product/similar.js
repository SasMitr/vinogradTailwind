import Post from "#/common/fetch/post.js";
import * as toastr from "#/common/toastr.js";

export default function similar ()
{
    const element = document.querySelector('#choices-multiple-remove-button');

    element.addEventListener('addItem', function(event) {
        send (element.dataset.add_url, event.detail.value);
    });

    element.addEventListener('removeItem', function(event) {
        send (element.dataset.remove_url, event.detail.value);
    });

    function send (url, value) {
        if(element.dataset.product_id === value) return;
        const response = new Post (url);
        response.body ({
            data: {
                _method: 'patch',
                product_id: element.dataset.product_id,
                similar: value
            }
        });
        response.success = function () {
            toastr.success('Поле успешно изменено.');
        }
        response.send();
    }
}
