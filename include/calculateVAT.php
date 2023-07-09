<?php
session_start();
require '../model/MenuItem.php';



// Home button
if (isset($_POST['homeButton'])) {
    header("Location: ../index.php");
}







function calculateVat($PurchasedItemsTotal)
{
    $vat = $PurchasedItemsTotal * 0.15;
    $vatInclusiveTotal = $PurchasedItemsTotal + $vat;
    return $vatInclusiveTotal;
}

?>