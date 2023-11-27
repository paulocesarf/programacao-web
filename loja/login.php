<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from new.axilthemes.com/demo/template/etrade/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Nov 2023 00:21:27 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Loja - Conectar</title>
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
      function login() {
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
            if (xmlhttp.responseText.search("Ola") != -1) {
              GrowlNotification.notify({
                title: 'Boa!',
                description: 'Olá, ' + email + ' Seja Bem Vindo',
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
        xmlhttp.open("POST", "sys/cadastros.php?type=login", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("email=" + email + "&senha=" + senha);
      }
  </script>
    <div class="axil-signin-area">

        <!-- Start Header -->
        <div class="signin-header">
            <div class="row align-items-center">
                <div class="col-sm-4">
                    <a href="index.php" class="site-logo"><img src="assets/images/logo/logo.png" alt="logo"></a>
                </div>
                <div class="col-sm-8">
                    <div class="singin-header-btn">
                        <p>Já está registrado?</p>
                        <a href="registrar.php" class="axil-btn btn-bg-secondary sign-up-btn">Registre-se</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- End Header -->

        <div class="row">
            <div class="col-xl-4 col-lg-6">
                <div class="axil-signin-banner bg_image bg_image--9">
                    <h3 class="title"></h3>
                </div>
            </div>
            <div class="col-lg-6 offset-xl-2">
                <div class="axil-signin-form-wrap">
                    <div class="axil-signin-form">
                        <h3 class="title">Conecte-se Agora</h3>
                        <p class="b2 mb--55">Insira seus dados</p>
                        <form class="singin-form">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" id="email" placeholder="email@exemplo.com">
                            </div>
                            <div class="form-group">
                                <label>Senha</label>
                                <input type="password" class="form-control" id="senha" placeholder="********">
                            </div>
                            <div class="form-group d-flex align-items-center justify-content-between">
                                <button type="button" onclick="login()" class="axil-btn btn-bg-primary submit-btn">Conectar</button>
                                <a href="#" class="forgot-btn">Esqueceu sua Senha?</a>
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


<!-- Mirrored from new.axilthemes.com/demo/template/etrade/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Nov 2023 00:21:27 GMT -->
</html>