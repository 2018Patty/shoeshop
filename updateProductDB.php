<?php
    include 'connectDB.php'; 

    $productID = $_POST['productID'];
    $productName = $_POST['productName'];
    $price =  $_POST['price'];
    $desc = $_POST['description'];
    $pic = $_FILES["picfile"]["name"];
    $productcat = $_POST['productCat'];

    echo "<br> product ID: ". $productID;
    echo "<br> product Name: ". $productName;
    echo "<br> product Price: ".  $price;
    echo "<br> product Desc: ".  $desc;
    echo "<br> product picture: ".  $pic;
    echo "<br> product Category: ".  $productcat ;


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

    $sql2 = "update products set 
    ProductName = '{$productName}',
    ProductPrice = {$price},
    ProductShortDesc = '{$desc}',
    picProduct = '{$pic}',
    ProductCategoryID = {$productcat} 
    where ProductID = {$productID}";

    echo $sql2 . "<br>";


    $resultUpdate= $con->query($sql2);
    
    // $statement->close();
    $con->close();

    //upload file
    // echo $_FILES["picfile"]["name"];
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["picfile"]["name"]);
    //echo $target_file.  "<br>";
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    
    $check = getimagesize($_FILES["picfile"]["tmp_name"]);
    
    print $check;
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["picfile"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
    if (move_uploaded_file($_FILES["picfile"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["picfile"]["name"])). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
    }

    header('Location:admin.php');

    //?????????????????????????????? ???????????????????????? password ????????????????????????????????????????????????????????? https://code-boxx.com/password-encrypt-decrypt-php/
    
    
    



    