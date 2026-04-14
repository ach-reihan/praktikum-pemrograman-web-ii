<!DOCTYPE html>

<html>
    <head>
        <title>PRAK105.php</title>
        <style>
            table, th, td { border: 1px solid; }
            th { 
                font-size: 1.5rem;
                background-color: red;
                padding: 1.5rem 0 1.5rem 0;  
            }
        </style>
    </head>
    <body>
        <table>
            <tr>
                <th>Daftar Smartphone Samsung</th>
            </tr>
            <?php
                $smartphones = array(
                    "s22" => "Samsung Galaxy S22",
                    "s22+" => "Samsung Galaxy S22+",
                    "a03" => "Samsung Galaxy A03",
                    "xcover5" => "Samsung Galaxy Xcover 5"
                );

                foreach ($smartphones as $phone) {
                    echo "<tr><td>$phone</td></tr>";
                }
            ?>
        </table>
    </body>
</html>