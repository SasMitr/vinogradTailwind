import Post from "#/common/fetch/post.js";
import * as toastr from "#/common/toastr.js";
import * as handler from "#/common/handlerErrors.js";

export default function createOrder (modal) {
    try {

        let form = modal.form();

        form.addEventListener('submit', (e) => {
            e.preventDefault();

            const response = new Post (form.getAttribute('action'));

            response.body ({
                form: form,
                data: {
                    _method: 'patch'
                }
            });
            response.success = function () {
                localStorage.setItem("createOrder", 'ok');
                window.location.href = response.data.success;
            }
            response.error = function () {
                handler.errorsHandler(response.data.errors, form);
            }
            response.send();

        });
    } catch (e) {}
}
