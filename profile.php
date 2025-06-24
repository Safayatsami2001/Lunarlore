<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    
    header("Location: login.php");
    exit();
}

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "lunar lore";

    $conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

          $user_id = $_SESSION['user_id'];
          $sql = "SELECT username, email, balance, DOB, gender, location FROM users WHERE userid = ?";
          $stmt = $conn->prepare($sql);
          $stmt->bind_param("i", $user_id);
          $stmt->execute();
          $stmt->bind_result($username, $email, $balance, $DOB, $gender, $location);
          $stmt->fetch();
          $stmt->close();
          $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="profile.css">
</head>
<body>
    <div class="profile-container">
        <h2>Your Profile</h2>
        <p><strong>Username:</strong> <?php echo htmlspecialchars($username); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
        <p><strong>Balance:</strong> $<?php echo htmlspecialchars($balance); ?></p>
        <p><strong>Date of birth:</strong> <?php echo htmlspecialchars($DOB); ?></p>
        <p><strong>Gender:</strong> <?php echo htmlspecialchars($gender); ?></p>
        <p><strong>Location:</strong> <?php echo htmlspecialchars($location); ?></p>

        <form action="updateBalance.php" method="POST">
            <label for="amount">Add Balance:</label>
            <input type="number" id="amount" name="amount" min="1" required>
            <button type="submit">Add Balance</button>
        </form>

        <a href="home.html">Back to Homepage</a>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
