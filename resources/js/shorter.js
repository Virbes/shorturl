window.shorter = {
    short_url: () => {
        const long_url = document.getElementById('long_url').value;

        if (shorter.validate_url(long_url)) {
            // Petición con Axios
            axios.post('/url', {
                long_url: long_url
            }).then(function (response) {
                document.getElementById('long_url').value = '';
                document.getElementById('short_url_container').style.display = 'flex';
                document.getElementById('short_url').value = response.data.short_url;
            }).catch(function (error) {
                console.log(error);
            });
        }
    },

    copy_url: () => {
        const short_url = document.getElementById('short_url');
        short_url.select();
        short_url.setSelectionRange(0, 99999);
        document.execCommand('copy');
    },

    copy_url_args: (textToCopy) => {
        // Crea un elemento de texto temporal
        const textoTemporal = document.createElement('textarea');
        textoTemporal.value = textToCopy;

        // Agrega el elemento de texto temporal al documento
        document.body.appendChild(textoTemporal);

        // Selecciona y copia el texto al portapapeles
        /* textoTemporal.select(); */
        document.execCommand('copy');

        // Elimina el elemento de texto temporal
        document.body.removeChild(textoTemporal);

        showCopiedMessage(); // Mostrar el mensaje de éxito
    },

    validate_url: (url) => {
        let status = true;

        if (url.trim() === '') {
            status = false;
            alert('Debe colocar una url');
        }

        if (!validUrl.isWebUri(url)) {
            status = false;
            alert('Url no valida');
        }

        return status;
    }
}

const copiedMessage = document.getElementById('copiedMessage');

function showCopiedMessage() {
    copiedMessage.style.opacity = 1; // Mostrar el mensaje
    setTimeout(() => {
        copiedMessage.style.opacity = 0; // Ocultar gradualmente el mensaje
    }, 2000); // Ocultar el mensaje después de 2 segundos (2000 milisegundos)
}
