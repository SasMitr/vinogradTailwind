import Post from "#/common/fetch/post.js";
import * as toastr from "#/common/toastr.js";

export default function copyOrder (element) {
    try {

        const response = new Post (element.dataset.url);
        response.option.method = 'GET';
        response.success = function () {
            navigator.clipboard.writeText(response.data.success)
                .then(() => toastr.success('Заказ скопирован в буфер обмена.'))
                .catch(error => console.error(`Текст не скопирован ${error}`))
        }
        response.send();

    } catch (e) {}
}
