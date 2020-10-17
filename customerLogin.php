<?php
session_start();

if (isset($_SESSION['login'])) {
    header("Location:index.php");
} else {
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
  <script src="vendor/jquery/jquery.min.js"></script>
  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">
    <!-- CSS here -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/owl.carousel.min.css">
	<link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/gijgo.css">
	<link rel="stylesheet" href="assets/css/animate.min.css">
	<link rel="stylesheet" href="assets/css/magnific-popup.css">
	<link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
	<link rel="stylesheet" href="assets/css/themify-icons.css">
	<link rel="stylesheet" href="assets/css/slick.css">
	<link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">
    
    <script type="text/javascript">
        $(document).ready(function() {
            $("#login").click(function() {
                email = $("#email").val();
                password = $("#password").val();

                $.ajax({
                    type: "POST",
                    url: "pcheck.php",
                    data: "email="+email+"&password="+password,
                    success:function(html) {
                        if (html == 'true') {
                            $("#adderr").html('<div class="alert alert-success">\
                                                <strong>Authentcated</strong></div>');
                            window.location.href = "menu.php";
                        }
                        else if (html == 'false') {
                            $("#adderr").html('<div class="alert alert-danger">\
                                                Authentication<strong> Failed!</strong></div>');
                        }
                        else {
                            $("#adderr").html('<div class="alert alert-danger">\
                                                <strong>Error! </strong>Please try again after some time.</div>');
                        }
                    },
                    beforeSend: function() {
                        $("#adderr").html("Loading...");
                    }
                });
                return false;
            });
        });
    </script>




    

</head>

<body>

    <div style="height:100px">
    <?php
    include 'header.php';
    ?>
</div>



  <section class="page-section ">
    <div class="container mb-5" style="background-color:#1E1E1E;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);text-transform:uppercase;">
    <div class="bg-faded rounded p-5" >
        <div class="col-lg-12 mt-5" >
            <hr>
            <h2 class="intro-text text-center" style="color:whitesmoke">Customer Login
            </h2>
            <div style="text-align:center" id="adderr"></div>
            <hr>       
            <form role="form">
                <div class="row" style="color:grey">
                    <div class="form-group col-lg-12">
                        <label>Email Address</label>
                        <input type="email" id="email" name="email" maxlength="25" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group col-lg-12">
                        <label>Password</label>
                        <input type="password" id="password" name="password" maxlength="10" class="form-control">
                    </div>
                    <div class="register-button col-lg-12">
                    <span display="flex">
                                            <label>Not a Member?</label>
                                            <a style="color:orangered" href="customerRegister.php">Register</a>
                                        </span>
                        <button type="submit" id="login" style="float:right;" class="btn">LogIn</button>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
  </section>



  <?php 
    include 'footer.php' 
    ?>
   <!-- JS here -->

   <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="./assets/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="./assets/js/owl.carousel.min.js"></script>
    <script src="./assets/js/slick.min.js"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="./assets/js/wow.min.js"></script>
    <script src="./assets/js/animated.headline.js"></script>
    <script src="./assets/js/jquery.magnific-popup.js"></script>

    <!-- Date Picker -->
    <script src="./assets/js/gijgo.min.js"></script>
    <!-- Nice-select, sticky -->
    <script src="./assets/js/jquery.nice-select.min.js"></script>
    <script src="./assets/js/jquery.sticky.js"></script>
    
    <!-- contact js -->
    <script src="./assets/js/contact.js"></script>
    <script src="./assets/js/jquery.form.js"></script>
    <script src="./assets/js/jquery.validate.min.js"></script>
    <script src="./assets/js/mail-script.js"></script>
    <script src="./assets/js/jquery.ajaxchimp.min.js"></script>
    
    <!-- Jquery Plugins, main Jquery -->	
    <script src="./assets/js/plugins.js"></script>
    <script src="./assets/js/main.js"></script>

</body>

</html>
    <?php } ?>