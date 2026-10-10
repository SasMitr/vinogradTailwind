function quantityOrderInputEventChange(target) {
    try {
        let input = target.closest('.quantity-order-item').querySelector('input');

        if (target.closest('.minus-item') && input.value > 1) {
            input.value--;
            input.dispatchEvent(new Event('change', {bubbles: true, cancelable: true}));
        }

        if (target.closest('.plus-item')) {
            input.value++;
            input.dispatchEvent(new Event('change', {bubbles: true, cancelable: true}));
        }

        if (target.closest('.remove-item')) {
            input.value = 0;
            input.dispatchEvent(new Event('change', {bubbles: true, cancelable: true}));
        }
    } catch (e) {}
}

export default quantityOrderInputEventChange;
