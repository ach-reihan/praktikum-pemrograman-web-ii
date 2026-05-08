<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PRAK301</title>
</head>
<body>
    <?php
    $participantCount = isset($_POST['participant_count']) ? $_POST['participant_count'] : '';
    ?>

    <form method="POST">
        <label for="participant_count">Jumlah Peserta :</label>
        <input type="number" id="participant_count" name="participant_count" value="<?= htmlspecialchars($participantCount) ?>" required>
        <br />
        <button type="submit" name="submit">Cetak</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $limit = intval($_POST['participant_count']);
        $iterator = 1;

        while ($iterator <= $limit) {
            $color = ($iterator % 2 !== 0) ? "red" : "green";
            
            echo "<h2 style='color: $color;'>Peserta ke-$iterator</h2>";
            
            $iterator++;
        }
    }
    ?>
</body>
</html>