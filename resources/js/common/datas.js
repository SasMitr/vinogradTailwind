import * as toastr from "#/common/toastr.js";

export function set (data, success, error = null, failing = null) {
    if(data.success) {
        success();
    } else if(data.errors){
        if (error) error();
        toastr.errors(data.errors);
    } else {
        if (failing) failing();
        toastr.errors('Что-то пошло не так. Перегрузите страницу и попробуйте снова.');
    }
}
