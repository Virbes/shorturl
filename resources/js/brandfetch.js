const apiKey = 'jk5cpN3OCJa1UWNvx4Ytr9sWrJPw31JxKIa4QpzsH+M=';
const companyName = 'google'; // O puedes usar un dominio

// Hacer una solicitud a la API de Brandfetch
fetch(`https://brandfetch.io/api/v2/company/${companyName}/logo`, {
    method: 'GET',
    headers: {
        'Authorization': `Bearer ${apiKey}`
    }
})
.then(response => {
    if (response.status === 200) {
        // La solicitud fue exitosa, puedes mostrar el logotipo
        const responseData = response.json();
        console.log('Datos del logotipo:', responseData);

        // Mostrar la imagen en tu aplicación o sitio web
        const imageUrl = responseData.logo_url;
        const img = document.createElement('img');
        img.src = imageUrl;
        document.body.appendChild(img);
    } else {
        // Manejar errores de solicitud
        console.error('Error al buscar el logotipo');
    }
})
.catch(error => {
    console.error('Error de red:', error);
});
