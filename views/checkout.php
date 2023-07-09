<?php


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

    <h2>Items Purchased:</h2>

    <div class="itemList">
    </div>

    <hr>

    <h2>
        Amount: R<span>
            <?php echo $_SESSION['orderTotal']; ?>
        </span>
        <br>
        VAT Amount: R <span>0.00</span>
        <br>
        <br>
        Subtotal for all items: R<span>0.00</span>
    </h2>

    <div class="till__display">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET" class="confirmButton">
            <button class="checkoutPay" type="submit" name="payment">Pay with card</button>
            <button class="checkoutPay" type="submit" name="payment">Pay with cash</button>
        </form>
    </div>

</body>

</html>