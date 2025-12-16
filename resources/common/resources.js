export async function get(url, data = false) {
    const res = await fetch(url + searchParams(data), {
        method: "GET",
        headers: {'X-Requested-With': 'XMLHttpRequest'}
    });
    // if(!res.ok) {
    //     throw new Error(`Ошибка запроса: ${url}, статус: ${res.status}`)
    // }
    return await res.json();
}

export async function post (url, data) {
    data.set('_token', document.querySelector('meta[name="csrf-token"]').content);
    let res = await fetch(url, {
        method: "POST",
        headers: {'X-Requested-With': 'XMLHttpRequest'},
        body: data
    });
    return await res.json();
}

function searchParams(data) {
    let search = window.location.search
        ? window.location.search + '&'
        : '?';
    return data
        ? search + new URLSearchParams(data).toString()
        : search;
}
