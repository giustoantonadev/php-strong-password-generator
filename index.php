<?php
session_start();
require_once 'functions.php';

$passwordLength = isset($_GET['length']) ? (int)$_GET['length'] : 0;

if ($passwordLength > 0) {

    // Costruisco l’array dei set selezionati
    $options = [
        'lowercase' => isset($_GET['lowercase']),
        'uppercase' => isset($_GET['uppercase']),
        'numbers'   => isset($_GET['numbers']),
        'symbols'   => isset($_GET['symbols'])
    ];

    // Genero la password
    $generatedPassword = generatePassword($passwordLength, $options);

    // Salvo in sessione
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
        <input type="checkbox" id="lowercase" name="lowercase" checked>
        <label for="lowercase">Include Lowercase</label>
        <br>
        <input type="checkbox" id="uppercase" name="uppercase" checked>
        <label for="uppercase">Include Uppercase</label>
        <br>
        <input type="checkbox" id="numbers" name="numbers" checked>
        <label for="numbers">Include Numbers</label>
        <br>
        <input type="checkbox" id="symbols" name="symbols" checked>
        <label for="symbols">Include Symbols</label>
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