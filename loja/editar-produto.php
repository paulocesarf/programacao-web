<?php
// Iniciar a sessão
require 'sys/init.php';
session_start();

if (!isset($_GET['id'])) {
    header("Location: minha-conta.php"); 
    exit; 
}

if (!isset($_SESSION['id'])) {
    header('location: index.php');
    die();
}

 ?>
<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from new.axilthemes.com/demo/template/etrade/my-account.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Nov 2023 00:22:28 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Loja - Editar Produto</title>
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


<body class="sticky-header">
<script>
      function salvar() {
        var id = <?php echo $_GET['id']; ?>;
        var nome = $('#nomeproduto').val();
        var imagem = $('#imagemproduto').val();
        var descricao = $('#descricaoproduto').val();
        var valor = $('#valorproduto').val();
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
                description: 'Alterado com Sucesso',
                type: 'success',
                position: 'top-right',
                closeTimeout: 3000
              });
              setTimeout(() => {
                window.location.href = "minha-conta.php";
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
        xmlhttp.open("POST", "sys/cadastros.php?type=editarprod", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("id=" + id + "&nome=" + nome + "&imagem=" + imagem + "&descricao=" + descricao + "&valor=" + valor);
      }

      function excluir() {
        var id = <?php echo $_GET['id']; ?>;

        var xmlhttp;
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if (xmlhttp.responseText.search("Apagado") != -1) {
                    GrowlNotification.notify({
                        title: 'Sucesso!',
                        description: 'Produto apagado com sucesso',
                        type: 'success',
                        position: 'top-right',
                        closeTimeout: 3000
                    });
                    setTimeout(() => {
                        window.location.href = "minha-conta.php";
                    }, 3000);
                } else {
                    GrowlNotification.notify({
                        title: 'Oh no!',
                        description: xmlhttp.responseText,
                        type: 'danger',
                        position: 'top-right',
                        closeTimeout: 5000
                    });
                }
            }
        }

        xmlhttp.open("POST", "sys/cadastros.php?type=apagar", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("id=" + id);
    }
  </script>
    <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->
    <a href="#top" class="back-to-top" id="backto-top"><i class="fal fa-arrow-up"></i></a>
    <!-- Start Header -->
    <?php require_once("inc/header.php"); ?>
    <!-- End Header -->

    <main class="main-wrapper">
        <!-- Start Breadcrumb Area  -->
        <div class="axil-breadcrumb-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-8">
                        <div class="inner">
                            <ul class="axil-breadcrumb">
                                <li class="axil-breadcrumb-item"><a href="index.php">Início</a></li>
                                <li class="separator"></li>
                                <li class="axil-breadcrumb-item active" aria-current="page">Alterações</li>
                            </ul>
                            <h1 class="title">Altere Alguns Dados</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumb Area  -->
        <?php
        $id = $_GET['id'];

        $SQL3 = $odb -> prepare("SELECT * FROM produtos WHERE ID_prd = :id LIMIT 1");
        $SQL3 -> execute(array(':id' => $id));

        if( !$SQL3 ){
            echo "Erro ao realizar consulta. Tente outra vez.";
            exit;
        }

        while ($show = $SQL3 -> fetch(PDO::FETCH_ASSOC)) {
        ?>
        <!-- Start My Account Area  -->
        <div class="axil-dashboard-area axil-section-gap">
            <div class="container">
                <div class="axil-dashboard-warp">
                    <div class="axil-dashboard-author">
                        <div class="media">
                            <div class="media-body">
                                <h5 class="title mb-0">Editando: <?php echo $show['nome_prd']; ?></h5>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="col-xl-12 col-md-12">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="nav-dashboard" role="tabpanel">
                                    <div class="col-lg-12">
                                        <div class="axil-dashboard-account">
                                            <form class="account-details-form">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Nome Produto</label>
                                                            <input type="text" class="form-control" id="nomeproduto" placeholder="Nome Produto" value="<?php echo $show['nome_prd']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Imagem Produto</label>
                                                            <input type="text" class="form-control" id="imagemproduto" placeholder="Link Imagem Produto" value="<?php echo $show['imagem_prd']; ?>">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label>Descricao Produto</label>
                                                            <input type="text" class="form-control" id="descricaoproduto" placeholder="Digite alguma coisa..." value="<?php echo $show['descricao_prd']; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Valor Produto</label>
                                                            <input type="text" class="form-control" id="valorproduto" placeholder="R$00,00" value="<?php echo $show['valor_prd']; ?>">
                                                        </div>
                                                        <div class="form-group mb--0">
                                                            <input type="button" onclick="salvar()" class="axil-btn" value="Salvar">
                                                            <input type="button" onclick="excluir()" class="axil-btn" value="Excluir">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-orders" role="tabpanel">
                                    <div class="axil-dashboard-order">
                                        <form class="account-details-form">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Nome Produto</label>
                                                        <input type="text" class="form-control" id="nomeproduto" placeholder="Nome Produto">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Imagem Produto</label>
                                                        <input type="text" class="form-control" id="imagemproduto" placeholder="Link Imagem Produto">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label>Descricao Produto</label>
                                                        <input type="text" class="form-control" id="descricaoproduto" placeholder="Digite alguma coisa...">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Valor Produto</label>
                                                        <input type="text" class="form-control" id="valorproduto" placeholder="R$00,00">
                                                    </div>
                                                    <div class="form-group mb--0">
                                                        <input type="button" onclick="cadastrarprod()" class="axil-btn" value="Salvar">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-downloads" role="tabpanel">
                                <div class="axil-dashboard-order">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">ID</th>
                                                        <th scope="col">Nome</th>
                                                        <th scope="col">Valor</th>
                                                        <th scope="col">Ação</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $SQL2 = $odb -> prepare("SELECT * FROM `produtos`");
                                                $SQL2 -> execute();

                                                if( !$SQL2 ){
                                                    echo "Erro ao realizar consulta. Tente outra vez.";
                                                    exit;
                                                }

                                                while ($show = $SQL2 -> fetch(PDO::FETCH_ASSOC)) { 
                                                ?>
                                                    <tr>
                                                        <th scope="row">#<?php echo $show['ID_prd']; ?></th>
                                                        <td><?php echo $show['nome_prd']; ?></td>
                                                        <td>R$<?php echo $show['valor_prd']; ?></td>
                                                        <td><a href="#" class="axil-btn view-btn" style="margin-right:10px;">Editar</a><a href="#" onclick="excluir()" class="axil-btn view-btn">Excluir</a></td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        }
        ?>
        <!-- End My Account Area  -->

    </main>

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


<!-- Mirrored from new.axilthemes.com/demo/template/etrade/my-account.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Nov 2023 00:22:28 GMT -->
</html>