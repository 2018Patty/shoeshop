<?php
    $product = array();

    $product[0] = "1";
    $product[1] = "2";
    $product[2] = "3";

    print_r($product);

    $customer = array();
    $customer['id'] = "111";
    $customer['name'] ="Peter";

    print_r($customer);

    for($i=0; $i<count($product); $i++){
        echo "<br>". $product[$i];
    }

    foreach($product as $p){
        echo "<br>". $p;
    }

    foreach($customer as $key => $value){
        echo "<br>" .$key. " : " . $value;
    }

    $pid = 12;
    $qty = 1;
    $cart = array($pid => $qty);

    $pid = 13;
    $qty = 1;
    $cart[$pid] = $qty;

    $pid = 13;
    $qty++;
    $cart[$pid] = $qty;

    echo $qty;
    if (array_key_exists(15,$cart)){
        echo "Found";
    }else{
        echo "Not Found";
    }

    print_r($cart);
?>