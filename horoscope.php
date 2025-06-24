<?php
// Connect to lunar_lore database
$host = 'localhost';
$dbname = 'lunar lore';
$username = 'root';
$password = '';
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
/*
// Retrieve user zodiac sign from profile.php (replace with actual user data access code)
include 'profile.php';
$userZodiac = $user['zodiac_sign'];

// Fetch today’s horoscope for the user’s zodiac sign
$stmt = $conn->prepare("SELECT * FROM horoscopes WHERE zodiac_sign = :zodiac AND date = CURDATE()");
$stmt->bindParam(':zodiac', $userZodiac);
$stmt->execute();
$userHoroscope = $stmt->fetch(PDO::FETCH_ASSOC);
*/
// Fetch horoscopes for all zodiac signs
$allHoroscopesStmt = $conn->query("SELECT zodiac sign, content FROM horoscopes WHERE date = CURDATE()");
$allHoroscopes = $allHoroscopesStmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Horoscope Page</title>
    <link rel="stylesheet" href="horoscope.css">
</head>
<body>
    <header>
        <nav>
            <a href="home.html">Home</a>
            <a href="horoscope.php">Horoscope</a>
            <a href="profile.php">Profile</a>
        </nav>
    </header>

    <main>
        <section id="user-horoscope">
            <h2>Today's Horoscope for <?php echo ucfirst($userZodiac); ?></h2>
            <p><?php echo $userHoroscope ? $userHoroscope['content'] : "No horoscope available for today."; ?></p>
        </section>

        <section id="all-signs">
            <h3>Horoscopes for All Signs</h3>
            <div class="zodiac-grid">
                <?php foreach ($allHoroscopes as $horoscope) : ?>
                    <div class="zodiac-card">
                        <h4><?php echo ucfirst($horoscope['zodiac_sign']); ?></h4>
                        <p><?php echo $horoscope['content']; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    </main>
</body>
</html>
