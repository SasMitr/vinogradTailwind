import modal from "./modules/modal.js";
import toggleStatus from "./modules/shop/product/toggleStatus.js";
import updateModificationForProduct from "./modules/shop/product-modification/updateModificationForProduct.js";
import m_remove from "./modules/shop/modification/m_remove.js";

window.addEventListener('DOMContentLoaded', function() {
    let content = document.querySelector('#admin-content');
    content.addEventListener('click', (e) => {
        let element = null;

        if ( (element = e.target.closest('.open-modal')) ) {
            if (content.contains(element)) {
                e.preventDefault();
                modal(element);
            }

        } else if( (element = e.target.closest('.update-modification')) ) {
            if (content.contains(element)) {
                e.preventDefault();
                updateModificationForProduct(element.closest('form'));
            }

        } else if( (element = e.target.closest('.toggle-status')) ) {
            if (content.contains(element)) {
                e.preventDefault();
                toggleStatus(element);
            }
        } else if( (element = e.target.closest('.remove_modification')) ) {
            if (content.contains(element)) {
                e.preventDefault();
                m_remove(element);
            }
        }

    });
});
