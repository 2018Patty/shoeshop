<?php
    include 'connectDB.php'; 

    $productID = $_GET['pid'];
    

    echo "<br> product ID: ". $productID;



    // $sql = "update products set 
    //         ProductName = ?,
    //         ProductPrice = ?,
    //         ProductShortDesc = ?,
    //         picProduct = ?,
    //         ProductCategoryID =? 
    //         where ProdudctID = ?";

           
        
    // $statement = $con->prepare($sql);
    // $statement->bind_param('sdssii', $productName,$price,$desc,$pic,$productcat,$productID);

    // // i: integer, s:string, d:double, b:blob
    // if($statement->execute()){
    //     print "Success!!" .  $con->insert_id;
    //     echo $statement->affected_rows;
    // }else{
    //     die('Error : '. $con->error);
    // }

     //delete from products where productID = ?

    $sql2 = "delete from products where ProductID = {$productID}";

    echo $sql2;


    $resultUpdate= $con->query($sql2);
    
    // $statement->close();
    $con->close();

    header('Location:admin.php');

    //ถ้าต้องการ เข้ารหัส password ให้ดูตัวอย่างที่นี่ https://code-boxx.com/password-encrypt-decrypt-php/
    
    
    



    