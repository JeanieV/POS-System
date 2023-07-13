<?php
session_start();

// Home button
if (isset($_POST['homeButton'])) {
    header("Location: ../index.php");
}

function calculateVat($amount)
{
    $vat = $amount * 0.15;
    $vatInclusiveTotal = $amount + $vat;
    return $vatInclusiveTotal;
}

function vatAmount($amount){
    $vat = $amount * 0.15;
    return $vat;
}
?>