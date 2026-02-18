import * as toastr from "#/common/toastr.js";

export default class Post
{
    success = null;
    error = null;
    failing = null;
    catching = null;
    data = null;

    option = {
        method: "POST",
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    }

    constructor(url) {
        this.url = url;
    }

    body ({form = null, data = {}}) {
        const formData = form ? new FormData(form) : new FormData();
        formData.set('_token', document.querySelector('meta[name="csrf-token"]').content);

        for (let [key, value] of Object.entries(data)) {
            formData.set(key, value);
        }

        this.option.body = formData;
    }

    async send () {
        const res = await fetch(this.url, this.option);
        await res.json()
            .then(data => {
                this.data = data;

                if (this.data.success) {
                    if (this.success) this.success();

                } else if (this.data.errors) {
                    if (this.error) this.error();
                    toastr.errors(this.data.errors);

                } else if (this.data.message) {
                    if (this.error) this.error();
                    try {   //  Пытаемся вытащить кастомное сообщение
                        const message = JSON.parse(this.data.message);
                        toastr.errors(message.errors);
                    } catch (e) {  //   По необходимости Можно вывести текст сообщения: toastr.errors(this.data.message);
                        toastr.errors('Неизвестная ошибка. Повторите попытку, пожалуйста!');
                    }
                } else {
                    if (this.failing) this.failing();
                    toastr.errors('Неизвестная ошибка. Повторите попытку, пожалуйста!');
                }
            })
            .catch((xhr) => {
                if (this.catching) this.catching();
                toastr.errors(xhr);
                console.log(xhr);
            });
    }

    urlParams(data) {
        let search = window.location.search
            ? window.location.search + '&'
            : '?';
        this.url = this.url +
            data
                ? search + new URLSearchParams(data).toString()
                : search;

        // return data
        //     ? search + new URLSearchParams(data).toString()
        //     : search;
    }
}
