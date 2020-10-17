<?php
session_start();

if (isset($_SESSION['login'])) {
    $cid = $_SESSION['login'];
    $fname = $_SESSION['fname'];
    $role = $_SESSION['role'];
    if($role == "customer") {

?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
        <meta content="utf-8" http-equiv="encoding">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
  <script src="vendor/jquery/jquery.min.js"></script>
  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">
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
    

</head>

<?php
  if (isset($_GET["logout"])) {
    
    if ($_GET["logout"] == "true") { 
        ?>
      
      <div class="alert alert-success">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>You have been logged out of the system.</strong>
      </div>   
    <?php
    }
  }
  ?>

<body>
          <!--? Preloader Start 
          <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/logo.png" alt="">
                </div>
            </div>
        </div>
    </div>-->

    <div style="height:100px">
    <?php
    include 'header.php';
    ?>
</div>

    <main>
    <div class="adderr"></div>
        <div class="container mt-4">
            <h2 style="color:orangered;text-align:center">Menu</h2>
            <div class="row" >
                <div class=" col-sm-12 ml-auto" >
                <?php 
                
                require 'constring.php';

                $query = "SELECT * FROM dish";
                $result = mysqli_query($mysqli, $query) or die(mysqli_error());

                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        $d_id = $row["d_id"];
                        $name = $row["d_name"];
                        $type = $row["d_type"];
                        $rname = $row["r_name"];
                        $rid = $row["r_id"];
                        ?>

                        <div class="card mt-3" style="background-color:#1E1E1E;text-align:center;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);text-transform:uppercase;">
                            <div class="card-body">
                                    <h4 class="card-title" style="color:orangered"> <?php echo $name ?> </h4>
                                    <p class="card-text" style="color:grey">Prepared by - <?php echo $rname; ?> <br> <?php echo $type; ?> </p>
                                    <div>
                                        <a href="order.php?rid=<?php echo $rid ?>&dishid=<?php echo $d_id ?>&cid=<?php echo $cid ?>&cname=<?php echo $fname ?>&dname=<?php echo $name ?>&rname=<?php echo $rname ?>"><button class="btn btn-lg" >Ok</button</a>
                                    </div>
                                
                            </div>
                        </div>

                        <?php
                    }
                } else {
                    echo "0 results";
                }

                ?>
                </div>
                
            </div>
        </div>
    </main>
    <div class="mt-4">
    <?php 
    include 'footer.php' 
    ?>
            </div>
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
<?php } else if($role == "restaurant") { ?>
    <!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
        <meta content="utf-8" http-equiv="encoding">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
  <script src="vendor/jquery/jquery.min.js"></script>
  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">
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
            
</head>

<?php
  if (isset($_GET["logout"])) {
    
    if ($_GET["logout"] == "true") { 
        ?>
      
      <div class="alert alert-success">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>You have been logged out of the system.</strong>
      </div>   
    <?php
    }
  }
  ?>

<body>
          <!--? Preloader Start -->
          <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/logo.png" alt="">
                </div>
            </div>
        </div>
    </div>

    <div style="height:100px">
    <?php
    include 'header.php';
    ?>
</div>


<div class="adderr"></div>

    <main>
        <div class="container mt-4">
        <h2 style="color:orangered;text-align:center">Menu</h2>
            <div class="row" >
                <div class="col"></div>
                <div class="col-lg-8 col-md-8 col-sm-12" >
                <?php 
                
                //Open a new connection to the MySQL server
                $mysqli = new mysqli('localhost', 'foodappadmin', 'food', 'foodapp',3308);

                //Output any connection error
                if ($mysqli->connect_error) {
                    die('Error : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
                }

                $query = "SELECT * FROM dish";
                $result = mysqli_query($mysqli, $query) or die(mysqli_error());

                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        $d_id = $row["d_id"];
                        $name = $row["d_name"];
                        $type = $row["d_type"];
                        $rname = $row["r_name"];
                        ?>

                        <div class="card mt-3" style="background-color:#1E1E1E;text-align:center;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);text-transform:uppercase;">
                            <div class="card-body">
                                <form role="form">
                                    <h4 class="card-title" style="color:orangered"> <?php echo $name ?> </h4>
                                    <p class="card-text" style="color:grey">Prepared by - <?php echo $rname; ?> <br> <?php echo $type; ?> </p>  
                                    
                                </form>
                                
                            </div>
                        </div>

                        <?php
                    }
                } else {
                    echo "0 results";
                }

                ?>
                </div>
                <div class="col"></div>
            </div>
        </div>
    </main>
    <div class="mt-4">
    <?php 
    include 'footer.php' 
    ?>
            </div>
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


<?php
}} else {
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
        <meta content="utf-8" http-equiv="encoding">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
  <script src="vendor/jquery/jquery.min.js"></script>
  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">
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

</head>

<?php
  if (isset($_GET["logout"])) {
    
    if ($_GET["logout"] == "true") { 
        ?>
      
      <div class="alert alert-success">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>You have been logged out of the system.</strong>
      </div>   
    <?php
    }
  }
  ?>

<body>
          <!--? Preloader Start -->
          <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/logo.png" alt="">
                </div>
            </div>
        </div>
    </div>

    <div style="height:100px">
    <?php
    include 'header.php';
    ?>
</div>


<div class="adderr"></div>

    <main>
        <div class="container mt-4">
            <h2 style="color:orangered;text-align:center">Menu</h2>
            <p style="color:grey;text-align:center">Please login to order your favourite food</p>
            <div class="row" >
                <div class="col"></div>
                <div class="col-lg-8 col-md-8 col-sm-12" >
                <?php 
                
                //Open a new connection to the MySQL server
                $mysqli = new mysqli('localhost', 'foodappadmin', 'food', 'foodapp',3308);

                //Output any connection error
                if ($mysqli->connect_error) {
                    die('Error : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
                }

                $query = "SELECT * FROM dish";
                $result = mysqli_query($mysqli, $query) or die(mysqli_error());

                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        $d_id = $row["d_id"];
                        $name = $row["d_name"];
                        $type = $row["d_type"];
                        $rname = $row["r_name"];
                        ?>

                        <div class="card mt-3" style="background-color:#1E1E1E;text-align:center;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);text-transform:uppercase;">
                            <div class="card-body">
                                <form role="form">
                                    <h4 class="card-title" style="color:orangered"> <?php echo $name ?> </h4>
                                    <p class="card-text" style="color:grey">Prepared by - <?php echo $rname; ?> <br> <?php echo $type; ?> </p>  
                                    
                                </form>
                                
                            </div>
                        </div>

                        <?php
                    }
                } else {
                    echo "0 results";
                }

                ?>
                </div>
                <div class="col"></div>
            </div>
        </div>
    </main>
    <div class="mt-4">
    <?php 
    include 'footer.php' 
    ?>
            </div>
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