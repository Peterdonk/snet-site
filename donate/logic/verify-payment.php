<?php

require_once '../db/db.php';


//! Get and Process UUID Of User from Session
    
    $get_main_transaction_reference = mysqli_real_escape_string($mainDbString, $_POST['ref']);

    $response = array();
    
    // CHECK WHETHER REFERENCE ID ALREADY EXISTS IN THE DATABASE

    $check_reference_exists = mysqli_query($mainDbString,"SELECT * FROM payment_tbl WHERE tranx_reference = '{$get_main_transaction_reference}' LIMIT 1")or die(mysqli_error($mainDbString));
    
    if(mysqli_num_rows($check_reference_exists) > 0){
    echo 'used';
    return;
    }else{ 
   
  $curl = curl_init();
  
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.paystack.co/transaction/verify/".$get_main_transaction_reference,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "Authorization: Bearer sk_test_63e4c4c85d46cb9e64c90c7f56db10284110b850",
      "Cache-Control: no-cache",
    ),
  ));
  
  $response = curl_exec($curl);
  $err = curl_error($curl);
  curl_close($curl);

  if ($err) {
      //! Transaction Failed Woefully 
    echo "cURL Error #:" . $err;
  } else {
      //!  Transaction Completed Successfully
    $transaction_response = json_decode($response);

if(!$transaction_response->status){
  // there was an error from the API
  echo 'error';
  return;
  die('API returned error: ' . $transaction_response->message);

}

if('success' === $transaction_response->data->status){
  $phone = $_COOKIE['u_n'];
    $status = $transaction_response->data->status;
    $id     = $transaction_response->data->id;
    $domain = $transaction_response->data->domain;
    $reference = $transaction_response->data->reference;
    $amount = $transaction_response->data->amount;
    $message = $transaction_response->data->message;
    $gateway_response = $transaction_response->data->gateway_response;
    $paid_at = $transaction_response->data->paid_at;
    $created_at = $transaction_response->data->created_at;
    $channel = $transaction_response->data->channel;
    $currency = $transaction_response->data->currency;
    $ip_address = $transaction_response->data->ip_address;
    
    $authorization_code = $transaction_response->data->authorization->authorization_code;
    $card_type = $transaction_response->data->authorization->card_type;
    $bank = $transaction_response->data->authorization->bank;
    $country_code = $transaction_response->data->authorization->country_code;
    $brand = $transaction_response->data->authorization->brand;
    $signature = $transaction_response->data->authorization->signature;
    $account_name = $transaction_response->data->authorization->account_name;

    $customer_id = $transaction_response->data->customer->id;
    $customer_email = $transaction_response->data->customer->email;
    $customer_code = $transaction_response->data->customer->customer_code;
    $customer_phone = $transaction_response->data->customer->phone;

    $plan = $transaction_response->data->plan;
    $order_id = $transaction_response->data->order_id;
    $paidAt = $transaction_response->data->paidAt;
    $createdAt = $transaction_response->data->createdAt;
    $requested_amount = $transaction_response->data->requested_amount;
    $transaction_date = $transaction_response->data->transaction_date;
  
$insert_transaction =  mysqli_query($mainDbString,"INSERT INTO `payment_tbl` (`main_tranx_id`, `tranx_id`, `tranx_status`, `tranx_amount`, `tranx_currency`, `tranx_phone`, `tranx_transaction_date`, `tranx_reference`, `my_tranx_reference`) VALUES (NULL, '{$id}', '{$status}', '{$amount}', '{$currency}', '{$phone}', '{$paidAt}', '{$reference}', '{$reference}')")or die(mysqli_error($mainDbString));

  if($insert_transaction){

      // Get one Card From the database
      switch ($amount) {
        case '200':
          $card_days = '2days';
          break;

        case '500':
          $card_days = '6days';
          break;
        
        default:
          # code...
          break;
      }

      $getCardDetails = mysqli_query($mainDbString,"SELECT * FROM cards_tbl WHERE card_status = 'unused' AND card_days = '{$card_days}' LIMIT 1")or die(mysqli_error($mainDbString));

      $card_details = mysqli_fetch_array($getCardDetails);

      $card_code = $card_details['card_pin'];

      // Insert into sold cards
      $insert_into_sold_cards = mysqli_query($mainDbString,"INSERT INTO `sold_cards_tbl` (`card_id`, `card_pin`, `card_status`, `card_days`, `card_timestamp`, `card_phone`) VALUES (NULL, '{$card_code}', 'used', '{$card_days}', current_timestamp(), '{$phone}')")or die(mysqli_error($mainDbString));

      $disableSelectedCard = mysqli_query($mainDbString,"UPDATE `cards_tbl` SET `card_status` = 'used' WHERE `cards_tbl`.`card_pin` = '{$card_code}'")or die(mysqli_error($mainDbString));

      echo $card_code;
  }else{
      echo 'error';
  }
}
  }
    }
  
?>