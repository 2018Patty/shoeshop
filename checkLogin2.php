<?php
    //1. Connect Database
    include 'connectDB.php';

    //2.Read data from Form
    echo 'Hello CheckLogin!';
    $username = $_POST['username'];
    $password = $_POST['password'];
    

    // echo '<br>username: ' .$username;
    // echo '<br>password: '. $password;

    /*
    SELECT * 
    FROM users
    where UserEmail = 'somchai' and UserPassword='123'
    */


    //3.Write SQL Statement
    $sql = "select UserID,UserEmail from users where UserEmail = ? and UserPassword = ?";

    $statement = $con->prepare($sql);
    $statement->bind_param('ss',$username,$password);
     // i: integer, s:string, d:double, b:blob
    
    $statement->execute();

    $statement->store_result();//Transfers a result set from a prepared statement
    $count=$statement->num_rows;     
 
     //Iterate over results
    $statement->bind_result($UserID, $UserEmail);
     
    echo $count;
    if ($count != 0){
         while ($statement->fetch()) {
             echo '<br>User ID: '. $UserID . ', Username: ' . $UserEmail . '<br>';
         }
     }else{
        echo "Please check username and password";
     }
     


    $con->close();

?>