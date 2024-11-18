function editarPlatillo(id) {
    fetch('../Controlador/Platillo/obtener_platillo.php?id=' + id)
        .then(response => response.json())
        .then(data => {
            if (data.platillo) {
                let tiposPlatilloOptions = '';
                data.tipos_platillo.forEach(tipo => {
                    tiposPlatilloOptions += `<option value="${tipo.id}" ${tipo.id === data.platillo.id_tipo_platillo ? 'selected' : ''}>${tipo.nombre_tipo_platillo}</option>`;
                });

                let tiposProductoOptions = '';
                data.tipos_producto.forEach(tipo => {
                    tiposProductoOptions += `<option value="${tipo.id}" ${tipo.id === data.platillo.id_tipo_producto ? 'selected' : ''}>${tipo.nombre_tipo}</option>`;
                });

                Swal.fire({
                    title: 'Editar Platillo',
                    html: `
                <div class="form-group">
                    <label for="nombre_platillo">Nombre del Platillo</label>
                    <input type="text" id="nombre_platillo" class="swal2-input" value="${data.platillo.nombre_platillo}" placeholder="Nombre del Platillo">
                </div>

                <div class="form-group">
                    <label for="precio">Precio</label>
                    <input type="number" id="precio" class="swal2-input" value="${data.platillo.precio}" placeholder="Precio">
                </div>

                <div class="form-group">
                    <label for="id_tipo_platillo">Tipo de Platillo</label>
                    <select id="id_tipo_platillo" class="swal2-input">
                        ${tiposPlatilloOptions}
                    </select>
                </div>

                <div class="form-group">
                    <label for="id_tipo_producto">Tipo de Producto</label>
                    <select id="id_tipo_producto" class="swal2-input">
                        ${tiposProductoOptions}
                    </select>
                </div>

                <div class="form-group">
                    <label for="photo">Foto del Platillo</label>
                    <input type="text" id="photo" class="swal2-input" value="${data.platillo.photo}" placeholder="URL de la imagen">
                </div>
            `,
                    customClass: {
                        popup: 'custom-popup',
                        title: 'custom-title',
                        content: 'custom-content',
                        input: 'custom-input'
                    },
                    showCancelButton: true,
                    confirmButtonText: 'Guardar cambios',
                    cancelButtonText: 'Cancelar',
                    preConfirm: () => {
                        const nombre_platillo = document.getElementById('nombre_platillo').value;
                        const precio = document.getElementById('precio').value;
                        const tipo_platillo = document.getElementById('id_tipo_platillo').value;
                        const tipo_producto = document.getElementById('id_tipo_producto').value;
                        const photo = document.getElementById('photo').value;

                        return { nombre_platillo, precio, tipo_platillo, tipo_producto, photo, id };
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch('../Controlador/Platillo/actualizar_platillo.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                id: result.value.id,
                                nombre_platillo: result.value.nombre_platillo,
                                precio: result.value.precio,
                                tipo_producto: result.value.tipo_producto,
                                tipo_platillo: result.value.tipo_platillo,
                                photo: result.value.photo
                            })
                        })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    Swal.fire({
                                        title: '¡Éxito!',
                                        text: 'Platillo actualizado correctamente.',
                                        icon: 'success',
                                        confirmButtonText: 'Aceptar'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            location.reload();
                                        }
                                    });
                                } else {
                                    Swal.fire('Error', 'Hubo un problema al actualizar el platillo.', 'error');
                                }
                            });
                    }
                });
            }
        });
}
