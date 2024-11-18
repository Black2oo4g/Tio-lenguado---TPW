<!DOCTYPE html>
<?php
// Asegúrate de que la sesión esté iniciada
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario_id'])) {
    echo "<script>
        alert('Por favor, inicie sesión primero.');
        window.location.href = '../Public_html/login.html';
    </script>";
    exit();
}

// Recuperar los datos del usuario desde la sesión
$nombre_usuario = $_SESSION['nombre_usuario'];
$correo_usuario = $_SESSION['correo_usuario'];
$tipo_usuario = $_SESSION['tipo_usuario'];
$fecha_creacion = $_SESSION['fecha_creacion'];
$contrasena_usuario = $_SESSION['contrasena_usuario'];

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
                        <li><a class="dropdown-item" href="#">Salir</a></li>
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

    <div class="container">
        <div class="table_header">
            <h2>PLATOS Y BEBIDAS</h2>
            <br>

            <select name="Tipos de platos" id="">
                <option value="" selected>Todos</option>
                <option value="">Ceviches</option>
                <option value="">Especiales</option>
                <option value="">Bebidas</option>

            </select>
            <div class="input_search">
                <input type="search" placeholder="Buscar" />
                <i class="bi bi-search" id="search"></i>
            </div>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Nombre de producto <i class="bi bi-chevron-expand"></i></th>
                    <th>Tipo <i class="bi bi-chevron-expand"></i></th>
                    <th>Precio <i class="bi bi-chevron-expand"></i></th>
                    <th>Operaciones <i class="bi bi-chevron-expand"></i></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>CEVICHE DE PESCADO</td>
                    <td>Ceviches</td>
                    <td>s/32</td>
                    <td>
                        <i class="bi bi-pencil-square" id="icons"></i><i class="bi bi-trash" id="icons"></i>
                    </td>
                </tr>
                <tr>
                    <td>CEVICHE DE LANGOSTINOS/MIXTO</td>
                    <td>Ceviches</td>
                    <td>s/35</td>
                    <td>
                        <i class="bi bi-pencil-square" id="icons"></i><i class="bi bi-trash" id="icons"></i>
                    </td>
                </tr>
                <tr>
                    <td>PESCADO Y LANGOSTINOS</td>
                    <td>Ceviches</td>
                    <td>s/35</td>
                    <td>
                        <i class="bi bi-pencil-square" id="icons"></i><i class="bi bi-trash" id="icons"></i>
                    </td>
                </tr>
                <tr>
                    <td>COCTEL DE LANGOSTINOS</td>
                    <td>Entrada</td>
                    <td>s/36</td>
                    <td>
                        <i class="bi bi-pencil-square" id="icons"></i><i class="bi bi-trash" id="icons"></i>
                    </td>
                </tr>
                <tr>
                    <td>LANGOSTINOS A LA PARMESANA </td>
                    <td>Platillos</td>
                    <td>s/36</td>
                    <td>
                        <i class="bi bi-pencil-square" id="icons"></i><i class="bi bi-trash" id="icons"></i>
                    </td>
                </tr>
                <tr>
                    <td>ARROZ CON LANGOSTINOS</td>
                    <td>Platillos</td>
                    <td>s/35</td>
                    <td>
                        <i class="bi bi-pencil-square" id="icons"></i><i class="bi bi-trash" id="icons"></i>
                    </td>
                </tr>
                <tr>
                    <td>CHAUFA DE LANGOSTINOS</td>
                    <td>Platillos</td>
                    <td>s/35</td>
                    <td>
                        <i class="bi bi-pencil-square" id="icons"></i><i class="bi bi-trash" id="icons"></i>
                    </td>
                </tr>
                <tr>
                    <td>SALTADO DE LANGOSTINOS</td>
                    <td>Platillos</td>
                    <td>s/35</td>
                    <td>
                        <i class="bi bi-pencil-square" id="icons"></i><i class="bi bi-trash" id="icons"></i>
                    </td>
                </tr>
                <tr>
                    <td>CHICHARRON DE PESCADO</td>
                    <td>Platillos</td>
                    <td>s/32</td>
                    <td>
                        <i class="bi bi-pencil-square" id="icons"></i><i class="bi bi-trash" id="icons"></i>
                    </td>
                </tr>
                <tr>
                    <td>CHICHARRON DE LANGOSTINOS / MIXTO</td>
                    <td>Platillos</td>
                    <td>s/35</td>
                    <td>
                        <i class="bi bi-pencil-square" id="icons"></i><i class="bi bi-trash" id="icons"></i>
                    </td>
                </tr>
                <tr>
                    <td>PESCADO Y LANGOSTINOS</td>
                    <td>Platillos</td>
                    <td>s/35</td>
                    <td>
                        <i class="bi bi-pencil-square" id="icons"></i><i class="bi bi-trash" id="icons"></i>
                    </td>
                </tr>
                <tr>
                    <td>MILANESA DE PESCADO</td>
                    <td>Platillos</td>
                    <td>s/30</td>
                    <td>
                        <i class="bi bi-pencil-square" id="icons"></i><i class="bi bi-trash" id="icons"></i>
                    </td>
                </tr>
                <tr>
                    <td>JALEA MIXTA</td>
                    <td>Platillos</td>
                    <td>s/55</td>
                    <td>
                        <i class="bi bi-pencil-square" id="icons"></i><i class="bi bi-trash" id="icons"></i>
                    </td>
                <tr>
                    <td>PORCION DE CHIFLES</td>
                    <td>Entrada</td>
                    <td>s/5</td>
                    <td>
                        <i class="bi bi-pencil-square" id="icons"></i><i class="bi bi-trash" id="icons"></i>
                    </td>
                <tr>
                    <td>PORCION DE PAPAS FRITAS</td>
                    <td>Entrada</td>
                    <td>s/5</td>
                    <td>
                        <i class="bi bi-pencil-square" id="icons"></i><i class="bi bi-trash" id="icons"></i>
                    </td>
                <tr>
                    <td>PORCION DE ARROZ</td>
                    <td>Entrada</td>
                    <td>s/5</td>
                    <td>
                        <i class="bi bi-pencil-square" id="icons"></i><i class="bi bi-trash" id="icons"></i>
                    </td>
                <tr>
                    <td>CERVEZA CUSQUEÑA</td>
                    <td>Bebidas</td>
                    <td>s/8</td>
                    <td>
                        <i class="bi bi-pencil-square" id="icons"></i><i class="bi bi-trash" id="icons"></i>
                    </td>
                <tr>
                    <td>CERVEZA PILSEN / CRISTAL</td>
                    <td>Bebidas</td>
                    <td>s/7</td>
                    <td>
                        <i class="bi bi-pencil-square" id="icons"></i><i class="bi bi-trash" id="icons"></i>
                    </td>
                <tr>
                    <td>VASO CHICHA DE JORA</td>
                    <td>Bebidas</td>
                    <td>s/5</td>
                    <td>
                        <i class="bi bi-pencil-square" id="icons"></i><i class="bi bi-trash" id="icons"></i>
                    </td>
                <tr>
                    <td>VASO CHICHA MORADA</td>
                    <td>Bebidas</td>
                    <td>s/5</td>
                    <td>
                        <i class="bi bi-pencil-square" id="icons"></i><i class="bi bi-trash" id="icons"></i>
                    </td>
                <tr>
                    <td>AGUA PERSONAL</td>
                    <td>Bebidas</td>
                    <td>s/5</td>
                    <td>
                        <i class="bi bi-pencil-square" id="icons"></i><i class="bi bi-trash" id="icons"></i>
                    </td>
                <tr>

                </tr>

            </tbody>
        </table>
        <div class="table_fotter">
            <p>Total filas: </p>

        </div>
    </div>
    </div>
    <table border="0" width: 100%; height: 100vh;">
        <tr>
            <td align="left">
                <h2 style="color:firebrick; margin-top: 1em;"><strong>Platos Destacados</strong> </h2>
            </td>
        </tr>
        <tr>
            <td>
                <ul>
                    <li align="Center">
                        <h4 class="highlight">PLATILLOS</h4>
                        <ul>
                            <li style="color:aqua" align="left"><strong>Chicharrón de Pescado s/32</strong></li>
                            <li style="color:aqua" align="left"><strong>Saltado de Langostinos s/35</strong></li>
                            <li style="color:aqua" align="left"><strong>Chicharron de Langostinos<br></strong>
                                (Langostinos - Mixto) s/35</li>
                        </ul>

                    </li>
                </ul>



            </td>

            <td><img width="200" height="200" src="Imagenes/tigre.png" alt="Leche de tigre" /></td>
        </tr>
        <tr>
            <td>
                <ul>
                    <li align="Center">
                        <h4 class="highlight">Ceviches</h4>
                        <ul>
                            <li style="color:aqua" align="left"><strong>Ceviche de Pescado s/32</strong></li>
                            <li style="color:aqua" align="left"><strong>Ceviche de Langostinos - Mixto s/35</strong>
                            </li>
                            <li style="color:aqua" align="left"><strong>Pescado y Langostinos s/35 <br></strong> </li>
                        </ul>

                    </li>
                </ul>



            </td>

            <td><img width="200" height="200" src="Imagenes/ceviche.png" alt="Leche de tigre" /></td>
        </tr>
    </table>
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
                <input type="text" class="form-control" id="nombreUsuario" value="<?php echo $nombre_usuario; ?>" readonly>
            </div>
            <div class="col-md-6">
                <label for="correoUsuario" class="form-label">Correo</label>
                <input type="email" class="form-control" id="correoUsuario" value="<?php echo $correo_usuario; ?>" readonly>
            </div>
            <div class="col-md-6">
                <label for="tipoUsuario" class="form-label">Tipo de Usuario</label>
                <input type="text" class="form-control" id="tipoUsuario" value="<?php echo $tipo_usuario; ?>" readonly>
            </div>
            <div class="col-md-6">
                <label for="fechaCreacion" class="form-label">Fecha de Creación</label>
                <input type="text" class="form-control" id="fechaCreacion" value="<?php echo $fecha_creacion; ?>" readonly>
            </div>
            <div class="col-md-12">
                <label for="contrasenaUsuario" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="contrasenaUsuario" value="<?php echo $contrasena_usuario; ?>" readonly>
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
        function logout() {
            window.location.href = 'logout.php';
        }
    </script>
</body>

</html>