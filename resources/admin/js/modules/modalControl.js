import Post from "#/common/fetch/post.js";
import Modal from './modal.js'

import create from "./shop/product/create.js";
import edit from "./shop/product/edit.js";

import m_create from "./shop/modification/m_create.js";
import m_edit from "./shop/modification/m_edit.js";

import deliveryUpdate from "./shop/order/deliveryUpdate.js";
import addItemOrder from "./shop/order/addItemOrder.js";

import addModificationForProduct from "./shop/product-modification/addModificationForProduct.js";

export default function modalControl(element) {

    try {

        const response = new Post (element.getAttribute('href'));
        response.option.method = 'GET';
        response.success = function () {
            const modal = new Modal (element.dataset.width);
            modal.insert({
                body: response.data.success.body,
                header: response.data.success.header
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
        }
        response.send();

        //  Закрытие окна по клику на подложку, если понадобится
        // window.onclick = function (e) {
        //     if (e.target == modal) {
        //         modal.style.display = 'none';
        //     }
        // }

    } catch (err) {
        console.error(err);
    }
}

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
