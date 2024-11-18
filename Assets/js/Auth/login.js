document.getElementById('loginForm').addEventListener('submit', function (e) {
    e.preventDefault(); // Evitar que el formulario se envíe normalmente

    const formData = new FormData(this);

    fetch(this.action, {
        method: 'POST',
        body: formData,
    })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                Swal.fire({
                    icon: 'success',
                    title: 'Bienvenido',
                    text: data.message,
                    confirmButtonText: 'Continuar'
                }).then(() => {
                    window.location.href = data.redirect; // Redirigir al panel
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: data.message,
                    confirmButtonText: 'Reintentar'
                });
            }
        })
        .catch(error => {
            Swal.fire({
                icon: 'error',
                title: 'Error del servidor',
                text: 'Ocurrió un error inesperado. Por favor intenta nuevamente.',
                confirmButtonText: 'Aceptar'
            });
            console.error('Error:', error);
        });
});