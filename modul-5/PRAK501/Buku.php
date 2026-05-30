<?php
require_once 'Model.php';

if (isset($_GET['delete'])) {
    $bookId = intval($_GET['delete']);
    
    if (deleteBook($bookId)) {
        header('Location: Buku.php');
        exit();
    }
}

$books = getAllBooks();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku - Perpustakaan Reihan</title>
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
                <h4 class="fw-bold mb-0">Data Buku</h4>
                <hr class="my-0">
                <div class="d-flex flex-column gap-3">
                    <a href="Index.php" class="fw-semibold">← Kembali</a>
                    <a href="FormBuku.php" class="fw-semibold">+ Tambah Data Buku</a>
                </div>
            </div>

            <div class="col-md-9 col-lg-10 main-content">
                <h3 class="fw-bold mb-4">Daftar Buku Perpustakaan Reihan</h3>
                
                <div class="table-responsive shadow-sm bg-white rounded">
                    <table class="table table-bordered table-hover table-custom mb-0">
                        <thead>
                            <tr>
                                <th style="width: 10%;">ID Buku</th>
                                <th>Judul Buku</th>
                                <th>Penulis</th>
                                <th>Penerbit</th>
                                <th style="width: 15%;">Tahun Terbit</th>
                                <th style="width: 15%; text-align: center;">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($books)): ?>
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-4">Belum ada data buku.</td>
                                    <script src=""></script>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($books as $book): ?>
                                    <tr>
                                        <td class="fw-semibold"><?= htmlspecialchars($book['id']) ?></td>
                                        <td><?= htmlspecialchars($book['title']) ?></td>
                                        <td><?= htmlspecialchars($book['author']) ?></td>
                                        <td><?= htmlspecialchars($book['publisher']) ?></td>
                                        <td><?= htmlspecialchars($book['publish_year']) ?></td>
                                        <td class="text-center">
                                            <a href="Buku.php?delete=<?= $book['id'] ?>" 
                                               class="btn btn-danger btn-sm rounded-pill px-3"
                                               onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">Hapus</a>
                                            <a href="FormBuku.php?id=<?= $book['id'] ?>" 
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