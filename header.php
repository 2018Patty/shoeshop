<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Fjalla+One&family=Mitr:wght@200&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

    <title>MountainHigh: shoe shop</title>
</head>

<body>
    <div class="hero">
        <nav class="navbar navbar-expand-lg navbar-light mt-3  fixed-top mx-5">
            <div class="container">
                <i class="bi bi-brightness-alt-high logoIcon"></i>
                <a class="logo nav-link" href="#">
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
                            <a class="nav-link active" aria-current="page" href="#">Home
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
                 
                      
                        <li class="nav-item">
                            <?php
                                 if(isset($_SESSION['username'])){
                                        echo "<a class='nav-link' href='logout.php'>logout</a>";
                                        
                                 }else{
                                    echo "<a class='nav-link' href='login_form.php'>login</a>";
                                 }

                            ?>
                        </li>



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