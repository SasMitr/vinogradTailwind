export function errorFormField (selector, items, form)
{
    try {
        let input = form.querySelector('[name="' + selector + '"]');

        selector = selector.split('[').join('_').split(']').join('');
        let errorsBlock = form.querySelector('.' + selector + '-block');

        if(errorsBlock) {
            input.classList.remove('border-red-400');
            errorsBlock.remove()
        }

        if(items){
            let errorsBlock = getErrorsList(selector + '-block', items);
            form.querySelector('#' + selector + '-block').append(errorsBlock);
            input.classList.add('border-red-400');
        }
    } catch (e) {}
}

export function errorsHandler(errors, form)
{
    if (!errors) return;
    const fieldList = Object.keys(errors);

    for (let item in fieldList) {

        const field = fieldList[item];
        const selector = field.replace(/([a-z]+)\.([a-z-_]+|[0-9]+)/, function (match, p1, p2){
            return isNaN(p2) ? p1 + '[' + p2 + ']' : p1 + '[]';
        });

        errorFormField (selector, errors[field], form);
    }
}

function getErrorsList(className, items)
{
    const ul = document.createElement('ul');
    ul.classList.add(className, 'text-sm', 'text-red-600', 'space-y-1', 'mt-2');
    let li = null;
    items.forEach(function(item) {
        li = document.createElement('li');
        li.textContent = item;
        ul.appendChild(li);
    });
    return ul;
}
