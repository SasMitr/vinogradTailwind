import * as responce from "#/common/resources.js";
import * as toastr from "#/common/toastr.js";
import Modal from './modal.js'

import create from "./shop/product/create.js";
import edit from "./shop/product/edit.js";

import m_create from "./shop/modification/m_create.js";
import m_edit from "./shop/modification/m_edit.js";

import deliveryUpdate from "./shop/order/deliveryUpdate.js";
import addItemOrder from "./shop/order/addItemOrder.js";

import addModificationForProduct from "./shop/product-modification/addModificationForProduct.js";

function modalControl(element) {

    try {
        responce.get(element.getAttribute('href'))
            .then(data => {
                if (data.body) {
                    const modal = new Modal (element.dataset.width);
                    modal.insert({
                        body: data.body,
                        header: data.header
                    });

                    switch (modal.getModule()) {
                        case 'create':
                            create(modal);
                            break;
                        case 'edit':
                            edit(modal);
                            break;
                        case 'addModificationForProduct':
                            addModificationForProduct(modal);
                            break;
                        case 'm_create':
                            m_create(modal);
                            break;
                        case 'm_edit':
                            m_edit(modal);
                            break;
                        case 'deliveryUpdate':
                            deliveryUpdate(modal);
                            break;
                        case 'addItemOrder':
                            datatablesInit();

                            //    Навешиваем событие и отдаем в функцию обработчик что бы можно было отменить событие
                            //    (предотвращение клонирования событий)
                            modal.get().addEventListener('click', addItemOrder);
                            break;
                    }

                    modal.get().querySelector('#ok-btn').onclick = function () {
                        removeEventListener('click', addItemOrder); //   отменяем обработчик
                        modal.hide();
                    };

                } else if (data.errors) {
                    toastr.errors(data.errors);
                } else if (data.message) {
                    toastr.errors(data.message);
                } else {
                    toastr.errors('Неизвестная ошибка. Повторите попытку, пожалуйста!');
                }

            })
            .catch((xhr) => {
                toastr.errors(xhr.responseText);
                console.log(xhr.responseText);
            });


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

export default modalControl;

function datatablesInit() {
    new simpleDatatables.DataTable('#myTable', {
        searchable: true,
        perPage: 20,
        perPageSelect: [20, 40, 60, ["Все", -1]],
        fixedColumns: false,
        columns: [
            {
                select: 0,
                sort: "asc"
            },
            {
                select: 1,
                sortable: false,
            }
        ],
        labels: {
            placeholder: "Поиск...",
            perPage: "",
            info: "",
            noResults: "Ничего не найдено",
        }
    });
}
