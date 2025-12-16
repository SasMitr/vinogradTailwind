import * as responce from "#/common/resources.js";
import * as handler from "#/common/handlerErrors.js";
import * as toastr from "#/common/toastr.js";

function m_create(modal) {
    try {
        let form = modal.querySelector('form');
        const url = form.getAttribute('action');
        const id = form.getAttribute('data-id');

        form.addEventListener('submit', (e) => {
            e.preventDefault();

            const formData = new FormData(form);
            formData.set('id', id);

            responce.post(url, formData)
                .then(data => {
                    if(data.success) {
                        document.querySelector('#row_' + id).innerHTML = data.success;
                        modal.style.display = 'none';
                        toastr.success('Обновления успешно сохранены!');

                    } else if(data.errors){
                        toastr.errors(data.errors);
                        handler.errorsHandler(data.errors, form);

                    }else{
                        toastr.errors('Что-то пошло не так. Перегрузите страницу и попробуйте снова.');
                        console.log(data);
                    }

                }).catch((xhr) => {
                toastr.errors(xhr.responseText);
                console.log(xhr);
            });
        });
    } catch (e) {}
}

export default m_create;
