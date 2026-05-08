<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PRAK303</title>
    <style>
        .star { width: 20px; height: 20px; }
    </style>
</head>
<body>
    <?php
    $lowerBound = isset($_POST['lower_bound']) ? $_POST['lower_bound'] : '';
    $upperBound = isset($_POST['upper_bound']) ? $_POST['upper_bound'] : '';
    ?>

    <form method="POST">
        <label for="lower_bound">Batas Bawah :</label>
        <input type="number" id="lower_bound" name="lower_bound" value="<?= htmlspecialchars($lowerBound) ?>" required><br />
        
        <label for="upper_bound">Batas Atas :</label>
        <input type="number" id="upper_bound" name="upper_bound" value="<?= htmlspecialchars($upperBound) ?>" required><br />
        
        <button type="submit" name="submit">Cetak</button>
    </form>
    <br />

    <?php
    if (isset($_POST['submit'])) {
        $currentNumber = intval($_POST['lower_bound']);
        $maxNumber = intval($_POST['upper_bound']);

        if ($currentNumber <= $maxNumber) {
            
            do {
                if (($currentNumber + 7) % 5 == 0) {
                    echo "<img class='star' src='https://www.freepnglogos.com/uploads/star-png/star-vector-png-transparent-image-pngpix-21.png' alt='star'> ";
                } else {
                    echo "$currentNumber ";
                }
                
                $currentNumber++;

            } while ($currentNumber <= $maxNumber);
        }
    }
    ?>
</body>
</html>