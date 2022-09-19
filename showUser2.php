<?php
    include 'connectDB.php';

    echo 'Hello Select User!<br>';
    //$username = $_POST['username'];
    $username="somchai";
    

    //echo '<br>username: ' .$username;


    $sql = "select UserID,UserEmail from users where UserEmail='".$username ."'";
        
    $result = $con->query($sql);
    $count = mysqli_num_rows($result);
    if($count != 0){
        while($rs = $result->fetch_assoc()){
                
            echo "<br>User ID: " . $rs["UserID"] ;
            echo "<br>User Name: " . $rs["UserEmail"] ;
           
        }
    }
   
   
    $con->close();

?>