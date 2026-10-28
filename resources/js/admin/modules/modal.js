import * as UI from "#/common/UI.js";

export default class Modal
{
    width = '1200px';

    constructor() {
        this.modal = UI.modal();
        this.show();
    }

    get () {
        this.modal.querySelector('.modal-card').style.maxWidth = this.width;
        return this.modal;
    }

    form () {
        return this.modal.querySelector('form');
    }

    show() {
        document.body.appendChild(this.modal);
        document.body.style.overflow = 'hidden';
    }

    hide(){
        this.modal.remove();
        document.body.style.overflow = '';
    }

    insert(option){
        this.modal.querySelector('#modal-body').innerHTML = option.body;
        this.modal.querySelector('#modal-header').innerHTML = option.header;
    }

    getModule(modal) {
        return this.modal.querySelector('form').getAttribute('data-modules');
    }
}
