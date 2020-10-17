<header>
        <!--? Header Start -->
        <div class="header-area header-transparent">
                <div class="main-header  header-sticky">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-2 col-lg-2 col-md-1">
                                <div class="logo">
                                    <a href="index.php"><img src="assets/img/logo/logo.png" alt=""></a>
                                </div>
                            </div>
                            <div class="col-xl-10 col-lg-10 col-md-10">
                                <div class="menu-main d-flex align-items-center justify-content-end">
                                    <!-- Main-menu -->
                                    
                                    <div class="main-menu f-right d-none d-lg-block">
                                        <nav> 
                                            <ul id="navigation">
                                            <?php if (isset($_SESSION['login']))  { ?>

                                                <li><a href="#">Hi <?php echo $fname."! (".$role.")"; ?></a></li>
                                                <li><a href="logout.php">Logout</a></li>

                                                <?php if($role == 'restaurant') { ?>

                                                <li><a href="delicacies.php">Your Delicacies</a></li>
                                                <li><a href="rorders.php">Your Orders</a></li>

                                                <?php 
                                                } else if($role == 'customer') { ?>
                                                    <li><a href="corders.php">Your Orders</a></li>

                                                <?php
                                                }}
                                                 else { ?>

                                                <li><a href="LoginOrRegister.php">Login / Register</a></li>

                                                <?php }?>
                                                <li><a href="menu.php">View Menu</a></li>
                                                <li><a href="index.php">Home</a></li>
                                            </ul>
                                        </nav>
                                    </div>
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