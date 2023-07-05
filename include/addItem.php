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
        array_push($menuItemArray, new MenuItem($item->barcode, $item->name, $item->price));
    }

    return $menuItemArray;
}

// 'Storing' the items in the array
$_SESSION['menuItemArray'] = loadData($jsonFile);




function addItem(MenuItem $menuItem)
{

    // business logic here..

    return;
}