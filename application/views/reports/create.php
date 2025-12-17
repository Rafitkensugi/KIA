<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Report - KIA System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f5f6fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .main {
            padding: 30px;
        }
        .page-header {
            background: white;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .page-header h3 {
            margin: 0;
            font-size: 22px;
            color: #2c3e50;
        }
        .card {
            border: none;
            border-radius: 8px;
        }
        @media (max-width: 768px) {
            .main {
                margin-left: 0;
                padding: 15px;
            }
        }
    </style>
</head>
<body>

    <div class="main">

        <div class="page-header">
            <h3>Tambah Report</h3>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="<?= site_url('reports/store') ?>" method="post">

                    <div class="mb-3">
                        <label class="form-label">Jenis Report <span class="text-danger">*</span></label>
                        <input type="text" name="report_type" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Periode <span class="text-danger">*</span></label>
                        <input type="text" name="period" class="form-control" placeholder="contoh: Januari 2025" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Data <span class="text-danger">*</span></label>
                        <textarea name="data" class="form-control" rows="4" required></textarea>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="<?= site_url('reports') ?>" class="btn btn-secondary">Kembali</a>
                    </div>

                </form>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>