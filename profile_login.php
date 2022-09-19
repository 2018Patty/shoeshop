<?php
  session_start();
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
    <!--<script src="js/script.js"></script>-->
    <link rel="stylesheet" href="css/style.css">
    <title>Submitting a form through GET and POST method</title>
  </head>
  <body>
    <?php
        //$username = $_GET['username']; อ่านค่าที่ส่งผ่าน URL
        $username="";
        //echo $_SESSION['username'];
        //ตรวจสอบค่าของตัวแปร ว่าถูกกำหนดมาแล้วหรือยัง 
        if(isset($_SESSION['username'])){
          $username = $_SESSION['username'];
          echo $username;
        }
        
    ?>
    <h1 class="topic">Getting Data from Form</h1>
    <div class="card" style="width: 18rem;">
        <img src="images/lisa.jpg" class="img-fluid" alt="ImageProfile">
        <div class="card-body">
            <h5 class="card-title">Username: <?php echo $username; ?> </h5>
            <p class="card-text">Lalisa Manoban (Thai: ลลิษา มโนบาล; born Pranpriya Manoban (Thai: ปราณปรียา มโนบาล) on March 27, 1997), better known by the mononym Lisa (Hangul: 리사), is a Thai rapper, singer and dancer based in South Korea. She is a member of the South Korean girl group Blackpink under YG Entertainment</p>
            <a href="#" class="btn btn-primary">Edit Profile</a>
        </div>
    </div>
    
    <!-- Optional JavaScript; choose one of the two! -->
  
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.3/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.3/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>