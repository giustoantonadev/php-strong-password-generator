<?php

require_once 'functions.php';

$passwordLength = isset($_GET['length']) ? (int)$_GET['length'] : 0;


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Generator</title>
</head>
<body>
    <h1>Password Generator</h1>
    <form action="index.php" method="get">
        <label for="length">Password Length:</label>
        <input type="number" id="length" name="length" min="1" max="10" required>
        <br><br>
        <input type="submit" value="Generate Password">
    </form>
    <?php
    if ($passwordLength > 0) {
        echo "<p>Generated Password: " . htmlspecialchars(generatePassword($passwordLength)) . "</p>";
    }
    ?>
</body>
</html>