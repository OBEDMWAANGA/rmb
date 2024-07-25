<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set Exchange Rate</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #2c2c2c;
            color: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            text-align: center;
            background-color: #333333;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        input {
            padding: 10px;
            border-radius: 5px;
            border: none;
            margin-right: 10px;
            margin-bottom: 10px;
        }

        button {
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            background-color: #4caf50;
            color: #ffffff;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .message {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Set Exchange Rate</h2>
        <form method="POST" action="">
            <label for="rate">Exchange Rate (RMB to ZMW):</label>
            <input type="text" id="rate" name="rate" required>
            <button type="submit">Set Rate</button>
            <button type="button" onclick="window.location.href='index.php'">Home</button>
            <button type="button" onclick="window.location.href='logout.php'">Logout</button>
        </form>
        <div class="message">
            <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $rate = $_POST['rate'];
                    if (is_numeric($rate) && $rate > 0) {
                        file_put_contents('rate.txt', $rate);
                        echo "Exchange rate updated successfully.";
                    } else {
                        echo "Invalid rate.";
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>
