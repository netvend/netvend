<?php
require('config.php');

echo json_encode(array(
    'deposit_address' => DEPOSIT_ADDRESS,
    'deposit_confirmation' => DEPOSIT_CONFIRMATIONS,
    'fee_per_byte' => FEE_PER_BYTE
    ));
?>