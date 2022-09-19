<nav class="navbar navbar-expand-lg navbar-light mt-3  mx-5 bg-dark">
    <div class="container">
        <i class="bi bi-brightness-alt-high logoIcon"></i <a class="logo nav-link" href="#">
        <span class="brand">MountainHigh</span></a>
        <div class="navbar-toggler navbar-responsive">
            <div class="login">
                <!-- <a class="nav-link" href=""><i class="bi bi-person-circle"
                                style="font-size: 1.25rem; color: white"></i></a> -->

            </div>
            <div class="hamburger">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
            </div>

            </button>

        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">


            <ul class="navbar-nav ms-auto mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="home.php">Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="productCatalogPagination.php">Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.php">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin.php">Admin</a>
                </li>




                <?php
                        if(isset($_SESSION['username'])){
                        ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <?php echo $_SESSION['username']; ?>
                    </a>
                    <ul class="dropdown-menu">
                        <?php
                                echo "<li><a class='dropdown-item' <a class=' nav-link' href='logout.php'>logout</a> </li></ul></li>";

                        }else{
                            echo "<li><a class='nav-link' href='login_form.php'>login</a></li>";
                        }

                        ?>




                        <li class="nav-item">
                            <a class="nav-link" href="cart2.php">

                                <i class="fas fa-shopping-cart" style="font-size:16px"></i>
                                <?php
                                     
                                     if(isset($_SESSION['cart'])){
                                        $totalItem = array_sum($_SESSION['cart']);
                                        //echo "total: ". $totalItem;
                                        echo "
                                        <span class='badge badge-warning' id='lblCartCount'>". $totalItem  ."</span>";
                                     }
                                    

                                ?>
                            </a>
                        </li>




                    </ul>
        </div>
    </div>


</nav>