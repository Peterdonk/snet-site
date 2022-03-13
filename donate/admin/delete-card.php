<?php

require_once ('../db/db.php');

$card_id = $_POST['card_id'];

$delete = mysqli_query($mainDbString,"DELETE FROM `cards_tbl` WHERE `card_id` = '$card_id'")or die(mysqli_error($mainDbString));

if($delete){
    echo 'success';
}else{
    echo 'error';
}



?>