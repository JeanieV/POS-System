<?php

// display error codes and messages
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require './include/addItem.php';

// If the user clicks on the item, it will be added to the array
if (isset($_POST['selectedItemValue'])) {

    $selectedItem = null;
    foreach ($_SESSION['menuItemArray'] as $menuItem) {
        if ($menuItem->get_name() === $_POST['selectedItemValue']) {
            $selectedItem = $menuItem;
            break;
        }
    }

    if ($selectedItem) {
        addItem($selectedItem);
        $_SESSION['selectedItem'] = $selectedItem;
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S&S POS</title>
    <link rel="stylesheet" href="./static/css/style.css">
</head>

<body>
    <h1>
        Select and Save
    </h1>

    <hr>

    <div class="till__display">
        <div>
            <span class="till__console">
                Amount: R
                <?php echo $_SESSION['orderTotal']; ?>
            </span>
        </div>
        <form method="POST" class="confirmButton">
            <button type="submit" name="confirmOrder" class="checkout"> Confirm Order </button>
            <button type="submit" name="clearOrder" class="checkout"> Clear Order </button>
        </form>
    </div>

    <hr>

    <section>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="cardContainer">
                <?php
                foreach ($_SESSION['menuItemArray'] as $menuItem) {

                    ?>
                    <button type="submit" name="selectedItemValue" value="<?php echo $menuItem->get_name(); ?>"
                        class="homeCard">
                        <div class="card1">

                            <div class="card-body">
                                <h2 class="card-title">
                                    <?php echo $menuItem->get_name(); ?>
                                </h2>
                                <img src="./static/img/<?php echo $menuItem->get_image(); ?>" alt="Menu Item Image"
                                    class="card-image">
                                <h3 class="card-text"> Price: R
                                    <?php echo $menuItem->get_price(); ?>
                                </h3>
                                <h3 class="card-text"> Barcode:
                                    <?php echo $menuItem->get_barcode(); ?>
                                </h3>
                            </div>
                        </div>
                    </button>
                    <?php
                }
                ?>
            </div>
        </form>
    </section>


</body>

</html>