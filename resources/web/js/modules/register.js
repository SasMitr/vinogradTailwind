import * as response from "../../../common/resources";
import * as handler from "../../../common/handlerErrors";

function register(modal) {

    try {
        let form = modal.querySelector('form');
        form.addEventListener('submit', (e) => {
            e.preventDefault();

            const url = form.getAttribute('action');
            const formData = new FormData(form);

            response.post(url, formData)
                .then(data => {
                    if(data.body) {
                        modal.querySelector('#modal-body').innerHTML = data.body;
                        modal.querySelector('#modal-header').innerHTML = data.header;

                    } else if(data.errors){

                        handler.errorFormField('name', data.errors.name, form);
                        handler.errorFormField('email', data.errors.email, form);
                        handler.errorFormField('password', data.errors.password, form);

                    }else{
                        console.log('Что-то пошло не так. Перегрузите страницу и попробуйте снова.');
                    }
                }).catch((error) => {
                console.log(error);
            });
        });
    }
    catch (e) {}
}
export default register;
