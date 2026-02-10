import * as toastr from "#/common/toastr.js";
import * as handler from "#/common/handlerErrors.js";
import Modal from "../../modal.js";
import Post from "#/common/fetch/post.js";

function selectStatus(element) {
    try {
        element = element.previousElementSibling;

        let response = new Post (element.dataset.url);
        response.body ({
            data: {
                _method: 'patch',
                status_id: element.value
            }
        });
        response.success = function () {
            if (response.data.success.status) {
                statusOK(response.data.success);
            }
            if (response.data.success.code_form) {
                codeForm (response.data);
            }
        }
        response.send();

        function codeForm (data) {

            const modal = new Modal('600px');
            modal.insert({
                body: data.success.code_form,
                header: '<h3>Отправить трек код</h3>'
            });

            const button = modal.get().querySelector('.send-trek-kode');
            button.addEventListener('click', (e) => {

                const code = modal.get().querySelector('input').value;

                response = new Post (button.dataset.url);
                response.body ({
                    data: {
                        _method: 'patch',
                        track_code: code
                    }
                });
                response.success = function () {
                    statusOK(response.data.success, true);
                    if(response.data.success.info) {
                        modal.get().querySelector('#modal-body').innerHTML = response.data.success.info;
                    } else {
                        modal.hide();
                    }
                }
                response.error = function () {
                    console.log(response.data.errors);
                    handler.errorsHandler (response.data.errors, modal.get());
                }
                response.send();

            });
            modal.get().querySelector('#ok-btn').onclick = function () {
                modal.hide();
            };
        }

        function statusOK (data, code = false)
        {
            element.previousElementSibling.innerHTML = data.status;
            let statusHistory = document.querySelector('.status-history');
            if (statusHistory) {
                statusHistory.innerHTML = data.status_history;
            }
            if (code) {
                const track_code = document.querySelector('.statuses');
                if (track_code) {
                    track_code.insertAdjacentHTML('afterend', data.track_code_block);
                }
            }
            toastr.success('Статус изменен.');
        }

    } catch (e) {}
}

export default selectStatus;
