<?php

// display error codes and messages
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require '../include/calculateVAT.php';

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
        Thank you for shopping at Select and Save!
    </h1>
    <h2>
        Visit us again soon!
    </h2>

    <hr>
    
    <div class="till__display">
        <form method="POST" class="confirmButton">
            <button type="submit" name="homeButton"><img src="./../static/img/logout.png" class="logOutStyle"
                    alt="Log Out" title="Log Out" attribution="https://www.flaticon.com/free-icons/logout"></button>
        </form>
    </div>

    <hr>

</body>

</html>