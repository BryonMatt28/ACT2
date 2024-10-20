<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Canteen Order System</title>
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
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin-bottom: 10px;
        }
        form {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
        }
        label {
            display: inline-block;
            width: 100px;
            margin-bottom: 10px;
        }
        select, input[type="text"], input[type="submit"] {
            width: 200px;
            padding: 5px;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            background-color: #3498db;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <h1>Welcome to the canteen!</h1>
    
    <?php
    // pricelist
    $fishball = 30;
    $kikiam = 40;
    $corndog = 50;
    ?>

    <h2>Here are the prices</h2>
    <ul>
        <li>Fishball - <?php echo $fishball; ?> PHP</li>
        <li>Kikiam - <?php echo $kikiam; ?> PHP</li>
        <li>Corndog - <?php echo $corndog; ?> PHP</li>
    </ul>

    <form action="handleForm.php" method="post">
        <label for="order">Choose your order:</label>
        <select name="order" id="order">
            <option value="Fishball">Fishball</option>
            <option value="Kikiam">Kikiam</option>
            <option value="Corndog">Corndog</option>
        </select><br><br>
        <label for="quantity">Quantity:</label>
        <input type="text" name="quantity" id="quantity"><br><br>
        <label for="cash">Cash:</label>
        <input type="text" name="cash" id="cash"><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>