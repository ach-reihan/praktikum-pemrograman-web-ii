<?php
require_once 'Model.php';

$memberId = null;
$name = '';
$memberNumber = '';
$address = '';
$registerDate = '';
$lastPaymentDate = '';
$isEditMode = false;

if (isset($_GET['id'])) {
    $memberId = intval($_GET['id']);
    $member = getMemberById($memberId);
    
    if ($member) {
        $name = $member['name'];
        $memberNumber = $member['member_number'];
        $address = $member['address'];
        $registerDate = date('Y-m-d\TH:i', strtotime($member['register_date']));
        $lastPaymentDate = $member['last_payment_date'];
        $isEditMode = true;
    } else {
        header('Location: Member.php');
        exit();
    }
}

if (isset($_POST['submit'])) {
    $nameInput = trim($_POST['name']);
    $memberNumberInput = trim($_POST['member_number']);
    $addressInput = trim($_POST['address']);
    $registerDateInput = str_replace('T', ' ', $_POST['register_date']);
    $lastPaymentDateInput = $_POST['last_payment_date'];
    
    if ($isEditMode) {
        updateMember($memberId, $nameInput, $memberNumberInput, $addressInput, $registerDateInput, $lastPaymentDateInput);
    } else {
        insertMember($nameInput, $memberNumberInput, $addressInput, $registerDateInput, $lastPaymentDateInput);
    }
    
    header('Location: Member.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $isEditMode ? 'Ubah' : 'Tambah' ?> Member - Perpustakaan Reihan</title>
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
            <a href="Member.php" class="btn btn-navy px-4 btn-sm">Kembali</a>
        </div>
    </div>

    <div class="container mb-5">
        <div class="form-container">
            <h3 class="text-center fw-bold mb-4">
                <?= $isEditMode ? 'Ada yang perlu diganti di Perpustakaan Reihan?' : 'Form Penambahan Member Perpustakaan Reihan' ?>
            </h3>
            
            <form method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold">Nama Member :</label>
                    <input type="text" class="form-control" id="name" name="name" 
                           placeholder="Masukkan nama lengkap member" value="<?= htmlspecialchars($name) ?>" required>
                </div>
                
                <div class="mb-3">
                    <label for="member_number" class="form-label fw-semibold">Nomor Member :</label>
                    <input type="text" class="form-control" id="member_number" name="member_number" 
                           placeholder="Masukkan nomor kartu member" value="<?= htmlspecialchars($memberNumber) ?>" required>
                </div>
                
                <div class="mb-3">
                    <label for="address" class="form-label fw-semibold">Alamat :</label>
                    <textarea class="form-control" id="address" name="address" rows="3" 
                              placeholder="Masukkan alamat tinggal member" required><?= htmlspecialchars($address) ?></textarea>
                </div>
                
                <div class="mb-3">
                    <label for="register_date" class="form-label fw-semibold">Tanggal & Waktu Mendaftar :</label>
                    <input type="datetime-local" class="form-control" id="register_date" name="register_date" 
                           value="<?= htmlspecialchars($registerDate) ?>" required>
                </div>
                
                <div class="mb-4">
                    <label for="last_payment_date" class="form-label fw-semibold">Tanggal Terakhir Bayar :</label>
                    <input type="date" class="form-control" id="last_payment_date" name="last_payment_date" 
                           value="<?= htmlspecialchars($lastPaymentDate) ?>" required>
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