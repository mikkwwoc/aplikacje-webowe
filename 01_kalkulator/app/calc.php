<?php
require_once dirname(__FILE__).'/../config.php';

$amount = $_REQUEST['amount'];
$years = $_REQUEST['years'];
$percent = $_REQUEST['percent'];

//validation
if(!(isset($amount) && isset($years) && isset($percent))){
    $messages [] = 'Błąd - nie ma wszystkich danych';
}
if($amount == "") {
    $messages [] = 'Nie podano kwoty';
}
if($years == "") {
    $messages [] = 'Nie podano liczby lat';
}
if($percent == "") {
    $messages [] = 'Nie podano oprocentowania';
}

if (empty( $messages )) {
    if (!is_numeric($amount)){
        $messages [] = 'Pierwsza wartość nie jest liczbą całkowitą';
    }

    if (!is_numeric($years)){
        $messages [] = 'Druga wartość nie jest liczbą całkowitą';
    }
    if (!is_numeric($percent)){
        $messages [] = 'Trzecia wartość nie jest liczbą całkowitą';
    }
}
//result
if(empty($messages)){
    $monthlyInterestRate = ($percent / 100) / 12;

    $numberOfPayments = $years * 12;

    $onePayment = ($amount * $monthlyInterestRate) / (1 - pow(1 + $monthlyInterestRate, -$numberOfPayments));
    $paymentText= round($onePayment,2).' zł';
}

include 'calc_view.php';