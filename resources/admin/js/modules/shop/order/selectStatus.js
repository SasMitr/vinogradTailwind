import * as responce from "#/common/resources.js";
import * as toastr from "#/common/toastr.js";
import * as handler from "#/common/handlerErrors.js";
import * as modals from '../../modal.js'

function selectStatus(element) {
    try {
        element = element.previousElementSibling;

        let formData = new FormData();
        formData.set('_method', 'patch');
        formData.set('status_id', element.value);

        responce.post(element.dataset.url, formData)
            .then(data => {
                if(data.success) {
                    if (data.success.status) {
                        statusOK(data.success);
                    }
                    if (data.success.code_form) {

                        let modal = modals.get('600px');
                        modals.insert(modal, {
                            body: data.success.code_form,
                            header: '<h3>Отправить трек код</h3>'
                        });

                        let button = modal.querySelector('.send-trek-kode');

                        button.addEventListener('click', (e) => {

                            let code = modal.querySelector('input').value;
                            const formData = new FormData();
                            formData.set('_method', 'patch');
                            formData.set('track_code', code);

                            responce.post(button.dataset.url, formData)
                                .then(data => {
                                    if (data.success) {
                                        statusOK(data.success, true);

                                        data.success.info
                                            ? modal.querySelector('#modal-body').innerHTML = data.success.info
                                            : modals.hide(modal);

                                    } else if (data.errors) {
                                        handler.errorsHandler(data.errors, modal);
                                        toastr.errors(data.errors);
                                    } else {
                                        console.log(data);
                                        toastr.errors('Что-то пошло не так. Перегрузите страницу и попробуйте снова.');
                                    }
                                }).catch((xhr) => {
                                    toastr.errors(xhr.responseText);
                                    console.log(xhr);
                            });
                        });
                        modal.querySelector('#ok-btn').onclick = function () {
                            modal.style.display = 'none';
                        };
                    }
                } else if(data.errors){
                    toastr.errors(data.errors);
                }else{
                    console.log(data);
                    toastr.errors('Что-то пошло не так. Перегрузите страницу и попробуйте снова.');
                }
            })
            .catch((xhr) => {
                toastr.errors(xhr.responseText);
                console.log(xhr.responseText);
            });

        function statusOK (data, code = false)
        {
            element.previousElementSibling.innerHTML = data.status;
            let statusHistory = document.querySelector('.status-history');
            if (statusHistory) {
                statusHistory.innerHTML = data.status_history;
            }
            if (code) {
                let track_code = document.querySelector('.statuses');
                if (track_code) {
                    let div = document.createElement('div');
                    div.innerHTML = data.track_code_block;
                    // insertAdjacentHTML  попробовать
                    track_code.insertAdjacentElement('afterend', div);
                }
            }
            toastr.success('Статус изменен.');
        }

    } catch (e) {}
}

export default selectStatus;
