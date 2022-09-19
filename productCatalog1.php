<?php
    session_start();
    //1. Connect Database
    include 'connectDB.php';
    
    //3.Write SQL Statement
    $sql = "select * from products";

    //limit number of items "select * from products limit 3";
    //Manage pagination 
    //echo $sql;

    //4. Send sql to MySQl, get result back
    $result = $con->query($sql);

   
    //5. Count result
    $count_row = mysqli_num_rows($result);
    echo $count_row;

    $con->close();
?>
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
    <title>Product Catalog</title>
</head>

<body>
    <div class="container">
        <h1 class="headingCenter text-center">Product Catalog</h1>
        <div class="row g-3">

            <?php
                    //6.Work with data
                    if($count_row !=0){
                        while($rs = $result->fetch_assoc()){
                            echo "
                            <div class='col-md-4'>
                                <div class='card shadow-sm'>
                                    <img src='images/".$rs['picProduct'] ."' class='card-img-top productThumnail' alt='...'>
                                    <div class='card-body'>
                                        
                                        <div class='d-flex justify-content-between'>
                                            <h5 class='card-title'>Product Name: ". $rs['ProductName']. "</h5>
                                            <h5 class='card-title'>Price:  ". $rs['ProductPrice']. "</h5>
                                        </div>
                                        <p class='card-text'>". $rs['ProductShortDesc'] . "</p>
                                        
                                        <div class='d-flex justify-content-between'>
                                            <a href='productDetail.php?pid=".$rs['ProductID']."' class='btn btn-outline-secondary'>Product Detail</a>
                                            <a href='#' class='btn btn-outline-secondary'><i class='fas fa-shopping-cart'></i></a>
                                        </div>
   
                                    </div>
                                </div>
                            </div>";
                        }

                    }

                ?>



        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>



    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
</body>

</html>