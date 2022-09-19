<?php
    session_start();
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
    <link href="images/favicon.ico" rel="icon" type="image/x-icon" />
    <link rel="stylesheet" href="css/style.css">

    <title>MountainHigh: shoe shop</title>
</head>

<body>
    <?php include 'navbar.php' ?>
    <div class="hero">

        <div class="container hero2">
            <div class="row">
                <div class="p-5 rounded">
                    <h1>Problem Based Learning: E-Commerce Shop</h1>
                    <p class="lead">การเรียนรู้แบบมีส่วนร่วม Problem based Learning
                        เลือกปัญหาที่สอดคล้องกับโครงงานที่ทำงานมาเป็นกรณีศึกษา ค้นหาคำตอบร่วมกันทุกกลุ่ม
                        อาจารย์/นักศึกษาร่วมกันกำหนดโจทย์จากปัญหาของโครงงาน นักศึกษาแต่ละกลุ่ม
                        ช่วยกันไปหาวิธีการแก้ปัญหา นำเสนอแนวทางแก้ปัญหา
                        อาจารย์และนักศึกษาถอดบทเรียน ความรู้ที่ได้ร่วมกัน
                    </p>
                    <a class="btn btn-lg btn-primary" href="productCatalogPagination.php" role="button">View
                        Products</a>
                </div>
            </div>
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