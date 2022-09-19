<?php
    session_start();
    if(isset($_SESSION['username'])){
        include 'connectDB.php';
    
    //$_SESSION['username'] = "lisa";
    
    $amount = $_SESSION['total'];
    $user = $_SESSION['username'];
    $shipname = $_POST['firstname'] . " " . $_POST['lastname'];
    $address1 =  $_POST['address1'];
    $address2 =  $_POST['address2'];
    $province = $_POST['province'];
    $city =  $_POST['city'];
    $zipcode = $_POST['zipcode'];
    $phone =  $_POST['phone'];
    
    echo "<br> User: ". $user;
    echo  "<br> Name: ". $shipname ;
    echo  "<br> Adress: ". $address1 ;
    echo  "<br> Amount: ". $amount ;
    $cart_pid = implode(', ', array_keys($_SESSION['cart']));
    echo $cart_pid;
    
    $sql = "select * from products where productID in ({$cart_pid})";
    
    $result = $con->query($sql);
                                     
                                        
    //Count result
    $count_row = mysqli_num_rows($result);
    echo "<br> total product in cart =" . $count_row;
    
    if($count_row !=0){
        $sum = 0;
        $totalProduct=0;
        $i=1;
        $order_id="";

        //insert into order

        //$currentdate = date('m/d/Y h:i:s a', time());
        
        

        // $sql2 = "insert into orders (OrderUserID,OrderAmount,OrderShipName,OrderShipAddress,OrderShipAddress2,OrderCity,OrderState,OrderZip,OrderPhone,OrderDate) values ( '". $user ."',". $amount. ",'".  $shipname. "','". $address1. "','". $address2."','". $city ."','". $province. "','". $zipcode ."','". $phone. "',now())";

        // echo $sql2 . "<br>";

        // $result2 = $con->query($sql2);

        // Bind Param

        $sql = "insert into orders (OrderUserID,OrderAmount,OrderShipName,OrderShipAddress,OrderShipAddress2,OrderCity,OrderState,OrderZip,OrderPhone,OrderDate) values (?,?,?,?,?,?,?,?,?,now())";
        
        $statement = $con->prepare($sql);
        $statement->bind_param('sdsssssss',$user,$amount, $shipname,$address1,$address2,$city,$province,$zipcode,$phone);

        if($statement->bind_param('sdsssssss',$user,$amount, $shipname,$address1,$address2,$city,$province,$zipcode,$phone)){
            echo "Binding paramaters failed:(" . $statement->errno . ")" . $statement->error;
            
        }

        // i: integer, s:string, d:double, b:blob
        if($statement->execute()){
             $order_id = $con->insert_id;
             echo "Success!!" .  $order_id;
             
             echo $statement->affected_rows;
        }else{
            echo "Error";
            die('Error : '. $con->error);
        }
    
        $sqlOrderid = "select max(orderid) as orderid from orders";
        echo "<br>". $sqlOrderid;
        $resultOrderid = $con->query($sqlOrderid);
        $rsOrderid = $resultOrderid->fetch_assoc();
        
        while($rs = $result->fetch_assoc()){
            
            echo "<br>hello save order detail <br>";
            
            $pid = $rs['ProductID'];
            $price = $rs['ProductPrice'];
            $qty=  $_SESSION['cart'][$rs['ProductID']];
            $order_id = $rsOrderid['orderid'];
            
            echo "order id: ". $order_id;
            echo "<br>pid: ". $pid;
            echo "<br>price : ". $price;
            echo "<br>qty: ". $qty;
            
            $sql = "insert into orderdetails (DetailOrderID,DetailProductID,DetailPrice,DetailQuantity) values (?,?,?,?)";

            // $sql3 = "insert into orderdetails (DetailOrderID,DetailProductID,DetailPrice,DetailQuantity) values (". $order_id. ",".$pid .",". $price.",". $qty.")";

            // echo $sql3 . "<br>";

            // $result3 = $con->query($sql3);
        
            
            $statement = $con->prepare($sql);
            $statement->bind_param('ssdd',$order_id,$pid, $price,$qty);

            // i: integer, s:string, d:double, b:blob
            if($statement->execute()){
                print "Success!!" .  $con->insert_id;
                echo $statement->affected_rows;
            }else{
                echo "error";
                die('Error : '. $con->error);
            }
    
        }
    }

        $statement->close();
        $con->close();

        unset($_SESSION['cart']);
        
        
        // header('Location:thankyou.php');
        header('Location:home.php');
    }else{
        header('Location:login_form.php');
    }
    

?>