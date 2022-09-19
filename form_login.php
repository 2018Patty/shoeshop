<?php
  $error_message="";
  $username="";
    if(isset($_GET['error'])){
      $error = $_GET['error'];
      
      if ($error == 1 ){
        $error_message = "Please check username and password";
      }
    }else{
      if (isset($_COOKIE['username'])){
          $username = $_COOKIE['username'];
      }
      
    }
    
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Fjalla+One&family=Mitr:wght@200&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="css/style.css">

    <title>Submitting a form through GET and POST method</title>
  </head>
  <body>
    <h1 class="topic">Login Form</h1>
    <div class="loginFrame">
    
      <form method="post" action="checkLogin.php">
        <div class="mb-3">
          <label for="username">Username</label>
          <input type="text" class="form-control" id="username" name="username" aria-describedby="userHelp" value="<?php echo $username; ?>">
          
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="password" name="password">
        </div>

        
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="reset" class="btn btn-danger">Cancel</button>
      </form>
    </div>

    <p class="errorLogin"><?php echo $error_message; ?></p>
    
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
  </body>
</html>