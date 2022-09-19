<?php
session_start();
include 'connectDB.php';

if(isset($_POST['pid'])){
    $pid = $_POST['pid'];
    //echo $pid;
    $qty = 1;
    if(isset($_SESSION['cart'])){
        //กรณีมีข้อมูลในตระกร้าแล้ว
        //print_r($_SESSION['cart']);
        if(!array_key_exists($pid, $_SESSION['cart'])){  // เมื่อไม่มีรหัสสินค้าในตระกร้า กำหนดให้จำนวนซื้อ เท่ากับ 1
            $_SESSION['cart'][$pid] = $qty;
            //echo "new pid";
        }else{
            $_SESSION['cart'][$pid]++; // เมื่อมีรหัสสินค้าในตระกร้า บวกเพิ่มจำนวน
            //echo "exist pid";
        }
        //echo "exist session";
    }else{
        //กรณี ยังไม่มีข้อมูลในตระกร้า สร้าง array ใหม่ขึ้นมา
        $_SESSION['cart'] = array($pid => $qty);
        //echo "new session";
    }
   
    
    //ทำอย่างไร ไม่ให้ตระกร้า ลบข้อมูลเดิมออกไป เพิ่มข้อมูลใหม่มา
    $totalQty = array_sum($_SESSION['cart']);
    $_SESSION['cart_qty']=  $totalQty;
    //echo $totalQty;

   

    
    
    print_r($_SESSION['cart']);
    print_r(array_keys($_SESSION['cart']));
    $cart_pid = implode(', ', array_keys($_SESSION['cart']));
    echo $cart_pid;

    $sql = "select * from products where productID in ({$cart_pid})";
    echo $sql;
    $result = $con->query($sql);

   
    //5. Count result
    $count_row = mysqli_num_rows($result);
    

    //นักศึกษาทำต่อจากนี้ ให้เอาข้อมูลในตระกร้าออกมาแสดง
}

//unset($_SESSION['cart']);
//print_r($_SESSION['cart']);
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
    <title>Your Cart</title>
    <script>
    function calSubtotoal(myTextBox) {
        var qty = document.getElementById(myTextBox);
        qty.addEventListener('keyup', function() {
            //alert(myTextBox);
            var sub_name = myTextBox + "_sub";
            var subtotal = document.getElementById(sub_name);
            var price_name = myTextBox + "_price";
            //alert(price_name);
            var price = document.getElementById(price_name);

            //alert(qty.value);
            //alert(price.value);
            var qty_number = parseFloat(qty.value);
            //alert("QTY : " + qty_number);
            var price_number = parseFloat(price.value.replace(/[^\d\.\-]/g, ""));
            //alert("Price : " + price_number);

            var result = qty_number * price_number;
            //alert("Result = " + result);

            var subtotal_result = result;
            //alert(subtotal_result); 
            subtotal.value = subtotal_result.toLocaleString();

            var row_name = myTextBox + "_row";
            var row = document.getElementById(row_name);
            if (qty_number == 0) {
                row.style.display = 'none';
            }

        });

    }
    document.addEventListener("DOMContentLoaded", function() {


    });
    </script>
</head>

<body>
    <div class="container">
        <h2 class="text-center heading2">ตระกร้าสินค้าของฉัน</h2>
        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <table class="table">
                    <thead>
                        <tr>
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
                            if($count_row !=0){
                        
                                while($rs = $result->fetch_assoc()){
                                  
                        ?>
                            <tr id="<?php echo 'pid_'.$rs['ProductID'] .'_row';?>">
                                <td scope="row"><img src="images/<?php echo $rs['picProduct'];?>" alt=""
                                        class="picCart">
                                </td>
                                <td><?php echo $rs['ProductName']; ?></td>
                                <td class="text-end">
                                    <input type="text" name="price[]" maxlength="8" size="8" style="text-align:right;"
                                        id="<?php echo 'pid_'.$rs['ProductID'] .'_price';?>"
                                        value="<?php  echo  number_format($rs['ProductPrice'],2); ?>" disabled>

                                </td>
                                <td class="text-end">

                                    <input type="text" name="qty[]" maxlength="2" size="2" style="text-align:right;"
                                        id="<?php echo "pid_".$rs["ProductID"];?>"
                                        value="<?php  echo $_SESSION['cart'][$rs['ProductID']]; ?>"
                                        onkeyup="calSubtotoal('<?php echo 'pid_'.$rs['ProductID']; ?>')">
                                </td>
                                <td class="text-end">
                                    <input type="text" name="subtotal[]" maxlength="8" size="8"
                                        style="text-align:right;" id="<?php echo "pid_".$rs["ProductID"]. "_sub";?>"
                                        value="<?php  echo number_format($_SESSION['cart'][$rs['ProductID']] * $rs['ProductPrice'],2); ?>"
                                        disabled>

                                </td>
                            </tr>
                            <?php 
                            }
                        }
                        ?>


                            <tr>

                                <td class="text-center" colspan="4">รวมทั้งสิ้น</td>
                                <td class="text-end"><?php echo number_format(1200,2); ?></td>
                            </tr>
                        </form>
                    </tbody>
                </table>
            </div>
        </div>
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