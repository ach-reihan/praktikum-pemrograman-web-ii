<!DOCTYPE html>

<html>
    <head>
        <title>PRAK202.php</title>
        <style>
            .required {
                color: red;
            }

            .warning {
                color: red;
                margin-left: 4px;
            }
        </style>
    </head>
    <body>
        <?php
            $nameErr = '';
            $nimErr = '';
            $genderErr = '';
            $name = '';
            $nim = '';
            $gender = '';

            if (isset($_POST['submit'])) {
                $name = trim($_POST['name']);
                $nim = trim($_POST['nim']);
                $gender = $_POST['gender'] ?? '';

                if ($name === '') {
                    $nameErr = 'nama tidak boleh kosong';
                }

                if ($nim === '') {
                    $nimErr = 'nim tidak boleh kosong';
                }

                if ($gender === '') {
                    $genderErr = 'jenis kelamin tidak boleh kosong';
                }
            }
        ?>

        <form method="POST">
            Nama: <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>"><span class="required">*</span><span class="warning"><?php echo $nameErr; ?></span><br />
            Nim: <input type="text" name="nim" value="<?php echo htmlspecialchars($nim); ?>"><span class="required">*</span><span class="warning"><?php echo $nimErr; ?></span><br />
            Jenis Kelamin :<span class="required">*</span><span class="warning"><?php echo $genderErr; ?></span><br />
            <input type="radio" name="gender" value="Laki-laki" <?php echo $gender === 'Laki-laki' ? 'checked' : ''; ?>> Laki-Laki<br />
            <input type="radio" name="gender" value="Perempuan" <?php echo $gender === 'Perempuan' ? 'checked' : ''; ?>> Perempuan<br />
            <button type="submit" name="submit">Submit</button>
        </form>

        <?php
                if (isset($_POST['submit'])) {
                    if ($nameErr === '' && $nimErr === '' && $genderErr === '') {
                        echo "<h2>Output:</h2>";
                        echo htmlspecialchars($name) . "<br />";
                        echo htmlspecialchars($nim) . "<br />";
                        echo htmlspecialchars($gender) . "<br />";
                    }
                }
        ?>
    </body>
</html>