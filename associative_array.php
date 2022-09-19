<?php
    $customer;
    for($i=1; $i<3; $i++){
        $customer[$i] = $i;
    }

    print_r($customer);
    $customer_id = implode(",", $customer);

    print_r($customer_id);
    

?>