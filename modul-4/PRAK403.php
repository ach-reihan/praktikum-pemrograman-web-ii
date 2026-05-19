<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PRAK403</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        td { vertical-align: top; }
        th { background-color: #d3d3d3; font-weight: bold; }
        .revisi { background-color: #ff0000; }
        .tidak-revisi { background-color: #228b22; }
    </style>
</head>
<body>
    <?php
    $students = [
        [
            'no' => 1,
            'nama' => 'Ridho',
            'courses' => [
                ['name' => 'Pemrograman I', 'sks' => 2],
                ['name' => 'Praktikum Pemrograman I', 'sks' => 1],
                ['name' => 'Pengantar Lingkungan Lahan Basah', 'sks' => 2],
                ['name' => 'Arsitektur Komputer', 'sks' => 3],
            ]
        ],
        [
            'no' => 2,
            'nama' => 'Ratna',
            'courses' => [
                ['name' => 'Basis Data I', 'sks' => 2],
                ['name' => 'Praktikum Basis Data I', 'sks' => 1],
                ['name' => 'Kalkulus', 'sks' => 3],
            ]
        ],
        [
            'no' => 3,
            'nama' => 'Tono',
            'courses' => [
                ['name' => 'Rekayasa Perangkat Lunak', 'sks' => 3],
                ['name' => 'Analisis dan Perancangan Sistem', 'sks' => 3],
                ['name' => 'Komputasi Awan', 'sks' => 3],
                ['name' => 'Kecerdasan Bisnis', 'sks' => 3],
            ]
        ]
    ];

    foreach ($students as &$student) {
        $totalSks = 0;
        foreach ($student['courses'] as $course) {
            $totalSks += $course['sks'];
        }
        $student['total_sks'] = $totalSks;

        if ($totalSks < 7) {
            $student['keterangan'] = 'Revisi KRS';
        } else {
            $student['keterangan'] = 'Tidak Revisi';
        }
    }
    unset($student);
    ?>

    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Mata Kuliah diambil</th>
            <th>SKS</th>
            <th>Total SKS</th>
            <th>Keterangan</th>
        </tr>
        
        <?php
        foreach ($students as $student) {
            $keteranganClass = ($student['keterangan'] == 'Revisi KRS') ? 'revisi' : 'tidak-revisi';

            $courseCount = count($student['courses']);

            for ($i = 0; $i < $courseCount; $i++) {
                echo "<tr>";
                
                if ($i === 0) {
                    echo "<td>" . htmlspecialchars($student['no']) . "</td>";
                    echo "<td>" . htmlspecialchars($student['nama']) . "</td>";
                } else {
                    echo "<td></td>";
                    echo "<td></td>";
                }

                echo "<td>" . htmlspecialchars($student['courses'][$i]['name']) . "</td>";
                echo "<td>" . htmlspecialchars($student['courses'][$i]['sks']) . "</td>";

                if ($i === 0) {
                    echo "<td>" . htmlspecialchars($student['total_sks']) . "</td>";
                    echo "<td class='{$keteranganClass}'>" . htmlspecialchars($student['keterangan']) . "</td>";
                } else {
                    echo "<td></td>";
                    echo "<td></td>";
                }
                
                echo "</tr>";
            }
        }
        ?>
    </table>
</body>
</html>