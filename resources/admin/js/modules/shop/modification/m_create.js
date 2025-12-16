import * as responce from "#/common/resources.js";
import * as handler from "#/common/handlerErrors.js";
import * as toastr from "#/common/toastr.js";

function m_create(modal) {
    try {
        let form = modal.querySelector('form');
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            const url = form.getAttribute('action');

            const formData = new FormData(form);

            responce.post(url, formData)
                .then(data => {
                    if(data.success) {
                        let tr = document.createElement('tr');
                        tr.setAttribute('id', 'row_' + data.id);
                        tr.innerHTML = data.success;
                        document.querySelector('tbody').prepend(tr);

                        modal.style.display = 'none';
                        toastr.success('Новая модификация добавлена!!');

                    } else if(data.errors){

                        handler.errorsHandler(data.errors, form);
                        toastr.errors(data.errors);

                    }else{
                        console.log(data);
                        toastr.errors('Что-то пошло не так. Перегрузите страницу и попробуйте снова.');
                    }
                }).catch((xhr) => {
                toastr.errors(xhr.responseText);
                console.log(xhr.responseText);
            });

        });

    } catch (e) {}
}

export default m_create;
