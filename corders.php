<?php
session_start();

if (isset($_SESSION['login'])) {
    $id = $_SESSION['login'];
    $fname = $_SESSION['fname'];
    $role = $_SESSION['role'];
    if($role == 'customer') {
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta content="utf-8" http-equiv="encoding">
        <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap core CSS -->
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

    <!--table_-->
    

<?php 
mysqli_report(MYSQLI_REPORT_STRICT);
    //Open a new connection to the MySQL server
    $mysqli = new mysqli('localhost', 'foodappadmin', 'food', 'foodapp',3308);

    //Output any connection error
    if ($mysqli->connect_error) {
        die('Error : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    }

    $query = "SELECT * FROM orders WHERE c_id=$id";
    $result = mysqli_query($mysqli, $query) or die(mysqli_error());
    echo "
    <div class='mb-5 mt-5' style='text-align:center'><strong> <h3 style='color:orangered'>Your Orders </h3></strong></div>
    <div class=' container mt-5' style='text-align: center;'>
    <table class='table table-dark table-striped' width='100%' style='border:0'>
    <thead class='thead-dark'>
        <tr>
        <th>Order No</th>
        <th>Dish Name</th>
        <th>Restaurant</th>
        </tr>
    </thead>
    " ;
    if ($result->num_rows > 0) {

        // output data of each row
        while($row = $result->fetch_assoc()) {
        
            $SN = $row['o_id'];
            $actitle = $row['d_name']; 
            $type = $row['r_name']; ?>

            <tr>
                <td><?php echo $SN ?></td>
                <td><?php echo $actitle  ?></td>
                <td><?php echo $type ?> </td>
            </tr>
            <?php
        }
    }
    echo "</table>";
?>

    

    </div>
    <!--table_-->
    </main>
    
<div class="mt-5">
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
<?php }
else {
    header("Location: index.php");
    }
}
else {
header("Location: index.php");
}
?>