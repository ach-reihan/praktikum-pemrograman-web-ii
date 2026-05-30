<?php
require_once 'Model.php';

if (isset($_GET['delete'])) {
    $memberId = intval($_GET['delete']);
    
    if (deleteMember($memberId)) {
        header('Location: Member.php');
        exit();
    }
}

$members = getAllMembers();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Member - Perpustakaan Reihan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>
        .sidebar {
            background-color: #1a252f;
            min-height: 100vh;
            color: #ecf0f1;
        }
        .sidebar a {
            color: #bdc3c7;
            text-decoration: none;
            transition: color 0.3s;
        }
        .sidebar a:hover {
            color: #ffffff;
        }
        .main-content {
            background-color: #f8f9fa;
            min-height: 100vh;
            padding: 30px;
        }
        .table-custom th {
            background-color: #aeb6bf;
            color: #000000;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-lg-2 sidebar p-4 d-flex flex-column gap-4">
                <h4 class="fw-bold mb-0">Data Member</h4>
                <hr class="my-0">
                <div class="d-flex flex-column gap-3">
                    <a href="Index.php" class="fw-semibold">← Kembali</a>
                    <a href="FormMember.php" class="fw-semibold">+ Tambah Data Member</a>
                </div>
            </div>

            <div class="col-md-9 col-lg-10 main-content">
                <h3 class="fw-bold mb-4">Daftar Member Perpustakaan Reihan</h3>
                
                <div class="table-responsive shadow-sm bg-white rounded">
                    <table class="table table-bordered table-hover table-custom mb-0">
                        <thead>
                            <tr>
                                <th style="width: 8%;">ID</th>
                                <th>Nama Member</th>
                                <th>Nomor Member</th>
                                <th>Alamat</th>
                                <th>Tanggal Mendaftar</th>
                                <th>Terakhir Bayar</th>
                                <th style="width: 15%; text-align: center;">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($members)): ?>
                                <tr>
                                    <td colspan="7" class="text-center text-muted py-4">Belum ada data member.</td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($members as $member): ?>
                                    <tr>
                                        <td class="fw-semibold"><?= htmlspecialchars($member['id']) ?></td>
                                        <td><?= htmlspecialchars($member['name']) ?></td>
                                        <td><?= htmlspecialchars($member['member_number']) ?></td>
                                        <td><?= htmlspecialchars($member['address']) ?></td>
                                        <td><?= htmlspecialchars(date('d-m-Y H:i', strtotime($member['register_date']))) ?></td>
                                        <td><?= htmlspecialchars(date('d-m-Y', strtotime($member['last_payment_date']))) ?></td>
                                        <td class="text-center">
                                            <a href="Member.php?delete=<?= $member['id'] ?>" 
                                               class="btn btn-danger btn-sm rounded-pill px-3"
                                               onclick="return confirm('Apakah Anda yakin ingin menghapus member ini?')">Hapus</a>
                                            <a href="FormMember.php?id=<?= $member['id'] ?>" 
                                               class="btn btn-warning btn-sm rounded-pill px-3 text-dark fw-semibold">Ubah</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-IYM8qs21A309a1f7d46v02a7F5Z5p4b9kF5V1m6d5qYJ6rQ9p0s2H7hO6BtE1Q==" crossorigin="anonymous"></script>
</body>
</html>