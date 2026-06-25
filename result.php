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
</head>

<body>
    <h1>Generated Password</h1>
    <p>Your generated password is: <?php echo htmlspecialchars($generatedPassword); ?></p>
    <a href="index.php">Generate another password</a>
</body>

</html>