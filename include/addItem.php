<?php
require './model/MenuItem.php';

// Should be used to store all the menu items, selected by a single customer
if (!isset($_SESSION['order'])) {
    $_SESSION['order'] = array();
}


// Save the total amount of all the items inside the order
if (!isset($_SESSION['orderTotal'])) {
    $_SESSION['orderTotal'] = 0;
}

// Process of uploading data from data.json
$jsonFile = 'data.json';

function loadData($jsonFile)
{
    $json = file_get_contents($jsonFile);
    $items = json_decode($json)->items;
    $menuItemArray = array();
    foreach ($items as $item) {
        array_push($menuItemArray, new MenuItem($item->barcode, $item->name, $item->price, $item->image));
    }

    return $menuItemArray;
}

// 'Storing' the items in the array
$_SESSION['menuItemArray'] = loadData($jsonFile);



// Adds the menu order to the array
function addItem(MenuItem $menuItem)
{
    // Add the menu item to the order session variable
    $_SESSION['order'][] = $menuItem;

    // Add the item's price to the orderTotal session variable
    $_SESSION['orderTotal'] += $menuItem->get_price();

    return;
}

if(isset($_POST['confirmOrder'])){

    if($_SESSION['orderTotal'] !== 0){
        header("Location: ./views/checkout.php");
    }
    else{
        echo "<h2> Please select an item to be directed to Checkout </h2>";
    }
   
}

if(isset($_POST['clearOrder'])){
    $_SESSION['orderTotal'] = 0;
}

?>