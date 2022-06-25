<?php

?>

<header>
    <!-- Header Start -->
    <div class="header-area header-transparrent">
        <div class="headder-top header-sticky">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-2">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="index.html"></a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="menu-wrapper">
                            <!-- Main-menu -->
                            <div class="main-menu">
                                <nav class="d-none d-lg-block">
                                    <ul id="navigation">
                                        <li><a href="home.php">Acceuil</a></li>
                                        <li><a href="matiere.php">Matières</a></li>
                                        <li><a href="matTP.php">Travaux Pratiques</a></li>
                                        <li><a href="about.php">À Propos</a></li>
                                        <li><a href="contact.php">Contactez-nous</a></li>
                                        <?php if(isset($_SESSION["loggedin"])): ?>
                                        <?php echo "<li><a href='#'>{$_SESSION['email']}</a>
                                                            <ul class='submenu'>
                                                                <li><a href='logout.php'>Logout</a></li>
                                                            </ul>
                                                        </li>"
                                            ?>
                                        <?php endif; ?>
                                    </ul>
                                </nav>
                            </div>
                            <?php if(!isset($_SESSION["loggedin"])): ?>
                            <?php echo "<div class='header-btn d-none f-right d-lg-block'>
                                                <a href='login' class='btn head-btn1'>Login</a>
                                            </div>"; 
                                            ?>
                            <?php endif; ?>
                            <!-- Header-btn -->
                        </div>
                    </div>
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>