<!DOCTYPE html>
<html>
    <head>
        <title>PRAK204.php</title>
    </head>
    <body>
        <form method="POST">
            <label for="number">Nilai :</label>
            <input type="text" id="number" name="number" value="<?php echo isset($_POST['number']) ? htmlspecialchars($_POST['number']) : ''; ?>" required><br />
            <button type="submit" name="submit">Konversi</button>
        </form>
        <?php
            if (isset($_POST['submit'])) {
                $number = intval($_POST['number']);
                $result = '';

                if ($number < 0 || $number >= 1000) {
                    $result = 'Anda Menginput Melebihi Limit Bilangan';
                } elseif ($number == 0) {
                    $result = 'Nol';
                } elseif ($number >= 1 && $number <= 9) {
                    $result = 'Satuan';
                } elseif ($number >= 10 && $number <= 19) {
                    $result = 'Belasan';
                } elseif ($number >= 20 && $number <= 99) {
                    $result = 'Puluhan';
                } elseif ($number >= 100 && $number <= 999) {
                    $result = 'Ratusan';
                }

                echo "<h2>Hasil: " . htmlspecialchars($result) . "</h2>";
            }
        ?>
    </body>
</html>