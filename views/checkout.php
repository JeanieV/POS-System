<?php
require '../model/MenuItem.php';

// display error codes and messages
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require '../include/calculateVAT.php';


// redirect back to index if payment button is selected
if (isset($_GET['payment'])) {
    session_unset();
    header("Location: ./thankYou.php");
}

// Calculation of VAT stored in session variable
if (!isset($_GET['payment'])) {
    $_SESSION['vatAmount'] = calculateVat($_SESSION['orderTotal']);
    $_SESSION['vat'] = vatAmount($_SESSION['orderTotal']);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S&S POS | Pay</title>
    <link rel="stylesheet" href="./../static/css/style.css">
</head>

<body>
    <h1>
        Select and Save
    </h1>

    <form method="POST" class="confirmButton">
        <button type="submit" name="homeButton"><img src="./../static/img/order.png" class="logOutStyle"
                alt="Back to Order" title="Back to Order"
                attribution="https://www.flaticon.com/free-icons/list"></button>
    </form>

    <hr>

    <div class="invoiceForm">
        <h2> Items Purchased: </h2>

        <hr>

        <?php
        $heading = <<<DELIMITER
        <table>
            <tr>
                <th> <h4> Product </h4> </th>
                <th> <h4> Product Name </h4> </th>
                <th> <h4> Product Price </h4> </th>
                <th> <h4> Barcode </h4> <th>
            </tr>
        DELIMITER;
        $rows = '';

        foreach ($_SESSION['order'] as $menuItem) {

            $row = <<<DELIMITER
            <tr>
                <td><img src="../static/img/{$menuItem->get_image()}" alt="Menu Item Image" class="listImage"></td>
                <td><h3>{$menuItem->get_name()}</h3></td>
                <td><h3>R {$menuItem->get_price()}</h3></td>
                <td><h3>{$menuItem->get_barcode()}</h3></td>
            </tr>
            DELIMITER;
            $rows .= $row;
        }

        $table = <<<DELIMITER
        {$heading}
        {$rows}
        </table>
        DELIMITER;
        echo $table;
        ?>

        <hr>

        <h3>
            <table>
                <tr>
                    <td>
                        Amount:
                    </td>
                    <td>
                        <?php echo "R " . $_SESSION['orderTotal']; ?>
                    </td>
                </tr>

                <tr>
                    <td>
                        VAT Amount 15%:
                    </td>
                    <td>
                        <?php echo "R " . $_SESSION['vat']; ?>
                    </td>
                </tr>

                <tr>
                    <td>
                        Total for all items:
                    </td>
                    <td>
                        <?php echo "R " . $_SESSION['vatAmount']; ?>
                    </td>
                </tr>
            </table>
        </h3>
    </div>

    <hr>

    <div class="till__display">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET" class="confirmButton">
            <button class="checkoutPay" type="submit" name="payment">Pay with card</button>
            <button class="checkoutPay" type="submit" name="payment">Pay with cash</button>
        </form>
    </div>

</body>

</html>