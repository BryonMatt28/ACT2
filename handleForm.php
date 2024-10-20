<?php
// pricelist
$fishball = 30;
$kikiam = 40;
$corndog = 50;

// Function to handle form and generate receipt
function handleForm() {
    global $fishball, $kikiam, $corndog;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["quantity"]) || empty($_POST["cash"])) {
            $error = "Please enter both quantity and cash.";
        } else {
            // Validate if inputs are numeric
            if (is_numeric($_POST["quantity"]) && is_numeric($_POST["cash"])) {
                $quantity = (int)$_POST["quantity"];
                $cash = (float)$_POST["cash"];

                // Ensure quantity and cash are positive
                if ($quantity <= 0 || $cash < 0) {
                    $error = "Quantity and cash must be positive values.";
                } else {
                    // Set price based on the selected order
                    switch ($_POST["order"]) {
                        case "Fishball":
                            $order_price = $fishball;
                            $item_name = "Fishball";
                            break;
                        case "Kikiam":
                            $order_price = $kikiam;
                            $item_name = "Kikiam";
                            break;
                        case "Corndog":
                            $order_price = $corndog;
                            $item_name = "Corndog";
                            break;
                        default:
                            $order_price = 0;
                            $item_name = "";
                            break;
                    }

                    $total_cost = $order_price * $quantity;
                    $change = $cash - $total_cost;

                    // Check if user has enough cash
                    if ($total_cost <= $cash) {
                        // Generate the receipt
                        $receipt = "<h2>Receipt</h2>";
                        $receipt .= "Item: {$item_name}<br>";
                        $receipt .= "Quantity: {$quantity}<br>";
                        $receipt .= "Total Cost: {$total_cost} PHP<br>";
                        $receipt .= "Payment: {$cash} PHP<br>";
                        $receipt .= "Change: {$change} PHP<br>";
                        $receipt .= "Date and Time of Purchase: " . date('Y-m-d H:i:s') . "<br>";
                        $receipt .= "<strong>Thanks for your order!</strong>";
                    } else {
                        // If cash is not enough
                        $error = "You do not have enough money.";
                    }
                }
            } else {
                $error = "Invalid input. Please enter numeric values for quantity and cash.";
            }
        }
    }

    // Return the result
    return isset($receipt) ? $receipt : (isset($error) ? "<p style='color: red;'>{$error}</p>" : "");
}

// Process the form and get the result
$result = handleForm();

// Output the result in HTML
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Result</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        h1, h2 {
            color: #2c3e50;
        }
        .receipt {
            background-color: #e8f6f3;
            padding: 20px;
            border-radius: 5px;
            margin-top: 20px;
        }
        .back-link {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .back-link:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <h1>Order Result</h1>
    <div class="receipt">
        <?php echo $result; ?>
    </div>
    <a href="ordersys.php" class="back-link">Place Another Order</a>
</body>
</html>