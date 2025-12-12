import * as responce from "@/modules/components/resources.js";
import * as toastr from "@/modules/components/toastr.js";

function toggleStatus(item) {
    try {
        responce.get(item.getAttribute('data-url'))
            .then(data => {
                if (data.success) {
                    document.querySelector('#open-link-' + data.success.id).classList.toggle("hidden");
                    item.checked = !item.checked;
                    toastr.success('Статус успешно переключен');

                } else if (data.errors) {
                    toastr.errors(data.errors);

                } else {
                    toastr.errors('Неизвестная ошибка. Повторите попытку, пожалуйста!');
                    console.log(data);
                }
            })
            .catch((xhr) => {
                toastr.errors(xhr.responseText);
                console.log(xhr.responseText);
            });
    }
    catch (e) {}
}

export default toggleStatus;
