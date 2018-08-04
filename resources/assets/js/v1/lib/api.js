const setHeaders = {
    'Accept': 'application/json',
    'Access-Control-Allow-Origin': '*',
    'Content-Type': 'application/json',
    'Access-Control-Allow-Headers': '*',
    'Access-Control-Allow-Methods': 'GET, PUT, POST, DELETE, OPTIONS',
    'X-Requested-With': 'XMLHttpRequest',
};

export function get(url){
    return axios({
        method: 'GET',
        url: url,
        headers: {}
    });
}

export function post(url, payload){
    return axios({
        method: 'POST',
        url: url,
        data: payload,
        headers: setHeaders
    });
}