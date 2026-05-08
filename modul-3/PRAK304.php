<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PRAK304</title>
    <style>
        .star { width: 75px; height: 75px; }
        .star-count { margin: 0px 0px 50px 0; }
        .error { color: red; font-weight: bold; }
    </style>
</head>
<body>
    <?php
    $starCount = NULL;
    $errorMessage = "";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['submit'])) {
            $starCount = intval($_POST['star_count']);
        } elseif (isset($_POST['add'])) {
            $starCount = intval($_POST['star_count']) + 1;
        } elseif (isset($_POST['subtract'])) {
            $starCount = intval($_POST['star_count']);
            if ($starCount > 0) {
                $starCount--;
            } else {
                $errorMessage = "Peringatan: Jumlah bintang tidak bisa kurang dari nol!";
            }
        }
    }
    ?>

    <?php if ($starCount === NULL): ?>
        <form method="POST">
            <label for="star_count">Jumlah bintang</label>
            <input type="number" id="star_count" name="star_count" min="0" required>
            <br />
            <button type="submit" name="submit">Submit</button>
        </form>

    <?php else: ?>
        <p class="star-count">Jumlah bintang <?= $starCount ?></p>
        
        <?php if (!empty($errorMessage)): ?>
            <p class="error"><?= $errorMessage ?></p>
        <?php endif; ?>

        <div>
            <?php
            for ($i = 0; $i < $starCount; $i++) {
                echo "<img class='star' src='https://www.freepnglogos.com/uploads/star-png/star-vector-png-transparent-image-pngpix-21.png' alt='star'>";
            }
            ?>
        </div>

        <form method="POST">
            <input type="hidden" name="star_count" value="<?= $starCount ?>">
            <button type="submit" name="add">Tambah</button><button type="submit" name="subtract">Kurang</button>
        </form>
    <?php endif; ?>
</body>
</html>