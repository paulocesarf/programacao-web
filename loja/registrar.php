<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from new.axilthemes.com/demo/template/etrade/sign-up.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Nov 2023 00:21:27 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Loja - Registrar</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png">

    <!-- CSS
    ============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/vendor/font-awesome.css">
    <link rel="stylesheet" href="assets/css/vendor/flaticon/flaticon.css">
    <link rel="stylesheet" href="assets/css/vendor/slick.css">
    <link rel="stylesheet" href="assets/css/vendor/slick-theme.css">
    <link rel="stylesheet" href="assets/css/vendor/jquery-ui.min.css">
    <link rel="stylesheet" href="assets/css/vendor/sal.css">
    <link rel="stylesheet" href="assets/css/vendor/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/vendor/base.css">
    <link rel="stylesheet" href="assets/css/style.min.css">

    <!-- Notificações --> 
    <script src="assets/js/growl-notification.min.js"></script>
    <link rel="stylesheet" href="assets/css/colored-theme.min.css">

</head>


<body>
<script>
      function cadastrar() {
        var nome = $('#nome').val();
        var usuario = $('#usuario').val();
        var email = $('#email').val();
        var senha = $('#senha').val();
        var xmlhttp;
        if (window.XMLHttpRequest) { // IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp = new XMLHttpRequest();
        } else { // IE6, IE5
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
          if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            if (xmlhttp.responseText.search("Sucesso") != -1) {
              GrowlNotification.notify({
                title: 'Boa!',
                description: 'Olá, ' + nome + ' Seja Bem Vindo',
                type: 'success',
                position: 'top-right',
                closeTimeout: 3000
              });
              setTimeout(() => {
                window.location.href = "index.php";
              }, "3000")
            } else {
              GrowlNotification.notify({
                title: 'Oh não!',
                description: xmlhttp.responseText,
                type: 'danger',
                position: 'top-right',
                closeTimeout: 5000
              });
            }
          }
        }
        xmlhttp.open("POST", "sys/cadastros.php?type=cadastrar", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("usuario=" + usuario + "&nome=" + nome + "&email=" + email + "&senha=" + senha);
      }
  </script>

    <div class="axil-signin-area">

        <!-- Start Header -->
        <div class="signin-header">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <a href="index.php" class="site-logo"><img src="assets/images/logo/logo.png" alt="logo"></a>
                </div>
                <div class="col-md-6">
                    <div class="singin-header-btn">
                        <p>Já está registrado?</p>
                        <a href="login.php" class="axil-btn btn-bg-secondary sign-up-btn">Conecte-se</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header -->

        <div class="row">
            <div class="col-xl-4 col-lg-6">
                <div class="axil-signin-banner bg_image bg_image--10">
                    <h3 class="title"></h3>
                </div>
            </div>
            <div class="col-lg-6 offset-xl-2">
                <div class="axil-signin-form-wrap">
                    <div class="axil-signin-form">
                        <h3 class="title">Registre-se</h3>
                        <p class="b2 mb--55">Insire os Dados</p>
                        <form class="singin-form" method="POST">
                            <div class="form-group">
                                <label>Nome</label>
                                <input type="text" class="form-control" id="nome" placeholder="Seu Nome">
                            </div>
                            <div class="form-group">
                                <label>Usuario</label>
                                <input type="text" class="form-control" id="usuario" placeholder="Usuário">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" id="email" placeholder="email@exemplo.com">
                            </div>
                            <div class="form-group">
                                <label>Senha</label>
                                <input type="password" class="form-control" id="senha" placeholder="*********">
                            </div>
                            <div class="form-group">
                                <button type="button" onclick="cadastrar()" class="axil-btn btn-bg-primary submit-btn">Criar Conta</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JS
============================================ -->
    <!-- Modernizer JS -->
    <script src="assets/js/vendor/modernizr.min.js"></script>
    <!-- jQuery JS -->
    <script src="assets/js/vendor/jquery.js"></script>
    <!-- Bootstrap JS -->
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="assets/js/vendor/bootstrap.min.js"></script>
    <script src="assets/js/vendor/slick.min.js"></script>
    <script src="assets/js/vendor/js.cookie.js"></script>
    <!-- <script src="assets/js/vendor/jquery.style.switcher.js"></script> -->
    <script src="assets/js/vendor/jquery-ui.min.js"></script>
    <script src="assets/js/vendor/jquery.ui.touch-punch.min.js"></script>
    <script src="assets/js/vendor/jquery.countdown.min.js"></script>
    <script src="assets/js/vendor/sal.js"></script>
    <script src="assets/js/vendor/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/vendor/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js/vendor/isotope.pkgd.min.js"></script>
    <script src="assets/js/vendor/counterup.js"></script>
    <script src="assets/js/vendor/waypoints.min.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

</body>


<!-- Mirrored from new.axilthemes.com/demo/template/etrade/sign-up.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Nov 2023 00:21:27 GMT -->
</html>