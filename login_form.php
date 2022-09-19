<?php
    $error=0;
    if(isset($_GET["error"])){
      $error = $_GET["error"];
    }
   
    //echo $error;
    //$error=0;
    $error_message="";
    if($error == 1){
        //echo "error";
        $error_message="Please check username and password";
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Fjalla+One&family=Mitr:wght@200&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Login Page</title>
    <style>
    .error {
        margin-top: 10px;
        color: red;
    }
    </style>
</head>

<body>
    <?php include 'navbar-dark.php' ?>
    <div class="loginFrame">
        <h1 class="topic">Login Form</h1>
        <form method="POST" action="checkLogin.php">
            <div class="mb-2">
                <label for="username" class="form-label">username</label>
                <input type="text" name="username" class="form-control" />
            </div>

            <div class="mb-2">
                <label for=" password" class="form-label">password</label>
                <input type="password" name="password" class="form-control" />
            </div>



            <input type="submit" value="Login" class="btn btn-primary" />
            <input type="reset" value="Cancel" class="btn btn-danger" />
        </form>
        <p class=" error">
            <?php
              echo $error_message;
            ?>
        </p>
    </div>


    <?php include 'footer.html' ?>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
</body>

</html>