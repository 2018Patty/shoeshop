<?php
    session_start();
    //echo "Hello updateSession";

    $pid = $_GET['pid'];
    $qty = $_GET['qty'];

    //echo "PID = ". $pid;
    //echo "<br> QTY = ". $qty;

    $_SESSION['cart'][$pid] = $qty;
    
    header('Location:cart2.php');

?>