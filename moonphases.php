<?php
$moonPhases = [
    "New Moon" => [
        "description" => "A time for new beginnings, setting intentions, and reflecting on the future.",
        "effects" => "This phase brings a sense of hope, renewal, and clarity. Ideal for people born at the start of a zodiac sign.",
    ],
    "Waxing Crescent" => [
        "description" => "A phase of growth and momentum, perfect for taking first steps toward goals.",
        "effects" => "This phase fuels motivation and creativity, affecting those born in the middle of a zodiac sign.",
    ],
    "First Quarter" => [
        "description" => "A phase of challenges and decision-making, requiring strength and determination.",
        "effects" => "People born during this phase are natural problem-solvers and feel energized during challenging times.",
    ],
    "Waxing Gibbous" => [
        "description" => "A phase of refinement and preparation for success.",
        "effects" => "This phase enhances perfectionism and patience, particularly for Earth signs like Taurus, Virgo, and Capricorn.",
    ],
    "Full Moon" => [
        "description" => "A phase of culmination, energy, and heightened emotions.",
        "effects" => "People with birthdays during this phase often experience emotional intensity and a strong connection to their goals.",
    ],
    "Waning Gibbous" => [
        "description" => "A phase for reflection, gratitude, and letting go of negativity.",
        "effects" => "This phase supports introspection and spiritual growth, especially for Water signs like Cancer, Scorpio, and Pisces.",
    ],
    "Last Quarter" => [
        "description" => "A phase for release, transition, and shedding what no longer serves you.",
        "effects" => "Those born during this phase excel at adapting to change and letting go of the past.",
    ],
    "Waning Crescent" => [
        "description" => "A phase of rest, recovery, and preparation for the next cycle.",
        "effects" => "This phase promotes healing and peace, resonating deeply with Air signs like Gemini, Libra, and Aquarius.",
    ],
];
function getMoonPhaseByBirthday($birthMonth) {
    $birthdayPhases = [
        1 => "New Moon",
        2 => "Waxing Crescent",
        3 => "First Quarter",
        4 => "Waxing Gibbous",
        5 => "Full Moon",
        6 => "Waning Gibbous",
        7 => "Last Quarter",
        8 => "Waning Crescent",
        9 => "New Moon",
        10 => "Waxing Crescent",
        11 => "First Quarter",
        12 => "Waxing Gibbous",
    ];
    return $birthdayPhases[$birthMonth] ?? "Unknown Phase";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moon Phases and Their Effects</title>
    <link rel="stylesheet" href="moonphases.css">
</head>
<body>
    <div class="container">
        <h1>Moon Phases and Their Astrological Effects</h1>
        <section class="moon-phases">
            <?php foreach ($moonPhases as $phase => $details): ?>
                <div class="phase">
                    <h2><?= $phase ?></h2>
                    <p><strong>Description:</strong> <?= $details['description'] ?></p>
                    <p><strong>Effects:</strong> <?= $details['effects'] ?></p>
                </div>
            <?php endforeach; ?>
        </section>

        <section class="birth-phase">
            <h2>Moon Phase by Birth Month</h2>
            <form method="POST" action="">
                <label for="birthMonth">Enter your birth month:</label>
                <select name="birthMonth" id="birthMonth" required>
                    <option value="" disabled selected>Choose your month</option>
                    <?php for ($i = 1; $i <= 12; $i++): ?>
                        <option value="<?= $i ?>"><?= date("F", mktime(0, 0, 0, $i, 1)) ?></option>
                    <?php endfor; ?>
                </select>
                <button type="submit">Find Your Moon Phase</button>
            </form>

            <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['birthMonth'])): ?>
                <?php
                $birthMonth = (int)$_POST['birthMonth'];
                $moonPhase = getMoonPhaseByBirthday($birthMonth);
                ?>
                <div class="result">
                    <h3>Your Birth Moon Phase: <?= $moonPhase ?></h3>
                    <p><?= $moonPhases[$moonPhase]['description'] ?? "No description available." ?></p>
                    <p><strong>Effects:</strong> <?= $moonPhases[$moonPhase]['effects'] ?? "No effects available." ?></p>
                </div>
            <?php endif; ?>
        </section>
    </div>
</body>
</html>