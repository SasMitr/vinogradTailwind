import modal from "./modules/modal.js";
import toggleStatus from "./modules/shop/product/toggleStatus.js";
import updateModificationForProduct from "./modules/shop/modification/updateModificationForProduct.js";

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
        }

    });
});
