<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PRAK305</title>
</head>
<body>
    <?php
    $inputString = isset($_POST['input_string']) ? $_POST['input_string'] : '';
    $outputString = '';

    if (isset($_POST['submit']) && !empty($inputString)) {
        $length = strlen($inputString);

        for ($i = 0; $i < $length; $i++) {
            $currentChar = $inputString[$i];
            
            for ($j = 0; $j < $length; $j++) {
                if ($j == 0) {
                    $outputString .= strtoupper($currentChar);
                } else {
                    $outputString .= strtolower($currentChar);
                }
            }
        }
    }
    ?>

    <form method="POST">
        <input type="text" name="input_string" value="<?= htmlspecialchars($inputString) ?>" required>
        <button type="submit" name="submit">submit</button>
    </form>

    <?php if (isset($_POST['submit']) && !empty($inputString)): ?>
        <h2>Input:</h2>
        <p><?= htmlspecialchars($inputString) ?></p>
        
        <h2>Output:</h2>
        <p><?= htmlspecialchars($outputString) ?></p>
    <?php endif; ?>
</body>
</html>