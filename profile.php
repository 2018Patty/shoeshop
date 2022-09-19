<?php
    session_start();
    //1. Connect Database
    include 'connectDB.php';
    
    $username = $_SESSION['username'];
    //echo $username;
    
    
    //3.Write SQL Statement
    $sql = "select * from users where UserEmail = '".$username . "'";
    //echo $sql;

    //4. Send sql to MySQl, get result back
    $result = $con->query($sql);

    $firstName="";
    $lastName="";
    $tel="";
    $pic="";
    //5. Count result
    $count_row = mysqli_num_rows($result);

    //6.Work with data
    if($count_row !=0){
        while($rs = $result->fetch_assoc()){
            $firstName = $rs['UserFirstName'];
            $lastName=$rs['UserLastName'];
            $tel =$rs['UserPhone'];
            $pic=$rs['pic'];
        }

    }

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
    <link rel="stylesheet" href="css/style.css">
    <title>Profile</title>
</head>

<body>
    <?php include 'navbar-dark.php' ?>
    <div class="card" style="width: 18rem;">
        <img src="images/<?php echo $pic; ?>" class="card-img-top" alt="ProfilePic">
        <div class="card-body">
            <h5 class="card-title">Username: <?php echo $username; ?></h5>
            <p>Name: <?php echo $firstName. " ". $lastName; ?><br><?php echo $tel; ?></p>

            <a href="#" class="btn btn-primary">Edit</a>
            <a href="productCatalogPagination.php" class="btn btn-success">Go shopping</a>
        </div>
    </div>
    <?php include 'footer.html' ?>
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