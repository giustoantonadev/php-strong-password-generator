<?php

session_start();

require_once 'functions.php';

$passwordLength = isset($_GET['length']) ? (int)$_GET['length'] : 0;

if ($passwordLength >  0) {
    $generatedPassword = generatePassword($passwordLength);

    $_SESSION['generated_password'] = $generatedPassword;

    header('Location: result.php');
    exit();
}


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
    if (isset($_SESSION['generated_password'])) {
        echo "<p>Generated Password: " . htmlspecialchars($_SESSION['generated_password']) . "</p>";
        unset($_SESSION['generated_password']);
    }
    ?>
</body>

</html>