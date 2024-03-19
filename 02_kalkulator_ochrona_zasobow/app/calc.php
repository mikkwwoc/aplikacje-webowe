<?php
require_once dirname(__FILE__).'/../config.php';

include _ROOT_PATH.'/app/security/check.php';
function getParams(&$amount,&$years,&$percent){
    $amount = isset($_REQUEST['amount']) ? $_REQUEST['amount'] : null;
    $years= isset($_REQUEST['years']) ? $_REQUEST['years'] : null;
    $percent = isset($_REQUEST['percent']) ? $_REQUEST['percent'] : null;
}

function validate(&$amount,&$years,&$percent,&$messages){
    
    if ( ! (isset($amount) && isset($years) && isset($percent))) {
      return false;
    }
    
    if ( $amount == "") {
        $messages [] = 'Nie podano liczby 1';
    }
    if ( $years == "") {
        $messages [] = 'Nie podano liczby 2';
    }
    if ( $percent == "") {
        $messages [] = 'Nie podano liczby e';
    }
    if (count ( $messages ) != 0) return false;
    
    if (! is_numeric( $amount )) {
        $messages [] = 'Pierwsza wartość nie jest liczbą całkowitą';
    }

    if (! is_numeric( $years )) {
        $messages [] = 'Druga wartość nie jest liczbą całkowitą';
    }
    if (! is_numeric( $percent )) {
        $messages [] = 'Druga wartość nie jest liczbą całkowitą';
    }

    if (count ( $messages ) != 0) return false;
    else return true;
}
function process($amount, $years, $percent, &$messages) {
    global $role;
    
    $monthlyInterestRate = ($percent / 100) / 12;
    $numberOfPayments = $years * 12;

    //result
    $monthlyPayment = ($amount * $monthlyInterestRate) / (1 - pow(1 + $monthlyInterestRate, -$numberOfPayments));
   
    if ($amount > 20000 && $role != 'admin') {
        $messages [] = 'Tylko administrator może uzyskać kredyt powyżej 20 000 zł.';
        return null;
    }
    return round($monthlyPayment, 2);
}

global $role;
$amount = null;
$years = null;
$percent = null;
$result = null;
$messages = array();

getParams($amount,$years,$percent);

if ( validate($amount,$years,$percent,$messages) ) {
    $result = process($amount, $years, $percent, $messages);
}
//echo "Role: ";
//var_dump($role);
//echo "Amount: ";
//var_dump($amount);
//echo "Years: ";
//var_dump($years);
//echo "Percent: ";
//var_dump($percent);

include 'calc_view.php';