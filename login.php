<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/aditivos.ico" type="image/x-icon">
    <title>Inicio de Sesión</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function () {
            $("#togglePass").on('click', function () {
                let passInput = $("#pass");
                if (passInput.attr('type') === 'password') {
                    passInput.attr('type', 'text');
                    $(this).find('i').removeClass('fa-eye').addClass('fa-eye-slash');
                } else {
                    passInput.attr('type', 'password');
                    $(this).find('i').removeClass('fa-eye-slash').addClass('fa-eye');
                }
            });

            $("#toggleAddUserPass").on('click', function () {
                let passInput = $("#addUserPass");
                if (passInput.attr('type') === 'password') {
                    passInput.attr('type', 'text');
                    $(this).find('i').removeClass('fa-eye').addClass('fa-eye-slash');
                } else {
                    passInput.attr('type', 'password');
                    $(this).find('i').removeClass('fa-eye-slash').addClass('fa-eye');
                }
            });

            if (window.location.search.includes('error')) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error al iniciar sesión',
                    text: 'Usuario o contraseña incorrectos.',
                    timer: 4000,
                    showConfirmButton: false,
                    allowOutsideClick: true,
                }).then(() => {
                    removeUrlParam('error');
                });
            }

            if (window.location.search.includes('success')) {
                Swal.fire({
                    icon: 'success',
                    title: '¡Bienvenido a Forrajería Alitex!',
                    text: 'Has iniciado sesión correctamente.',
                    timer: 4000,
                    showConfirmButton: false,
                    allowOutsideClick: true,
                }).then(() => {
                    removeUrlParam('success');
                    setTimeout(() => {
                        window.location.href = 'modulos.php';
                    }, 1500);  // Redirigir después de 2 segundos
                });
            }
        });

        function removeUrlParam(param) {
            const url = new URL(window.location);
            url.searchParams.delete(param);
            window.history.replaceState({}, document.title, url);
        }
    </script>
    <style>
        
        body, html {
    margin: 0;
    padding: 0;
    height: 100%;
    background: url('img/AlitexFondo.jpg') no-repeat center center fixed;
    background-size: cover;
    display: flex;
    justify-content: center;
    align-items: center;
}

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            width: 100%;
        }
        .user_card {
            height: 450px;
            width: 350px;
            background: #916c00a3;
            display: flex;
            justify-content: center;
            flex-direction: column;
            padding: 10px;
            box-shadow: 0 4px 40px 0 #036314, 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            border-radius: 5px;
            position: relative;
        }
        .brand_logo_container {
    position: absolute;
    height: 250px;
    width: 250px;
    top: -120px;
    border-radius: 40%;
    background: #00910c4d;
    box-shadow: 0 4px 40px 0 #036314, 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    padding: 20px;
    text-align: center;
}
        .brand_logo {
            height: 220px;
            width: 220px;
            border-radius: 30%;
            border: 0px solid white;
        }
        .form_container {
            margin-top: 120px;
        }
        .login_btn {
            width: 100%;
            background: #036314ad !important;
            color: white !important;
        }
        .login_btn:focus {
            box-shadow: none !important;
            outline: 0px !important;
        }
        .login_container {
            padding: 0 2rem;
        }
        .input-group-text {
            background: #036314ad !important;
            color: white !important;
            border: 0 !important;
            border-radius: 0.25rem 0 0 0.25rem !important;
        }
        .input_user, .input_pass:focus {
            box-shadow: none !important;
            outline: 0px !important;
        }
        .custom-checkbox .custom-control-input:checked~.custom-control-label::before {
            background-color: #c0392b !important;
        }
        .title {
            margin-top: 140px;
            margin-bottom: -100px;
            text-align: center;
            color: white;
            font-size: 24px;
        }
    </style>
</head>
<body>
    
    <div class="container">
        <div class="user_card">
            <div class="d-flex justify-content-center">
                <div class="brand_logo_container">
                    <img src="img/aditivos.png" class="brand_logo" alt="Logo">
                </div>
            </div>
            <h1 class="title">Iniciar Sesión</h1>
            <div class="d-flex justify-content-center form_container">
                <form action="loguear.php" method="post">
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" name="usuario" class="form-control input_user" placeholder="Usuario" required>
                    </div>
                    <div class="input-group mb-2">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" name="pass" id="pass" class="form-control input_pass" placeholder="Contraseña" required>
                        <div class="input-group-append">
                            <span class="input-group-text" id="togglePass"><i class="fas fa-eye"></i></span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mt-3 login_container">
                        <button type="submit" class="btn login_btn">Ingresar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Mensajes para el inicio de sesión -->
    <?php if (isset($_GET['error'])): ?>
        <script>
            $(document).ready(function () {
                Swal.fire({
                    icon: 'error',
                    title: 'Error al iniciar sesión',
                    text: 'Usuario o contraseña incorrectos.',
                    timer: 4000,
                    showConfirmButton: false,
                    allowOutsideClick: true,
                }).then(() => {
                    removeUrlParam('error');
                });
            });
        </script>
    <?php endif; ?>

    <?php if (isset($_GET['success'])): ?>
        <script>
            $(document).ready(function () {
                Swal.fire({
                    icon: 'success',
                    title: '¡Bienvenido a Forrajería Alitex!',
                    text: 'Has iniciado sesión correctamente.',
                    timer: 4000,
                    showConfirmButton: false,
                    allowOutsideClick: true,
                }).then(() => {
                    removeUrlParam('success');
                    setTimeout(() => {
                        window.location.href = 'modulos.php';
                    }, 1500);  // Redirigir después de 2 segundos
                });
            });
        </script>
    <?php endif; ?>
</body>
</html>
