<?php
    include 'connectDB.php'; 
    //3.Write SQL Statement
    $sql = "SELECT * FROM productcategories";

    //limit number of items "select * from products limit 3";
    //Manage pagination 
    //echo $sql;

    //4. Send sql to MySQl, get result back
    $result = $con->query($sql);

   
    //5. Count result
    $count_row = mysqli_num_rows($result);
    
    
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
    <!--<script src="js/script.js"></script>-->
    <link rel="stylesheet" href="css/style.css">

    <title>Add Product</title>
</head>

<body>
    <div class="container">

        <form class="row g-3 productForm" id="registration" method="POST" action="saveProduct.php" enctype="multipart/form-data">
            <h1 class="topic">Add Product</h1>
            <div class="col-md-12 mb-2">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="name" name="productName">
            </div>


            <div class="col-md-6">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" id="price" name="price">
            </div>

            <div class="col-md-12">
                <label for="inputAddress" class="form-label">Description</label>
                <textarea id="address" cols="30" rows="5" class="form-control" name="description"></textarea>

            </div>


            <div class="col-md-12 mb-3">
                <label for="province" class="form-label">Product Category</label>
                <select id="province" class="form-select" name="productCat">
                    <?php
                        if($count_row !=0){
                            while($rs = $result->fetch_assoc()){
                    ?>
                    <option value="<?php echo $rs['CategoryID']; ?>" selected><?php echo $rs['CategoryName']; ?>
                    </option>

                    <?php
                            }
                        }

                    ?>

                </select>
            </div>

            <div class="col-md-12 mb-3">
                <label for="formFile" class="form-label">Select Product Image</label>
                <input class="form-control" type="file" id="formFile" name="picfile">
            </div>


            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="reset" class="btn btn-danger">Cancel</button>
            </div>
            <p class="error mt-3" id="error"></p>
        </form>
    </div>






    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
    </script>



</body>

</html>