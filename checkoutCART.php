<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$servername = 'localhost';
$username = 'root';
$password = "";
$dbname = 'lunar lore';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT balance FROM users WHERE userid = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($balance);
$stmt->fetch();
$stmt->close();

$total = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $_SESSION['cart']));

if ($balance >= $total) {
    $new_balance = $balance - $total;

    $sql = "UPDATE users SET balance = ? WHERE userid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("di", $new_balance, $user_id);
    $stmt->execute();
    $stmt->close();

    unset($_SESSION['cart']);
    echo "<p>Purchase successful! New balance: \$$new_balance</p>";
} else {
    echo "<p>Insufficient balance. Please add funds.</p>";
}

$conn->close();
?>

<a href="store.php">Back to Store</a>
