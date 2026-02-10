import Post from "#/common/fetch/post.js";
import * as toastr from "#/common/toastr.js";

export default function removeGalleryImages(form)
{
    // const galleryImages = form.querySelectorAll('input[name="removeGallery[]"]');
    const galleryImages = form.querySelectorAll('.remove-gallery');
    galleryImages.forEach(item => {
        item.addEventListener('change', (e) => {
            if(confirm("Удалить это фото на сервере?")) {

                const response = new Post (e.target.getAttribute('data-url'));
                response.body ({
                    data: {
                        product_id: form.getAttribute('data-id'),
                        img: e.target.getAttribute('value')
                    }
                });
                response.success = function () {
                    toastr.success('Фото успешно удалено!');
                    e.target.closest('div').remove();
                }
                response.send();

            }
        });
    });
}
