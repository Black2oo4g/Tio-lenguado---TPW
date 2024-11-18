function logout() {
    const confirmLogout = confirm("¿Estás seguro de que deseas finalizar la sesión?");
    if (confirmLogout) {
        // Realiza una solicitud AJAX para finalizar la sesión
        fetch('../Auth/logout.php', {
            method: 'POST', // Solicitud POST para mayor seguridad
        })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    alert(data.message);
                    window.location.href = '../Public_html/login.html'; // Redirige al login
                } else {
                    alert('Hubo un problema al finalizar la sesión.');
                }
            })
            .catch(error => {
                console.error('Error al cerrar sesión:', error);
                alert('Ocurrió un error al intentar cerrar sesión.');
            });
    }
}