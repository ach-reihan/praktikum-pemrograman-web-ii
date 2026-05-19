<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PRAK401</title>
    <style>
        table { border-collapse: collapse; }
        td { border: 1px solid black; padding: 5px 5px; text-align: center; }
    </style>
</head>
<body>
    <?php
    $rows = isset($_POST['rows']) ? $_POST['rows'] : '';
    $cols = isset($_POST['cols']) ? $_POST['cols'] : '';
    $values = isset($_POST['values']) ? $_POST['values'] : '';
    ?>

    <form method="POST">
        <label for="rows">Panjang : </label>
        <input type="number" id="rows" name="rows" value="<?= htmlspecialchars($rows) ?>" required><br>
        
        <label for="cols">Lebar : </label>
        <input type="number" id="cols" name="cols" value="<?= htmlspecialchars($cols) ?>" required><br>
        
        <label for="values">Nilai : </label>
        <input type="text" id="values" name="values" value="<?= htmlspecialchars($values) ?>" required><br>
        
        <button type="submit" name="submit">Cetak</button>
    </form>
    <br>

    <?php
    if (isset($_POST['submit'])) {
        $valuesArray = explode(" ", $values);
        $totalElements = count($valuesArray);
        $requiredElements = intval($rows) * intval($cols);

        if ($totalElements === $requiredElements) {
            $matrix = array_chunk($valuesArray, intval($cols));

            echo "<table>";
            foreach ($matrix as $row) {
                echo "<tr>";
                foreach ($row as $value) {
                    echo "<td>" . htmlspecialchars($value) . "</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Panjang nilai tidak sesuai dengan ukuran matriks</p>";
        }
    }
    ?>
</body>
</html>