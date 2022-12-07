<?php
        require("../controllers/cart_controller.php");
        
        session_start();

        $curl = curl_init();
        // $data = "T032500960937628";
        $data = $_GET["reference"];
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.paystack.co/transaction/verify/' . $data,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer sk_live_497a3a223893acf3ff8ecfd4dce1158b2fc9b088",
                "Cache-Control: no-cache",
            ),
        ));

        
        $response = json_decode(curl_exec($curl), true);
        $err = curl_error($curl);
       
        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {

            $cid = $_SESSION['customer_id'];
            $date = new DateTime();
            $date = $date->format(("Y-m-d"));

            $invoice = mt_rand();
            $oid = insert_order_ctrl($cid, $invoice, $date);

            

            $amt = $response['data']['amount'];
            $paid = insert_payment_ctrl($amt, $cid, $oid, $date);

            if($paid){
                $cartList = select_cart_ctrl($cid);
                
                foreach($cartList as $cart){
                    $inserted = insert_order_details_ctrl($oid, $cart['product_id'], $cart['qty'],  $cart['inscription']);
                    if($inserted){
                        $deleted = delete_from_cart($cid, $cart['product_id']);
                        if($deleted){
                            echo "1";
                        }else{
                            echo "2";
                        }
                    }
                }


            }else{
                echo 2;
            }
        }

        // $cid = $_SESSION['customer_id'];


        // $email = $_POST['email'];
        // $amount = $_POST['amount'];


        // $url = "https://api.paystack.co/transaction/initialize";
        // $fields = [
        //   'email' => $email,
        //   'amount' => $amount

        // ];
        // $fields_string = http_build_query($fields);
        // //open connection
        // $ch = curl_init();

        // //set the url, number of POST vars, POST data
        // curl_setopt($ch,CURLOPT_URL, $url);
        // curl_setopt($ch,CURLOPT_POST, true);
        // curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        //   "Authorization: Bearer sk_test_6f41db942637c6206312550830bdc89659901b89",
        //   "Cache-Control: no-cache",
        // ));

        // //So that curl_exec returns the contents of the cURL; rather than echoing it
        // curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 

        // //execute post
        // $result = curl_exec($ch);

        // /*                      ORDER                   */
        // $invoice = mt_rand();
        // $date = date("Y-m-d");

        // $order_entry = insert_order_ctrl($cid, $invoice, $date);


        // if ($order_entry) {
        //     echo "order entry successful";    
        // }
        // else{
        //     echo "order entry failed";
        // }

        // /*          PAYMENT      */
        // $oid = order_id_ctrl();
        // $ooid=$oid["order_id"];
        // $odate = order_date_ctrl();
        // $oodate = $odate["order_date"];
        // $order_id = $oid['order_id'];
        // $order_date = $odate['order_date'];

        // $payment_entry = insert_payment_ctrl($amount, $cid, $order_id, $order_date);

        // if ($payment_entry) {
        //     echo "payment entry successful";    
        // }
        // else{
        //     echo "payment entry failed";
        // }


        // /* MOVE FROM CART */
        // $cart_id = get_from_cart_ctrl($cid);
        // //print_r($cart_id);
        // $pid = $cart_id['p_id'];

        // $qty = $cart_id['qty'];


        // $insert_orderdetails = insert_order_details_ctrl($ooid, $pid, $qty);

        // if ($insert_orderdetails) {
        //     echo "order detail moved successful";    
        // }
        // else{
        //     echo "order detail move failed";
        // }

        // $delete_cart_item = delete_from_cart($cid, $pid);

        // if ($delete_cart_item) {
        //     echo "cart item deleted successful";    
        // }
        // else{
        //     echo "cart item delete failed";
        // }

        ?> 