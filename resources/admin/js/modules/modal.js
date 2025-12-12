import * as responce from "@/modules/components/resources.js";
import * as toastr from "@/modules/components/toastr.js";
import create from "./shop/product/create.js";
import edit from "./shop/product/edit.js";
import addModificationForProduct from "./shop/modification/addModificationForProduct.js";

function modal(element) {

    try {
        let modal = document.querySelector('#modal');
        modalPreloader(modal);

        responce.get(element.getAttribute('href'))
            .then(data => {
                if (data.body) {
                    modal.querySelector('#modal-body').innerHTML = data.body;
                    modal.querySelector('#modal-header').innerHTML = data.header;

                    const module = modal.querySelector('form').getAttribute('data-modules');

                    switch (module) {
                        case 'create':
                            create(modal);
                            break;
                        case 'edit':
                            edit(modal);
                            break;
                        case 'addModificationForProduct':
                            addModificationForProduct(modal);
                            break;
                    }

                } else if (data.errors) {
                    toastr.errors(data.errors);
                    console.log(data);
                } else {
                    toastr.errors('Неизвестная ошибка. Повторите попытку, пожалуйста!');
                    console.log(data);
                }
            })
            .catch((xhr) => {
                toastr.errors(xhr.responseText);
                console.log(xhr.responseText);
            });
        modal.querySelector('#ok-btn').onclick = function () {
            modal.style.display = 'none';
        };

        //  Закрытие окна по клику на подложку
        // window.onclick = function (e) {
        //     if (e.target == modal) {
        //         modal.style.display = 'none';
        //     }
        // }

    } catch (err) {
        console.error(err);
    }
}

function modalPreloader(modal){
    modal.querySelector('#modal-body').innerHTML = '<div class="flex justify-center"><div class="animate-spin inline-block w-10 h-10 mx-auto border-[3px] border-l-transparent border-blue-700 rounded-full"></div></div>';
    modal.querySelector('#modal-header').innerHTML = '<div class="animate-spin inline-block w-10 h-10 mx-auto border-[3px] border-l-transparent border-blue-700 rounded-full"></div>';
    modal.style.display = 'block';
}

export default modal;
