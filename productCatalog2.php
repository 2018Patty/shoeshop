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

    
    if(isset($_GET['n'])){
        $n = $_GET['n'];
    }else{
        $n=1;
    }
    
    $itemsPerPage = 9;
    $numPages = ceil($count_row/$itemsPerPage);
    
    $start =($n - 1) * $itemsPerPage;

    // echo "<br>Total data: ". $count_row;
    // echo "<br>Page no. " . $n;
    // echo "<br>Start ". $start;
    // echo "<br>Number of pages: ". $numPages;

    /*
    select_list
    FROM 
        table_name
    ORDER BY 
        sort_expression
    LIMIT offset, row_count;
    ex. select * from products limit 12, 3
    หมายความว่า ให้แสดงข้อมูลสินค้า ลำดับที่ 13 โดยแสดง 3 records
    */
    
    $sql2 = "select * from products limit {$start},  {$itemsPerPage}";
    //echo $sql2;
    $result2 = $con->query($sql2);
    //echo $count_row;

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
                        
                        while($rs = $result2->fetch_assoc()){
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
                                            <a href='#' class='btn btn-outline-secondary'><i class='fas fa-shopping-cart bigIcon'></i></a>
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
                <?php 
                    if ($n>1){
                        echo 
                        "<li class='page-item'>
                            <a class='page-link' href='productCatalog2.php?n=". ($n-1) ."'>Previous</a>
                        </li>";
                    }else{
                        echo 
                        "<li class='page-item'>
                            <a class='page-link' href='productCatalog2.php?n=1'>Previous</a>
                        </li>";
                    } 
                    $i=1;
                    while($i<=$numPages){ 
                    echo 
                        "<li class='page-item'>
                            <a class='page-link' href='productCatalog2.php?n=".$i."'>". $i. "</a>
                        </li>";  
                        $i++;
                    } 
                    if ($n<$numPages){   
                        echo 
                            "<li class='page-item'>
                                <a class='page-link' href='productCatalog2.php?n=".  ($n+1) ."'>Next</a>
                            </li>";
                    }else{
                        echo
                            "<li class='page-item'>
                                <a class='page-link' href='productCatalog2.php?n=".$numPages  ."'>Next</a>
                            </li>";
                    
                    }
                ?>
            </ul>




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