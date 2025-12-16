import * as responce from '../../../common/resources'

function test() {
    Alpine.data("mysubmit", () => ({

        toggle(target) {
            const form = target.parentNode;
            const formData = new FormData(form);

            console.log(form.getAttribute('action'));

            responce.get(form.getAttribute('action'))
                .then(data => {
                    console.log(data);
                })
                .catch((error) => {
                    console.log('Error')
                });

            for (let [key, value] of formData) {
                console.log(`${key} - ${value}`)
            }

            console.log('OK');
        },
    }));
}
export default test;
