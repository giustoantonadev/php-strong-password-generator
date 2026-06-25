<?php

session_start();

if (!isset($_SESSION['generated_password'])) {
    header('Location: index.php');
    exit();
}

$generatedPassword = $_SESSION['generated_password'];

unset($_SESSION['generated_password']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generated Password</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="app-card">
        <h1>Generated Password</h1>
        <div class="result-box">
            <p>Your generated password is:</p>
            <p><strong><?php echo htmlspecialchars($generatedPassword); ?></strong></p>
        </div>
        <a href="index.php">Generate another password</a>
    </div>
</body>

</html>