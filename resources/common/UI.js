export function spinner () {
    return '<div class="animate-spin inline-block w-10 h-10 mx-auto border-[3px] border-l-transparent border-blue-700 rounded-full"></div>';
}

export function textarea() {
    let textarea = document.createElement("textarea");
    textarea.classList.add("w-full", "resize-none", "p-2");

    return textarea;
}
