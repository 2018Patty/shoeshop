<?php
    session_start();
    if(isset($_SESSION['username'])){
        

        unset($_SESSION['cart']);
        
        unset($_SESSION['username']);
        header('Location: home.php');
    }
    

?>