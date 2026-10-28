import Post from "#/common/fetch/post.js";
import * as toastr from "#/common/toastr.js";

function updateModificationForProduct(element) {

    const  form = element.closest('form');

    const response = new Post (form.getAttribute('action'));
    response.body ({
        form: form
    });
    response.success = function () {
        document.querySelector('#product_' + response.data.id).innerHTML = response.data.success;
        toastr.success('Модификация успешно обновлена');
    }
    response.send();

}

export default updateModificationForProduct;
