import * as responce from "#/common/resources.js";
import * as toastr from "#/common/toastr.js";

function m_remove(element) {

    if (confirm("Подтвердите удаление модификации")) {

        const url = element.getAttribute('href');
        const formData = new FormData();
        formData.set('_method', 'delete');

        responce.post(url, formData)
            .then(data => {
                if (data.success) {
                    element.closest('tr').remove()
                    toastr.success('Модификация удалена');

                } else if (data.errors) {
                    toastr.errors(data.errors);

                } else {
                    toastr.errors('Что-то пошло не так. Перегрузите страницу и попробуйте снова.');
                    console.log(data);
                }

            }).catch((xhr) => {
            toastr.errors(xhr.responseText);
            console.log(xhr);
        });
    }
}

export default m_remove;
