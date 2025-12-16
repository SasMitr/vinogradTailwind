import * as responce from './components/resources';
import login from "./login";
import register from "./register";

function modal() {

    try {
        let modal = document.querySelector('#modal');
        let items = document.querySelectorAll('.open-modal-btn');
        items.forEach(item => {
            item.addEventListener('click', (e) => {
                responce.get(e.target.getAttribute('data-url'))
                    .then(data => {
                        if (data.body) {
                            modal.querySelector('#modal-body').innerHTML = data.body;
                            modal.querySelector('#modal-header').innerHTML = data.header;
                            modal.style.display = 'block';
                            const module = modal.querySelector('form').getAttribute('data-modules')

                            switch (module) {
                                case 'login': login(modal); break;
                                case 'register': register(modal); break;
                            }

                        } else if (data.errors) {
                            // info.errors_list(data.errors);

                            console.log(data);
                        } else {
                            // info.errors_list('Неизвестная ошибка. Повторите попытку, пожалуйста!');

                            console.log(data);
                        }
                    })
                    .catch((xhr) => {
                        console.log(xhr);
                        // info.fail_list(xhr.responseText);
                    });
            });
        });
        document.getElementById('ok-btn').onclick = function () {
            modal.style.display = 'none';
        };
    } catch (err) {}


    //  Закрытие окна по клику на подложку
    // window.onclick = function (e) {
    //     if (e.target == modal) {
    //         modal.style.display = 'none';
    //     }
    // }
}

export default modal;
