<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PRAK402</title>
    <style>
        table { border-collapse: collapse; width: 50%; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #d3d3d3; }
    </style>
</head>
<body>
    <?php
    $students = [
        ['nama' => 'Andi', 'nim' => '2101001', 'uts' => 87, 'uas' => 65],
        ['nama' => 'Budi', 'nim' => '2101002', 'uts' => 76, 'uas' => 79],
        ['nama' => 'Tono', 'nim' => '2101003', 'uts' => 50, 'uas' => 41],
        ['nama' => 'Jessica', 'nim' => '2101004', 'uts' => 60, 'uas' => 75],
    ];

    foreach ($students as &$student) {
        $finalScore = ($student['uts'] * 0.4) + ($student['uas'] * 0.6);
        $student['nilai_akhir'] = $finalScore;

        if ($finalScore >= 80) {
            $student['huruf'] = 'A';
        } elseif ($finalScore >= 70) {
            $student['huruf'] = 'B';
        } elseif ($finalScore >= 60) {
            $student['huruf'] = 'C';
        } elseif ($finalScore >= 50) {
            $student['huruf'] = 'D';
        } else {
            $student['huruf'] = 'E';
        }
    }
    unset($student); 
    ?>

    <table>
        <tr>
            <th>Nama</th>
            <th>NIM</th>
            <th>Nilai UTS</th>
            <th>Nilai UAS</th>
            <th>Nilai Akhir</th>
            <th>Huruf</th>
        </tr>
        <?php
        foreach ($students as $student) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($student['nama']) . "</td>";
            echo "<td>" . htmlspecialchars($student['nim']) . "</td>";
            echo "<td>" . htmlspecialchars($student['uts']) . "</td>";
            echo "<td>" . htmlspecialchars($student['uas']) . "</td>";
            echo "<td>" . htmlspecialchars($student['nilai_akhir']) . "</td>";
            echo "<td>" . htmlspecialchars($student['huruf']) . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>