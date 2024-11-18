<!DOCTYPE html>
<?php
include('../Auth/session.php');
?>
<html>

<head>
    <title>TIO LENGUADO </title>
    <meta charset="UTF-8">
    <meta name="Description" content="Platos del Restaurante Tio Lenguado" />
    <meta http-equiv="Content-Language" content="es" />
    <meta name=”distribution” content=”global” />
    <meta names="Robot" content="all" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .tabla-verde {

            background-color: teal;

        }

        .tabla-blanco {

            background-color: white;

        }

        body {
            background-image: url('Imagenes/posiblefondo.png');
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
            background-attachment: fixed;
            margin: 0;
            padding: 0;


        }

        .highlight {
            background-color: #FFA500;
            color: white;
            padding: 7px;
        }

        .nav-marino {
            background-color: #999898;
        }

        .atributos {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .bodytabla {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 50vh;
            font-family: "Raleway", san-serif;
            background-color: #eef4fd
        }

        /*Tabla de productos*/
        .container {

            display: flex;
            flex-direction: column;
            box-shadow: 8px 8px 5px 0px rgba(243, 72, 17, 0.75);
            width: 88%;
            background-image: url("Imagenes/fondoblanco.png");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            border-radius: 30px;


        }

        .table_header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 30px 0;

            select {
                border: none;
                border-bottom: 2px solid #ccff66;
                width: 170px;
                padding: 8px;
                font-size: 16px;
                background-color: #f9f9f9;
                color: #333;
                border-radius: 5px;
                transition: border-bottom 0.3s ease;
            }

            .input_search {
                position: relative;

                input {
                    border-radius: 30px;
                    width: 400px;
                    outline: none;
                    padding: 5px 20px;
                    border: 1px solid #c9c9c9;
                    box-sizing: border-box;
                    padding-right: 50px;

                }

                #search {
                    position: absolute;
                    top: 50%;
                    right: 0;
                    margin-right: 1rem;
                    transform: translate(-50%, -50%);
                }
            }

            table {
                border-spacing: 0;
                margin-top: 1rem;

                thead {
                    background-color: #fff7b3;

                    th {
                        padding: 10px;
                        text-align: center;
                        border-bottom: 1px solid #dfdfdf;

                        #icons {
                            font-size: 20px;
                            cursor: pointer;
                            margin-left: 10px;
                            color: #797979;
                        }
                    }

                    &:hover {
                        background-color: #f5f5f5;
                    }

                }
            }


        }


        * {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
            font-family: sans-serif;
        }

        footer {
            width: 100%;
            background: #202020;
            color: white;
            padding: 40px;
        }

        .container-footer-all {
            width: 100%;
            max-width: 1200px;
            margin: auto;
        }

        .container-body {
            display: flex;
            justify-content: space-between;
        }

        .colum1 {
            max-width: 400px;
        }

        .colum1 h1 {
            font-size: 30px
        }

        .colum2 a {
            text-decoration: none;
            color: #C7C7C7
        }

        .colum1 a {
            text-decoration: none;
            color: #C7C7C7
        }

        .colum1 p {
            font-size: 14px;
            color: #C7C7C7;
            margin-top: 20px;
        }

        .colum2 {
            max-width: 400px;
        }

        .colum2 h1 {
            font-size: 30px;
        }

        .row {
            margin-top: 20px;
            display: flex;
        }

        .row img {
            width: 36px;
            height: 36px
        }

        .row label {
            margin-top: 20px;
            margin-left: 20px;
        }

        .colum3 {
            max-width: 400px;
        }

        .colum3 h1 {
            font-size: 30px;
        }

        .row2 {
            margin-top: 20px;
        }

        .row2 img {
            width: 36px;
            height: 36px;
        }

        .row2 label {
            margin-left: 20px;
            max-width: 150px;
        }

        @media screen and (max-width:1100px) {
            .container-body {
                flex-wrap: wrap;
            }

            .colum2,
            .colum3 {
                margin-top: 40px
            }
        }


        .popup {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            display: none;


        }

        .boton_cerrar {
            position: absolute;
            bottom: 10px;
            right: 10px;
            background-color: #ccc;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Estilo general para el popup */
        .custom-popup {
            font-size: 16px;
            /* Tamaño de la fuente general */
            width: 450px;
            /* Establece un ancho fijo para que todo se vea equilibrado */
            padding: 20px;
        }

        /* Estilo para el título */
        .custom-title {
            font-size: 20px;
            /* Tamaño de la fuente del título */
            margin-bottom: 20px;
        }

        /* Estilo para el contenido */
        .custom-content {
            display: flex;
            flex-direction: column;
            gap: 15px;
            /* Espacio entre los campos */
        }

        /* Estilo para cada input y select */
        .custom-input {
            font-size: 14px;
            /* Tamaño de la fuente de los inputs */
            width: 100%;
            /* Asegura que los campos ocupen todo el ancho disponible */
            padding: 10px;
            margin: 5px 0;
            /* Espacio superior e inferior para los campos */
            border-radius: 4px;
            /* Bordes redondeados */
            border: 1px solid #ccc;
            /* Borde suave */
        }



        /* Estilo para los labels */
        .form-group {
            display: flex;
            flex-direction: column;
        }

        label {
            font-size: 14px;
            margin-bottom: 5px;
        }

        #id_tipo_producto {
            font-size: 14px;
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        #photo {
            padding: 8px;
            font-size: 14px;
            width: 100%;
            border-radius: 4px;
            border: 1px solid #ccc;
            background-color: #f8f9fa;
        }

        .swal2-input {
            font-size: 14px;
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
    </style>

    <script>
        function openPopup() {
            var popup = document.querySelector('.popup');
            popup.style.display = 'block';
        }

        function closePopup() {
            var popup = document.querySelector('.popup');
            popup.style.display = 'none';
        }
    </script>

    <title>Inicio - Tío Lenguado</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg nav-marino" nav class="navbar">
        <div class="container-fluid">

            <a class="navbar-brand" href="#">
                <h10>Cevichería & Restobar</h10> <br>
                <h8 style="color:brown"><strong>"El Tio Lenguado"</strong></h8>
            </a>
            <a class="navbar-brand"> <img height="80px" width="auto" style="max-width: 100%;"
                    src="imagenes/TioLenguado.jpg" alt="Icono LENGUADO" /> </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="Inicio.html">
                            <strong style="font-family: Roboto; font-size: 20px">INICIO</strong>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="Menu.html">
                            <strong style="font-family: Roboto; font-size: 20px">MENU</strong>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Contactanos.html">
                            <strong style="font-family: Roboto; font-size: 20px">CONTACTANOS</strong>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Acceso Rapido
                        </a>

                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="Platillos.html#entrada">Todos nuestros platos</a></li>
                            <li><a class="dropdown-item" href="https://wa.link/rzbg08">Contáctanos Vía WhatsApp</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="dropdown text-end">
                    <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="Imagenes/usuario.png" alt="mdo" width="32" height="32" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">Ajustes</a></li>
                        <li><a class="dropdown-item" href="#" onclick="openPopup()">Perfil</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" onclick="logout()">Salir</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <table border=0 width="100%">
        <tr>
            <td align="Right"> <img src="Imagenes/TioLenguado.jpg" alt="El mejor Servicio" width="100" height="100">
            </td>
            <td align="Center">
                <h1 style="font-size: 3em; color: whitesmoke; margin-left: 100px;">
                    "TIO LENGUADO RESTAURANTE"
                </h1>
            </td>

            <td align="Center"> <a href="https://maps.app.goo.gl/4bi2HrYyNYo1dYXe6"><img src="Imagenes/gps.png"
                        alt="Usuario" width="50" height="50"></a></td>
        </tr>
        <tr>
            <td>
                </h2>
            </td>
            <td align="Center">
                <h2 style="color: aqua; margin-top: 1em; margin-left: 100px;">
                    ¿Quiénes Somos?
                </h2>
            </td>
            <td align="Left">
                <p style="font-size: 0.90em; color: white;"> Parque Bello Horizonte,<br>Piura - Perú
            </td>
        </tr>
    </table>
    <table border=0 width="100%">
        <tr>
            <td align="right" width="30%"> <img src="Imagenes/lenguadoperfil.jpg" alt="lenguado" width="400"
                    height="400"></td>
            </td>
            <td valign="Center" align="Center" width="650">
                <br>
                <h3 style="color: white; background-color: black; padding: 5px;">
                    "BIENVENIDOS AL RESTAURANTE DEL TIO LENGUADO<br>
                    PRODUCTOS FRESCOS Y DE CALIDAD"
                </h3>
                <br>
                <p style="color: white; font-size: 1.20em; background-color: black; padding: 5px;">
                    Es una joya tanto por la calidad de la comida y del servicio, como por la
                    atmósfera simple y cálida, la frescura de los pescados y mariscos, las sonrisas
                    y disposición del personal de servicio, y el precio. El mejor ceviche,
                    preparado con el pescado que uno mismo elige.

            <td align="left"> <img src="Imagenes/pescadoslenguado.jpg" alt="pescados" widht="400" height="400" /> </td>

        </tr>
    </table>

    <hr style="height:10px; border:0; background-color:yellowgreen;">

    <div class="container mt-5" id="platillosTable">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Platos y Bebidas</h2>
            <div>
                <?php
                $tipo_platillo = isset($_GET['tipo']) ? $_GET['tipo'] : '';

                $where_clause = "";
                if ($tipo_platillo != '') {
                    $where_clause = " WHERE p.id_tipo_producto = '$tipo_platillo'";
                }
                ?>
                <form method="GET" action="">
                    <select name="tipo" class="form-select d-inline-block w-auto me-2" onchange="this.form.submit()">
                        <option value="" selected>Todos</option>
                        <option value="1" <?php if ($tipo_platillo == '1')
                            echo 'selected'; ?>>Personal</option>
                        <option value="2" <?php if ($tipo_platillo == '2')
                            echo 'selected'; ?>>Mediano</option>
                        <option value="3" <?php if ($tipo_platillo == '3')
                            echo 'selected'; ?>>Familiar</option>
                    </select>
                    <div class="input-group d-inline-flex">
                        <input type="text" class="form-control" placeholder="Buscar" name="buscar"
                            value="<?php echo isset($_GET['buscar']) ? htmlspecialchars($_GET['buscar']) : ''; ?>" />
                    </div>
                </form>
                <button class="btn btn-success btn-sm me-2" onclick="agregarPlatillo()">
                    <i class="bi bi-plus-circle"></i> Agregar
                </button>

            </div>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Nombre de Producto</th>
                    <th>Tipo</th>
                    <th>Precio</th>
                    <th>Operaciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $registros_por_pagina = 8;
                $pagina_actual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
                $offset = ($pagina_actual - 1) * $registros_por_pagina;

                $buscar = isset($_GET['buscar']) ? $_GET['buscar'] : '';

                $query_count = "SELECT COUNT(*) AS total FROM platillos p JOIN tipo_producto tp ON p.id_tipo_producto = tp.id" . $where_clause;
                if (!empty($buscar)) {
                    $query_count .= " AND p.nombre_platillo LIKE '%$buscar%'";
                }
                $result_count = mysqli_query($conn, $query_count);
                $total_registros = mysqli_fetch_assoc($result_count)['total'];
                $total_paginas = ceil($total_registros / $registros_por_pagina);

                $query = "SELECT p.id, p.nombre_platillo, p.precio, tp.nombre_tipo, p.photo 
                FROM platillos p 
                JOIN tipo_producto tp ON p.id_tipo_producto = tp.id
                " . $where_clause . " 
                ORDER BY p.id DESC";
      
                if (!empty($buscar)) {
                    $query .= " AND p.nombre_platillo LIKE '%$buscar%'";
                }
                $query .= " LIMIT $offset, $registros_por_pagina";

                $result = mysqli_query($conn, $query);

                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";

                        $img_url = !empty($row['photo']) ? "ruta/a/imagenes/" . $row['photo'] : "ruta/a/imagen_default.jpg";

                        echo "<td><img src='$img_url' alt='Imagen del platillo' class='img-thumbnail' style='width: 50px; height: 50px;'></td>";

                        echo "<td>" . htmlspecialchars($row['nombre_platillo']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['nombre_tipo']) . "</td>";
                        echo "<td>s/" . htmlspecialchars($row['precio']) . "</td>";
                        echo '<td>
                            <button class="btn btn-warning btn-sm me-2" onclick="editarPlatillo(' . $row['id'] . ')"><i class="bi bi-pencil-square"></i> Editar</button>
                            <button class="btn btn-danger  btn-sm me-2" onclick="eliminarPlatillo(' . $row['id'] . ')"> <i class="bi bi-trash"></i> Borrar</button>

                            </td>';
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' class='text-center'>No hay datos disponibles</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <!-- Paginación -->
        <nav aria-label="Página de resultados">
            <ul class="pagination justify-content-center">
                <li class="page-item <?php echo ($pagina_actual <= 1) ? 'disabled' : ''; ?>">
                    <a class="page-link"
                        href="?pagina=<?php echo ($pagina_actual - 1); ?>&tipo=<?php echo $tipo_platillo; ?>&buscar=<?php echo urlencode($buscar); ?>"
                        aria-label="Anterior">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php
                for ($i = 1; $i <= $total_paginas; $i++) {
                    echo "<li class='page-item " . ($i == $pagina_actual ? "active" : "") . "'><a class='page-link' href='?pagina=$i&tipo=$tipo_platillo&buscar=" . urlencode($buscar) . "'>$i</a></li>";
                }
                ?>
                <li class="page-item <?php echo ($pagina_actual >= $total_paginas) ? 'disabled' : ''; ?>">
                    <a class="page-link"
                        href="?pagina=<?php echo ($pagina_actual + 1); ?>&tipo=<?php echo $tipo_platillo; ?>&buscar=<?php echo urlencode($buscar); ?>"
                        aria-label="Siguiente">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <script>
        function agregarPlatillo() {
            fetch('../Controlador/Platillo/obtener_tipos.php')  // Esta URL debe devolver los tipos de platillo y producto.
                .then(response => response.json())
                .then(data => {
                    if (data) {
                        let tiposPlatilloOptions = '';
                        data.tipos_platillo.forEach(tipo => {
                            tiposPlatilloOptions += `<option value="${tipo.id}">${tipo.nombre_tipo_platillo}</option>`;
                        });

                        let tiposProductoOptions = '';
                        data.tipos_producto.forEach(tipo => {
                            tiposProductoOptions += `<option value="${tipo.id}">${tipo.nombre_tipo}</option>`;
                        });

                        Swal.fire({
                            title: 'Agregar Nuevo Platillo',
                            html: `
                        <div class="form-group">
                            <label for="nombre_platillo">Nombre del Platillo</label>
                            <input type="text" id="nombre_platillo" class="swal2-input" placeholder="Nombre del Platillo">
                        </div>

                        <div class="form-group">
                            <label for="precio">Precio</label>
                            <input type="number" id="precio" class="swal2-input" placeholder="Precio">
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
                            <input type="text" id="photo" class="swal2-input" placeholder="URL de la imagen">
                        </div>
                    `,
                            customClass: {
                                popup: 'custom-popup',
                                title: 'custom-title',
                                content: 'custom-content',
                                input: 'custom-input'
                            },
                            showCancelButton: true,
                            confirmButtonText: 'Agregar Platillo',
                            cancelButtonText: 'Cancelar',
                            preConfirm: () => {
                                const nombre_platillo = document.getElementById('nombre_platillo').value;
                                const precio = document.getElementById('precio').value;
                                const tipo_platillo = document.getElementById('id_tipo_platillo').value;
                                const tipo_producto = document.getElementById('id_tipo_producto').value;
                                const photo = document.getElementById('photo').value;

                                return { nombre_platillo, precio, tipo_platillo, tipo_producto, photo };
                            }
                        }).then((result) => {
                            if (result.isConfirmed) {
                                fetch('../Controlador/Platillo/agregar_platillo.php', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json'
                                    },
                                    body: JSON.stringify(result.value)
                                })
                                    .then(response => response.json())
                                    .then(data => {
                                        if (data.success) {
                                            Swal.fire('¡Éxito!', 'Platillo agregado correctamente.', 'success');
                                        } else {
                                            Swal.fire('Error', 'Hubo un problema al agregar el platillo.', 'error');
                                        }
                                    });
                            }
                        });
                    }
                });
        }





    </script>
    <script>
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
                                            Swal.fire('¡Éxito!', 'Platillo actualizado correctamente.', 'success');
                                        } else {
                                            Swal.fire('Error', 'Hubo un problema al actualizar el platillo.', 'error');
                                        }
                                    });
                            }
                        });
                    }
                });
        }

        function eliminarPlatillo(id) {
            // Mostrar una confirmación antes de eliminar
            Swal.fire({
                title: '¿Estás seguro?',
                text: '¡No podrás revertir esta acción!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Si el usuario confirma la eliminación, hacer la solicitud de eliminación
                    fetch('../Controlador/Platillo/eliminar_platillo.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({ id: id })
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire({
                                    title: '¡Eliminado!',
                                    text: 'El platillo ha sido eliminado.',
                                    icon: 'success',
                                    confirmButtonText: 'Aceptar'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        location.reload();
                                    }
                                });
                            } else {
                                Swal.fire('Error', 'Hubo un problema al eliminar el platillo.', 'error');
                            }

                        });
                }
            });
        }

    </script>
    <script>
        function scrollToTable() {
            const table = document.getElementById("platillosTable");
            if (table) {
                table.scrollIntoView({ behavior: "smooth" });
            }
        }
        window.onload = function () {
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('tipo') || urlParams.has('buscar')) {
                scrollToTable();
            }
        };
    </script>

    <div class="container mt-5" id="platillosTable">
        <h2 style="color:firebrick; margin-top: 1em;"><strong>Especial del dia</strong></h2>

        <div class="row">
            <?php
            $query = "SELECT p.nombre_platillo, p.precio, tp.nombre_tipo, p.photo 
                  FROM platillos p 
                  JOIN tipo_producto tp ON p.id_tipo_producto = tp.id 
                  WHERE p.id_tipo_producto = 3";

            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="col-md-4 mb-4">';
                    echo '<div class="card" style="width: 18rem;">';

                    $img_url = !empty($row['photo']) ? "ruta/a/imagenes/" . $row['photo'] : "ruta/a/imagen_default.jpg";

                    echo '<img src="' . $img_url . '" class="card-img-top" alt="Imagen del platillo">';

                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . htmlspecialchars($row['nombre_platillo']) . '</h5>';
                    echo '<p class="card-text">Tipo: ' . htmlspecialchars($row['nombre_tipo']) . '</p>';
                    echo '<p class="card-text">Precio: s/' . htmlspecialchars($row['precio']) . '</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "<p>No hay platos de entrada disponibles.</p>";
            }
            ?>
        </div>
    </div>




    </div>





    <div align="center" class="mapa">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2295.411937433515!2d-80.65095359336813!3d-5.1796691226926175!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x904a1b37fcb1db41%3A0x317d0729458c678b!2sRestaurante%20Tio%20Lenguado!5e0!3m2!1ses!2spe!4v1728933493689!5m2!1ses!2spe"
            width="800" height="600" style="border:0;" allowfullscreen loading="lazy"></iframe>

    </div>

    <footer>
        <div class="container-footer-all">
            <div class="container-body">

                <div class="colum1">
                    <h1>Opinión Destacada: </h1>
                    <p>Gladys Guerrero: "¡Uno de los mejores lugares para comer en Piura! Fui con expectativas muy altas
                        y las superaron!
                        La comida súper fresca, con una excelente sazón. Y no puedo decir más que cosas buenas del
                        servicio.
                        Todos fueron muy gentiles y la atención fue súper rápida. Lo recomiendo!!
                        Estaba tan rico que fui 2 veces en menos de 3 días. Regresaría para seguir probando nuevos
                        platos".</p>
                </div>
                <div class="colum2">
                    <h1>Redes Sociales</h1>
                    <div class="row">
                        <a href="https://www.instagram.com/restaurantetiolenguado/?hl=es"><img
                                src="Imagenes/instagram.png"></a>
                        <a href="https://www.instagram.com/restaurantetiolenguado/?hl=es"><label>Instagram</label></a>
                    </div>
                    <div class="row">
                        <a href="https://www.facebook.com/profile.php?id=100093571864929"><img
                                src="Imagenes/facebook.png"></a>
                        <a href="https://www.facebook.com/profile.php?id=100093571864929"><label>Facebook</label></a>
                    </div>
                </div>
                <div class="colum3">
                    <h1>Informacion Adicional:</h1>
                    <div class="row2">
                        <img src="Imagenes/casa.png">
                        <label>Urb Bello Horizonte mz C4 lote 31, Piura, Peru</label>
                    </div>
                    <div class="row2">
                        <img src="Imagenes/telefono.png">
                        <label>965 880 996</label>
                    </div>
                    <div class="row2">
                        <img src="Imagenes/email.png">
                        <label>restaurantetiolenguado@gmail.com</label>
                    </div>
                </div>
            </div>
            <div class="container-footer">
                <div class="copyright">
                    @ 2024 Todos los Derechos Reservados | Tio Lenguado & Descocaos
                </div>
            </div>
        </div>
    </footer>
    <div class="popup">
        <h2>Perfil del Usuario</h2>
        <form class="row g-3">
            <div class="col-md-6">
                <label for="nombreUsuario" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombreUsuario" value="<?php echo $nombre_usuario; ?>"
                    readonly>
            </div>
            <div class="col-md-6">
                <label for="correoUsuario" class="form-label">Correo</label>
                <input type="email" class="form-control" id="correoUsuario" value="<?php echo $correo_usuario; ?>"
                    readonly>
            </div>
            <div class="col-md-6">
                <label for="tipoUsuario" class="form-label">Tipo de Usuario</label>
                <input type="text" class="form-control" id="tipoUsuario" value="<?php echo $tipo_usuario; ?>" readonly>
            </div>
            <div class="col-md-6">
                <label for="fechaCreacion" class="form-label">Fecha de Creación</label>
                <input type="text" class="form-control" id="fechaCreacion" value="<?php echo $fecha_creacion; ?>"
                    readonly>
            </div>
            <div class="col-md-12">
                <label for="contrasenaUsuario" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="contrasenaUsuario"
                    value="<?php echo $contrasena_usuario; ?>" readonly>
            </div>
            <div class="col-12">
                <button class="boton_cerrar" onclick="closePopup()">Cerrar</button>
                <button class="boton_cerrar" onclick="logout()">Finalizar Sesion</button>
            </div>
        </form>
    </div>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script>

    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
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
    </script>

</body>

</html>