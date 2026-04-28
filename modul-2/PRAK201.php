<!DOCTYPE html>

<html>
    <head>
        <title>PRAK201.php</title>
    </head>
    <body>
        <form method="POST">
            Nama: 1 <input type="text" name="name1" value="<?php echo isset($_POST['name1']) ? htmlspecialchars($_POST['name1']) : ''; ?>"><br />
            Nama: 2 <input type="text" name="name2" value="<?php echo isset($_POST['name2']) ? htmlspecialchars($_POST['name2']) : ''; ?>"><br />
            Nama: 3 <input type="text" name="name3" value="<?php echo isset($_POST['name3']) ? htmlspecialchars($_POST['name3']) : ''; ?>"><br />
            <button type="submit" name="submit">Urutkan</button>
        </form>
        <?php
            if (isset($_POST['submit'])) {
            $tempName1 = $_POST['name1'];
            $tempName2 = $_POST['name2'];
            $tempName3 = $_POST['name3'];

            if ($tempName1 < $tempName2 && $tempName1 < $tempName3) {
                $name1 = $tempName1;
                if ($tempName2 < $tempName3) {
                $name2 = $tempName2;
                $name3 = $tempName3;
                } else {
                $name2 = $tempName3;
                $name3 = $tempName2;
                }
            }

            if ($tempName2 < $tempName1 && $tempName2 < $tempName3) {
                $name1 = $tempName2;
                if ($tempName1 < $tempName3) {
                $name2 = $tempName1;
                $name3 = $tempName3;
                } else {
                $name2 = $tempName3;
                $name3 = $tempName1;
                }
            }
            
            if ($tempName3 < $tempName1 && $tempName3 < $tempName2) {
                $name1 = $tempName3;
                if ($tempName1 < $tempName2) {
                $name2 = $tempName1;
                $name3 = $tempName2;
                } else {
                $name2 = $tempName2;
                $name3 = $tempName1;
                }
            }
            }
        ?>

        <?php if (isset($name1) && isset($name2) && isset($name3)) { ?>
            <h2>Output:</h2>
            <?php
                echo $name1 . "<br />";
                echo $name2 . "<br />";
                echo $name3 . "<br />";
            ?>
        <?php } ?>
    </body>
</html>