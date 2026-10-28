export function spinner () {
    return '<div class="animate-spin inline-block w-10 h-10 mx-auto border-[3px] border-l-transparent border-blue-700 rounded-full"></div>';
}

export function textarea() {
    let textarea = document.createElement("textarea");
    textarea.classList.add("w-full", "resize-none", "p-2");

    return textarea;
}

export function modal() {
    let modal = document.createElement("div");
    modal.className = 'fixed z-50 insert-0 bg-black/30 backdrop-blur-md overflow-y-auto h-full w-full top-0 px-5';
    modal.innerHTML = `
        <div class="modal-card relative max-h-full top-24 mx-auto" style="max-width: 400px">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t  bg-white">
                <h3 id="modal-header" class="text-xl text-center font-semibold text-gray-900"></h3>
                <button id="ok-btn" type="button" class="text-orange-500 bg-transparent hover:bg-gray-200 p-2.5">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div id="modal-body" class="p-4 bg-white">
                <div class="flex justify-center">${spinner()}</div>
            </div>
        </div>`;

    return modal;
}
