<?php
    include 'connectDB.php';

    echo 'Hello AddUser!';
    $username = $_POST['username'];
    $password = $_POST['password'];
    

    echo '<br>username: ' .$username;
    echo '<br>password: '. $password;

    $sql = "insert into users (userEmail,userPassword) values (?,?)";
        
    $statement = $con->prepare($sql);
    $statement->bind_param('ss',$username,$password);

    // i: integer, s:string, d:double, b:blob
    if($statement->execute()){
        print "Success!!" .  $con->insert_id;
        echo $statement->affected_rows;
    }else{
        die('Error : '. $con->error);
    }
    $statement->close();
    $con->close();

?>