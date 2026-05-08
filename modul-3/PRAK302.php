<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PRAK302</title>
    <style>
        .icon { width: 20px; height: 20px; }
        .hidden { opacity: 0; }
    </style>
</head>
<body>
    <?php
    $height = isset($_POST['height']) ? $_POST['height'] : '';
    $imageUrl = isset($_POST['image_url']) ? $_POST['image_url'] : '';
    ?>

    <form method="POST">
        <label for="height">Tinggi :</label>
        <input type="number" id="height" name="height" value="<?= htmlspecialchars($height) ?>" required><br />
        
        <label for="image_url">Alamat Gambar :</label>
        <input type="text" id="image_url" name="image_url" value="<?= htmlspecialchars($imageUrl) ?>" required><br />
        
        <button type="submit" name="submit">Cetak</button>
    </form>
    <br />

    <?php
    if (isset($_POST['submit'])) {
        $rowLimit = intval($_POST['height']);
        $currentRow = 1;

        while ($currentRow <= $rowLimit) {
            
            $spaceCount = 1;
            while ($spaceCount < $currentRow) {
                echo "<img class='icon hidden' src='" . htmlspecialchars($imageUrl) . "' alt='space'>";
                $spaceCount++;
            }

            $imageCount = $rowLimit;
            while ($imageCount >= $currentRow) {
                echo "<img class='icon' src='" . htmlspecialchars($imageUrl) . "' alt='icon'>";
                $imageCount--;
            }

            echo "<br />";
            $currentRow++;
        }
    }
    ?>
</body>
</html>