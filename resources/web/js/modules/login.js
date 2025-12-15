import * as responce from "../../../common/resources";
import * as handler from "../../../common/handlerErrors.js";

function login(data) {
    try {
        let form = data.querySelector('form');
        form.addEventListener('submit', (e) => {
            e.preventDefault();

            const url = form.getAttribute('action');
            const formData = new FormData(form);

            responce.post(url, formData)
                .then(data => {
                    if(data.success) {
                        window.location.reload();

                    } else if(data.errors){

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
export default login;
