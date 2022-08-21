const btn = document.querySelector('button');

// Метод обработки запроса и генерации изображения
function handleResponse(data) {
    let img = document.createElement("img");
    img.src = JSON.parse(data).base64
    let src = document.getElementById("qr-code")
    src.appendChild(img)
}

// Метод отправки данных
function sendData(data, getData) {
    const XHR = new XMLHttpRequest();
    const FD = new FormData();

    for (const [name, value] of Object.entries(data)) {
        FD.append(name, value);
    }

    XHR.addEventListener('load', (event) => {
        console.log(true)
    });

    XHR.addEventListener('error', (event) => {
        console.log(false)
    });

    XHR.onreadystatechange = function() {
        if (XHR.readyState === 4) {
            getData(XHR.responseText)
        }
    }

    XHR.open('POST', '/generate');

    XHR.send(FD);
}

btn.addEventListener('click', () => {
    sendData({ url: document.getElementById("url_field").value }, handleResponse);
});