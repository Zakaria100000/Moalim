<?php

 

	if(isset($_POST['submit'])){
        
		$loginUser = new UsersController();
		$loginUser->auth();
	}
?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">

    <!-- Partie CSS -->
    <link rel="stylesheet" href="views/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="views/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="views/assets/css/flaticon.css">
    <link rel="stylesheet" href="views/assets/css/price_rangs.css">
    <link rel="stylesheet" href="views/assets/css/slicknav.css">
    <link rel="stylesheet" href="views/assets/css/animate.min.css">
    <link rel="stylesheet" href="views/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="views/assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="views/assets/css/themify-icons.css">
    <link rel="stylesheet" href="views/assets/css/slick.css">
    <link rel="stylesheet" href="views/assets/css/nice-select.css">
    <link rel="stylesheet" href="views/assets/css/style.css">
    <link rel="stylesheet" href="views/assets/css/custom.css">
</head>

<body>

    <section class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="login-title">Login</h2>

                    <form method="post">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" name="username" type="text" placeholder="Username"
                                        required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" name="password" type="password" placeholder="Password"
                                        required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <button type="submit" name="submit
                            
                            
                            " class="button btn">Login</button>
                        </div>

                        <?php 
                            if(!empty($error)) {
                                echo $error;
                            }
                        ?>
                        <h5></h5>
                    </form>
                </div>
            </div>
        </div>
    </section>


    <?php include './views/templates/footer.php'; ?>

    <!-- JS -->

    <script src="./views/assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="./views/assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="./views/assets/js/popper.min.js"></script>
    <script src="./views/assets/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="./views/assets/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="./views/assets/js/owl.carousel.min.js"></script>
    <script src="./views/assets/js/slick.min.js"></script>
    <script src="./views/assets/js/price_rangs.js"></script>

    <!-- One Page, Animated-HeadLin -->
    <script src="./views/assets/js/wow.min.js"></script>
    <script src="./views/assets/js/animated.headline.js"></script>

    <!-- Scrollup, nice-select, sticky -->
    <script src="./views/assets/js/jquery.scrollUp.min.js"></script>
    <script src="./views/assets/js/jquery.nice-select.min.js"></script>
    <script src="./views/assets/js/jquery.sticky.js"></script>
    <script src="./views/assets/js/jquery.magnific-popup.js"></script>

    <!-- contact js -->
    <script src="./views/assets/js/contact.js"></script>
    <script src="./views/assets/js/jquery.form.js"></script>
    <script src="./views/assets/js/jquery.validate.min.js"></script>
    <script src="./views/assets/js/mail-script.js"></script>
    <script src="./views/assets/js/jquery.ajaxchimp.min.js"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="./views/assets/js/plugins.js"></script>
    <script src="./views/assets/js/main.js"></script>

</body>

</html>