<?php
    session_start();
    include 'connectDB.php';
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Fjalla+One&family=Mitr:wght@200&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Checkout</title>
</head>

<body>
    <?php include 'navbar-dark.php' ?>
    <div class="container">

        <h1 class="headingCenter text-center">Checkout</h1>

        <div class="row g-3">
            <div class="col-md-6">





                <div class="card">
                    <div class="card-header">
                        Shipping Address
                    </div>
                    <div class="card-body">
                        <form class="row g-3" action="save.php" method="POST">
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="firstname" name="firstname">
                            </div>
                            <div class="col-md-6">
                                <label for="inputPassword4" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="lastname" name="lastname">
                            </div>
                            <div class="col-12">
                                <label for="inputAddress" class="form-label">Address</label>
                                <input type="text" class="form-control" id="inputAddress" placeholder=""
                                    name="address1">
                            </div>
                            <div class="col-12">
                                <label for="inputAddress2" class="form-label">Address 2</label>
                                <input type="text" class="form-control" id="inputAddress2" placeholder=""
                                    name="address2">
                            </div>
                            <div class="col-md-6">
                                <label for="inputCity" class="form-label">City</label>
                                <input type="text" class="form-control" id="inputCity" name="city">
                            </div>
                            <div class="col-md-4">
                                <label for="inputState" class="form-label">Province</label>
                                <select id="inputState" class="form-select" name="province">
                                    <option selected>Surat Thani</option>
                                    <option>Bangkok</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="inputZip" class="form-label">Zip</label>
                                <input type="text" class="form-control" id="inputZip" name="zipcode">
                            </div>
                            <div class="col-12">

                                <label for="inputPhone" class="form-label">Tel</label>
                                <input type="text" class="form-control" id="inputPone" name="phone">
                            </div>

                    </div>
                </div>



            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Summary
                    </div>
                    <div class="card-body summary">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ลำดับ</th>
                                    <th scope="col">สินค้า</th>
                                    <th scope="col">ชื่อสินค้า</th>
                                    <th scope="col" class="text-end">ราคาต่อหน่วย</th>
                                    <th scope="col" class="text-end">จำนวน</th>
                                    <th scope="col" class="text-end">ราคารวม</th>
                                </tr>
                            </thead>
                            <tbody>
                                <form>
                                    <?php
                                         $cart_pid = implode(', ', array_keys($_SESSION['cart']));
                                         //echo $cart_pid;
                                     
                                         $sql = "select * from products where productID in ({$cart_pid})";
                                         //echo $sql;
                                         $result = $con->query($sql);
                                     
                                        
                                         //5. Count result
                                         $count_row = mysqli_num_rows($result);
                                         if($count_row !=0){
                                            $sum = 0;
                                            $totalProduct=0;
                                            $i=1;
                                    
                                            while($rs = $result->fetch_assoc()){
                                  
                                    ?>
                                    <tr>
                                        <td class="">
                                            <?php 
                                                    echo $i;
                                            ?>
                                        </td>
                                        <td scope="row">
                                            <img src="images/<?php echo $rs['picProduct'];?>" alt="" class="picCart">

                                        </td>
                                        <td><?php echo $rs['ProductName']; ?></td>
                                        <td class="text-end"><?php echo number_format($rs['ProductPrice'],2);?></td>
                                        <td class="text-end"><?php  echo $_SESSION['cart'][$rs['ProductID']]; ?></td>
                                        <td class="text-end">
                                            <?php  echo number_format($_SESSION['cart'][$rs['ProductID']] * $rs['ProductPrice'],2); ?>
                                        </td>
                                    </tr>

                                    <?php 
                                    $sum += $_SESSION['cart'][$rs['ProductID']] * $rs['ProductPrice'];
                                    $totalProduct +=  $_SESSION['cart'][$rs['ProductID']];
                                    $i++;
                                    $_SESSION['total'] = $sum;
                                
                            }
                        }
                        ?>


                                    <tr>

                                        <td class="text-center" colspan="5"><strong>รวมทั้งสิ้น</strong></td>
                                        <td class="text-end"><?php echo number_format($sum,2); ?></td>
                                    </tr>
                                    <tr>

                                        <td class="text-end" colspan="6">
                                            <a class="btn btn-primary" href="cart2.php" role="button">Update
                                                Shopping</a>

                                            <button type="submit" class="btn btn-primary">Confirm Order</button>




                                        </td>

                                    </tr>
                                </form>
                            </tbody>
                        </table>
                    </div>
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