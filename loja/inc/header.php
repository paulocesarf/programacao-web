<header class="header axil-header header-style-5">
        <div class="axil-header-top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-sm-6 col-12">
                        
                    </div>
                    <div class="col-lg-6 col-sm-6 col-12">
                        <div class="header-top-link">
                            <ul class="quick-link">
                                <?php
                                    if (isset($_SESSION['id'])) {
                                        echo '<li><a href="logout.php">Sair da Conta</a></li>';
                                    } else {
                                        echo '<li><a href="login.php">Login</a></li>';
                                        echo '<li><a href="registrar.php">Registrar</a></li>';
                                    }
                                ?>  
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Mainmenu Area  -->
        <div id="axil-sticky-placeholder"></div>
        <div class="axil-mainmenu">
            <div class="container">
                <div class="header-navbar">
                    <div class="header-brand">
                        <a href="index.html" class="logo logo-dark">
                            <img src="assets/images/logo/logo.png" alt="Site Logo">
                        </a>
                        <a href="index.html" class="logo logo-light">
                            <img src="assets/images/logo/logo-light.png" alt="Site Logo">
                        </a>
                    </div>
                    <div class="header-main-nav">
                        <!-- Start Mainmanu Nav -->
                        <nav class="mainmenu-nav">
                            <button class="mobile-close-btn mobile-nav-toggler"><i class="fas fa-times"></i></button>
                            <div class="mobile-nav-brand">
                                <a href="index.html" class="logo">
                                    <img src="assets/images/logo/logo.png" alt="Site Logo">
                                </a>
                            </div>
                            <ul class="mainmenu">
                                <li><a href="index.php">Início</a></li>
                                <?php
                                    if (isset($_SESSION['id'])) {
                                        echo '<li><a href="minha-conta.php">Minha Conta</a></li>
                                            <li class="menu-item-has-children">
                                                <a href="#">Produtos</a>
                                                <ul class="axil-submenu">
                                                    <li><a href="index.php">Todos os Produtos</a></li>
                                                    <li><a href="minha-conta.php">Cadastrar Produto</a></li>
                                                    <li><a href="minha-conta.php">Editar Produto</a></li>
                                                </ul>
                                            </li>';
                                    } 
                                ?>
                                
                            </ul>
                        </nav>
                        <!-- End Mainmanu Nav -->
                    </div>
                    <div class="header-action">
                        <ul class="action-list">
                            <li class="axil-mobile-toggle">
                                <button class="menu-btn mobile-nav-toggler">
                                    <i class="flaticon-menu-2"></i>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Mainmenu Area -->
        <div class="header-top-campaign">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-6 col-md-10">
                        <div class="header-campaign-activation axil-slick-arrow arrow-both-side header-campaign-arrow">
                            <div class="slick-slide">
                                <div class="campaign-content">
                                    <p>PROMOÇÃO <a href="#">50% DE DESCONTO</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>