<?php

    session_start();
    if(isset($_SESSION['username']) & $_SESSION['username'] =='admin'){
        include 'connectDB.php';
    
    //3.Write SQL Statement
    $sql = "select * from products p, productcategories c where p.ProductCategoryID = c.CategoryID";

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
    
    $itemsPerPage = 10;
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
    
    $sql2 = "select * from products p, productcategories c where p.ProductCategoryID = c.CategoryID limit {$start},  {$itemsPerPage}";
    //echo $sql2;
    $result2 = $con->query($sql2);
    //echo $count_row;
    
    
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Fjalla+One&family=Mitr:wght@200&display=swap"
        rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!--<script src="js/script.js"></script>-->
    <link rel="stylesheet" href="css/style.css">

    <title>Admin Page</title>
    <script>
    $(document).ready(function() {
        $("#product").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#productTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
    </script>
</head>

<body>
    <?php include 'navbar-dark.php' ?>
    <div class="container mt-3">

        <h1 class="text-center">Admin Page</h1>
        <form class="row g-3 d-flex justify-content-center mt-5">
            <div class="col-auto">

                <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="Product Search :">
            </div>
            <div class="col-auto">
                <label for="inputPassword2" class="visually-hidden">Password</label>
                <input type="text" class="form-control" id="product" placeholder="Product Keyword">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">Search</button>
            </div>
        </form>
        <div class="row mb-3">
            <div class="col-md-6">
                <a class="btn btn-success" href="addProduct.php" role="button">Add Product</a>
            </div>
        </div>
        <div class="row">
            <table class="table table-bordered" id="productTable">
                <thead>
                    <tr>
                        <th scope="col">ProductID</th>
                        <th scope="col">ProductName</th>
                        <th scope="col">ProductPrice</th>
                        <th scope="col">ProductShortDesc</th>
                        <th scope="col">picProduct</th>
                        <th scope="col">CategoryName</th>
                        <th scope="col">Update</th>
                        <th scope="col">Del</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if($count_row !=0){
                            while($rs = $result2->fetch_assoc()){
                    ?>

                    <tr>
                        <td scope="col"><?php echo $rs['ProductID']; ?></td>
                        <td scope="col"><?php echo $rs['ProductName']; ?></td>
                        <td scope="col"><?php echo $rs['ProductPrice']; ?></td>
                        <td scope="col"><?php echo $rs['ProductShortDesc']; ?></td>
                        <td scope="col"><img src="images/<?php echo $rs['picProduct']; ?>" class="picCart" alt="">
                        </td>
                        <td scope=" col"><?php echo $rs['CategoryName']; ?></td>
                        <td scope="col"><a class="btn btn-primary"
                                href="updateProduct.php?pid=<?php echo $rs['ProductID']; ?>" role="button">Update</a>
                        </td>
                        <td scope="col"><a class="btn btn-danger"
                                href="deleteProduct.php?pid=<?php echo $rs['ProductID']; ?>" role="button"
                                onclick="return confirm('Are you sure you want to delete this item?');">Del</a></td>
                    </tr>

                    <?php
                            }
                        }
                    ?>

                </tbody>
            </table>
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination d-flex justify-content-end">
                <?php 
                    if ($n>1){
                        echo 
                        "<li class='page-item'>
                            <a class='page-link' href='admin.php?n=". ($n-1) ."'>Previous</a>
                        </li>";
                    }else{
                        echo 
                        "<li class='page-item'>
                            <a class='page-link' href='admin.php?n=1'>Previous</a>
                        </li>";
                    } 
                    $i=1;
                    while($i<=$numPages){ 
                    echo 
                        "<li class='page-item'>
                            <a class='page-link' href='admin.php?n=".$i."'>". $i. "</a>
                        </li>";  
                        $i++;
                    } 
                    if ($n<$numPages){   
                        echo 
                            "<li class='page-item'>
                                <a class='page-link' href='admin.php?n=".  ($n+1) ."'>Next</a>
                            </li>";
                    }else{
                        echo
                            "<li class='page-item'>
                                <a class='page-link' href='admin.php?n=".$numPages  ."'>Next</a>
                            </li>";
                    
                    }
                ?>
            </ul>
        </nav>
    </div>
    <?php
}else{
    header('Location:login_form.php');
}
?>



    <?php include 'footer.html' ?>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
    </script>



</body>

</html>