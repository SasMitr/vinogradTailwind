import Post from "#/common/fetch/post.js";
import * as toastr from "#/common/toastr.js";

export default function dateBuild(element) {
    try {

        const response = new Post (element.dataset.url);
        response.body ({
            data: {
                _method: 'patch',
                date_build: element.value
            }
        });
        response.success = function () {
            element.previousElementSibling.classList.toggle('bg-yellow-300');
            toastr.success('Дата обновлена!');
        }
        response.send();

    } catch (e) {}
}
