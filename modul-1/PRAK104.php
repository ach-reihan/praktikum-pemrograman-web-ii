<!DOCTYPE html>

<html>
    <head>
        <title>PRAK104.php</title>
        <style>
            table, th, td { border: 1px solid; }
        </style>
    </head>
    <body>
        <table>
            <tr>
                <th>Daftar Smartphone Samsung</th>
            </tr>
            <?php
                $smartphones = array(
                    "Samsung Galaxy S22",
                    "Samsung Galaxy S22+",
                    "Samsung Galaxy A03",
                    "Samsung Galaxy Xcover 5"
                );

                foreach ($smartphones as $phone) {
                    echo "<tr><td>$phone</td></tr>";
                }
            ?>
        </table>
    </body>
</html>