<?php
require_once 'Model.php';

$bookId = null;
$title = '';
$author = '';
$publisher = '';
$publishYear = '';
$isEditMode = false;

if (isset($_GET['id'])) {
    $bookId = intval($_GET['id']);
    $book = getBookById($bookId);
    
    if ($book) {
        $title = $book['title'];
        $author = $book['author'];
        $publisher = $book['publisher'];
        $publishYear = $book['publish_year'];
        $isEditMode = true;
    } else {
        header('Location: Buku.php');
        exit();
    }
}

if (isset($_POST['submit'])) {
    $titleInput = trim($_POST['title']);
    $authorInput = trim($_POST['author']);
    $publisherInput = trim($_POST['publisher']);
    $publishYearInput = intval($_POST['publish_year']);
    
    if ($isEditMode) {
        updateBook($bookId, $titleInput, $authorInput, $publisherInput, $publishYearInput);
    } else {
        insertBook($titleInput, $authorInput, $publisherInput, $publishYearInput);
    }
    
    header('Location: Buku.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $isEditMode ? 'Ubah' : 'Tambah' ?> Buku - Perpustakaan Reihan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>
        body {
            background-color: #ffffff;
        }
        .header-bar {
            border-bottom: 1px solid #dee2e6;
            padding: 15px 0;
            margin-bottom: 50px;
        }
        .form-container {
            max-width: 600px;
            margin: 0 auto;
        }
        .btn-navy {
            background-color: #2c3e50;
            color: #ffffff;
            transition: background-color 0.3s;
        }
        .btn-navy:hover {
            background-color: #1a252f;
            color: #ffffff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center header-bar">
            <h5 class="fw-bold text-dark mb-0">Perpustakaan Reihan</h5>
            <a href="Buku.php" class="btn btn-navy px-4 btn-sm">Kembali</a>
        </div>
    </div>

    <div class="container">
        <div class="form-container">
            <h3 class="text-center fw-bold mb-4">
                <?= $isEditMode ? 'Ada yang perlu diganti di Perpustakaan Reihan?' : 'Form Penambahan Buku Perpustakaan Reihan' ?>
            </h3>
            
            <form method="POST">
                <div class="mb-3">
                    <label for="title" class="form-label fw-semibold">Judul Buku :</label>
                    <input type="text" class="form-control" id="title" name="title" 
                           placeholder="Masukkan judul buku" value="<?= htmlspecialchars($title) ?>" required>
                </div>
                
                <div class="mb-3">
                    <label for="author" class="form-label fw-semibold">Penulis :</label>
                    <input type="text" class="form-control" id="author" name="author" 
                           placeholder="Masukkan nama penulis" value="<?= htmlspecialchars($author) ?>" required>
                </div>
                
                <div class="mb-3">
                    <label for="publisher" class="form-label fw-semibold">Penerbit :</label>
                    <input type="text" class="form-control" id="publisher" name="publisher" 
                           placeholder="Masukkan nama penerbit" value="<?= htmlspecialchars($publisher) ?>" required>
                </div>
                
                <div class="mb-4">
                    <label for="publish_year" class="form-label fw-semibold">Tahun Terbit :</label>
                    <input type="number" class="form-control" id="publish_year" name="publish_year" 
                           placeholder="Contoh: 2024" value="<?= htmlspecialchars($publishYear) ?>" required>
                </div>
                
                <button type="submit" name="submit" class="btn btn-navy px-4 w-100 py-2 fw-semibold">
                    <?= $isEditMode ? 'Ubah Data' : 'Daftar' ?>
                </button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-IYM8qs21A309a1f7d46v02a7F5Z5p4b9kF5V1m6d5qYJ6rQ9p0s2H7hO6BtE1Q==" crossorigin="anonymous"></script>
</body>
</html>