import * as responce from "../../../../../common/resources.js";
import * as handler from "../../../../../common/handlerErrors.js";
import * as toastr from "../../../../../common/toastr.js";

export function choicesInit()
{
    new Choices('#choices-multiple-remove-button', {
            allowHTML: true,
            removeItemButton: true,
        }
    );
    new Choices('#category_id', {allowHTML: true,});
    new Choices('#selection_id', {allowHTML: true,});
    new Choices('#country_id', {allowHTML: true,});
}

export function previewUploadImg(form, inputSelector, previewSelector)
{
    let main_photo = form.querySelector(inputSelector);
    main_photo.addEventListener('change', (event) => {

        let output = form.querySelector(previewSelector);

        if (event.target.files.length > 0) {
            output.src = URL.createObjectURL(event.target.files[0]);
        }

        // output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    });
}

export function previewMultyUploadImg(form)
{
    form.querySelector('#gallery').addEventListener('change', (event) => {

        const box = form.querySelector('#multi-preview');
        box.innerHTML = '';
        let files = event.target.files; // FileList object

        // Loop through the FileList and render image files as thumbnails.
        for (let i = 0, f = null; i < files.length; i++) {
            f = files[i];
            // Only process image files.
            if (!f.type.match('image.*')) { continue;  }

            let reader = new FileReader();

            // Closure to capture the file information.
            reader.onload = (function(theFile) {
                return function(e) {
                    // Render thumbnail.
                    let div = document.createElement('div');
                    div.classList.add('relative', 'h-24', 'w-24');

                    const previewImage = document.createElement('img');
                    previewImage.className = 'h-24 w-24 flex-none object-cover';
                    previewImage.src = e.target.result;
                    div.appendChild(previewImage);

                    box.insertBefore(div, null);
                };
            })(f);

            // Read in the image file as a data URL.
            reader.readAsDataURL(f);
        }
    }, false);
}
