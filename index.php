<?php

// display error codes and messages
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require './include/addItem.php';

if (isset($_POST['selectedItemValue'])) {

    // code to add item
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
        <span style="color:red">Select</span> and <span style="color:blue">Save</span>
    </h1>

    <hr>

    <div class="till__display">
        <div>
            <span class="till__console">
                Amount: R
                <?php echo $_SESSION['orderTotal']; ?>
            </span>
        </div>
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
                                <h4 class="card-title">
                                    <?php echo $menuItem->get_name(); ?>
                                </h4>
                                <p class="card-text"> R
                                    <?php echo $menuItem->get_price(); ?>
                                </p>
                                <p class="card-text">
                                    <?php echo $menuItem->get_barcode(); ?>
                                </p>
                            </div>
                        </div>
                    </button>
                    <?php
                }
                ?>
            </div>
        </form>
    </section>

    <form action="./views/checkout.php" method="get" class="checkout">
        <input type="hidden" name="subTotal" value="sub total amount">
        <button type="submit">
            Proceed to payment
        </button>
    </form>


</body>

</html>