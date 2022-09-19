<?php
    include 'connectDB.php'; 

    //(เงื่อนไข) ? (ค่าที่กำหนดให้เมื่อเงื่อนไขเป็นจริง) : (ค่าที่กำหนดให้เมื่อเงื่อนไขเป็นเท็จ);
    $name = (!empty($_POST['name'])) ? ($_POST['name']) : ("");
    $email = (!empty($_POST['email'])) ? ($_POST['email']) : ("");
    $password = (!empty($_POST['password'])) ? ($_POST['password']) : ("");
    $gender = (!empty($_POST['gender'])) ? ($_POST['gender']) : ("");
    $address = (!empty($_POST['address'])) ? ($_POST['address']) : ("");
    $province = (!empty($_POST['province'])) ? ($_POST['province']) : ("");

    $chanel_internet = (!empty($_POST['chanel_internet'])) ? ($_POST['chanel_internet']) : ("");
    $chanel_friend = (!empty($_POST['chanel_friend'])) ? ($_POST['chanel_friend']) : ("");
    $chanel_other = (!empty($_POST['chanel_other'])) ? ($_POST['chanel_other']) : ("");

    echo  "name: " . $name . "<br> ";
    echo  "email: " . $email . "<br> ";
    echo  "password: " . $password . "<br> ";
    echo  "gender: " . $gender ."<br> ";
    echo  "address: " . $address . "<br> ";
    echo  "province: " . $province . "<br> ";

    $sql = "insert into member (name,email,password,gender,address,province) values (?,?,?,?,?,?)";
        
    $statement = $con->prepare($sql);
    $statement->bind_param('ssssss',$name,$email, $password,$gender,$address,$province);

    // i: integer, s:string, d:double, b:blob
    if($statement->execute()){
        print "Success!!" .  $con->insert_id;
        echo $statement->affected_rows;
    }else{
        die('Error : '. $con->error);
    }
    $statement->close();
    $con->close();

    //ถ้าต้องการ เข้ารหัส password ให้ดูตัวอย่างที่นี่ https://code-boxx.com/password-encrypt-decrypt-php/
    
    
    



    