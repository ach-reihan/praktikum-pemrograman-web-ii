<?php
require_once 'Model.php';

$borrowingId = null;
$memberId = '';
$bookId = '';
$borrowDate = '';
$returnDate = '';
$isEditMode = false;
$errorMessage = '';

if (isset($_GET['id'])) {
    $borrowingId = intval($_GET['id']);
    $borrowing = getBorrowingById($borrowingId);

    if ($borrowing) {
        $memberId = $borrowing['member_id'];
        $bookId = $borrowing['book_id'];
        $borrowDate = $borrowing['borrow_date'];
        $returnDate = $borrowing['return_date'];
        $isEditMode = true;
    } else {
        header('Location: Peminjaman.php');
        exit();
    }
}

if (isset($_POST['submit'])) {
    $memberIdInput = intval($_POST['member_id']);
    $bookIdInput = intval($_POST['book_id']);
    $borrowDateInput = $_POST['borrow_date'];
    $returnDateInput = $_POST['return_date'];

    if ($returnDateInput < $borrowDateInput) {
        $errorMessage = 'Tanggal kembali tidak boleh lebih awal dari tanggal pinjam.';
        $memberId = $memberIdInput;
        $bookId = $bookIdInput;
        $borrowDate = $borrowDateInput;
        $returnDate = $returnDateInput;
    } else {
        if ($isEditMode) {
            updateBorrowing($borrowingId, $memberIdInput, $bookIdInput, $borrowDateInput, $returnDateInput);
        } else {
            insertBorrowing($memberIdInput, $bookIdInput, $borrowDateInput, $returnDateInput);
        }

        header('Location: Peminjaman.php');
        exit();
    }
}

$membersList = getAllMembers();
$booksList = getAllBooks();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $isEditMode ? 'Ubah' : 'Tambah' ?> Transaksi - Perpustakaan Reihan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
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
        .borrow-toast {
            border: 0;
            border-left: 5px solid #dc3545;
            background: linear-gradient(135deg, #7f1d1d 0%, #dc3545 100%);
            color: #ffffff;
            min-width: 320px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center header-bar">
            <h5 class="fw-bold text-dark mb-0">Perpustakaan Reihan</h5>
            <a href="Peminjaman.php" class="btn btn-navy px-4 btn-sm">Kembali</a>
        </div>
    </div>

    <div class="container mb-5">
        <div class="form-container">
            <h3 class="text-center fw-bold mb-4">
                <?= $isEditMode ? 'Ada yang perlu diganti di Perpustakaan Reihan?' : 'Form Peminjaman Buku Perpustakaan Reihan' ?>
            </h3>

            <?php if (!empty($errorMessage)): ?>
                <div class="toast-container position-fixed top-0 end-0 p-3">
                    <div id="borrowToast" class="toast borrow-toast shadow-lg" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
                        <div class="d-flex align-items-start">
                            <div class="toast-body fw-semibold py-3 pe-2">
                                <?= htmlspecialchars($errorMessage) ?>
                            </div>
                            <button type="button" class="btn-close btn-close-white me-2 mt-3" data-bs-dismiss="toast" aria-label="Tutup"></button>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <form method="POST">
                <div class="mb-3">
                    <label for="member_id" class="form-label fw-semibold">Pilih Member :</label>
                    <select class="form-select" id="member_id" name="member_id" required>
                        <option value="" disabled <?= empty($memberId) ? 'selected' : '' ?>>-- Pilih Anggota Perpustakaan --</option>
                        <?php foreach ($membersList as $m): ?>
                            <option value="<?= $m['id'] ?>" <?= $m['id'] == $memberId ? 'selected' : '' ?>>
                                <?= htmlspecialchars($m['name']) ?> (ID: <?= htmlspecialchars($m['id']) ?> - No Kartu: <?= htmlspecialchars($m['member_number']) ?>)
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="book_id" class="form-label fw-semibold">Pilih Buku :</label>
                    <select class="form-select" id="book_id" name="book_id" required>
                        <option value="" disabled <?= empty($bookId) ? 'selected' : '' ?>>-- Pilih Buku yang Ingin Dipinjam --</option>
                        <?php foreach ($booksList as $b): ?>
                            <option value="<?= $b['id'] ?>" <?= $b['id'] == $bookId ? 'selected' : '' ?>>
                                <?= htmlspecialchars($b['title']) ?> (Penulis: <?= htmlspecialchars($b['author']) ?>)
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="borrow_date" class="form-label fw-semibold">Tanggal Pinjam :</label>
                    <input type="date" class="form-control" id="borrow_date" name="borrow_date" value="<?= htmlspecialchars($borrowDate) ?>" required>
                </div>

                <div class="mb-4">
                    <label for="return_date" class="form-label fw-semibold">Tanggal Kembali :</label>
                    <input type="date" class="form-control" id="return_date" name="return_date" value="<?= htmlspecialchars($returnDate) ?>" min="<?= htmlspecialchars($borrowDate) ?>" required>
                </div>

                <button type="submit" name="submit" class="btn btn-navy px-4 w-100 py-2 fw-semibold">
                    <?= $isEditMode ? 'Ubah Data' : 'Daftar' ?>
                </button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const borrowDateInput = document.getElementById('borrow_date');
        const returnDateInput = document.getElementById('return_date');

        function syncReturnDateMin() {
            returnDateInput.min = borrowDateInput.value;

            if (returnDateInput.value && returnDateInput.value < borrowDateInput.value) {
                returnDateInput.value = borrowDateInput.value;
            }
        }

        borrowDateInput.addEventListener('change', syncReturnDateMin);
        syncReturnDateMin();

        const borrowToast = document.getElementById('borrowToast');
        if (borrowToast) {
            bootstrap.Toast.getOrCreateInstance(borrowToast).show();
        }
    </script>
</body>
</html>