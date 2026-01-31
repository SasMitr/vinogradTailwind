import * as responce from "#/common/resources.js";
import * as toastr from "#/common/toastr.js";

function dateBuild(element) {
    try {
        const value = element.value;

        let formData = new FormData();
        formData.set('_method', 'patch');
        formData.set('date_build', value);

        responce.post(element.dataset.url, formData)
            .then(data => {
                if(data.success) {
                    value
                        ? element.previousElementSibling.classList.add('bg-yellow-300')
                        : element.previousElementSibling.classList.remove('bg-yellow-300')

                    toastr.success('Дата обновлена!');
                } else if(data.errors){
                    toastr.errors(data.errors);
                }else{
                    console.log(data);
                    toastr.errors('Что-то пошло не так. Перегрузите страницу и попробуйте снова.');
                }
            }).catch((xhr) => {
                toastr.errors(xhr.responseText);
                console.log(xhr.responseText);
            });

    } catch (e) {}
}

export default dateBuild;
