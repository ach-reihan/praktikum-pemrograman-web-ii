<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Reihan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>
        body {
            background-image: url('https://images.unsplash.com/photo-1507842217343-583bb7270b66?q=80&w=1920');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .library-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            padding: 35px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.35);
            max-width: 600px;
            width: 100%;
        }
        .library-logo {
            width: 110px;
            height: 110px;
            object-fit: cover;
            border-radius: 12px;
        }
        .btn-custom {
            background-color: #000000;
            color: #ffffff;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        .action-button {
            width: 8rem !important;
        }
        @media (min-width: 768px) {
            .action-button {
                width: min(220px, 100%);
            }
        }
        .btn-custom:hover {
            background-color: #2b2b2b;
            color: #ffffff;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <div class="library-card container m-3">
        <div class="row align-items-center g-4">
            <div class="col-12 col-md d-flex flex-column align-items-center flex-md-row gap-3 text-center text-md-start pe-md-4">
                <img src="https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?q=80&w=400" alt="Buku" class="library-logo shadow">
                <div class="text-center text-md-start">
                    <h2 class="fw-bold mb-0">Perpustakaan</h2>
                    <h2 class="fw-bold text-dark">Reihan</h2>
                </div>
            </div>
            
            <div class="col-12 col-md-auto d-flex flex-column gap-3 align-items-stretch align-items-md-end ms-md-auto ps-md-4">
                <a href="Member.php" class="btn btn-custom py-2 shadow-sm text-center action-button">Member</a>
                <a href="Buku.php" class="btn btn-custom py-2 shadow-sm text-center action-button">Buku</a>
                <a href="Peminjaman.php" class="btn btn-custom py-2 shadow-sm text-center action-button">Peminjaman</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>