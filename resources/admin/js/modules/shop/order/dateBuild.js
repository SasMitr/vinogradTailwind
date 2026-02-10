import Post from "#/common/fetch/post.js";
import * as toastr from "#/common/toastr.js";

export default function dateBuild(element) {
    try {
        const value = element.value;

        const response = new Post (element.dataset.url);
        response.body ({
            data: {
                _method: 'patch',
                date_build: value
            }
        });
        response.success = function () {
            value
                ? element.previousElementSibling.classList.add('bg-yellow-300')
                : element.previousElementSibling.classList.remove('bg-yellow-300')

            toastr.success('Дата обновлена!');
        }
        response.send();

    } catch (e) {}
}
