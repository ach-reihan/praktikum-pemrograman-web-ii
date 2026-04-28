<!DOCTYPE html>

<html>
    <head>
        <title>PRAK203.php</title>
    </head>
    <body>
        <?php
            $suhu = $_POST['suhu'] ?? '';
            $dari = $_POST['dari'] ?? '';
            $ke = $_POST['ke'] ?? '';
        ?>
        <form method="POST">
            <label for="suhu">Nilai :</label>
            <input type="text" id="suhu" name="suhu" value="<?php echo htmlspecialchars($suhu); ?>" required><br />

            <label>Dari : </label><br />
            <input type="radio" id="dari_c" name="dari" value="C" <?php echo ($dari === 'C') ? 'checked' : ''; ?> required> <label for="dari_c">Celcius</label><br />
            <input type="radio" id="dari_f" name="dari" value="F" <?php echo ($dari === 'F') ? 'checked' : ''; ?> required> <label for="dari_f">Fahrenheit</label><br />
            <input type="radio" id="dari_re" name="dari" value="Re" <?php echo ($dari === 'Re') ? 'checked' : ''; ?> required> <label for="dari_re">Rheamur</label><br />
            <input type="radio" id="dari_k" name="dari" value="K" <?php echo ($dari === 'K') ? 'checked' : ''; ?> required> <label for="dari_k">Kelvin</label><br />

            <label>Ke :</label><br />
            <input type="radio" id="ke_c" name="ke" value="C" <?php echo ($ke === 'C') ? 'checked' : ''; ?> required> <label for="ke_c">Celcius</label><br />
            <input type="radio" id="ke_f" name="ke" value="F" <?php echo ($ke === 'F') ? 'checked' : ''; ?> required> <label for="ke_f">Fahrenheit</label><br />
            <input type="radio" id="ke_re" name="ke" value="Re" <?php echo ($ke === 'Re') ? 'checked' : ''; ?> required> <label for="ke_re">Rheamur</label><br />
            <input type="radio" id="ke_k" name="ke" value="K" <?php echo ($ke === 'K') ? 'checked' : ''; ?> required> <label for="ke_k">Kelvin</label><br />

            <button type="submit" name="submit">Konversi</button>
        </form>

        <?php
            if (isset($_POST['submit'])) {
                $suhu = floatval($_POST['suhu']);
                $dari = $_POST['dari'];
                $ke = $_POST['ke'];
                $hasil = 0;

                switch ($dari) {
                    case 'C':
                        $hasil = $suhu;
                        break;
                    case 'F':
                        $hasil = ($suhu - 32) * 5 / 9;
                        break;
                    case 'Re':
                        $hasil = $suhu * 5 / 4;
                        break;
                    case 'K':
                        $hasil = $suhu - 273.15;
                        break;
                }

                switch ($ke) {
                    case 'C':
                        break;
                    case 'F':
                        $hasil = ($hasil * 9 / 5) + 32;
                        break;
                    case 'Re':
                        $hasil = $hasil * 4 / 5;
                        break;
                    case 'K':
                        $hasil = $hasil + 273.15;
                        break;
                }

                echo "<h2>Hasil Konversi: " . htmlspecialchars($hasil) . " °" . htmlspecialchars($ke) . "</h2>";
            }
        ?>
    </body>
</html>