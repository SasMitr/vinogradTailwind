export function success(message) {
    create(message, 'green')
}

export function errors(message) {
    create(message, 'red')
}

export function info(message) {
    create(message, 'blue')
}

function insert(alert)
{
    try {
        let element = document.querySelector('#toastr-container');
        element.appendChild(alert);
        alert.classList.toggle("hidden");
        setTimeout(() => {
            alert.classList.toggle("hidden");
            alert.remove();
        }, 3000);
    }
    catch (e) {}
}

function create(message, type)
{
    let alert = document.createElement('div');
    alert.className = 'w-full text-white py-3 px-4 mb-2 hidden bg-' + type + '-300 border-' + type + '-600';
    // alert.className = type;
    let span = document.createElement('span');
    span.innerHTML = getMessage(message);
    alert.appendChild(span);

    insert(alert);
}

function getMessage(message)
{
    if((typeof message) == 'string') {
        return message;
    }
    if((typeof message) == 'object'){
        let temp = '';
        for (var item in message) {
            temp = temp + '<li>' + message[item] + "</li>";
        }
        return temp;
    }
    console.log(message);
    return 'Неподдерживаемый тип данных!';
}
