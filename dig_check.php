<?php
session_start();

// Replace with your actual database credentials
$dbHost = "your_db_host";
$dbUsername = "your_db_username";
$dbPassword = "your_db_password";
$dbName = "your_db_name";

// Create a database connection
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Retrieve key card ID from the form
$keyCardID = $_POST["key-card-id"];

// Simulate user authentication (replace with actual logic)
$sql = "SELECT * FROM users WHERE key_card_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $keyCardID);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // User authenticated, you can set up session variables or perform other actions
    $_SESSION["authenticated"] = true;
    $message = "Check-In Successful!";
} else {
    $message = "Check-In Failed. Invalid Key Card ID.";
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check-In Result</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Check-In Result</h1>
    </header>
    <main>
        <section id="check-in-result">
            <p><?php echo $message; ?></p>
        </section>
    </main>
    <footer>
        <p>&copy; 2023 Digital Key Card Check-In</p>
    </footer>
</body>
</html>
