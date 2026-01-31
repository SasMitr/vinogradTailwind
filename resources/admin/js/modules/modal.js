import * as UI from "#/common/UI.js";

export function get(width = '1200px') {
    let modal = document.createElement('div');
    modal.className = 'fixed z-50 insert-0 bg-black/30 backdrop-blur-md overflow-y-auto h-full w-full top-0';
    modal.innerHTML = `
    <div class="relative max-h-full top-24 mx-auto" style="width: ${width}">
        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t  bg-white">
            <h3 id="modal-header" class="text-xl text-center font-semibold text-gray-900">${UI.spinner()}</h3>
            <button id="ok-btn" type="button" class="text-orange-500 bg-transparent hover:bg-gray-200 p-2.5">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <div id="modal-body" class="p-4 bg-white">
            <div class="flex justify-center">${UI.spinner()}</div>
        </div>
    </div>`;

    show(modal);

    return modal;
}

export function show(modal){
    document.body.appendChild(modal);
}

export function hide(modal){
    modal.remove();
}

export function insert(modal, option){
    modal.querySelector('#modal-body').innerHTML = option.body;
    modal.querySelector('#modal-header').innerHTML = option.header;
}

export function getModule(modal) {
    return modal.querySelector('form').getAttribute('data-modules');
}
