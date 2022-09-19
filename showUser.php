<?php
    include 'connectDB.php';

    echo 'Hello Select User!<br>';
    //$username = $_POST['username'];
    $username="somchai";
    

    //echo '<br>username: ' .$username;


    $sql = "select UserID,UserEmail from users where UserEmail=?";
        
    $statement = $con->prepare($sql);
    $statement->bind_param('s',$username);
    $statement->execute();

    $statement->store_result();//Transfers a result set from a prepared statement
    $count=$statement->num_rows;     

    //Iterate over results
    $statement->bind_result($UserID, $UserEmail);
    
    echo $count;
    if ($count != 0){
        while ($statement->fetch()) {
            echo 'User ID: '. $UserID . ', Username: ' . $UserEmail . '<br>';
        }
    }
    


    // i: integer, s:string, d:double, b:blob
   
    $statement->close();
    $con->close();

?>