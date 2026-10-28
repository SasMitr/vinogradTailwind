import Post from "#/common/fetch/post.js";
import * as toastr from "#/common/toastr.js";

function m_remove(element) {

    if (confirm("Подтвердите удаление модификации")) {

        const response = new Post (element.getAttribute('href'));
        response.body ({
            data: {
                _method: 'delete'
            }
        });
        response.success = function () {
            element.closest('tr').remove()
            toastr.success('Модификация удалена');
        }
        response.send();

    }
}

export default m_remove;
