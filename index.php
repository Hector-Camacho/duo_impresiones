
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <title>Duo Impresiones | Login</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
    <meta content="" name="description">
    <meta content="" name="author">
    <link rel="shortcut icon" href="favicon.png" type="image/png">
    
    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="assets/plugins/jquery-ui/themes/base/minified/jquery-ui.css" rel="stylesheet">
    <link href="assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    <link href="assets/css/theme/default.css" rel="stylesheet" id="theme">
    <style>.logoduo{display:inline;height:45px;}</style>
    <!-- ================== END BASE CSS STYLE ================== -->
    
    <!-- ================== BEGIN BASE JS ================== -->
    <script src="assets/plugins/pace/pace.js"></script>
    <!-- ================== END BASE JS ================== -->
</head>
<body class="pace-top">
    <!-- begin #page-loader -->
    <div id="page-loader" class="fade in"><span class="spinner"></span></div>
    <!-- end #page-loader -->
    
    <div class="login-cover">
        <div class="login-cover-image"><img src="assets/img/login-bg/bg-1.jpg" data-id="login-cover-image" alt=""></div>
        <div class="login-cover-bg"></div>
    </div>
    <!-- begin #page-container -->
    <div id="page-container" class="fade">
        <!-- begin login -->
        <div class="login login-v2" data-pageload-addclass="animated fadeIn">
            <!-- begin brand -->
            <div class="login-header">
                <div class="brand">
                    <img class="logoduo" src="../assets/img/duologo.png"> Impresiones
                    <!-- <small>Impresiones</small> -->
                </div>
                <div class="icon">
                    <i class="fa fa-sign-in"></i>
                </div>
            </div>
            <!-- end brand -->
            <div class="login-content">
                <form id="validaUsuario" method="POST">
                    <div class="form-group m-b-20">
                        <label for="nombreusuario">Nombre de usuario</label>
                        <input type="text" class="form-control input-lg" id="nombreusuario" name="nombreusuario" placeholder="Nombre de usuario">
                    </div>
                    <div class="form-group m-b-20">
                        <label for="contrasena">Contraseña</label>
                        <input type="password" class="form-control input-lg" id="contrasena" name="contrasena" placeholder="Contraseña">
                    </div>
                    <div class="login-buttons">
                        <button type="button" class="btn btn-success btn-block btn-lg" id="iniciarsesion" name="iniciarsesion" value="Ingresar">Iniciar Sesión</button>
                    </div>
                    <div class="m-t-20">
                    </div>
                </form>
            </div>
        </div>
        <!-- end login -->
        
        <ul class="login-bg-list">
            <li class="active"><a href="#" data-click="change-bg"><img src="assets/img/login-bg/bg-1.jpg" alt=""></a></li>
            <li><a href="#" data-click="change-bg"><img src="assets/img/login-bg/bg-2.jpg" alt=""></a></li>
            <li><a href="#" data-click="change-bg"><img src="assets/img/login-bg/bg-3.jpg" alt=""></a></li>
            <li><a href="#" data-click="change-bg"><img src="assets/img/login-bg/bg-4.jpg" alt=""></a></li>
            <li><a href="#" data-click="change-bg"><img src="assets/img/login-bg/bg-5.jpg" alt=""></a></li>
            <li><a href="#" data-click="change-bg"><img src="assets/img/login-bg/bg-6.jpg" alt=""></a></li>
        </ul>

    </div>
    <!-- end page container -->
    
    <!-- ================== BEGIN BASE JS ================== -->
    <script src="assets/plugins/jquery/jquery-1.9.1.js"></script>
    <script src="assets/plugins/jquery/jquery-migrate-1.1.0.js"></script>
    <script src="assets/plugins/jquery-ui/ui/minified/jquery-ui.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.js"></script>
    <!--[if lt IE 9]>
        <script src="assets/crossbrowserjs/html5shiv.js"></script>
        <script src="assets/crossbrowserjs/respond.min.js"></script>
        <script src="assets/crossbrowserjs/excanvas.min.js"></script>
    <![endif]-->
    <script src="assets/plugins/slimscroll/jquery.slimscroll.js"></script>
    <script src="assets/plugins/jquery-cookie/jquery.js"></script>
    <!-- ================== END BASE JS ================== -->
    
    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="assets/js/login-v2.demo.js"></script>
    <script src="assets/js/apps.js"></script>
    <script src="assets/jsduo/login.js"></script>
    <!-- ================== END PAGE LEVEL JS ================== -->
    <script>
        $(document).ready(function() {
            App.init();
            LoginV2.init();
        });
    </script>
</body>
</html>
