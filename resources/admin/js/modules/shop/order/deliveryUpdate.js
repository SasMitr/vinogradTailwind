import * as toastr from "#/common/toastr.js";
import * as handler from "#/common/handlerErrors.js";
import Post from "#/common/fetch/post.js";

function deliveryUpdate(modal) {
    try {
        let form = modal.get().querySelector('form');
        form.addEventListener('submit', (e) => {
            e.preventDefault();

            const url = form.getAttribute('action');

            const response = new Post (url);

            response.body ({
                form: form,
                data: {
                    _method: 'patch'
                }
            });
            response.success = function () {
                document.querySelector('#delivery-data').innerHTML = response.data.success;
                document.querySelector('#order-total-cost').innerHTML = response.data.orderCost;

                modal.hide();
                toastr.success('Контактные данные обновлены');
            }
            response.error = function () {
                handler.errorsHandler(response.data.errors, form);
            }
            response.send();
        });
    } catch (e) {}
}

export default deliveryUpdate;
