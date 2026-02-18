import modalControl from "./modules/modalControl.js";
import toggleStatus from "./modules/shop/product/toggleStatus.js";
import updateModificationForProduct from "./modules/shop/product-modification/updateModificationForProduct.js";
import m_remove from "./modules/shop/modification/m_remove.js";
import adminNote from "./modules/shop/order/adminNote.js";
import dateBuild from "./modules/shop/order/dateBuild.js";
import selectStatus from "./modules/shop/order/selectStatus.js";
import treckCode from "./modules/shop/order/treckCode.js";
import updateCurrency from "./modules/shop/order/updateCurrency.js";
import quantityOrderItem from "./modules/shop/order/quantityOrderItem.js";
import sendMessage from "./modules/shop/order/sendMessage.js";
import copyOrder from "./modules/shop/order/copyOrder.js";
import quantityOrderInputEventChange from "./modules/shop/order/quantityOrderInputEventChange.js";

window.addEventListener('DOMContentLoaded', function() {

    let content = document.querySelector('#admin-content');
    content.addEventListener('click', (e) => {
        let element = null;

        if (e.target.closest('.open-modal')) {
            workOffClick('.open-modal', modalControl);

        } else if( (element = e.target.closest('.update-modification')) ) {
            workOffClick('.update-modification', updateModificationForProduct);

        } else if(e.target.closest('.toggle-status')) {
            workOffClick('.toggle-status', toggleStatus);

        } else if(e.target.closest('.remove_modification')) {
            workOffClick('.remove_modification', m_remove);

        } else if(e.target.closest('.select-status')) {
            workOffClick('.select-status', selectStatus);

        } else if(e.target.closest('.update-currency')) {
            workOffClick('.update-currency', updateCurrency);

        } else if(e.target.closest('.send-message')) {
            workOffClick('.send-message', sendMessage);

        } else if(e.target.closest('.copy-order')) {
            workOffClick('.copy-order', copyOrder);

        } else if( (element = e.target.closest('.quantity-order-item')) ) {
            if (content.contains(element)) {
                quantityOrderInputEventChange(e.target);
            }
        }

        function workOffClick (selector, handler) {
            let element = e.target.closest(selector);
            if (content.contains(element)) {
                e.preventDefault();
                handler(element);
            }
        }
    });



    // dblclick
    content.addEventListener('dblclick', (e) => {
        let element = null;

        if( (element = e.target.closest('.admin_note')) ) {
            if (content.contains(element) && (e.target.tagName === 'TD' || e.target.tagName === 'DIV')) {
                adminNote(element);
            }
        }
        if( (element = e.target.closest('.track_code')) ) {
            if (content.contains(element)) {
                treckCode(element);
            }
        }
    });

    // change
    content.addEventListener('change', (e) => {
        let element = null;

        if( (element = e.target.closest('.date-build')) ) {
            if (content.contains(element)) {
                dateBuild(element);
            }
        }

        if( (element = e.target.closest('.quantity-order-input')) ) {
            if (content.contains(element)) {
                quantityOrderItem(element);
            }
        }
    });

});
