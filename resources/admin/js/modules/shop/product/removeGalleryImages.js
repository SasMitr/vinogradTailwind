import * as responce from "@/modules/components/resources.js";
import * as toastr from "@/modules/components/toastr.js";

function removeGalleryImages(form)
{
    const galleryImages = form.querySelectorAll('input[name="removeGallery[]"]');
    galleryImages.forEach(item => {
        item.addEventListener('change', (e) => {
            if(confirm("Удалить это фото на сервере?")) {

                let formData = new FormData();
                formData.append('_token', form.querySelector('input[name="_token"]').getAttribute('value'));
                formData.append('product_id', form.getAttribute('data-product-id'));
                formData.append('img', e.target.getAttribute('value'));

                responce.post(e.target.getAttribute('data-url'), formData)
                    .then(data => {

                        if(data.success) {
                            toastr.success('Фото успешно удалено!');
                            e.target.closest('div').remove();

                        } else if(data.errors){
                            console.log(data.errors);
                            toastr.errors(data.errors);

                        }else{
                            toastr.errors('Что-то пошло не так. Перегрузите страницу и попробуйте снова.');
                            console.log(data);
                        }

                    }).catch((xhr) => {
                        toastr.errors(xhr.responseText);
                        console.log(xhr.responseText);
                });
            }

        });
    });
}

export default removeGalleryImages;
